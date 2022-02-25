<?php
$helpers = new \App\Http\Controllers\Helpers();
?>
@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Consultas</b>
                    </div>

                    <div class="card-body">
                        
                        <table class="table">
                           
                            <th>Bairro</th>
                            <th>Sugestão</th>
                            <th>Verificar</th>
                            @foreach($consultas as $consulta)
                                <tbody>
                                <tr>
                                    <td>{{ $consulta->bairro }}</td>
                                    <?php $sugestao = $helpers->resumo($consulta->sugestao, 100); ?>
                                    <td>{{ $consulta->sugestao }}</td>
                                    <td>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $consulta->id }}">
                                        Verificar
                                      </button>
                                    <div class="modal" tabindex="-1" role="dialog" id="exampleModal{{ $consulta->id }}">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">{{ $consulta->bairro }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>{{ $consulta->sugestao }}</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{ $consultas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


