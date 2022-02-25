<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

/**
 * Description of ConsultaController
 *
 * @author setorti
 */
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController {
    
    
    private $consulta;
    
    public function __construct(){
        
        $this->consulta = new Consulta();
        
    }
    public function index(){
        $consultas = DB::table('consultas')->orderBy('bairro', 'desc')->paginate(10);
        return view('admin.consultas.lista', ['consultas' => $consultas]);
        
    }
    public function mostrar() {
        
        return view('site.consulta.consulta');
        
    }
    public function salvar(Request $request){
            
       $input = array();
       $input['bairro'] = $request->bairro;
       $input['sugestao'] = $request->sugestao;
       $this->consulta->create($input);
       
        //$ultimoregistro = DB::table('consultas')->orderBy('id', 'desc')->first();
        
        //$this->alteracao->salvar(9,1, $ultimoregistro->id);
        
       \Session::flash('mensagem_sucesso','Obrigado por ajudar a cidade de Ponta Porã');
       
       return view('site.consulta.consulta');
       
    }
    
}
