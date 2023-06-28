<?php

namespace App\Services\Favorites\Impl;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Place;
use App\Models\User;
use App\Services\Favorites\FavoriteService;
use App\DataTransferObjects\Place\StorePlaceData;

class FavoriteServiceImpl implements FavoriteService {
    
    public function index(int $user_id): Collection {
        $user = User::find($user_id);
        $favorites = $user->places;
        return $favorites;
    }

    public function addFavorite(int $user_id, int $place_id): void {
        $user = User::find($user_id);
        $place = Place::find($place_id);
        $user->places()->attach($place);
    }

    public function removeFavorite(int $user_id, int $place_id): void {
        $user = User::find($user_id);
        $place = Place::find($place_id);
        $user->places()->detach($place);
    }

}