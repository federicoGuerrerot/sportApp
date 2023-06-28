<?php

namespace App\Http\Controllers;

use App\Services\Favorites\Impl\FavoriteServiceImpl;
use App\Http\Resources\PlaceCollection;

class FavoriteController extends Controller
{
    public function __construct(protected FavoriteServiceImpl $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function index(int $user_id)
    {
        return new PlaceCollection($this->favoriteService->index($user_id));
    }

    public function store(int $user_id, int $place_id)
    {
        $this->favoriteService->addFavorite($user_id, $place_id);
        // Return a response or perform additional operations if needed
    }

    public function destroy(int $user_id, int $place_id)
    {
        $this->favoriteService->removeFavorite($user_id, $place_id);
        // Return a response or perform additional operations if needed
    }
}