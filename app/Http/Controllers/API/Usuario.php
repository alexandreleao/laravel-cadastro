<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Usuario as UsuarioModel;

class Usuario extends Controller
{
    public function salvar(Request $request){
     
     if(UsuarioModel::cadastrar($request)){
         return response("ok", 201);
     } else{
        return response("erro", 409);
     }

    }

     public function atualizar(Request $request, $id){

        if(UsuarioModel::atualizar($request)){
            return response("Certo", 201);
        } else {
            return response("errado", 409);
        }

    }

}
