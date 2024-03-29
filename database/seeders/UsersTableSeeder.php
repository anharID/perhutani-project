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
        User::create([
            'username' => 'administrator',
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'no_karyawan' => '000000001',
            'no_hp' => '088812345678',
            'alamat' => 'Muggasari, Semarang',
            'role' => 'Administrator'
        ]);

        User::create([
            'username' => 'supervisor',
            'nama' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
            'no_karyawan' => '000000002',
            'no_hp' => '082212345678',
            'alamat' => 'Banyumanik, Semarang',
            'role' => 'Supervisor'
        ]);

        User::create([
            'username' => 'operator',
            'nama' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('password'),
            'no_karyawan' => '000000003',
            'no_hp' => '081112345678',
            'alamat' => 'Tembalang, Semarang',
            'role' => 'Operator'
        ]);
    }
}