<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriasController extends Controller
{
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.galerias.lista');
    }
}
