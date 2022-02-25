<?php
    $_SESSION['pagina'] = 'noticias';
    $_SESSION['source'] = $noticia->foto->foto_src;
    $resumo = htmlspecialchars_decode($noticia->texto);
    $_SESSION['descricao'] = $resumo;
    $_SESSION['id'] = $noticia->id;
    $_SESSION['titulo'] = $noticia->titulo;
?>
@extends('layouts.site')
@section('content')
<div class="centro">
<div class="coordena">
    <div class="esquerda">
        <div class="noticias" id="imprimir">
            <br /><br />
            <h1>
                {{ $noticia->titulo }}
            </h1><br />
                <div class="row align-items-center" style="height: 50px;">
                    <div class="col-8"><span>Publicado em:&nbsp;{{ date("d-m-Y", strtotime($noticia->data_n)) }}</span></div>
                    <div class="fb-button col-1" data-href="http://camarapontapora.ms.gov.br/noticias/{{ $noticia->id }}" data-layout="button" data-size="large">
                        <a onclick="nova_janela()" href="#" class="fb-xfbml-parse-ignore">
                            <img src="{{ asset('public/img/facebook.png') }}" width="36" />
                        </a>
                    </div>
                    <div class="whatsapp col-1">
                        <a onclick="nova_janela2()" href="#"><img src="{{ asset('public/img/whatsapp.png') }}" width="36" /></a>
                     </div>
                    <div class="col-2">
                        <a href="#" onclick="PrintDiv()"><img src="{{ asset('public/img/printer.png') }}" style="width: 36px;" /></a>
                    </div>
                </div>
                <br />
            <br />
            <div style="min-height:450px;">
                <img class='imagem_mostrada' src="{{ asset($foto) }}" align="right" />
                <p><?= $noticia->texto ?></p>
            </div>
            <div>
                <br />
                <p>Fonte:&nbsp;&nbsp;{{ $noticia->credito }}</p>
                <br />
                <p>Fotos:&nbsp;&nbsp;{{ $noticia->fotografo }}</p>
                <br />
                <hr />
            </div>
        </div>

        <div class="botao">
            <a href="/noticias">Últimas Notícias</a>
            <a href="/welcome">Voltar</a>
        </div>
    </div>
    <div class="direita">
        <div class="sociais">
        </div>
    </div>
</div>
</div>
@endsection
<script type="text/javascript">
    //função que irá imprimir
    function PrintDiv()
    {
        $('#imprimir').printElement({pageTitle:'Câmara Municipal de Ponta Porã'});
    }
    function nova_janela(){
        var left = (screen.width/2)-(640/2);
        var top = (screen.height/2)-(480/2);
        my_window = window.open("https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fcamarapontapora.ms.gov.br%2Fnoticias%2F{{ $noticia->id }}&amp;src=sdkpreparse", "Câmara Municipal de Ponta Porã", "status=1,width=640,height=480");
        my_window.moveTo(left, top);
    }
    function nova_janela2(){
        var left = (screen.width/2)-(640/2);
        var top = (screen.height/2)-(480/2);
        my_window = window.open("https://api.whatsapp.com/send?text={{ $noticia->titulo }}%20acesse%20em%20http%3A%2F%2Fcamarapontapora.ms.gov.br%2Fnoticias%2F{{ $noticia->id }}", "Câmara Municipal de Ponta Porã", "status=1,width=640,height=480");
        my_window.moveTo(left, top);
    }
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
