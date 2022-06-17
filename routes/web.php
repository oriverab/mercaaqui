<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoscontroller;
use App\Http\Controllers\vendedorcontroller;
use App\Http\Controllers\ventascontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ListaProducto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/admin', Admincontroller::class);

Route::resource('/ventas', ventascontroller::class);

Route::get('/ListaProductos', [App\Http\Controllers\ListaProducto::class, 'ListaProductos'])->name('ListaProductos');


Auth::routes(); 

Route::resource('/productos', productoscontroller::class);

Route::resource('/vendedor', vendedorcontroller::class);
route::get('/vendedor/create',[\App\Http\Controllers\vendedorcontroller::class, 'create']);
route::post('/vendedor/{id}',[\App\Http\Controllers\vendedorcontroller::class,'update']);
route::get('/vendedor/edit/{id}',[\App\Http\Controllers\vendedorcontroller::class,'edit']);
route::post('/vendedor/store/{id}',[\App\Http\Controllers\vendedorcontroller::class,'store']);

route::post('/vendedor/show',[\App\Http\Controllers\vendedorcontroller::class,'show']);

route::get('/productos/edit/{id}',[\App\Http\Controllers\productoscontroller::class,'edit']);

route::get('/ventas/edit/{id}',[\App\Http\Controllers\ventascontroller::class,'edit']);







