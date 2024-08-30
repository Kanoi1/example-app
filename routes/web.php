<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PrimerController;
Route::get('/mi-primer-controller', [PrimerController::class, 'index']);
Route::get('/nueva-funcion', [PrimerController::class, 'nuevaFuncion']);
Route::get('/sobre-nosotros', function () {
    return view('about');
});