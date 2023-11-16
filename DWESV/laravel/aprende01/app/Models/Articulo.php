<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulos';
    protected $fillable = ['ref', 'descripcion', 'precio', 'observaciones', 'proveedor_id'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
