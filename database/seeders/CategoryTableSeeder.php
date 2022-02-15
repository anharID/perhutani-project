<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Tanah',
            'slug' => 'tanah'
        ]);
        Category::create([
            'name' => 'Bangunan',
            'slug' => 'bangunan'
        ]);
        Category::create([
            'name' => 'Kendaraan',
            'slug' => 'kendaraan'
        ]);
    }
}