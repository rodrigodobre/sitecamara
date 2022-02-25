<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Illuminate\Support\Facades\DB;

class AutorsController extends Controller
{
    private $autor;
    private $input;
    
        public function __construct()
    {
        $this->autor = new Autor();
        $this->input = array();
    }
    
    public function salvar(Request $request){
     
        $lei = DB::table('leis')->orderBy('id', 'desc')->first();
        $input['fk_lei'] = $lei->id;
        $autores= json_decode( json_encode($request->autores), true);
        foreach ($autores as $autor) { 
            
               $input['nome_autor'] = $autor;
               $novoautor = $this->autor->create($input);
        } 
    }
}
