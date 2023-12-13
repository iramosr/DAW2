<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $table = 'alquileres';

    protected $fillable = [
        'fecha_alquiler',
        'fecha_devolucion',
        'socio_id',
        'pelicula_id'
    ];

    protected function socio()
    {
        return $this->belongsTo(Socio::class, 'socio_id');
    }
    protected function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'pelicula_id');
    }
}
