@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Resenhas</b>
                        <a class="float-right" href="{{ url('admin/resenhas/novo') }}">Nova resenha</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table">
                            <th> </th>
                            <th>Tipo de Sessão</th>
                            <th>Data da Sessão</th>
                            <th>Número da Sessão</th>
                            <th>Ações</th>
                            @if(isset($resenhas))
                            @foreach($resenhas as $resenha)
                                <tbody>
                                <tr>
                                    <td><img src="{{ asset($resenha->pdf_vinculado) }}" width="50" class="img-thumbnail"/></td>
                                    <td>
                                        <?php
                                        if ($resenha->tipo_de_sessao == 0) {
                                            echo "Sessão Ordinária";
                                        }
                                        if ($resenha->tipo_de_sessao == 1) {
                                            echo "Sessão Extraordinária";
                                        }
                                        if ($resenha->tipo_de_sessao == 2) {
                                            echo "Sessão Solene";
                                        }
                                        if ($resenha->tipo_de_sessao == 3) {
                                            echo "Audiência Pública";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php $data = date("d-m-Y", strtotime($resenha->data_sessao)); echo $data; ?>
                                    </td>
                                    <td>
                                        {{ $resenha->numero_sessao }}
                                    </td>
                                    <td>
                                        <a href="resenhas/{{ $resenha->id }}/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        {{ Form::open(['method' =>'DELETE','url' => 'admin/resenhas/'.$resenha->id, 'style' => 'display:inline']) }}
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                            @endif
                        </table>
                         {{ $resenhas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
