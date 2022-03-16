<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('status', false)->get();
        return view('dashboard.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = Asset::all();
        return view('dashboard.customer.create', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'organisasi' => 'required|max:255',
            'asset_id' => 'required',
            'penawaran' => 'required',
            'permintaan' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Customer::create($validatedData);

        return redirect('/dashboard/customers/candidates')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $candidate)
    {
        return view('dashboard.customer.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $candidate)
    {
        $assets = Asset::all();
        return view('dashboard.customer.edit', compact('candidate', 'assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $candidate)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'organisasi' => 'required|max:255',
            'asset_id' => 'required',
            'penawaran' => 'required',
            'permintaan' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Customer::where('id', $candidate->id)
        ->update($validatedData);

        return redirect('/dashboard/customers/candidates')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function approveCustomer()
    {
        $customers = Customer::where('status', false)->get();
        return view('dashboard.approve.customer', compact('customers'));
    }

    public function approveCustomerShow($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('dashboard.approve.customer-show', compact('customer'));
    }


    public function customerApproved()
    {
        $customers = Customer::where('status', true)->get();
        return view('dashboard.customer.approved');
    }

}