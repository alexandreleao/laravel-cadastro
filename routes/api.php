<?php

use Illuminate\Http\Request;
use App\Model\Usuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('v1')->group(function(){
    Route::get('lista', function(){
        return Usuario::listar(10);
    })->name('listar.usuarios.api');

    Route::post('cadastra', "API\UsuarioApiController@salvar")->name('cadastrar.api');
    Route::put('atualizar/{id}', "API\UsuarioApiController@atualizar")->name('atualizar.api');
});


 /*Route::prefix('v2')->group(function(){

    Route::get('listagem', function(){
        return ['Alexandre', 'Camila', 'Bob'];
    });

    Route::post('cadastrar', function(){
        echo 'Equipe de altura!';
    });

 });*/
