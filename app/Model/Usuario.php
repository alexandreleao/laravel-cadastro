<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    
    protected $table =  'usuario';

    public $timestamps = false;

    protected $fillable = [
        "nome",
        "email",
        "senha",
        "data_cadastro"
    ];


    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value); 
    }

    public static function listar(int $limit){
        $sql = self::select([
            "id",
            "nome",
            "email",
            "senha",
            "data_cadastro"
        ])
        ->limit($limit);

        return $sql->get();
    }

    public static function cadastrar(Request $request){
        $id = self::insertGetId([
            "nome" => $request->input('nome'),
            "email" => $request->input('email'),
            "senha" => Hash::make($request->input('senha')),
            "data_cadastro" => DB::raw('NOW()')
            
        ]);
        
        return self::where('id', $id)->get()->first();
    }

       public static function atualizar(Request $request){
        
        $save = self::where('id', $request->get('id'))
            ->update([
                'nome' => $request->get('nome'),
                'email' => $request->get('email')
            ]);
        $usuario = null;
        
        if($save){
            $usuario = self::where('id', $request->get('id'))->get()->first();
        } 
                   
        return $usuario;
       }
}
