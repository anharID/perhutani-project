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
            'attachment.*' => 'mimes:pdf|max:5000',
        ]);

       
        $image = $request->file('image');
        if ($image)
        {
            $imagePath = $image->store('asset-images'); 
        }
        else{
            $imagePath = '';
        }

        $validatedData['user_id'] = auth()->user()->id;

        $asset = Asset::create([
            'code' => $validatedData['code'],
            'name' => $validatedData['name'],
            'kph_id' => $validatedData['kph_id'],
            'category_id' => $validatedData['category_id'],
            'user_id' => $validatedData['user_id'],
            'price' => $validatedData['price'],
            'book_value' => $validatedData['book_value'],
            'depreciation' => $validatedData['depreciation'],
            'description' => $validatedData['description'],
            'image' => $imagePath
        ]);

        // $request->validate([
        //     'attachment.*' => 'mimes:pdf|max:2000'
        // ]);
        
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
            'kphs' => Kph::all(),
            'count' => Attachment::where('asset_id', $asset->id)->count()
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
        // dd($request->oldAttachment);
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
        'attachment.*' => 'mimes:pdf|max:5000'
        ]);
        
        if ($request->hasFile('image'))
        {
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            } 
            $validatedData['image'] = $request->file('image')->store('asset-images'); 
        }
        else{
            if ($request->oldImage){
                $validatedData['image'] = $request->oldImage;
            }
            else{
                $validatedData['image']= '';
            }
        }
        

        $validatedData['user_id'] = auth()->user()->id;

        Asset::where('id', $asset->id)->update([
            'code' => $validatedData['code'],
            'name' => $validatedData['name'],
            'kph_id' => $validatedData['kph_id'],
            'category_id' => $validatedData['category_id'],
            'user_id' => $validatedData['user_id'],
            'price' => $validatedData['price'],
            'book_value' => $validatedData['book_value'],
            'depreciation' => $validatedData['depreciation'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image']
        ]);

        $attach = $request->file('attachment');
        $attachment = Attachment::where('asset_id', $asset->id);
        $count = $attachment->count();
        if($attach){
            for ($i = 0; $i < $count; $i++){
                if ($request->oldAttachment[$i]){
                        Storage::delete($request->oldAttachment[$i]);
                }
                $attachment->delete();
            
            }
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
        return redirect('/dashboard/assets')->with('success', 'Data berhasil diupdate!');
    }

    public function downloadFile($id)
    {
        $attach = Attachment::find($id);
        return Storage::download($attach->path, $attach->filename);

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
        $asset = Asset::where('slug', $slug)->first();
        $count = Attachment::where('asset_id', $asset->id)->count();
        return view('dashboard.approve.show',compact('asset', 'count'));
    }

    public function approved($slug){

        $asset = Asset::where('slug', $slug)->first();
        $asset->status = 1;
        $asset->approve_by = auth()->user()->nama;
        $asset->save();

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