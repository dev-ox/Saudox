<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model {
    public static $regras_validacao = [
        'nome' => 'required|max:255',
        'cpf' => 'required|numeric',
        'data_nascimento_paciente' => 'required',
        'telefone' => 'required',
        'email' => 'required|email',
        'local_de_atendimento' => 'required',
        'dia_da_consulta' => 'required',
    ];


    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento_paciente',
        'telefone',
        'email',
        'local_de_atendimento',
        'id_profissional',
        'observacoes',
    ];


    // Fora do padrao porque isso não é um metodo, é um atributo
    public function endereco() {
        // Esse model tem um endereco de chave primaria id que é referenciado pelo id_endereco deste model
        return $this->hasOne('\App\Endereco', 'id', 'id_endereco');
    }


}
