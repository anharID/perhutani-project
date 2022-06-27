<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function setting()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('dashboard.settings.setting', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,username,'. auth()->id(),
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
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
        $id = auth()->user()->id;
        User::where('id', $id)->update($validatedData);
        
        return redirect('/dashboard/user/setting')->with('success', 'Data berhasil diupdate!');
    }

    public function password()
    {
        return view('dashboard.settings.password');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $currentPassword = auth()->user()->password;
        $oldPassword = $request->old_password;

        if (Hash::check($oldPassword,$currentPassword))
        {
            $id = auth()->user()->id;
            User::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('success', 'Password berhasil diubah'); 
        } 
        else 
        {
            return back()->with('warning', 'Password tidak sesuai');
        }
    }
}