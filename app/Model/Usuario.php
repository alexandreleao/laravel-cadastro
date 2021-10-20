<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $connection = 'sqlite';
    protected $table =  'usuario';

    public static function listar(int $limite){
        $sql = self::select([
            "id",
            "nome",
            "email",
            "data_cadastro"
        ])
        ->limit($limite)
        ->get();
    }
}
