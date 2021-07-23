<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::resource('inventarios','App\Http\Controllers\InventarioController');
Route::resource('relevamientos','App\Http\Controllers\RelevamientoController');
Route::resource('sede3s','App\Http\Controllers\Sede3Controller');
Route::resource('articulos','App\Http\Controllers\ArticuloController');
Route::resource('categorias','App\Http\Controllers\CategoriaController');
Route::resource('sectors','App\Http\Controllers\SectorController');
Route::resource('sedes','App\Http\Controllers\SedeController');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
