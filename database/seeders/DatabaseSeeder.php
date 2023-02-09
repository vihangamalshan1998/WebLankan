<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Web lankan',
            'email' => 'Weblankan@gmail.com',
            'phone' => '0778060679',
            'address' => 'Angoda',
            'password' => bcrypt('secret'),
            'confirm_password' => bcrypt('secret'),
        ]);
    }
}
