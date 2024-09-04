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

use App\Http\Controllers\ContactController;

Route::get('/contacto', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contacto/enviar', [ContactController::class, 'submitForm'])->name('contact.submit');
