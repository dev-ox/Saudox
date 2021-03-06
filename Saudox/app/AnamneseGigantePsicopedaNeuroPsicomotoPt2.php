<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamneseGigantePsicopedaNeuroPsicomotoPt2 extends Model {
    protected $table = 'anamnese__pnp__pt2s';

    protected $fillable = [
            'teve_otite_infancia',
            'teve_adenoides_infancia',
            'teve_amigdalites_infancia',
            'teve_alergias_infancia',
            'teve_acidentes_infancia',
            'teve_convulsoes_infancia',
            'teve_febres_infancia',
            'foi_internado_se_sim_por_quanto_tempo',
            'ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia',
            'quedas_e_traumatismos',
            'teve_complicacao_com_vacina_se_sim_qual',
            'audicao_e_visao',
            'sono_tranquilo_se_for_agitado_quando_e_qual_frequencia',
            'range_dentes',
            'terror_noturno',
            'sonambulistmo',
            'enurese',
            'fala_durante_sono',
            'dorme_so_se_nao_com_quem_dorme',
            'ate_quando_dormiu_com_os_pais',
            'como_foi_a_separacao_dormida_com_os_pais',
            'habitos_especiais_sono',
            'com_que_idade_sustentou_a_cabeca',
            'com_que_idade_sentou',
            'com_que_idade_engatinhou',
            'forma_de_engatinhar',
            'com_que_idade_comecou_a_andar',
            'caia_muito',
            'deixa_cair_as_coisas',
            'esbarra_muito',
            'acredita_que_apresenta_alguma_dificuldade_motora',
            'controle_vesical_bexiga',
            'controle_anal_fezes',
            'foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família',
            'balbucios',
            'quando_comecou_a_falar',
            'como_os_pais_reagiram_fala',
            'apresentou_problema_na_fala_se_sim_quais',
            'compreende_ordens',
            'presenca_de_bilinguismo_em_casa',
            'como_a_crianca_se_comunica',
            'apresenta_salivacao_no_canto_da_boca',
            'idade_entrou_na_escola',
            'adaptouse_bem',
            'metodo_alfabetizacao',
            'mudou_de_escola_se_sim_em_qual_serie_e_idade',
            'escola_atual',
            'metodo_alfabetizacao_atual',
            'serie_e_turno',
            'professor',
            'faz_as_tarefaz_sozinho_se_nao_com_quem_faz',
            'descricao_momento_licoes',
            'opniao_dos_pais_sobre_escola',
            'opniao_dos_pais_sobre_tarefas',
            'fato_importante_vida_escolar',
            'queixas_frequentes',
            'tem_dificuldades_para',
            'conhece_tais_coisas',
            'apresenta_tiques_se_sim_quais',
            'como_pegua_o_lapis',
            'forca_da_escrita',
            'como_acha_que_surgiu_o_problema_a_que_fatores_atribuem',
            'outras_questoes',
            'escolas_que_frequentou',
            'repetiu_ano_se_sim_qual_e_porque',
            'humor_habitual',
            'prefere_brincar_sozinho_ou_em_grupos',
            'estranha_mudancas_de_ambiente',
            'adaptase_facilmente_ao_meio',
    ];





    public static $regras_validacao = [
    ];



}
