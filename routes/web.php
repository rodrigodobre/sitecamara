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
use App\Mail\newLaravelTips;

//////////////////// SITE //////////////////////////

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function (){
    return view('welcome');
});
Route::get('/cabecalho', function (){
    return view('layouts.site.cabecalho');
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
Route::get('/ex-presidentes', function (){
    return view('layouts.site.presidentes');
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
Route::get('/indicacaos_index', function (){
    return view('layouts.site.indicacaos_index');
});
Route::get('/coronavirus',function(){
    return view('layouts.site.coronavirus');
});
Route::get('/politica', function (){
    return view('layouts.site.politica');
});
Route::get('/regimento', function (){
    return view('index');
});
Route::get('/soundcloud', function (){
    return view('layouts.site.soundcloud');
});
Route::get('/tvcamara_index', function (){
    return view('layouts.site.tvcamara_index');
});
Route::get('/tvcamara', function (){
    return view('layouts.site.tvcamara');
});

Route::group(['prefix' => '/'], function (){
    Route::get('/destaques','DestaquesController@mostrar')->name('destaques_mostrar');
    Route::get('/noticias','NoticiasController@mostrar')->name('indicacaos_mostrar');
    Route::get('noticias/{noticias}','NoticiasController@abrir')->name('abrir');
    Route::get('/vereadores','VereadoresController@mostrar')->name('vereadores_mostrar');
    Route::get('/mesa-diretora','VereadoresController@mesa_diretora')->name('mesa-diretora');
    Route::get('/manutencao','VereadoresController@manutencao');
    Route::get('vereadores/{vereadores}','VereadoresController@abrir')->name('abrir');
    Route::get('legislativo','LeisController@mostrar')->name('mostrar');
    Route::get('/indicacoes','IndicacoesController@mostrar')->name('ind_mostrar');
    Route::get('/indicacoes/{indicacoes}','IndicacoesController@abrir')->name('abrir_ind');
    Route::get('legislativo/','LeisController@mostrar')->name('retorno_pesquisa');
    Route::get('legislativo/{pesquisa}','LeisController@mostrar')->name('retorno_pesquisa');
    Route::post('legislativo/pesquisar','LeisController@pesquisar')->name('pesquisar');
    Route::get('legislativo/pesquisar','LeisController@mostrar')->name('pesquisar');
    Route::patch('/resultado','ResultadosController@index');
    Route::get('/resultado/{pesquisa}','ResultadosController@mostrar')->name('pesquisar');
    Route::get('/arrumarfotos','FotosController@arrumar');
    Route::get('/resenhas','ResenhasController@mostrar');
    Route::get('resenhas/{pesquisa}','ResenhasController@mostrar')->name('retorno_pesquisa');
    Route::post('resenhas/pesquisar','ResenhasController@pesquisar')->name('pesquisar');
    //Route::get('/consultapublica','ConsultasController@mostrar')->name('consulta_mostrar');
    //Route::post('consultapublica/salvar','ConsultasController@salvar')->name('salvar');
});
Route::get('/admin', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth','prefix' => 'admin'], function(){
    Route::get('/vereadores','VereadoresController@index')->name('lista');
    Route::get('vereadores/novo','VereadoresController@novo')->name('formulario');
    Route::post('vereadores/salvar','VereadoresController@salvar')->name('salvar');
    Route::get('vereadores/{vereadores}/editar','VereadoresController@editar');
    Route::patch('vereadores/{vereadores}','VereadoresController@atualizar');
    Route::delete('vereadores/{vereadores}','VereadoresController@deletar');
    Route::patch('vereadores/ativar/{vereadores}','VereadoresController@ativo');
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
    Route::get('/indicacoes','IndicacoesController@index')->name('lista');
    Route::get('indicacoes/novo','IndicacoesController@novo')->name('formulario');
    Route::post('indicacoes/salvar','IndicacoesController@salvar')->name('salvar');
    Route::get('indicacoes/{indicacoes}/editar','IndicacoesController@editar');
    Route::patch('indicacoes/{indicacoes}','IndicacoesController@atualizar');
    Route::delete('indicacoes/{indicacoes}','IndicacoesController@deletar');
    Route::get('/leis','LeisController@index')->name('lista');
    Route::get('leis/novo','LeisController@novo')->name('formulario');
    Route::post('leis/salvar','LeisController@salvar')->name('salvar');
    Route::get('leis/{leis}/editar','LeisController@editar');
    Route::patch('leis/{leis}','LeisController@atualizar');
    Route::delete('leis/{leis}','LeisController@deletar');
    Route::get('/fotos','FotosController@index')->name('lista');
    Route::get('fotos/novo','FotosController@novo')->name('formulario');
    Route::post('fotos/salvar','FotosController@salvar')->name('salvar');
    Route::get('fotos/{fotos}/editar','FotosController@editar');
    Route::patch('fotos/{fotos}','FotosController@atualizar');
    Route::delete('fotos/{fotos}','FotosController@deletar');
    Route::get('/usuarios','UsuariosController@index')->name('lista');
    Route::get('usuarios/{usuarios}/editar','Auth\RegisterController@editar');
    Route::patch('usuarios/{usuarios}/atualizar','UsuariosController@atualizar')->name('atualizar');
    Route::get('certificados','CertificadosController@index');
    Route::get('/resenhas','ResenhasController@index')->name('lista');
    Route::get('resenhas/novo','ResenhasController@novo')->name('formulario');
    Route::post('resenhas/salvar','ResenhasController@salvar')->name('salvar');
    Route::get('resenhas/{resenhas}/editar','ResenhasController@editar');
    Route::patch('resenhas/{resenhas}','ResenhasController@atualizar');
    Route::delete('resenhas/{resenhas}','ResenhasController@deletar');
    Route::get('/home', 'HomeController@index')->name('home');
    //Route::get('/consultas','ConsultasController@index')->name('listar');
});
//Route::get('/envio-email', fn() => new newLaravelTips());
Auth::routes();



