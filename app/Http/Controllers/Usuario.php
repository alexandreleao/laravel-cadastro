<?php

namespace App\Http\Controllers;
use App\Model\Usuario as UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Usuario extends Controller
{
    public function cadastrar(){
        
        return view('usuario.cadastro');
    }
    
    public function salvar(Request $request){
        $request->validate([
         "nome" => "required",
         "email" => "required|email",
         "senha" => "min:5"
            
        ]);
        
         $usuario = UsuarioModel::cadastrar($request);
        
 
        if($usuario){
         return view('usuario.sucesso', ['usuario' => $usuario]);
        }
        
        return redirect()->route('home');
      
     }


    public function salvarMetodoAlternativo(Request $request){
       
        $request->merge(['data_cadastro' => DB::raw('now()')]);
        
        $validated = $request->validate([
        "nome" => "required",
        "email" => "required|email",
        "senha" => "min:5"
           
       ]);
       
       $usuario = new UsuarioModel;
       $usuario->fill($validated);

       if($usuario->save()){
        return view('usuario.sucesso', ['usuario' => $usuario]);
       }
       
       return redirect()->route('home');
     
    }

    public function atualizarCadastro(Request $request, $id){
        //$request->merge(['id' => 19, 'nome' => 'Nicolás', 'email' => 'nikoz@gmal.com']);
        $request->merge(['id' => $id]);

        
        $usuario = UsuarioModel::atualizar($request);
        
        if($usuario){
            return view('usuario.atualizado', [
                'usuario' => $usuario
            ]);
        }

        return redirect()->route('home');
    }


    public function atualizarPerfil($id)
    {
        $usuario = DB::table('usuario')->where('id', $id)->get()->first();

        return view('usuario.atualizar-perfil', ['id' => $id, 'usuario' => $usuario]);
    }

    
    
}
