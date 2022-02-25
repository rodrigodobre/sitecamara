<?php /** @noinspection PhpParamsInspection */

namespace App\Http\Controllers;

use App\Models\Vereadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VereadoresController extends Controller
{
    public $foto;
    public $alteracao;

    public function __construct()
    {
        $this->foto = new FotosController();
        $this->alteracao = new AlteracoesController();
    }
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $vereadores = DB::table('vereadores')->orderBy('nome', 'asc')->where('ativo', true)->paginate(10);
        return view('admin.vereadores.lista', ['vereadores' => $vereadores, 'fotos' => $this->foto->todas()]);
        
    }
    public function novo(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        return view('admin.vereadores.formulario');
    }
    public function salvar(Request $request)
    {
       $vereador = new Vereadore();
       $ultimoid = $this->foto->fotoSalvar($request,4);
       $input['nome'] = $request->nome;
       $input['nome_parlamentar'] = $request->nome_parlamentar;
       $input['partido'] = $request->partido;
       $input['telefone'] = $request->telefone;
       $input['email'] = $request->email;
       $input['naturalidade'] = $request->naturalidade;
       $input['data_nasc'] = $request->data_nasc;
       $input['profissao'] = $request->profissao;
       $input['mesa_diretora'] = $request->mesa_diretora;
       $input['ativo'] = false;
       $input['fk_foto'] = $ultimoid;
       $cad_vereador = $vereador->create($input);
        $ultimoregistro = DB::table('vereadores')->orderBy('id', 'desc')->first();
        $this->alteracao->salvar(9,1, $ultimoregistro->id);
       \Session::flash('mensagem_sucesso','Vereador cadastrado com Sucesso');
       return view('admin.vereadores.formulario');
    }
    public function editar($id)
    {
        $vereador = Vereadore::findOrFail($id);
        return view('admin.vereadores.formulario', ['vereador' => $vereador, 'foto' => $vereador->foto->foto_src]);
    }
    public function atualizar($id, Request $request){
        $vereador = Vereadore::findOrFail($id);
        if($request->imagem != null){
            $this->foto->fotoAtualizar($vereador->fk_foto,$request);
        }
        $input['nome'] = $request->nome;
        $input['nome_parlamentar'] = $request->nome_parlamentar;
        $input['partido'] = $request->partido;
        $input['telefone'] = $request->telefone;
        $input['email'] = $request->email;
        $input['naturalidade'] = $request->naturalidade;
        $input['data_nasc'] = $request->data_nasc;
        $input['profissao'] = $request->profissao;
        $input['mesa_diretora'] = $request->mesa_diretora;
        $input['ativo'] = $vereador->ativo;
        $input['fk_foto'] = $vereador->fk_foto;
        $vereador->update($input);
        $this->alteracao->alterar(9,2,$id);
        \Session::flash('mensagem_sucesso','Vereador atualizado com Sucesso');
        return view('admin.vereadores.formulario', ['vereador' => $vereador]);
    }
    public function deletar($id){
        $vereador = Vereadore::findOrFail($id);
        $this->foto->fotoDeletar($vereador->fk_foto);
        $vereador->delete();
        $this->alteracao->alterar(9,3,$id);
        \Session::flash('mensagem_sucesso','Vereador excluído com Sucesso');
        return redirect()->action('VereadoresController@index');
    }
    public function ativo($id, Request $request){
        $vereador = Vereadore::findOrFail($id);
        $input['nome'] = $vereador->nome;
        $input['nome_parlamentar'] = $vereador->nome_parlamentar;
        $input['partido'] = $vereador->partido;
        $input['telefone'] = $vereador->telefone;
        $input['email'] = $vereador->email;
        $input['naturalidade'] = $vereador->naturalidade;
        $input['data_nasc'] = $vereador->data_nasc;
        $input['profissao'] = $vereador->profissao;
        $input['mesa_diretora'] = $vereador->mesa_diretora;
        $input['fk_foto'] = $vereador->fk_foto;
        $input['ativo'] = $request->ativo;
        $vereador->update($input);
        if($input['ativo'] == 1){
            $this->alteracao->alterar(9,6,$id);
            \Session::flash('mensagem_sucesso','Vereador ativado com Sucesso');
        }
        if($input['ativo'] == 0){
            $this->alteracao->alterar(9,7,$id);
            \Session::flash('mensagem_sucesso','Vereador desativado com Sucesso');
        }
        return redirect()->action('VereadoresController@index');
    }
    public function abrir($id){
        $vereador = Vereadore::findOrFail($id);
        return view('site.vereadores.abrir', ['vereador' => $vereador, 'foto' => $vereador->foto->foto_src]);
    }
    public function mostrar(){
        $vereadores = DB::table('vereadores')->orderBy('nome_parlamentar', 'ASC')->where('ativo','>',0)->get();
        return view('site.vereadores.mostrar',['vereadores' => $vereadores,'fotos' => $this->foto->todas()]);
    }
    public function mesa_diretora(){
        $vereadores = DB::table('vereadores')->orderBy('mesa_diretora', 'ASC')->where('mesa_diretora','>',0)->get();
        return view('site.vereadores.mesa-diretora',['vereadores' => $vereadores, 'fotos' => $this->foto->todas()]);
    }

}
