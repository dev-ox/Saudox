<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamneseGigantePsicopedaNeuroPsicomotoPt1 extends Model {
    protected $table = 'anamnese__pnp__pt1s';

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
            'compareceram_entrevista',
            'queixa',
            'escolaridade',
            'turno_das_aulas',
            'horario_das_aulas',
            'escola',
            'escola_publica_privada',
            'professor_responsavel',
            'coordenador',
            'encaminhado_pela_escola',
            'profissao_pai',
            'profissao_mae',
            'escolaridade_pai',
            'escolaridade_mae',
            'relacao_dos_pais_hoje',
            'outras_crianças_e_parentes_que_moram_com_a_criança',
            'tratamento_para_infertilidade',
            'historia_familiar_de_doenca_neurologica',
            'convulcoes',
            'como_era_composta_a_familia_na_epoca_da_concepcao',
            'idade_dos_pais_na_epoca_mãe',
            'idade_dos_pais_na_epoca_pai',
            'gestacoes_anteriores',
            'abortos',
            'naturais',
            'provocados',
            'perdeu_algum_filho',
            'a_perca_foi_antes_do_paciente',
            'como_perdeu_o_filho',
            'como_foi_a_aceitacao_das_familias',
            'gravidez_planejada_por_ambos',
            'fez_tratamento_pre_natal',
            'sofreu_acidentes_quedas_se_sim_como_foi',
            'teve_alguma_doenca_na_gestacao',
            'tomou_alguma_medicacao_se_sim_qual',
            'enjoo',
            'bebeu',
            'fumou',
            'entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual',
            'esteve_em_ambientes_com_alto_nivel_de_poluicao',
            'exposição_a_raiox',
            'qual_era_a_situacao_economica_do_casal_na_epoca',
            'ja_tinham_outros_filhos_se_sim_quantos',
            'mae_trabalhava_fora_durante_gravidez',
            'casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual',
            'local_parto',
            'tipo_parto',
            'algum_problema_no_parto_se_sim_qual',
            'peso_ao_nascer',
            'comprimento_ao_nascer',
            'teve_ictericia',
            'idade_gestacional_do_bebe_ao_nascer',
            'como_se_deu_a_alimentação',
            'mamou_no_seio_se_nao_qual_o_motivo',
            'se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar',
            'tomou_mamadeira_ate_quando',
            'aceitou_bem_a_alimentação_pastosa',
            'aceitou_bem_a_alimentação_solida',
            'usa_copo',
            'alimentacao_atual',
            'retardo_diabetes_síndromes_doenças_nervosas_epilepsia',
            'teve_sarampo_infancia',
            'teve_dores_ouvido_infancia',
            'teve_colicas_infancia',
            'teve_catapora_infancia',
            'teve_caxumba_infancia',
            'teve_rubeola_infancia',
            'teve_coqueluche_infancia',
            'teve_meningite_infancia',
            'teve_desidratacao_infancia',
    ];



    public static $regras_validacao = [
            'id_paciente' => 'required',
            'id_profissional' => 'required',
    ];










    /* TODO: Lembrar disso quando for criar/editar */
    /* Pra setar o acesso:
     * $arr é um array com os ids dos pacientes que podem ver;
     * $anamnese->id_pode_ver["paciente"] = json_encode($arr);
     * Pra verificar o acesso:
     * $arr = json_decode($anamnese->id_pode_ver["paciente"]);
     * E mesma coisa pra id_pode_editar.
     */
}
