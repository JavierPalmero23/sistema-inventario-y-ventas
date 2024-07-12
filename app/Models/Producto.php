<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre', 'id_cat', 'pv', 'pc', 'fecha_compra', 'colore',
        'descripcion_corta', 'descripcion_larga'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_cat');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_producto');
    }
}
