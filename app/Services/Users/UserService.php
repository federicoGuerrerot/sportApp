<?php

namespace App\Services\Users;

use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\DataTransferObjects\User\StoreUserData;

interface UserService
{
    /**
     * @return Collection
     */
    public function index(): Collection;

    /**
     * @param StoreUserData $storePlaceData
     * @return User
     */
    public function create(StoreUserData $storeUserData): User;

    /**
     * @param int $id
     * @return User 
     */
    public function show(int $id): User;
}
