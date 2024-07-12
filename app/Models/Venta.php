<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_vendedor', 'id_producto', 'id_cat', 'id_cliente', 'id_pago', 'fecha_venta', 'cambio', 'subtotal', 'iva', 'total',
    ];

    public function vendedor()
    {
        return $this->belongsTo(Vendedores::class, 'id_vendedor');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_cat');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function formaPago()
    {
        return $this->belongsTo(FormasPago::class, 'id_pago');
    }
}
