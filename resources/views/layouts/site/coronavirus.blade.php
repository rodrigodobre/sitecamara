@extends('layouts.site')
@section('content')
<div class="container-fluid">
    <div class="index">
        @includeIf("layouts.site.banners")
    </div>
</div><br />
<div class="container-fluid" style="background-color: #e0e0e0;">
    <div class="container" style="padding-top:10px;padding-bottom: 20px;">
        <div class="row align-items-center" style="text-align: center;">
            <div class="col"><p style="font-size:x-large;font-weight: bold;">Casos de Coronavírus em Ponta Porã (MS):<p/>
                    <p>Atualizado no dia 13/08/2020, às 15:00 | Fonte: Secretaria Municipal de Saúde</p></div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><p style="font-size:3em;padding-top:10px;font-weight: bold;color:#1e5488;border:20px solid #e0e0e0;">135</p><p>SUSPEITOS NOTIFICADOS</p><p style="font-size:3em;font-weight: bold;color:#1e5488;margin-top:-25px;">__</p></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><p style="font-size:3em;padding-top:10px;font-weight: bold;color:#1e5488;border:20px solid #e0e0e0;">392</p><p>CONFIRMADOS</p><p style="font-size:3em;font-weight: bold;color:#1e5488;margin-top:-25px;">__</p></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><p style="font-size:3em;padding-top:10px;font-weight: bold;color:#1e5488;border:20px solid #e0e0e0;">195</p><p>CURADOS</p><p style="font-size:3em;font-weight: bold;color:#1e5488;margin-top:-25px;">__</p></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3"><p style="font-size:3em;padding-top:10px;font-weight: bold;color:#1e5488;border:20px solid #e0e0e0;">10</p><p>ÓBITOS</p><p style="font-size:3em;font-weight: bold;color:#1e5488;margin-top:-25px;">__</p></div>
        </div>
    </div>
</div><br />
<div class="container">
    <div class="row align-items-center" style="text-align: center;text-transform: uppercase;color:white;">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/lavando.png')}}" width="100" /></p><p>como se</p><p>prevenir</p> </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/saude.png')}}" width="100" /></p><p>quando e onde</p><p>buscar ajuda</p></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/noticia.png')}}" width="100" /></p><p>últimas</p><p> notícias</p></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/decreto.png')}}" width="100" /></p><p>leis, decretos</p><p> e resoluções</p></div>
        <div class="w-100"></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/localizacao.png')}}" width="100" /></p><p>o que funciona</p><p> na cidade?</p></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/falso.png')}}" width="100" /></p><p>fake news</p><p>ou verdade?</p></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/duvida.png')}}" width="100" /></p><p>dúvidas</p><p> frequentes</p></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3" style="background-color: #1e5488;padding: 15px;font-size: x-large;border:10px solid #f3f2f3;"><p><img src="{{ asset('public/img/telefone.png')}}" width="100" /></p><p>telefones</p><p> úteis</p></div>
    </div>
</div>
<div class="container">
    <div class="row align-items-center" style="text-align: center;text-transform: uppercase;">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3" style="padding:15px;"><img src="{{ asset('public/img/1.jpg')}}" /></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3" style="padding:15px;"><img src="{{ asset('public/img/2.jpg')}}" /></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3" style="padding:15px;"><img src="{{ asset('public/img/3.jpg')}}" /></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3" style="padding:15px;"><img src="{{ asset('public/img/4.jpg')}}" /></div>
    </div>
</div>
<div class="container">
    <div class="row align-items-center" style="text-align: center;text-transform: uppercase;border:10px solid #f3f2f3;">
        <div class="col-12 col-sm-4" style="border-bottom:10px solid #f3f2f3;padding-top: 25px;background-color: white;"><p><img src="{{ asset('public/img/contato-corona.png')}}" width="50" /></p></div>
        <div class="col-12 col-sm-4" style="border-bottom:10px solid #f3f2f3;padding-top: 25px;background-color: white;"><p><img src="{{ asset('public/img/alfacebook.png')}}" width="50" /></p></div>
        <div class="col-12 col-sm-4" style="border-bottom:10px solid #f3f2f3;padding-top: 25px;background-color: white;"><p><img src="{{ asset('public/img/instagrama.png')}}" width="50" /></p></div>
    </div>
</div>
@endsection

