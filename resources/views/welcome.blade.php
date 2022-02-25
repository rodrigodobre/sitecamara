<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helpers;

$i = 0;
$ajuda = new Helpers();
$fotos = DB::table('fotos')->get();
$propaganda = DB::table('fotos')->where('nome','LIKE','%banner_consulta%')->get();
?>
@extends('layouts.site')
@section('content')
    <div class="index">
        @includeIf("layouts.site.banners")
        @includeIf("layouts.site.menu_acesso")
    </div>
    <div class="centro">
        <!--<div style="margin-top: -20px;margin-bottom: 20px;">
            foreach($propaganda as $prop)
            <a href='/'>
                <img src="{ asset($prop->foto_src) }}" alt="propaganda_institucional" style="width: 98%;text-align: center;margin-left: 1%;margin-right:auto;" />
            </a>
            endforeach
        </div>-->
        <div class="coordena">
            <div class="esquerda">
                @includeIf("layouts.site.noticias_index")
                @includeIf("layouts.site.tvcamara_index")
            </div>
            <div class="direita">
                @includeIf("layouts.site.menu_lateral")
                @includeIf("layouts.site.eventos_index")
                @includeIf("layouts.site.face")
                @includeIf("layouts.site.soundcloud")
            </div>
        </div>
    </div>
@endsection
