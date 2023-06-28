<?php

namespace App\Services\Places\Impl;

use App\Models\Place;
use App\DataTransferObjects\Place\StorePlaceData;
use App\Services\Places\PlaceService;
use Illuminate\Database\Eloquent\Collection;

class PlaceServiceImpl implements PlaceService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Place::orderBy('id', 'desc')->get();
    }

    /**
     * @param StorePlaceData $storePlaceData
     * @return Place
     */
    public function create(StorePlaceData $storePlaceData): Place
    {
        return Place::create($storePlaceData->toArray());
    }

    /**
     * @param int $id
     * @return Place 
     */
    public function show(int $id): Place
    {
        return Place::findOrfail($id);
    }

    /**
     * @param int $id
     * @return Place 
     */
    public function update(int $id, StorePlaceData $storePlaceData): Place
    {
        $place = Place::findOrfail($id);
        $place->update($storePlaceData->toArray());
        $place->save();
        return $place;
    }

    /**
     * @param int $id
     * @return Place 
     */
    public function delete(int $id)
    {
        Place::findOrFail($id)->delete();
    }
}
