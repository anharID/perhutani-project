<?php

namespace App\Http\Controllers;

use App\Models\Kph;
use Illuminate\Http\Request;

class DashboardKphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kph.index', [
            'kphs' => Kph::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kph.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'code' => 'required|unique:kphs|min:3|max:5',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'lu_coordinate' => 'required',
            'ls_coordinate' => 'required',
        ]);

        Kph::create($validateData);

        return redirect('/dashboard/kph')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kph  $kph
     * @return \Illuminate\Http\Response
     */
    public function show(Kph $kph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kph  $kph
     * @return \Illuminate\Http\Response
     */
    public function edit(Kph $kph)
    {
        return view('dashboard.kph.edit', ['kph'=> $kph]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kph  $kph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kph $kph)
    {
        $rules=[
            'code' => 'required|min:3|max:5',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'lu_coordinate' => 'required',
            'ls_coordinate' => 'required',
        ];
        $validateData = $request->validate($rules);
    
        Kph::where('id', $kph->id)
            ->update($validateData);

        return redirect('/dashboard/kph')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kph  $kph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kph $kph)
    {
        Kph::destroy($kph->id);
        return redirect('/dashboard/kph')->with('success', 'Data berhasil dihapus!');
    }
}