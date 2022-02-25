@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Leis</b>
                        <a class="float-right" href="{{ url('admin/leis/novo') }}">Nova Lei</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table">
                            <th> </th>
                            <th>Nome</th>
                            <th>Palavra-Chave</th>
                            <th>Status</th>
                            <th>Ações</th>
                            @foreach($leis as $lei)
                                <tbody>
                                <tr>
                                    <td><img src="{{ asset($lei->lei_source) }}" width="50" class="img-thumbnail"/></td>
                                    <td>
                                        <?php
                                        if ($lei->tipo == 1) {
                                            echo "Lei nº. ";
                                        }
                                        if ($lei->tipo == 2) {
                                            echo "Lei Complementar nº. ";
                                        }
                                        if ($lei->tipo == 3) {
                                            echo "Decreto Legislativo nº. ";
                                        }
                                        if ($lei->tipo == 4) {
                                            echo "Resolução nº. ";
                                        }
                                        echo $lei->numero;
                                        $data = date("d-m-Y", strtotime($lei->data_sancao));
                                        echo " de " . $data;
                                        ?>
                                    </td>
                                    <td>
                                        {{ $lei->palavra_chave }}
                                    </td>
                                    <td><?php
                                        if ($lei->status == 1) {
                                            echo "Em Vigor";
                                        }
                                        if ($lei->status == 2) {
                                            echo "Sem Efeito";
                                        }
                                        if ($lei->status == 3) {
                                            echo "Vigência Esgotada";
                                        }
                                        if ($lei->status == 4) {
                                            echo "Revogada";
                                        }
                                        if ($lei->status == 5) {
                                            echo "Inconstitucional";
                                        }
                                        if ($lei->status == 6) {
                                            echo "Revogada Tacitamente";
                                        }
                                        if ($lei->status == 7) {
                                            echo "Repristinada";
                                        }
                                        ?></td>
                                    <td>
                                        <a href="leis/{{ $lei->id }}/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        {{ Form::open(['method' =>'DELETE','url' => 'admin/leis/'.$lei->id, 'style' => 'display:inline']) }}
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{ $leis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
