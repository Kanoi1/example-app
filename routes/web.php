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

use App\Models\Marca;
Route::get('/ejemplo-relaciones', function(){
    echo '<pre>';
    
    echo '############# Marca ########################################'.PHP_EOL;
    $marca = Marca::find(1);
    print_r($marca->toArray());


    echo '############# Modelos a partir de una Marca ################'.PHP_EOL;
    $modelos = $marca->modelos;
    print_r($modelos->toArray());


    echo '############# Un Modelo especifico a partir de una marca ################'.PHP_EOL;
    $corola = $marca->modelos()->where('nombre','Corolla')->first(); //get para obtener varios
    print_r($corola->toArray());


    echo '############# La marca a partir de un modelo ###############'.PHP_EOL;
    $marca2 = $modelos[0]->marca; //tambien $corola->marca   funciona
    print_r($marca2->toArray());


    echo '############# Una marca que traiga embebidos los modelos ###############'.PHP_EOL;
    $marca3 = Marca::where('id',1)->with('modelos')->first();
    print_r($marca3->toArray());


    echo '</pre>';
});

use App\Models\Carrito;

Route::get('/usuario/{id}/carrito', function ($id) {
    
    $carrito = Carrito::where('user_id', $id)->where('activo', 1)->first();

    if ($carrito) {
       
        $productos = $carrito->detalleCarrito()->with('producto')->get();

       
        $total = $productos->reduce(function ($carry, $item) {
            return $carry + ($item->cantidad * $item->precio_unitario);
        }, 0);

        return response()->json([
            'carrito_id' => $carrito->id,
            'productos' => $productos,
            'total' => $total
        ]);
    } else {
        return response()->json(['message' => 'No hay un carrito activo para este usuario.'], 404);
    }
});



