@extends('layouts.site')
@section('content')
@php
 use App\Http\Controllers\Helpers;
 $helpers = new Helpers();
 if(isset($pesquisa)){
    unset($resenhas);
 }
@endphp

<div class="centro">
    <div class="legislativo">
        <br />
        <div class="topo">
            <h2>Resenhas das Sessões</h2><br />
            <h4>Governo organizado e transparente</h4>
        </div>
        <br />
        <div>
            @foreach($resenhas as $resenha)
            <?php 
                $ano = date("Y", strtotime($resenha->data_sessao));
                $mes = date("m", strtotime($resenha->data_sessao));
                $ano_atual = date("Y");
                $mes_atual = date("m");
                $i = 0;
            ?>
            @if($ano == $ano_atual)
             <div class="card">
               <div class="card-header" id="heading{{ $i }}">
                 <h2 class="mb-0">
                   <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    {{ $ano }}
                     <span class="fa-stack fa-sm">
                       <i class="fas fa-circle fa-stack-2x"></i>
                       <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                     </span>
                   </button>
                 </h2>
               </div>
            @endif
            @if($ano < $ano_atual)
               <div class="card">
               <div class="card-header" id="heading{{ $i }}">
                 <h2 class="mb-0">
                   <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    {{ $ano }}
                     <span class="fa-stack fa-sm">
                       <i class="fas fa-circle fa-stack-2x"></i>
                       <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                     </span>
                   </button>
                 </h2>
               </div>
            @endif
            @if($ano <= $ano_atual)
               <div id="collapseOne" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#accordion">
                 <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Aqui vai o mês</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Aqui vai o mês</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Aqui vai o mês</a>
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Aqui vai o mês</a>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                              <a target="_blank" href='{{ asset($resenha->pdf_vinculado) }}' class="mudar_cor">
                                <div class="row align-items-center" style="border-bottom:1px solid grey;padding-bottom: 15px;margin-bottom: 15px;">
                                        <div class="col">
                                            <img src="{{ asset('public/img/pdf.png') }}" width="80" />
                                        </div>
                                        <div class="col">
                                            {{ $resenha->numero_sessao }}ª
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
                                            do dia <?php $data = date("d-m-Y", strtotime($resenha->data_sessao)); echo $data; ?>.
                                            {{ $resenha->descritivo }}
                                        </div>
                                    </div> 
                                </a>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                        </div>
                      </div>
                    </div>                    
                     @endif
                     <?php 
                     $i++;
                     $ano_atual = date("Y")-$i;
                     ?> 
                    @endforeach
                 </div>
               </div>
             </div>
           </div>
           </div>
        </div>
        
    </div>
@endsection
