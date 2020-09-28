<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoJudo extends Model {
    protected $table = 'avaliacao__judos';


    protected $fillable = [
            'id_paciente',
            'id_profissional',
            'diagnostico',
            'relacao_com_as_pessoas_judo',
            'resposta_emocional',
            'uso_do_corpo',
            'uso_de_objetos',
            'adaptacao_a_mudancas',
            'resposta_auditiva',
            'resposta_visual',
            'medo_ou_nervosismo',
            'comunicacao_verbal',
            'comunicacao_nao_verbal',
            'orienta_se_por_som',
            'reacao_ao_nao',
            'compreendem_comandos_simples_palavras_que_descrevam_objetos',
            'manipula_brinquedos_objetos',
            'equilibrio',
            'forca',
            'resistencia',
            'marcha',
            'agilidade',
            'coordenacao_motora_fina',
            'coordenacao_motora_grossa',
            'propriocepcao',
            'compreende_direcoes',
            'compreende_comandos_professoras',
            'concentracao',
            'comportamento_reflexo',
            'observacoes',
            'terapias',
            'objetivos',
            'tipo_da_aula',
    ];

    public static $regras_validacao = [
            'id_paciente' => 'required|numeric|exists:pacientes,id',
            'id_profissional' => 'required|numeric|exists:profissionals,id',
            'relacao_com_as_pessoas_judo' => 'required|numeric',
            'resposta_emocional' => 'required|numeric',
            'uso_do_corpo' => 'required|numeric',
            'uso_de_objetos' => 'required|numeric',
            'adaptacao_a_mudancas' => 'required|numeric',
            'resposta_auditiva' => 'required|numeric',
            'resposta_visual' => 'required|numeric',
            'medo_ou_nervosismo' => 'required|numeric',
            'comunicacao_verbal' => 'required|numeric',
            'comunicacao_nao_verbal' => 'required|numeric',
            'orienta_se_por_som' => 'required|numeric',
            'reacao_ao_nao' => 'required|numeric',
            'compreendem_comandos_simples_palavras_que_descrevam_objetos' => 'required|numeric',
            'manipula_brinquedos_objetos' => 'required|numeric',
            'equilibrio' => 'required|numeric',
            'forca' => 'required|numeric',
            'resistencia' => 'required|numeric',
            'marcha' => 'required|numeric',
            'agilidade' => 'required|numeric',
            'coordenacao_motora_fina' => 'required|numeric',
            'coordenacao_motora_grossa' => 'required|numeric',
            'propriocepcao' => 'required|numeric',
            'compreende_direcoes' => 'required|numeric',
            'compreende_comandos_professoras' => 'required|numeric',
            'concentracao' => 'required|numeric',
            'comportamento_reflexo' => 'required|numeric',
            'observacoes' => 'required',
            'terapias' => 'required',
            'objetivos' => 'required',
            'tipo_da_aula' => 'required',
            'diagnostico' => 'required',
    ];



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
}
