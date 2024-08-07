<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre', 'id_cat', 'fecha_compra', 'colore', 'existencia', 'pc', 'pv',
        'descripcion_corta', 'descripcion_larga'
    ];
    
    protected $attributes = [
        'existencia' => 0, 'pc'=>0, 'pv'=>0,
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_producto')->withPivot('cantidad', 'precio');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_cat');
    }
    
    public function cotizacione()
    {
        return $this->belongsTo(Cotizacione::class, 'id');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_producto');
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'venta_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}
