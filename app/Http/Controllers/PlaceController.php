<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Services\Places\Impl\PlaceServiceImpl;
use App\DataTransferObjects\Place\StorePlaceData;
use App\Http\Resources\PlaceResource;
use App\Http\Resources\PlaceCollection;

// use Symfony\Component\HttpFondation\Response;

class PlaceController extends Controller
{
    /**
     * @param PlaceService $PlaceService
     */
    public function __construct(protected PlaceServiceImpl $placeService)
    {
        $this -> placeService = $placeService;
    }

    /**
     * Display a list of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        return new PlaceCollection($this->placeService->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(
            new PlaceResource(
                $this->placeService->create(StorePlaceData::from($request))),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return new PlaceResource($this->placeService->show($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return new PlaceResource($this->placeService->update($id, StorePlaceData::from($request)));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id): JsonResponse
    {
        return response()->json($this->placeService->delete($id), 204);
    }
}