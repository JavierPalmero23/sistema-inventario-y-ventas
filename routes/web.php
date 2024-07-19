<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\CategoriaController;
Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
});

use App\Http\Controllers\ProductoController;
Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

use App\Http\Controllers\ClienteController;
Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
});

use App\Http\Controllers\ProveedorController;
Route::middleware(['auth'])->group(function () {
    Route::resource('proveedores', ProveedorController::class);
});

use App\Http\Controllers\FormasPagoController;
Route::middleware(['auth'])->group(function () {
    Route::resource('formas-pago', FormasPagoController::class);
});

use App\Http\Controllers\VendedorController;
Route::middleware(['auth'])->group(function () {
    Route::resource('vendedores', VendedorController::class);
});

use App\Http\Controllers\CompraController;
Route::middleware(['auth'])->group(function () {
    Route::resource('compras', CompraController::class);
});

use App\Http\Controllers\CotizacionController;
Route::middleware(['auth'])->group(function () {
    Route::resource('cotizaciones', CotizacionController::class);
});

use App\Http\Controllers\VentaController;
Route::middleware(['auth'])->group(function () {
    Route::resource('ventas', VentaController::class);
});

use App\Http\Controllers\InventarioController;
Route::middleware(['auth'])->group(function () {
    Route::resource('inventarios', InventarioController::class);
});

use App\Http\Controllers\ReporteController;
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.generar');
Route::get('/reportes/pdf', [ReporteController::class, 'downloadPDF'])->name('reportes.generar.pdf');


