<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\randombytes_random16;

class FotosController extends Controller
{
    private $alteracao;

    public function __construct()
    {
        $this->alteracao = new AlteracoesController();
    }
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $fotos = DB::table('fotos')->orderBy('id', 'desc')->paginate(10);
        return view('admin.fotos.lista', ['fotos' => $fotos]);
    }
    public function novo(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.fotos.formulario');
    }
    public function todas(){
        return Foto::get();
    }
    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tipo = $request->imagem->getClientOriginalExtension();
        $novaimagem = md5(uniqid()).'-'.time().".".$tipo;
        $novonome = "public/img/".$novaimagem;
        $input['nome'] = $request->nome;
        $input['foto_src'] = $novonome;
        $input['tipo'] = $request->tipo;
        $request->imagem->move($_SERVER['DOCUMENT_ROOT']."/public/img/", $novonome);
        chmod($_SERVER['DOCUMENT_ROOT'].'/'.$novonome,777);
        $fotos = new Foto();
        $cad_foto = $fotos->create($input);
        $ultimoregistro = DB::table('fotos')->orderBy('id', 'desc')->first();
        $this->alteracao->salvar(4,1, $ultimoregistro->id);
        \Session::flash('mensagem_sucesso','Foto cadastrada com Sucesso');
        return view('admin.fotos.formulario');

    }
    public function editar($id){
        $foto = Foto::findOrFail($id);
        return view('admin.fotos.formulario', ['foto' => $foto]);
    }
    public function atualizar($id, Request $request){
        $foto = Foto::findOrFail($id);
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tipo = $request->imagem->getClientOriginalExtension();
        $novaimagem = md5(uniqid()).'-'.time().".".$tipo;
        $novonome = "public/img/".$novaimagem;
        // Resolvi não guardar tamanho da imagem e sim validar os dados
        if($request->imagem != null){
            //unlink($foto->foto_src);
            $request->imagem->move($_SERVER['DOCUMENT_ROOT']."/public/img/", $novonome);
            $input['foto_src'] = $novonome;
        }
        else{
            $input['foto_src'] = $foto->foto_src;
        }
        $input['nome'] = $request->nome;
        $input['tipo'] = $request->tipo;
        $foto->update($input);
        \Session::flash('mensagem_sucesso','Foto atualizada com Sucesso');
        return view('admin.fotos.formulario', ['foto' => $foto]);
    }
    public function arrumar(){
        /* Se os primeiros caracteres não forem public, adiciona o public */
        $fotos_vetor = Foto::get();
        foreach($fotos_vetor as $foto){
            $lerosseisprimeiroscaracteres = substr($foto->foto_src, 0, 6);
            if($lerosseisprimeiroscaracteres != 'public'){
                $foto->foto_src = str_replace('..','public',$foto->foto_src);
            }
            $input['foto_src'] = $foto->foto_src;
            $input['nome'] = $foto->nome;
            $input['tipo'] = $foto->tipo;
            $foto->update($input);
        }
    }
    public function deletar($id){
        $foto = Foto::findOrFail($id);
        unlink($foto->foto_src);
        $foto->delete();
        \Session::flash('mensagem_sucesso','Foto excluída com Sucesso');
        return redirect()->action('FotosController@index');
    }
    public function fotoSalvar(Request $request, $tipo){
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $foto = $request->imagem->getClientOriginalExtension();
        $novaimagem = md5(uniqid()).'-'.time().".".$foto;
        $novonome = "public/img/".$novaimagem;
        $input['nome'] = $request->titulo;
        if ($input['nome'] == null){
            //Se ainda assim ele estiver nulo é porque não se trata de destaque ou notícia preciso pegar o nome do vereador
            $input['nome'] = $request->nome;
        }
        $input['foto_src'] = $novonome;
        $input['tipo'] = $tipo;
        $request->imagem->move($_SERVER['DOCUMENT_ROOT']."/public/img/", $novonome);
        $fotos = new Foto();
        $cad_foto = $fotos->create($input);
        /////Crio a foto e retorno o último id
        $ultimoregistro = DB::table('fotos')->orderBy('id', 'DESC')->first();
        return $ultimoregistro->id;
    }
    public function fotoAtualizar($id,Request $request){
        $foto = Foto::findOrFail($id);
        $request->validate([
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tipo = $request->imagem->getClientOriginalExtension();
        $novaimagem = md5(uniqid()).'-'.time().".".$tipo;
        $novonome = "public/img/".$novaimagem;
        $foto->foto_src = $novonome;
        $input['nome'] = $foto->nome;
        $input['tipo'] = $foto->tipo;
        $input['foto_src'] = $foto->foto_src;
        $foto->update($input);
        if($request->imagem != null){
            $request->imagem->move($_SERVER['DOCUMENT_ROOT']."/public/img/", $foto->foto_src);
            //chmod($_SERVER['DOCUMENT_ROOT'].'/'.$novonome,777);
        }
    }
    public function fotoDeletar($id){
        $foto = Foto::findOrFail($id);
        unlink($_SERVER['DOCUMENT_ROOT']."/".$foto->foto_src);
        $foto->delete();
    }
}
