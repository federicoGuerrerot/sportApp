<?php

namespace App\Services\Users\Impl;

use App\Models\User;
use App\DataTransferObjects\User\StoreUserData;
use App\Services\Users\UserService;
use Illuminate\Database\Eloquent\Collection;

class UserServiceImpl implements UserService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return User::orderBy('id', 'desc')->get();
    }

    /**
     * @param StoreUserData $storeUserData
     * @return User
     */
    public function create(StoreUserData $storeUserData): User
    {
        return User::create($storeUserData->toArray());
    }

    /**
     * @param int $id
     * @return User 
     */
    public function show(int $id): User
    {
        return User::findOrfail($id);
    }
}
