<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'name' => 'Accessories',
          'slug' => 'accessories'
        ]);
        Category::create([
            'name' => 'Laptops',
            'slug' => 'laptops'
        ]);
        Category::create([
            'name' => 'Mobiles',
            'slug' => 'mobiles'
        ]);
    }
}
