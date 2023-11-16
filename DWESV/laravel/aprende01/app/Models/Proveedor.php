<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $fillable = ['nif', 'razon_social', 'nombre', 'apellido1', 'apellido2'];

    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
}
