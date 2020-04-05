<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function usuariounparametro($nombre='Invitado'){
        return 'Usuario ' .$nombre;
    }
}
