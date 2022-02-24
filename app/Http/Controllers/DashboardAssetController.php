<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Kph;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Assert;

class DashboardAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $assets = Asset::all();
        return view('dashboard.asset.index',compact('users', 'assets')
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
       $validatedData = $request->validate([
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

        if ($request->file('image'))
        {
            $validatedData['image']= $request->file('image')->store('asset-images'); 
        }

        $validatedData['user_id'] = auth()->user()->id;

        Asset::create($validatedData);

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
        return view('dashboard.asset.show',['assets'=>$asset]);
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
            'asset' =>$asset,
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
        // dd($asset->all());
        if ($asset->image){
            Storage::move($asset->image, 'trash/' . $asset->image);
        }
        
        Asset::destroy($asset->id);
        return redirect('/dashboard/assets')->with('success', 'Data berhasil dihapus!');
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
        //  else
        //  {
        //     $imageFiles = Storage::files('trash/asset-images');
        //     foreach ($imageFiles as $imageFile){
        //         Storage::move($imageFile, 'asset-images/');
        //     }
        //     $restoreAll = Asset::onlyTrashed();
        //     $restoreAll->restore();
        //  }

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