<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Câmara Municipal de Ponta Porã - SISTEMA 2.0</title>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('public/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-ui.structure.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-ui.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('admin/home') }}">
                    <img src="{{ asset('public/img/logo_cmpp.png') }}" width="150"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (!Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/destaques') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/destaques.svg') }}" />&nbsp;Destaques</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/noticias') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/noticias.svg') }}" />&nbsp;Notícias</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/indicacoes') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/indicacoes.svg') }}" />&nbsp;Indicacoes</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/vereadores') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/vereadores.svg') }}" />&nbsp;Vereadores</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/leis') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/leis.svg') }}" />&nbsp;Leis</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/fotos') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/fotos.svg') }}" />&nbsp;Fotos</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="{{ url('admin/consultas') }}" style="text-align:center;"><img class="ui-menu-icon" src="{ asset('public/img/galerias.svg') }}" />&nbsp;Consultas</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/resenhas') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/resenhas.svg') }}" />&nbsp;Resenhas</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/usuarios') }}" style="text-align:center;"><img class="ui-menu-icon" src="{{ asset('public/img/usuarios.svg') }}" />&nbsp;Usuários</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Acessar</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
            $( ".funcionardata" ).datepicker({
                dateFormat: 'dd-mm-yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        } );
    </script>
    <script type="text/javascript">
function duplicarCampos(){
	var clone = document.getElementById('origem').cloneNode(true);
	var destino = document.getElementById('destino');
	destino.appendChild (clone);
	
	var camposClonados = clone.getElementsByTagName('input');
	
	for(i=0; i<camposClonados.length;i++){
		camposClonados[i].value = '';
	}

}

function removerCampos(id){
	var node1 = document.getElementById('destino');
	node1.removeChild(node1.childNodes[0]);
}
function duplicarCampos2(){
	var clone = document.getElementById('origem1').cloneNode(true);
	var destino = document.getElementById('destino1');
	destino.appendChild (clone);
	
	var camposClonados = clone.getElementsByTagName('input');
	
	for(i=0; i<camposClonados.length;i++){
		camposClonados[i].value = '';
	}

}

function removerCampos2(id){
	var node1 = document.getElementById('destino1');
	node1.removeChild(node1.childNodes[0]);
}
    </script>    
</body>
</html>
