<?php

namespace App\Http\Controllers;

use App\Models\Indicaco;
use App\Models\Noticia;
use App\Models\Lei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadosController extends Controller
{
    //Pesquisa
    private $lei;
    private $indicacao;
    private $noticia;

    public function __construct()
    {
        $this->lei = Lei::get();
        $this->indicacao = Indicaco::get();
        $this->noticia = Noticia::get();
    }
    public function index(Request $request){
        $pesquisa = $request->pesquisa;
        $resultado_lei = DB::table('leis')->where('palavra_chave','LIKE', '%'.$pesquisa.'%')
            ->orWhere('autor','LIKE','%'.$pesquisa.'%')
            ->orWhere('numero', 'LIKE','%'.$pesquisa.'%')
            ->orWhere('ementa', 'LIKE','%'.$pesquisa.'%')->get();
        $resultado_indicacao = DB::table('indicacoes')->where('titulo_ind','LIKE', '%'.$pesquisa.'%')
            ->orWhere('texto_ind','LIKE','%'.$pesquisa.'%')->get();
        $resultado_noticia = DB::table('noticias')->where('titulo','LIKE', '%'.$pesquisa.'%')
            ->orWhere('texto','LIKE','%'.$pesquisa.'%')
            ->orWhere('fotografo', 'LIKE','%'.$pesquisa.'%')
            ->orWhere('credito', 'LIKE','%'.$pesquisa.'%')->get();
        return view('site.resultados.mostrar',['resultados_leis' => $resultado_lei, 'resultados_indicacoes' => $resultado_indicacao, 'resultados_noticias' => $resultado_noticia]);
    }
}
