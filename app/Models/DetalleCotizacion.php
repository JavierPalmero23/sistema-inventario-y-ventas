<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cotizacion_id', 'id_producto', 'cantidad', 'precio',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacione::class, 'cotizacion_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
