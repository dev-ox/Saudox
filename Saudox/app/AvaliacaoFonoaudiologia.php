<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoFonoaudiologia extends Model {
    //
    protected $table = 'avaliacao__fonoaudiologias';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id_pode_ver' => 'array',
        'id_pode_editar' => 'array',
    ];


    /* TODO: Lembrar disso quando for criar/editar */
    /* Pra setar o acesso:
     * $arr é um array com os ids dos pacientes que podem ver;
     * $avaliacao->id_pode_ver["paciente"] = json_encode($arr);
     * Pra verificar o acesso:
     * $arr = json_decode($avaliacao->id_pode_ver["paciente"]);
     * E mesma coisa pra id_pode_editar.
     */

    public $fillable = [
            'id_paciente',
            'id_profissional',
            'motivo_avaliacao',
            'data_avaliacao',
            'ultima_tarefa_correta_linguagem_receptiva',
            'menos_total_respostas_incorretoas_linguagem_receptiva',
            'linguagem_receptiva',
            'ultima_tarefa_correta_linguagem_expressiva',
            'menos_total_respostas_incorretoas_linguagem_expressiva',
            'linguagem_expressiva',
            'escore_padrao_linguagem_receptiva',
            'mais_escore_padrao_linguagem_expressiva',
            'total_linguagem_global',
            'escore_padrao_linguagem_global',
            'observacao_comportamento',
            'respostas',
            'seletor_questionario',
    ];


    public static $regras_validacao = [
            'id_paciente' => 'required|numeric|exists:pacientes,id',
            'id_profissional' => 'required|numeric|exists:profissionals,id',
            'motivo_avaliacao' => 'required',
            'data_avaliacao' => 'required',
            'hora_avaliacao' => 'required',
            'seletor_questionario' => 'required',
            'ultima_tarefa_correta_linguagem_receptiva' => 'required',
            'menos_total_respostas_incorretoas_linguagem_receptiva' => 'required',
            'linguagem_receptiva' => 'required',
            'ultima_tarefa_correta_linguagem_expressiva' => 'required',
            'menos_total_respostas_incorretoas_linguagem_expressiva' => 'required',
            'linguagem_expressiva' => 'required',
            'escore_padrao_linguagem_receptiva' => 'required',
            'mais_escore_padrao_linguagem_expressiva' => 'required',
            'total_linguagem_global' => 'required',
            'escore_padrao_linguagem_global' => 'required',
            'observacao_comportamento' => 'required',
    ];
}
