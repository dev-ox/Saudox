<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {


    protected $fillable = [
        'estado',
        'cidade',
        'bairro',
        'nome_rua',
        'numero_casa',
        'descricao',
        'ponto_referencia',
    ];


    public static $regras_validacao = [
        'estado' => 'required',
        'cidade' => 'required',
        'ponto_referencia' => 'required',
    ];
}
