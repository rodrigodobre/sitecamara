<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller{

    public function __construct()
    {
        $this->alteracao = new AlteracoesController();
        $this->foto = new FotosController();
    }
    public function index(){
        /* cada controller precisa ter uma pasta dentro de resources view com seu respectivo nome */
        $usuarios = User::get();
        return view('admin.usuarios.lista',['usuarios' => $usuarios]);
    }
    public function get(){
        return User::get();
    }
    public function atualizar($id, Request $request){
        $usuario = User::findOrFail($id);
        /* se o usurio nao tem foto ainda tenho que salvá-la */
        if(($usuario->fk_foto == 0) OR ($usuario->fk_foto == null)){
            $ultimoid = $this->foto->fotoSalvar($request, 4);
        }
        else{
            $ultimoid = $this->foto->fotoAtualizar($usuario->fk_foto,$request);
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'permissao' => 'required'
        ]);
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['permissao'] = $request->permissao;
        $input['password'] = $usuario->password;
        $input['fk_foto'] = $ultimoid;
        $usuario->update($input);

        \Session::flash('mensagem_sucesso','Usuário atualizado com Sucesso');
        return view('auth.register',['usuario' => $usuario]);

    }
}
