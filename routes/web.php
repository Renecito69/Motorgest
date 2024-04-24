<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::resource('motorgest', 'App\Http\Controllers\HomeController');
Route::resource('vehiculo', 'App\Http\Controllers\VehiculoController');
Route::resource('taller', 'App\Http\Controllers\TallerController');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('usuario', 'App\Http\Controllers\usuarioController');
   
   });

Route::resource('mantenimiento', 'App\Http\Controllers\mantenimientoController');
Route::get('imprimirVehiculos','App\http\Controllers\PdfController@imprimirVehiculos')->name('imprimirVehiculos');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
