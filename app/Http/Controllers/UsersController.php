<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('components.users');
    }

    public function listadoUsuers(){
        return view('components.listado-usu');
    }
}
