<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Karyawan;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Karyawan::factory(20)->create();

        User::create([
            "name" => "Ferdi Hasan",
            "email" => "ferdihasanpwd@gmail.com",
            "password" => bcrypt('12345678'),
        ]);

        User::create([
            "name" => "Roudhotul Jannah",
            "email" => "roudhotulj640@gmail.com",
            "password" => bcrypt('12345678'),
        ]);

    }
}
