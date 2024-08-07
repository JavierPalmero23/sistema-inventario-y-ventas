<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cotizacion', 'id_producto', 'cantidad', 'precio',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacione::class, 'id_cotizacion');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
