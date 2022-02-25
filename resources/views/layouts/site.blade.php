<?php
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(isset($_SESSION)){ ?>
    <meta property="og:url"           content="https://www.camarapontapora.ms.gov.br/{{ $_SESSION['pagina'] }}/{{ $_SESSION['id'] }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $_SESSION['titulo'] }}" />
    <meta property="og:description"   content="{{ $_SESSION['descricao'] }}" />
    <meta property="og:image"         content="{{ asset($_SESSION['source']) }}">
    <?php } ?>
   <title>Câmara Municipal de Ponta Porã</title>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <!-- Fonts -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('public/css/app1.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-ui.structure.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-ui.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/site1.css') }}" rel="stylesheet">
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>
<header>
        @include('layouts/site/cabecalho')
</header>
<div class="flex-center position-ref full-height">
    <div class="content">

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</div>
<footer>
    @include('layouts/site/rodape')
</footer>
<script type="text/javascript">
    $(document).ready(function() {
        $("#abre_menu").click(function() {
            $(".novo_menu").toggle();
        });
        $("#abrir").click(function() {
            $("#abrirul").toggle();
        });
        $("#abrir1").click(function() {
            $("#abrirul1").toggle();
        });
        $("#abrir2").click(function() {
            $("#abrirul2").toggle();
        });
        $("#esconder").click(function() {
            $("#escondido").show();
            $("#esconder").hide();
        });
        $("#esconder").click(function() {
            $(".escondido").show();
            $("#esconder").hide();
        });
        $("#voltar").click(function() {
            $(".escondido").hide();
            $("#esconder").show();
        });
    });
</script>
</body>
</html>
