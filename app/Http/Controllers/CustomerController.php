<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function customerApprovedProcess(Request $request, $id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'biayasewa' => 'required',
            'tanggalsewa' => 'required',
            'pks.*' => 'required|mimes:pdf|max:5000'
        ]);

        if ($request->file('pks'))
        {
            $validatedData['pks'] = $request->file('pks')->getClientOriginalName(); 
            $validatedData['pks_path'] = $request->file('pks')->store('customers-pks'); 
        }

        $validatedData['status'] = true;
        $validatedData['approve_by'] = auth()->user()->nama;
        
        Customer::where('id', $id)->update($validatedData);

        return redirect('/dashboard/customers/approved')->with('success', 'Aproval customer berhasil');
    }

    public function customerApproved()
    {
        $customers = Customer::where('status', true)->get();
        return view('dashboard.customer.approved', compact('customers'));
    }

    public function customerApprovedShow($id)
    {
        $customer = Customer::find($id);
        return view('dashboard.customer.show-approved', compact('customer'));
    }

    public function customerFileDownload($id)
    {
        $customer = Customer::find($id);
        return Storage::download($customer->pks_path, $customer->pks);
    }

}