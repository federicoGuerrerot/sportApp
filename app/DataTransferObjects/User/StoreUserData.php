<?php

namespace App\DataTransferObjects\User;

use Spatie\LaravelData\Data;

use Illuminate\Support\Facades\Hash;

class StoreUserData extends Data
{
    /**
     * @param string $nombre
     * @param string $direccion
     * @param string|null $telefono
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?int $telefono,
        public Hash|string $password
    )
    {
        $this->password = Hash::make($this->password);
    }

    /**
     * @return string[]
     */
    public static function rules(): array{
        return [
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|email|unique:users',
            'telefono' => 'nullable|int|min:9|max:11',
            'password' => 'required|string|min:8|max:50'
        ];
    }
}