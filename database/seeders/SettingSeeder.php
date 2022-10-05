<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'address' => 'Bahawalpur',
            'mobile_number' => '+92 3013456789 ',
            'instagram' => 'https://www.instagram.com/',
            'email' => 'asad@gmail.com',
            'twitter' => 'www.twitter.com/',
            'facebook' => 'www.facebook.com/',
            'policy' => 'Policy.....',
            'terms' => 'terms.....',
            'pay_mode' => 'Select',
            'paypal_user' => 'username',
            'paypal_password' => Hash::make("password"),
            'paypal_secret' => Hash::make("secret"),
        ]);
    }
}
