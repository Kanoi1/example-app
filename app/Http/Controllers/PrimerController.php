<?php
namespace App\Http\Controllers;

class PrimerController extends Controller
{
    function index(){
        return view('mis-views.primer-view', [
            'texto' => 'Hola Mundo',
            'color' => 'red'
        ]);
    }
    function nuevaFuncion(){
        return view('mis-views.nueva-view', [
            'mensaje' => 'Los que están en la cima determinan qué es lo correcto y lo que es incorrecto. ¡Este lugar es la cima! ¡Neutralidad? ¡La justicia vencerá, dices? ¡Por supuesto que lo hará! ¡Porque los ganadores siempre son justos!'
        ]);
    }
}
