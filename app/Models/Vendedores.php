<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_vendedor';

    protected $fillable = [
        'nombre', 'correo', 'telefono',
    ];
}
