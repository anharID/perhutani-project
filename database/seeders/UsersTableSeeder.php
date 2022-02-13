<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = "admin";
        $user->name = "Administrator";
        $user->email = "admin_manset@gmail.com";
        $user->password = Hash::make('admin123'); 
        $user->no_karyawan = '01010101';
        $user->no_hp = '088812345678';
        $user->alamat = 'Semarang, Jawa Tengah';
        $user->role = 'Admin';

        $user->save();
    }
}