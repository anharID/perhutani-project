<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Kph;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        $assets = Asset::all();
        return view('dashboard.asset.index',compact('assets')
            // 'assets'=>Asset::where('status', true)->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $kphs = Kph::all();
        return view('dashboard.asset.create', compact('categories', 'kphs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('attachment'));
       $validatedData = $request->validate([
            'code' => 'required|min:3|max:10',
            'name' => 'required|max:255',
            'kph_id' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'book_value' => 'required|numeric',
            'depreciation' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|file|max:1024',
            // 'attachment' => 'mimes:pdf|max:2000',
        ]);

       

        if ($request->file('image'))
        {
            $validatedData['image']= $request->file('image')->store('asset-images'); 
        }

        // $attachment = array();
        // if ($files = $request->file('attachment'))
        // {
        //     foreach ($files as $file){
        //         $attachment[]= $request->file('attachment')
        //         ->store('asset-attachments'); 
        //     }
        //     $validatedData['attachment']->implode('|', $attachment);
        // }

        $validatedData['user_id'] = auth()->user()->id;

        Asset::create($validatedData);

        // if ($request->hasAny('file')){
            
        //     foreach ($request->file('file') as $file){
        //         $name = $file->getClientOriginalName();
        //         $path = $file->store('asset-attachment');
    
        //         Attachment::create([
        //             'asset_id'=> $new_asset->id,
        //             'file' => $name,
        //             'path' => $path
        //         ]);
        //     }
        // }
        return redirect('/dashboard/assets')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        $count = Attachment::where('asset_id', $asset->id)->count();
        return view('dashboard.asset.show',compact('asset', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('dashboard.asset.edit',[
            'assets' =>$asset,
            'categories'=>Category::all(),
            'kphs' => Kph::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
       $data = $request->validate([
        'code' => 'required|min:3|max:10',
        'name' => 'required|max:255',
        'kph_id' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'book_value' => 'required|numeric',
        'depreciation' => 'required|numeric',
        'image' => 'image|file|max:1024',
        'description' => 'required'
        ]);
        
        if ($request->hasFile('image'))
        {
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            } 
            $data['image'] = $request->file('image')->store('asset-images'); 
        }

        $data['user_id'] = auth()->user()->id;

        Asset::where('id', $asset->id)->update($data);

        return redirect('/dashboard/assets')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        if ($asset->image){
            Storage::move($asset->image, 'trash/' . $asset->image);
        }
        
        Asset::destroy($asset->id);
        return redirect('/dashboard/assets')->with('success', 'Data berhasil dihapus!');
    }

    public function approve(){
        return view('dashboard.approve.index', [
            'assets' => Asset::where('status', false)->get()
        ]);
    }

    public function approveShow($slug){
        return view('dashboard.approve.show', [
            'assets' => Asset::where('slug', $slug)->first()
        ]);
    }

    public function approved(Request $request, $slug){

        $asset = Asset::where('slug', $slug)->first();
        $asset->status = 1;
        $asset->approve_by = auth()->user()->nama;
        $asset->save();

        $request->validate([
            'attachment.*' => 'mimes:pdf|max:2000'
        ]);
        
        $attach = $request->file('attachment');
        if($attach){

            
            foreach ($attach as $file){
                $filename = $file->getClientOriginalName();
                $path = $file->store('asset-attachments');

                $attachment = new Attachment();
                $attachment->asset_id = $asset->id;
                $attachment->filename = $filename;
                $attachment->path = $path;
                $attachment->save();
            }
                
        }
        
        

        

        return redirect('/dashboard/assets')->with('success', 'Aproval asset berhasil');
    }
    
    public function trash()
    {
        return view('dashboard.asset.trash',
        [
            'assets'=>Asset::onlyTrashed()->get()
        ]);   
    }

    public function restore($slug = null)
    {
         if ($slug != null)
         {
             $restore = Asset::onlyTrashed()->where('slug', $slug)->first();
             if ($restore->image){
                 Storage::move('trash/' . $restore->image, $restore->image);
             }
             $restore->restore();
         }
         return redirect('/dashboard/assets/trash')->with('success', 'Data berhasil di restore!');
    }

    public function delete($slug = null)
    {
        if ($slug != null)
        {
             $delete = Asset::onlyTrashed()->where('slug', $slug)->first();
             if ($delete->image){
                 Storage::delete('trash/' . $delete->image);
             }
             $delete->forceDelete();
         }
         else
         {
            Storage::deleteDirectory('trash');
            Asset::onlyTrashed()->forceDelete();
         }

         return redirect('/dashboard/assets/trash')->with('success', 'Data berhasil di delete permanent!');    
    }
}