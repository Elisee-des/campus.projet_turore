<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'nom_prenom' => 'SABIDANI Elisée',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'telephone' => '76980689',
                'remember_token' => Str::random(10),
                'role' => 'admin',
                'photo' => 'storage/img/admin-2.png',
            ]
        );

        User::create(
            [
                'nom_prenom' => 'Ouedraogo Jean',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'telephone' => '72980689',
                'remember_token' => Str::random(10),
                'role' => 'user',
                'photo' => 'storage/img/user-2.png',
            ]
        );
    }
}
