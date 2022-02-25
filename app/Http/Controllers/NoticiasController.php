<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NoticiasController extends Controller
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
        $noticias = Noticia::orderBy('id', 'desc')->paginate(10);
        return view('admin.noticias.lista',['noticias' => $noticias]);
    }
    public function novo(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.noticias.formulario');
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
        $noticia->create($input);
        $ultimoregistro = DB::table('noticias')->orderBy('id', 'desc')->first();
        $this->alteracao->salvar(1,1, $ultimoregistro->id);
        \Session::flash('mensagem_sucesso','Notícia cadastrada com Sucesso');
        return view('admin.noticias.formulario');
    }
    public function editar($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('admin.noticias.formulario', ['noticia' => $noticia, 'foto' => $noticia->foto->foto_src]);
    }
    public function atualizar($id, Request $request){
        $noticia = Noticia::findOrFail($id);
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
        $this->alteracao->alterar(1,2,$id);
        \Session::flash('mensagem_sucesso','Notícia atualizada com Sucesso');
        return view('admin.noticias.formulario', ['noticia' => $noticia]);
    }
    public function deletar($id){
        $noticia = Noticia::findOrFail($id);
        $this->foto->fotoDeletar($noticia->fk_foto);
        $noticia->delete();
        $this->alteracao->alterar(1,3,$id);
        \Session::flash('mensagem_sucesso','Notícia excluída com Sucesso');
        return redirect()->action('NoticiasController@index');
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
            $this->alteracao->alterar(1,4,$id);
            \Session::flash('mensagem_sucesso','Notícia publicada com Sucesso');
        }
        if($input['publicado'] == 0){
            $this->alteracao->alterar(1,5,$id);
            \Session::flash('mensagem_sucesso','Notícia retirada com Sucesso');
        }
        return redirect()->action('NoticiasController@index');
    }
    public function mostrar(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $noticias = Noticia::orderBy('id', 'desc')->paginate(10);
        return view('site.noticias.mostrar',['noticias' => $noticias]);
    }
    public function abrir($id){
        $noticia = Noticia::findOrFail($id);
        return view('site.noticias.abrir', ['noticia' => $noticia, 'foto' => $noticia->foto->foto_src]);
    }

}
