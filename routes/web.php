<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CategoriaController;
Route::resource('categorias', CategoriaController::class);

use App\Http\Controllers\ProductoController;
Route::resource('productos', ProductoController::class);

use App\Http\Controllers\ClienteController;
Route::resource('clientes', ClienteController::class);

use App\Http\Controllers\ProveedorController;
Route::resource('proveedores', ProveedorController::class);

use App\Http\Controllers\FormasPagoController;
Route::resource('formas-pago', FormasPagoController::class);

use App\Http\Controllers\VendedorController;
Route::resource('vendedores', VendedorController::class);

use App\Http\Controllers\CompraController;
Route::resource('compras', CompraController::class);

use App\Http\Controllers\CotizacionController;
Route::resource('cotizaciones', CotizacionController::class);

use App\Http\Controllers\VentaController;
Route::resource('ventas', VentaController::class);

use App\Http\Controllers\InventarioController;
Route::resource('inventarios', InventarioController::class);

