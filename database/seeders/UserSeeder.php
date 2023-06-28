<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'fulano';
        $user->email = 'fulano@gmail.com';
        $user->telefono = '123456789';
        $user->password = bcrypt('Fulano123');
        $user->save();

        $user = new User();
        $user->name = 'mengano';
        $user->email = 'mengano@gmail.com';
        $user->telefono = '123456789';
        $user->password = bcrypt('Mengano123');
        $user->save();

    }
}