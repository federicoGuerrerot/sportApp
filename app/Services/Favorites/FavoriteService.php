<?php

namespace App\Services\Favorites;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Place;
use App\Models\User;
use App\DataTransferObjects\Place\StorePlaceData;

interface FavoriteService {

    public function index(int $user_id): Collection;

    public function addFavorite(int $user_id, int $place_id): void;

    public function removeFavorite(int $user_id, int $place_id): void;
}