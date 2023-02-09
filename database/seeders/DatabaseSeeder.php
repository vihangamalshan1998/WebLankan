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
            'name' => 'Vihanga Malshan',
            'email' => 'vihangamalshan12346@gmail.com',
            'phone' => '0778060679',
            'address' => 'secret',
            'password' => bcrypt('secret'),
            'confirm_password' => bcrypt('secret'),
        ]);
    }
}
