<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class DashboardUserController extends Controller
{
    
    use RegistersUsers;
    use ConfirmsPasswords;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Foundation\Auth\ConfirmsPasswords;
     * @return \Illuminate\Support\Facades\Hash;
     */

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_karyawan' => ['required', 'numeric'],
            'no_hp' => ['required', 'numeric'],
            'alamat' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        
        // $validatedData['password']=Hash::make($validatedData['password']);
        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_karyawan' => $request->no_karyawan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => $request->role
        ]);

        
        // dd('berhasil');
        // User::create($validatedData);

        return redirect('dashboard/users')->with('success', 'Data berhasil ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}