<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Place;

use MatanYadaev\EloquentSpatial\Objects\Point;


class PlaceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $place = new Place();
        $place->nombre = 'Cancha 1';
        $place->direccion = 'Cra. 74 #48010, Laureles - Estadio';
        $place->telefono = '123456789';
        $place->location = new Point(4.6097100, -74.0817500);
        $place->save();

        $place = new Place();
        $place->nombre = 'Cancha 2';
        $place->direccion = 'Cra. 74 #48010, Laureles - Estadio';
        $place->telefono = '123456789';
        $place->location = new Point(4.6097100, -84.0817500);
        $place->save();

        $place = new Place();
        $place->nombre = 'Cancha 3';
        $place->direccion = 'Cra. 74 #48010, Laureles - Estadio';
        $place->telefono = '123456789';
        $place->location = new Point(4.6097100, -94.0817500);
        $place->save();
    }
}