<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resenha;
use Illuminate\Support\Facades\DB;

class ResenhasController extends Controller
{

    private $resenhas;
    public $alteracao;

    public function __construct()
    {

        $this->resenhas = Resenha::orderBy('id', 'desc')->paginate(10);
        $this->alteracao = new AlteracoesController();
    }

    public function index()
    {
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.resenhas.lista', ['resenhas' => $this->resenhas]);
    }

    public function novo()
    {
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.resenhas.formulario');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'numero_sessao' => 'required',
            'tipo_de_sessao' => 'required',
            'arquivo' => 'required|file|mimes:pdf|max:2048',
            'data_sessao' => 'required',
            'descritivo' => 'required'
        ]);
        $tipo = $request->arquivo->getClientOriginalExtension();
        $novaimagem = md5(uniqid()) . '-' . time() . "." . $tipo;
        $request->arquivo->move($_SERVER['DOCUMENT_ROOT'] . "/public/pdf/resenhas/", $novaimagem);
        $input['pdf_vinculado'] = "public/pdf/resenhas/" . $novaimagem;
        $input['numero_sessao'] = $request->numero_sessao;
        $input['tipo_de_sessao'] = $request->tipo_de_sessao;
        $input['data_sessao'] = date("Y-m-d", strtotime($request->data_sessao));
        $input['descritivo'] = $request->descritivo;
        $resenhas = new Resenha();
        $cad_resenha = $resenhas->create($input);
        $ultimoregistro = Resenha::orderBy('id', 'desc')->first();
        $this->alteracao->salvar(10, 1, $ultimoregistro->id);
        \Session::flash('mensagem_sucesso', 'Resenha cadastrada com Sucesso');
        return view('admin.resenhas.formulario');

    }

    public function editar($id)
    {
        $resenha = Resenha::findOrFail($id);
        return view('admin.resenhas.formulario', ['resenha' => $resenha]);
    }

    public function atualizar($id, Request $request)
    {
        $resenha = Resenha::findOrFail($id);
        $request->validate([
            'numero_sessao' => 'required',
            'tipo_de_sessao' => 'required',
            'data_sessao' => 'required',
            'descritivo' => 'required'
        ]);
        if (isset($request->arquivo)) {
            /* Se existe um novo arquivo pra inserir */
            $tipo = $request->arquivo->getClientOriginalExtension();
            $novaimagem = md5(uniqid()) . '-' . time() . "." . $tipo;
            unlink($resenha->pdf_vinculado);//desvincular o arquivo anterior
            $request->arquivo->move($_SERVER['DOCUMENT_ROOT'] . "/public/pdf/resenhas/", $novaimagem);//colocar o novo
            $input['pdf_vinculado'] = "public/pdf/resenhas/" . $novaimagem;
        } else {
            $input['pdf_vinculado'] = $resenha->pdf_vinculado;
        }
        $input['id'] = $id;
        $input['numero_sessao'] = $request->numero_sessao;
        $input['tipo_de_sessao'] = $request->tipo_de_sessao;
        $input['data_sessao'] = date("Y-m-d", strtotime($request->data_sessao));
        $input['descritivo'] = $request->descritivo;
        $resenha->update($input);
        $this->alteracao->alterar(10, 2, $id);
        \Session::flash('mensagem_sucesso', 'Resenha atualizada com Sucesso');
        return view('admin.resenhas.formulario', ['resenha' => $resenha]);
    }

    public function deletar($id)
    {
        $resenha = Resenha::findOrFail($id);
        unlink($resenha->pdf_vinculado);
        $resenha->delete();
        $this->alteracao->alterar(10, 3, $id);
        \Session::flash('mensagem_sucesso', 'Resenha excluída com Sucesso');
        return redirect()->action('ResenhasController@index');
    }

    public function mostrar()
    {
        $resenhas = Resenha::orderBy('id', 'desc')->paginate(10);
        return \view('site.resenhas.mostrar', ['resenhas' => $resenhas]);
    }

    public function pesquisar(Request $request)
    {

        /***************************************************************/
        // Básico do campo de pesquisa                                  /
        /////////////////////////////////////////////////////////////////

        $pesquisa = DB::table('resenhas')->where('descritivo', 'LIKE', '%' . $request->pesquisar_leg . '%')
            ->orWhere('tipo_de_sessao', 'LIKE', '%' . $request->pesquisar_leg . '%')
            ->orWhere('numero_sessao', 'LIKE', '%' . $request->pesquisar_leg . '%')->paginate(5);

        return view('site.resenhas.mostrar', ['pesquisa' => $pesquisa]);

    }
}
