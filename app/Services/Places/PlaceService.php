<?php

namespace App\Services\Places;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Place;
use App\DataTransferObjects\Place\StorePlaceData;

interface PlaceService
{
    /**
     * @return Collection
     */
    public function index(): Collection;

    /**
     * @param StorePlaceData $storePlaceData
     * @return Place
     */
    public function create(StorePlaceData $storePlaceData): Place;

    /**
     * @param int $id
     * @return Place 
     */
    public function show(int $id): Place;

    /**
     * @param int $id
     * @return Place 
     */
    public function update(int $id, StorePlaceData $storePlaceData): Place;

    /**
     * @param int $id
     * @return Place 
     */
    public function delete(int $id);
}
