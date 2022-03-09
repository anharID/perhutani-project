<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Support\Facades\Storage;

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
        // $users = User::select("*")
        //                     ->whereNotNull('last_seen')
        //                     ->orderBy('last_seen', 'DESC');

        return view('dashboard.users.index',[
            'users' => User::all()
            ->except(auth()->user()->id)
            
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
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'no_karyawan' => 'required|numeric|unique:users,no_karyawan',
            'no_hp' => 'required|numeric|unique:users,no_hp',
            'alamat' => 'required|string|max:255',
            'role' => 'required',
            'foto' => 'image|file|max:1024'
        ]);

        if ($request->file('foto'))
        {
            $validatedData['foto'] = $request->file('foto')->store('user-photos'); 
        }

        $validatedData['password']=Hash::make($validatedData['password']);
        
        User::create($validatedData);

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
        $nonaktif = User::onlyTrashed()->get();
        return view('dashboard.users.show',compact('user', 'nonaktif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'user' => $user
        ]);
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_karyawan' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'foto' => 'image|file|max:1024'
        ]);

        if ($request->hasFile('foto')){
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            } 
            $validatedData['foto'] = $request->file('foto')->store('user-photos'); 
        }

        User::where('id', $user->id)->update($validatedData);
        
        return redirect('/dashboard/users')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        // dd($user->id);
        // User::where('id', $user->id)->delete();
        return redirect('/dashboard/users')->with('success', 'User berhasil dinonaktifkan!');
    }

    public function trash(){
        return view('dashboard.users.non-active', [
            'users' => User::onlyTrashed()->get()
        ]);
    }

    public function restore($username){
        $restore = User::onlyTrashed()->where('username', $username)->first();
        $restore->restore();

        return redirect('/dashboard/users/non-active')->with('success', 'User berhasil diaktifkan!');
    }
}