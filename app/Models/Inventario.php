<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_producto', 'id_cat', 'fecha_entrada', 'fecha_salida', 'movimiento', 'motivo', 'cantidad',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_cat');
    }
}
