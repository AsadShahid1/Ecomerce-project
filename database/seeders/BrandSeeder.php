<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'AKG',
            'slug' => 'akg'
          ]);
          Brand::create([
              'name' => 'Nokia',
              'slug' => 'nokia'
          ]);
          Brand::create([
              'name' => 'Samsung',
              'slug' => 'samsung'
          ]);
          Brand::create([
              'name' => 'HP',
              'slug' => 'hp'
          ]);
          Brand::create([
              'name' => 'Apple',
              'slug' => 'apple'
          ]);
    }
}
