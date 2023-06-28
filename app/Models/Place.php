<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

// use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Place extends Model
// Realmente hace referencia a los lugares favoritos de los usuarios
// Los lugares en general se obtendran de la API de Google Maps desde el frontend

{
    // use HasSpatial;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_place');
    }

    /**
     * @var array
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'location',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'location' => Point::class,
    ];
}
