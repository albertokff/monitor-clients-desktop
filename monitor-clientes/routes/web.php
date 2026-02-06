<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
