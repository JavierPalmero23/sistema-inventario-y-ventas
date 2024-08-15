<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente',
        'fecha_venta',
        'total',
        'id_pago',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_producto', 'id_venta', 'id_producto')
            ->withPivot('cantidad', 'precio')
            ->withTimestamps();
    }

    public function formaPago()
    {
        return $this->belongsTo(FormasPago::class, 'id_pago');
    }
    
}
