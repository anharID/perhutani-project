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
        // $user = new User;
        // $user->username = "admin";
        // $user->nama = "Administrator";
        // $user->email = "admin_manset@gmail.com";
        // $user->password = Hash::make('admin123'); 
        // $user->no_karyawan = '01010101';
        // $user->no_hp = '088812345678';
        // $user->alamat = 'Semarang, Jawa Tengah';
        // $user->role = 'Admin';

        // $user->save();

        User::create([
            'username' => 'administrator',
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'no_karyawan' => '21120119120012',
            'no_hp' => '088812345678',
            'alamat' => 'Tembalang, Semarang',
            'role' => 'Admin'
        ]);

        User::create([
            'username' => 'supervisor',
            'nama' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
            'no_karyawan' => '21120119120006',
            'no_hp' => '082212345678',
            'alamat' => 'Banyumanik, Semarang',
            'role' => 'Supervisor'
        ]);

        User::create([
            'username' => 'operator',
            'nama' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('password'),
            'no_karyawan' => '21120119120016',
            'no_hp' => '081112345678',
            'alamat' => 'Muggasari, Semarang',
            'role' => 'Operator'
        ]);
    }
}