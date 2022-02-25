<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestaquesController extends Controller
{

    public $foto;
    public $alteracao;

    public function __construct()
    {
        $this->alteracao = new AlteracoesController();
        $this->foto = new FotosController();
    }
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $destaques = Noticia::orderBy('id', 'desc')->take(5)->get();
        return view('admin.destaques.lista',['destaques' => $destaques]);
    }
    public function novo(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $destaques = 1;
        return view('admin.noticias.formulario', ['destaques' => $destaques]);
    }
    public function salvar(Request $request)
    {
        $noticia = new Noticia();
        $ultimoid = $this->foto->fotoSalvar($request,3);
        $input['titulo'] = $request->titulo;
        $input['texto'] = $request->texto;
        $input['credito'] = $request->credito;
        $input['fotografo'] = $request->fotografo;
        $input['data_n'] = date("Y-m-d", strtotime($request->data_n));
        $input['publicado'] = false;
        $input['tipo'] = 3;
        $input['fk_foto'] = $ultimoid;
        $cad_noticia = $noticia->create($input);
        $ultimoregistro = DB::table('noticias')->orderBy('id', 'desc')->first();
        $this->alteracao->salvar(2,1, $ultimoregistro->id);
        $destaques = 1;
        \Session::flash('mensagem_sucesso','Destaque cadastrado com Sucesso');
        return view('admin.noticias.formulario', ['destaques' => $destaques]);
    }
    public function editar($id)
    {
        $noticia = Noticia::findOrFail($id);
        $destaques = 1;
        return view('admin.noticias.formulario', ['noticia' => $noticia, 'foto' => $noticia->foto->foto_src, 'destaques' => $destaques]);
    }
    public function atualizar($id, Request $request){
        $noticia = Noticia::findOrFail($id);
        $destaques = 1;
        if($request->imagem != null){
            $this->foto->fotoAtualizar($noticia->fk_foto,$request);
        }
        $input['titulo'] = $request->titulo;
        $input['texto'] = $request->texto;
        $input['credito'] = $request->credito;
        $input['fotografo'] = $request->fotografo;
        $input['data_n'] = date("Y-m-d", strtotime($request->data_n));
        $input['publicado'] = $noticia->publicado;
        $input['tipo'] = $noticia->tipo;
        $input['fk_foto'] = $noticia->fk_foto;
        $noticia->update($input);
        $this->alteracao->alterar(2,2,$id);
        \Session::flash('mensagem_sucesso','Destaque atualizado com Sucesso');
        return view('admin.noticias.formulario', ['noticia' => $noticia, 'destaques' => $destaques]);
    }
    public function deletar($id){
        $noticia = Noticia::findOrFail($id);
        $this->foto->fotoDeletar($noticia->fk_foto);
        $noticia->delete();
        $this->alteracao->alterar(2,3,$id);
        \Session::flash('mensagem_sucesso','Destaque excluído com Sucesso');
        return redirect()->action('DestaquesController@index');
    }
    public function publicado($id, Request $request){
        $noticia = Noticia::findOrFail($id);
        $input['titulo'] = $noticia->titulo;
        $input['texto'] = $noticia->texto;
        $input['credito'] = $noticia->credito;
        $input['fotografo'] = $noticia->fotografo;
        $input['data_n'] = date("Y-m-d", strtotime($noticia->data_n));
        $input['publicado'] = $request->publicado;
        $input['tipo'] = $noticia->tipo;
        $input['fk_foto'] = $noticia->fk_foto;
        $noticia->update($input);
        if($input['publicado'] == 1){
            $this->alteracao->alterar(2,4,$id);
            \Session::flash('mensagem_sucesso','Destaque publicado com Sucesso');
        }
        if($input['publicado'] == 0){
            $this->alteracao->alterar(2,5,$id);
            \Session::flash('mensagem_sucesso','Destaque retirado com Sucesso');
        }
        return redirect()->action('DestaquesController@index');
    }
    public function mostrar(){
        $destaques = Noticia::orderBy('data_n', 'desc')->take(5)->get();
        return view('site.destaques.mostrar',['destaques' => $destaques]);
    }
}
