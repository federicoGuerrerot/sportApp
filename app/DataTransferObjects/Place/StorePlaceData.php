<?php

namespace App\DataTransferObjects\Place;

use Spatie\LaravelData\Data;

class StorePlaceData extends Data
{
    /**
     * @param string $nombre
     * @param string $direccion
     * @param string|null $telefono
     */
    public function __construct(
        public readonly string $nombre,
        public readonly string $direccion,
        public readonly ?string $telefono, //EL ? ES PARA QUE PUEDA SER NULL
    )
    {
    }

    /**
     * @return string[]
     */
    public static function rules(): array{
        return [
            'nombre' => 'required|string|min:5|max:50',
            'direccion' => 'required|string|min:15|max:50',
        ];
    }
}