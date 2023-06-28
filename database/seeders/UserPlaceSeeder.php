<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Place;

class UserPlaceSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::find(1);
        $place = Place::find(1);
        $user->places()->attach($place);

        $user = User::find(1);
        $place = Place::find(2);
        $user->places()->attach($place);

        $user = User::find(2);
        $place = Place::find(2);
        $user->places()->attach($place);

        $user = User::find(2);
        $place = Place::find(3);
        $user->places()->attach($place);
    }
}