<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Indicaco;
use App\Models\Vereadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicacoesController extends Controller
{
    public $foto;
    public $alteracao;

    public function __construct()
    {
        $this->alteracao = new AlteracoesController();
    }
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $indicacoes = Indicaco::orderBy('id', 'desc')->paginate(10);
        return view('admin.indicacoes.lista',['indicacoes' => $indicacoes]);
    }
    public function novo(){
        $vereadores = Vereadore::orderBy('nome','asc')->get();
        return view('admin.indicacoes.formulario',['vereadores' => $vereadores]);
    }
    public function salvar(Request $request)
    {
        $indicacao = new Indicaco();
        $vereadores = Vereadore::get();
        $input['titulo_ind'] = $request->titulo_ind;
        $input['texto_ind'] = $request->texto_ind;
        $input['sessao'] = date("Y-m-d", strtotime($request->sessao));
        $input['fk_vereador'] = $request->fk_vereador;
        $cad_indicacao = $indicacao->create($input);
        $ultimoregistro = DB::table('indicacoes')->orderBy('id', 'desc')->first();
        $this->alteracao->salvar(3,1, $ultimoregistro->id);
        \Session::flash('mensagem_sucesso','Indicação cadastrada com Sucesso');
        return view('admin.indicacoes.formulario',['vereadores' => $vereadores]);
    }
    public function editar($id)
    {
        $indicacao = Indicaco::findOrFail($id);
        $vereadores = Vereadore::orderBy('nome','asc')->get();

        return view('admin.indicacoes.formulario', ['indicacao' => $indicacao, 'vereadores' => $vereadores, 'foto' => $indicacao->vereador->foto->foto_src]);
    }
    public function atualizar($id, Request $request){
        $indicacao = Indicaco::findOrFail($id);
        $vereadores = Vereadore::get();
        $input['titulo_ind'] = $request->titulo_ind;
        $input['texto_ind'] = $request->texto_ind;
        $input['sessao'] = date("Y-m-d", strtotime($request->sessao));
        $input['fk_vereador'] = $request->fk_vereador;
        $indicacao->update($input);
        $this->alteracao->alterar(3,2,$id);
        \Session::flash('mensagem_sucesso','Indicação atualizada com Sucesso');
        return view('admin.indicacoes.formulario', ['indicacao' => $indicacao, 'vereadores' => $vereadores]);
    }
    public function deletar($id){
        $indicacao = Indicaco::findOrFail($id);
        $indicacao->delete();
        $this->alteracao->alterar(3,3,$id);
        \Session::flash('mensagem_sucesso','Indicação excluída com Sucesso');
        return redirect()->action('IndicacoesController@index');
    }
    public function mostrar(){
        $indicacoes = Indicaco::orderBy('id', 'desc')->paginate(10);
        return view('site.indicacoes.mostrar',['indicacoes' => $indicacoes]);
    }
    public function abrir($id){
        $indicacao = Indicaco::findOrFail($id);
        return view('site.indicacoes.abrir',['indicacao' => $indicacao]);
    }
}
