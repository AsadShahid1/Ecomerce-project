<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        User::create([
            'first_name' => 'Asad',
            'last_name' => 'Shahid ',
            'email' => 'asad@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'is_admin' => 1,
        ]);
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Test ',
            'email' => 'asadshahid222@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'is_admin' => 1,
        ]);
        User::create([
            'first_name' => 'Client',
            'last_name' => 'User',
            'email' => 'stockholm939@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'is_admin' => 0,
        ]);

    }
}
