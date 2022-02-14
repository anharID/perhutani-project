<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.aset.index',[
            'assets'=>Asset::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.aset.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->file('image')->store('post-images');

        // dd($request);
        $request->validate([
            'code' => 'required|min:3|max:10',
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric',
            'book_value' => 'required|numeric',
            'depreciation' => 'required|numeric',
            'description' => 'required'
        ]);

        Asset::create([
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'book_value' => $request->book_value,
            'depreciation' => $request->depreciation,
            'description' => $request->description
        ]);

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
        return view('dashboard.aset.show',['asset'=>$asset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('dashboard.aset.edit',[
            'asset' =>$asset,
            'categories'=>Category::all()
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
        $rules=[
            'code' => 'required|min:3|max:10',
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric',
            'book_value' => 'required|numeric',
            'depreciation' => 'required|numeric',
            'description' => 'required'
        ];

        $request->validate($rules);

        Asset::where('id', $asset->id)->update([
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'book_value' => $request->book_value,
            'depreciation' => $request->depreciation,
            'description' => $request->description
        ]);

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
        Asset::destroy($asset->id);
        return redirect('/dashboard/assets')->with('success', 'Data berhasil dihapus!');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        return view('dashboard.aset.trash',
        [
            'assets'=>Asset::onlyTrashed()->get()
        ]);   
    }

    public function restore($slug = null)
    {
         if ($slug != null)
         {
             Asset::onlyTrashed()->where('slug', $slug)->restore();
         }
         else
         {
            Asset::onlyTrashed()->restore();
         }

         return redirect('/dashboard/assets/trash')->with('success', 'Data berhasil di restore!');
    }

    public function delete()
    {
         
    }
}