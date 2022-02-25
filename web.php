<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//////////////////// SITE //////////////////////////
Route::get('/', function () {
    return view('embreve');
});
Route::get('/welcome', function (){
   return view('welcome');
});
Route::get('/cabecalho', function (){
    ;   return view('layouts.site.cabecalho');
});
Route::get('/rodape', function (){
    return view('layouts.site.rodape');
});
Route::get('/menu', function (){
    return view('layouts.site.menu');
});
Route::get('/contato', function (){
    return view('layouts.site.contato');
});
Route::get('/eventos', function (){
    return view('layouts.site.eventos');
});
Route::get('/eventos_index', function (){
    return view('layouts.site.eventos_index');
});
Route::get('/face', function (){
    return view('layouts.site.face');
});
Route::get('/institucional', function (){
    return view('layouts.site.institucional');
});
Route::get('/menu_acesso', function (){
    return view('layouts.site.menu_acesso');
});
Route::get('/menu_lateral', function (){
    return view('layouts.site.menu_lateral');
});
Route::get('/municipio', function (){
    return view('layouts.site.municipio');
});
Route::get('/noticias_index', function (){
    return view('layouts.site.noticias_index');
});
Route::post('/resultado', function (){
    return view('layouts.site.resultado');
});
Route::get('/soundcloud', function (){
    return view('layouts.site.soundcloud');
});
Route::get('/tvcamara_index', function (){
    return view('layouts.site.tvcamara_index');
});
Route::group(['prefix' => '/'], function (){
    Route::get('/destaques','DestaquesController@mostrar')->name('mostrar');
    Route::get('/noticias','NoticiasController@mostrar')->name('mostrar');
    Route::get('noticias/{noticias}','NoticiasController@abrir')->name('abrir');
});
//////////////////// SISTEMA /////////////////////////////////
Route::get('/admin', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth','prefix' => 'admin'], function(){
    Route::get('/destaques','DestaquesController@index')->name('lista');
    Route::get('destaques/novo','DestaquesController@novo')->name('formulario');
    Route::post('destaques/salvar','DestaquesController@salvar')->name('salvar');
    Route::get('destaques/{destaques}/editar','DestaquesController@editar');
    Route::patch('destaques/{destaques}','DestaquesController@atualizar');
    Route::delete('destaques/{destaques}','DestaquesController@deletar');
    Route::patch('destaques/publicar/{destaques}','DestaquesController@publicado');
    Route::get('/noticias','NoticiasController@index')->name('lista');
    Route::get('noticias/novo','NoticiasController@novo')->name('formulario');
    Route::post('noticias/salvar','NoticiasController@salvar')->name('salvar');
    Route::get('noticias/{noticias}/editar','NoticiasController@editar');
    Route::patch('noticias/{noticias}','NoticiasController@atualizar');
    Route::patch('noticias/publicar/{noticias}','NoticiasController@publicado');
    Route::delete('noticias/{noticias}','NoticiasController@deletar');
    Route::get('/galerias','GaleriasController@index')->name('lista');
    Route::get('/fotos','FotosController@index')->name('lista');
    Route::get('fotos/novo','FotosController@novo')->name('formulario');
    Route::post('fotos/salvar','FotosController@salvar')->name('salvar');
    Route::get('fotos/{vereadores}/editar','FotosController@editar');
    Route::patch('fotos/{fotos}','FotosController@atualizar');
    Route::delete('fotos/{fotos}','FotosController@deletar');
    Route::get('/usuarios','UsuariosController@index')->name('lista');
    Route::delete('usuarios/{usuarios}','UsuariosController@deletar');
    Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes();



