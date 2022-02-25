<?php

namespace App\Http\Controllers;

use App\Models\Alteraco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('America/Campo_Grande');

class AlteracoesController extends Controller
{
    private $alteracao;

    public function __construct()
    {
        $this->alteracao = new Alteraco();
    }
    public function salvar($tabela,$operacao,$id){
        /* Aqui existe uma sequência lógica das tabelas */
        // 1 - Notícia
        // 2 - Destaque
        // 3 - Indicação
        // 4 - Fotos
        // 5 - Leis
        // 6 - Usuarios
        // 7 - Carroussel
        // 8 - Galerias
        // 9 - Vereadores
        /* Também existe uma ordem de operações */
        // 1 - Adicionar
        // 2 - Alterar
        // 3 - Excluir
        // 4 - Publicar
        // 5 - Retirar
        // 6 - Ativar
        // 7 - Desativou
        ///////////////////////////////////////////////////
        $usuario = Auth::user()->getAuthIdentifier();
        $input['id'] = null;
        $input['fk_usuario'] = $usuario;
        $input['tabela'] = $tabela;
        $input['operacao'] = $operacao;
        $input['idtabelaalterada'] = $id;
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['update_at'] = date('Y-m-d H:i:s');
        $this->alteracao->create($input);
    }
    public function alterar($tabela,$operacao,$id){
        $idalterar = DB::table('Alteracoes')->where('idtabelaalterada', '=', $id)->first();
        if($idalterar){
            $alteraco = Alteraco::findOrfail($idalterar->id);
            $usuario = Auth::user()->getAuthIdentifier();
            $input['id'] = null;
            $input['fk_usuario'] = $usuario;
            $input['tabela'] = $tabela;
            $input['operacao'] = $operacao;
            $input['idtabelaalterada'] = $id;
            $input['created_at'] = $alteraco->created_at;
            $input['update_at'] = date('Y-m-d H:i:s');
            $alteraco->update($input);
        }
        else{
            $this->salvar($tabela,$operacao,$id);
        }

    }
    public function previsualizacao($tabela,$operacao,$id){

    }
}
