<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Offer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(8)->create();
        // Product::factory(10)->create();
        // Offer::factory(10)->create();
          $this->call([
            //   StateSeeder::class,
            //   CategorySeeder::class,
            //   CitySeeder::class,
            //   BrandSeeder::class,
            //   UserSeeder::class,
              SettingSeeder::class,
          ]);
    }
}
