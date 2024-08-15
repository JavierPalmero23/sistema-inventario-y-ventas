<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente', 'fecha_cot', 'total', 'vigencia', 'comentarios',
    ];

    public function detalles()
{
    return $this->hasMany(DetalleCotizacion::class, 'id_cotizacion');
}
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalles_cotizaciones', 'id_cotizacion', 'id_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
