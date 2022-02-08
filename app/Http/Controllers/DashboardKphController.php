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
        return view('dashboard.kph.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kph  $kph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kph $kph)
    {
        //
    }
}
