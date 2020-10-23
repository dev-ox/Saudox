<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoNeuropsicologica extends Model {
    protected $table = 'avaliacao__neuropsicologicas';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id_pode_ver' => 'array',
        'id_pode_editar' => 'array',
    ];


    protected $fillable = [
            'id_paciente',
            'id_profissional',
            'queixa_principal',
            'encaminhado_por',
            'participantes_durante_anaminese',
            'descricao_das_funcoes_cognitivas_avaliadas',
            'testes_neuropsicologicos',
            'recursos_complementares',
            'dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias',
            'alimentacao_nos_dias_da_avalicao',
            'sono_nos_dias_da_avalicao',
            'higiene_nos_dias_da_avalicao',
            'humor_nos_dias_da_avalicao',
            'areas_preservadas',
            'areas_lesionadas',
            'anexar_arquivos',
            'hipotese_diagnostica',
            'dia_hora_devolutiva_aos_responsavel',
            'participantes',
            'atividades_para_ser_feito_na_clinica',
            'atividades_para_ser_feito_em_casa',
            'sugestao_encaminhamento',
            'exames_clinicos_se_houver',
    ];



    public static $regras_validacao = [
            'id_paciente' => 'required|numeric|exists:pacientes,id',
            'id_profissional' => 'required|numeric|exists:profissionals,id',
            'queixa_principal' => 'required',
            'encaminhado_por' => 'required',
            'participantes_durante_anaminese' => 'required',
            'descricao_das_funcoes_cognitivas_avaliadas' => 'required',
            'testes_neuropsicologicos' => 'required',
            'recursos_complementares' => 'required',
            'dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias' => 'required',
            'alimentacao_nos_dias_da_avalicao' => 'required',
            'sono_nos_dias_da_avalicao' => 'required',
            'higiene_nos_dias_da_avalicao' => 'required',
            'humor_nos_dias_da_avalicao' => 'required',
            'areas_preservadas' => 'required',
            'areas_lesionadas' => 'required',
            'hipotese_diagnostica' => 'required',
            'dia_hora_devolutiva_aos_responsavel' => 'required',
            'participantes' => 'required',
            'atividades_para_ser_feito_na_clinica' => 'required',
            'atividades_para_ser_feito_em_casa' => 'required',
    ];

    public function atividades_para_ser_feito_na_clinica(){
        return json_decode($this->atividades_para_ser_feito_na_clinica);
    }

    public function atividades_para_ser_feito_em_casa(){
        return json_decode($this->atividades_para_ser_feito_em_casa);
    }

    public function dia_hora_devolutiva_aos_responsavel_formatado(){
        $time = strtotime($this->dia_hora_devolutiva_aos_responsavel);
        return date('H:m  d/m/Y',$time);
    }


    /* TODO: Lembrar disso quando for criar/editar */
    /* Pra setar o acesso:
     * $arr é um array com os ids dos pacientes que podem ver;
     * $avaliacao->id_pode_ver["paciente"] = json_encode($arr);
     * Pra verificar o acesso:
     * $arr = json_decode($avaliacao->id_pode_ver["paciente"]);
     * E mesma coisa pra id_pode_editar.
     */
}
