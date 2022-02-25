<?php

namespace App\Http\Controllers;

use App\Models\Lei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LeisController extends Controller
{
    private $lei;
    public $alteracao;
    private $autores;

    public function __construct(){

        $this->lei = DB::table('leis')->orderBy('id', 'desc')->paginate(10);
        $this->alteracao = new AlteracoesController();
        $this->autores = new AutorsController();
    }
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.leis.lista',['leis' => $this->lei]);
    }
    public function novo(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.leis.formulario');
    }
    public function salvar(Request $request)
    {
        $request->validate([
            'numero' => 'required',
            'tipo' => 'required',
            'arquivo' => 'required|file|mimes:pdf|max:2048',
            'data_sancao' => 'required',
            'data_publicacao' => 'required',
            'ementa' => 'required'
        ]);
        $tipo = $request->arquivo->getClientOriginalExtension();
        $novaimagem = md5(uniqid()).'-'.time().".".$tipo;
        $request->arquivo->move($_SERVER['DOCUMENT_ROOT']."/public/pdf/", $novaimagem);
        $input['lei_source'] = "public/pdf/".$novaimagem;
        $input['numero'] = $request->numero;
        $input['tipo'] = $request->tipo;
        $input['data_sancao'] = date("Y-m-d", strtotime($request->data_sancao));
        $input['data_publicacao'] = date("Y-m-d", strtotime($request->data_publicacao));
        $input['ementa'] = $request->ementa;
        $input['palavra_chave'] = $request->palavra_chave;        
        $input['status'] = $request->status;
        $leis = new Lei();
        $cad_lei = $leis->create($input);
        $ultimoregistro = DB::table('leis')->orderBy('id', 'desc')->first();
        $this->alteracao->salvar(5,1, $ultimoregistro->id);
        $this->autores->salvar($request);
        \Session::flash('mensagem_sucesso','Lei cadastrada com Sucesso');
        return view('admin.leis.formulario');

    }
    public function editar($id){
        $lei = Lei::findOrFail($id);
        return view('admin.leis.formulario', ['lei' => $lei]);
    }
    public function atualizar($id, Request $request){
        $lei = Lei::findOrFail($id);
        $request->validate([
            'numero' => 'required',
            'tipo' => 'required',
            'arquivo' => 'file|mimes:pdf|max:2048',
            'data_sancao' => 'required',
            'data_publicacao' => 'required',
            'ementa' => 'required'
        ]);
        $ajuda = new Helpers();
        if(isset($request->arquivo)){
            /* Se existe um novo arquivo pra inserir */
            $tipo = $request->arquivo->getClientOriginalExtension();
            $novaimagem = md5(uniqid()).'-'.time().".".$tipo;
           // unlink($lei->lei_source);//desvincular o arquivo anterior
            $request->arquivo->move($_SERVER['DOCUMENT_ROOT']."/public/pdf/", $novaimagem);//colocar o novo
            $input['lei_source'] = "public/pdf/".$novaimagem;
        }
        else{
            $input['lei_source'] = $lei->lei_source;
        }
        // Gera um nome único para a imagem
        $input['numero'] = $request->numero;
        $input['tipo'] = $request->tipo;
        $input['data_sancao'] = date("Y-m-d", strtotime($request->data_sancao));
        $input['data_publicacao'] = date("Y-m-d", strtotime($request->data_publicacao));
        $input['ementa'] = $request->ementa;
        $input['palavra_chave'] = $request->palavra_chave;
        $input['autor'] = $request->autor;
        $input['status'] = $request->status;
        $lei->update($input);
        $this->alteracao->alterar(5,2,$id);
        $this->autores->salvar($request);
        \Session::flash('mensagem_sucesso','Lei atualizada com Sucesso');
        return view('admin.leis.formulario', ['lei' => $lei]);
    }
    public function deletar($id){
        $lei = Lei::findOrFail($id);
        unlink($lei->lei_source);
        $lei->delete();
        $this->alteracao->alterar(5,3,$id);
        \Session::flash('mensagem_sucesso','Lei excluída com Sucesso');
        return redirect()->action('LeisController@index');
    }
    public function mostrar(){
        $principais = $this->buscar_ids_principais();
        return view('site.leis.mostrar',['principais' => $principais]);
    }
    public function buscar_ids_principais(){
        /* $vetorprincipal = [35,38,39,40,41,42,43,44,45]; */
        return $this->lei = DB::table('leis')->where('id',35)
                                                   ->orWhere('id',38)
                                                   ->orWhere('id',39)
                                                   ->orWhere('id',40)
                                                   ->orWhere('id',41)
                                                   ->orWhere('id',42)
                                                   ->orWhere('id',43)
                                                   ->orWhere('id',44)
                                                   ->orWhere('id',45)
                                                   ->orWhere('id',85)
                                                   ->orderBy('palavra_chave','ASC')->get();
    }
    public function pesquisar(Request $request)
    {
        if(isset($pesquisa)){
            
        }
        else{
            
        /***************************************************************/
        // Básico do campo de pesquisa                                  /
        /////////////////////////////////////////////////////////////////
        if(isset($request->tipo)){
            if(isset($request->status)){
                if(isset($request->pesquisar_leg)){
                    $pesquisa = DB::table('leis')->where('palavra_chave','LIKE', '%'.$request->pesquisar_leg.'%')
            ->orWhere('autor','LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('numero', 'LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('ementa', 'LIKE','%'.$request->pesquisar_leg.'%')->get();
                    $pesquisa = $pesquisa->where('tipo',$request->tipo);
                    $pesquisa = $pesquisa->where('status',$request->status);
                }
                else{                             
                    $pesquisa = DB::table('leis')->where('tipo',$request->tipo)->where('status',$request->status)->get();
                }
            }
            else{
                if(isset($request->pesquisar_leg)){
                    $pesquisa = DB::table('leis')->where('palavra_chave','LIKE', '%'.$request->pesquisar_leg.'%')
            ->orWhere('autor','LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('numero', 'LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('ementa', 'LIKE','%'.$request->pesquisar_leg.'%')->get();
                    $pesquisa = $pesquisa->where('tipo',$request->tipo);
                }
                else{
                    $pesquisa = DB::table('leis')->where('tipo',$request->tipo)->get();
                }
            }
        }
        else{
             if(isset($request->status)){
                 if(isset($request->pesquisar_leg)){
                 $pesquisa = DB::table('leis')->where('palavra_chave','LIKE', '%'.$request->pesquisar_leg.'%')
            ->orWhere('autor','LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('numero', 'LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('ementa', 'LIKE','%'.$request->pesquisar_leg.'%')->get();
                 $pesquisa = $pesquisa->where('status',$request->status);
                 }
                 else{
                     $pesquisa = DB::table('leis')->where('status',$request->status)->get();
                 }
             }
             else{
                 if(isset($request->pesquisar_leg)){
                     $pesquisa = DB::table('leis')->where('palavra_chave','LIKE', '%'.$request->pesquisar_leg.'%')
            ->orWhere('autor','LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('numero', 'LIKE','%'.$request->pesquisar_leg.'%')
            ->orWhere('ementa', 'LIKE','%'.$request->pesquisar_leg.'%')->get();
                 }
                 else{
                     
                 }
             }
            }
        }
        $principais = $this->buscar_ids_principais();
        return view('site.leis.mostrar')->with('pesquisa', $pesquisa)->with('principais', $principais);

    }
}
