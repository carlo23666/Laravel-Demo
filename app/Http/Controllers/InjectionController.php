<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InjectionController extends Controller // Podemos crear controlladores
// Para hacer uso de sus funciones desde otros controladores mediante inyeccion de dependencias
{
    public function showMessage() {
        return "This is injection Controller";
    }
}
