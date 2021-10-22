<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;




Route::get('/', 'Usuario@cadastrar')->name('home');
Route::post('/salvar','Usuario@salvar')->name('salvar');
Route::post('/atualizar/{id}', 'Usuario@atualizarCadastro')->name('atualizar');


Route::get('/atualizar-perfil/{id}', 'Usuario@atualizarPerfil')->name('atualizar.perfil');


