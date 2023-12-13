<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'peliculas';

    protected $fillable = [
        'titulo',
        'portada',
        'fecha_estreno',
        'sinopsis',
        'director_id',
        'categoria_id'
    ];
    protected function director()
    {
        return $this->belongsTo(Director::class, 'director_id');
    }

    protected function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
