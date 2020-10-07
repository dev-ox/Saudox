<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoTerapiaOcupacional extends Model {
    protected $table = 'avaliacao__terapia__ocupacionals';

    protected $fillable = [
            'id_paciente',
            'id_profissional',
            'data_avaliacao',
            'entrevistado',
            'queixa_principal',
            'brincadeiras_favoritas',
            'onde_brinca',
            'com_quem_prefere_brincar',
            'o_que_faz_rir',
            'brincadeiras_evitadas',
            'brinca_sozinho_ou_precisa_de_atencao',
            'postura_crianca_quando_brinca',
            'reacao_ao_ser_frustrada_ou_raiva',
            'quem_disciplina_a_crianca',
            'como_reage_a_orientacao_dos_pais',
            'reacao_a_abracos_carinhos',
            'areas_maior_habilidade',
            'areas_maior_dificuldade',
            'hora_de_levantar',
            'hora_cafe_da_manha',
            'hora_da_escola',
            'hora_almoco',
            'hora_janta',
            'hora_dormir',
            'dorme_durante_dia',
            'dorme_com_facilidade',
            'sono_tranqulo',
            'acorda_noite',
            'pesadelos',
            'sonambulismo',
            'rola_balanca_cabeca_enquanto_dorme',
            'come_com_os_dedos',
            'come_com_talheres',
            'brinca_com_comida',
            'derrama_comida',
            'usa_mao_direita_para_comer',
            'bebe_em_garrafa',
            'usa_canudo',
            'segura_copo_garrafa_com_uma_ou_duas_maos',
            'ajuda_a_colocar_a_mesa',
            'tipo_alimentacao',
            'tem_bom_apetite',
            'o_que_gosta_de_comer',
            'nao_gosta_de_comer',
            'houve_dificuldade_transicao_pastoso_solido',
            'gosta_de_vestir_roupa',
            'veste_roupa_sozinho_quais_pecas',
            'tira_roupa_sozinho_quais_pecas',
            'abotoa',
            'amarra',
            'usa_fralda',
            'usa_vaso_sanitario',
            'lava_maos_face_corpo',
            'escova_dentes',
            'se_diverte_com_o_banho',
            'gosta_molhar_cabeca',
            'enxuga_se',
            'gosta_pentear_cabelos',
            'gosta_cortar_cabelos',
            'gosta_cortar_unhas',
            'info_extras_relevante',
            'responsavel_por_este_documento',
    ];




    public static $regras_validacao = [
            'id_paciente' => 'required|numeric|exists:pacientes,id',
            'id_profissional' => 'required|numeric|exists:profissionals,id',
            'data_avaliacao' => 'required',
            'entrevistado' => 'required|max:191',
            'queixa_principal' => 'required|max:191',
            'brincadeiras_favoritas' => 'required' ,
            'onde_brinca' => 'required',
            'com_quem_prefere_brincar' => 'required',
            'o_que_faz_rir' => 'required',
            'brincadeiras_evitadas' => 'required',
            'brinca_sozinho_ou_precisa_de_atencao' => 'required',
            'postura_crianca_quando_brinca' => 'required',
            'reacao_ao_ser_frustrada_ou_raiva' => 'required',
            'quem_disciplina_a_crianca' => 'required',
            'como_reage_a_orientacao_dos_pais' => 'required',
            'reacao_a_abracos_carinhos' => 'required',
            'areas_maior_habilidade' => 'required',
            'areas_maior_dificuldade' => 'required',
            'hora_de_levantar' => 'required|max:191',
            'hora_cafe_da_manha' => 'required|max:191',
            'hora_da_escola' => 'required|max:191',
            'hora_almoco' => 'required|max:191',
            'hora_janta' => 'required|max:191',
            'hora_dormir' => 'required|max:191',
            'dorme_durante_dia' => 'required' ,
            'dorme_com_facilidade' => 'required',
            'sono_tranqulo' => 'required',
            'acorda_noite' => 'required|max:191',
            'pesadelos' => 'required',
            'sonambulismo' => 'required',
            'rola_balanca_cabeca_enquanto_dorme' => 'required',
            'come_com_os_dedos' => 'required',
            'come_com_talheres' => 'required',
            'brinca_com_comida' => 'required',
            'derrama_comida' => 'required',
            'usa_mao_direita_para_comer' => 'required',
            'bebe_em_garrafa' => 'required',
            'usa_canudo' => 'required',
            'segura_copo_garrafa_com_uma_ou_duas_maos' => 'required|max:191',
            'ajuda_a_colocar_a_mesa' => 'required',
            'tipo_alimentacao' => 'required|max:191',
            'tem_bom_apetite' => 'required',
            'o_que_gosta_de_comer' => 'required|max:191',
            'nao_gosta_de_comer' => 'required|max:191',
            'houve_dificuldade_transicao_pastoso_solido' => 'required',
            'gosta_de_vestir_roupa' => 'required|max:191',
            'veste_roupa_sozinho_quais_pecas' => 'required|max:191',
            'tira_roupa_sozinho_quais_pecas' => 'required|max:191',
            'abotoa' => 'required',
            'amarra' => 'required',
            'usa_fralda' => 'required',
            'usa_vaso_sanitario' => 'required',
            'lava_maos_face_corpo' => 'required',
            'escova_dentes' => 'required',
            'se_diverte_com_o_banho' => 'required',
            'gosta_molhar_cabeca' => 'required',
            'enxuga_se' => 'required',
            'gosta_pentear_cabelos' => 'required',
            'gosta_cortar_cabelos' => 'required',
            'gosta_cortar_unhas' => 'required',
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
