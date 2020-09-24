<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamneseFonoaudiologia extends Model {
  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
      'id_pode_ver' => 'array',
      'id_pode_editar' => 'array',
  ];


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'posicao_bloco_familiar',
      'reacao_crianca_status_relacao_pais',
      'crianca_desejada',
      'tinha_expectativa_em_relacao_ao_sexo_da_crianca',
      'duracao_da_gestacao',
      'fez_pre_natal',
      'tipo_parto',
      'complicacao_durante_parto',
      'foi_necessario_utilizar_algum_recurso',
      'mae_apresentou_algum_problema_durante_gravidez',
      'amamentacao_natural',
      'atraso_ou_problema_na_fala',
      'tem_enurese_noturna',
      'desenvolvimento_motor_no_tempo_esperado',
      'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc',
      'letras_ou_fonemas_trocados',
      'fatos_que_afetaram_o_desenvolvimento_do_paciente',
      'ate_quantos_anos_usou_chupetas',
      'ja_fez_tratamento_fonoaudiologo',
      'se_sim_tratamento_fono_anterior_onde',
      'se_sim_tratamento_fono_anterior_quando',
      'dificuldade_na_fala',
      'dificuldade_na_visao',
      'dificuldade_na_locomocao',
      'problemas_de_saude',
      'toma_ou_ja_tomou_remedio_controlado_se_sim_quais',
      'toma_banho_sozinho',
      'escova_os_dentes_sozinho',
      'usa_o_banheiro_sozinho',
      'necessita_auxilio_para_se_vestir_ou_despir',
      'atende_intervencoes_quando_esta_desobedecendo',
      'chora_facil',
      'recusa_auxilio',
      'tem_resistencia_ao_toque',
      'serie_atual_na_escola',
      'alfabetizada',
      'tem_dificuldades_de_aprendizagem',
      'repetiu_algum_ano',
      'faz_amigos_com_facilidade',
      'adaptase_facilmente_ao_meio',
      'dorme_sozinho',
      'dorme_no_quarto_dos_pais',
      'medidas_disciplinares_empregadas_pelos_pais',
      'outras_ocorrencias_observacoes',
  ];


  public static $regras_validacao = [
      'posicao_bloco_familiar' => 'required|max:191',
      'crianca_desejada'  => 'required',
      'reacao_crianca_status_relacao_pais' => 'required',
      'tinha_expectativa_em_relacao_ao_sexo_da_crianca'  => 'required',
      'duracao_da_gestacao'  => 'required|max:191',
      'fez_pre_natal'  => 'required|max:191',
      'tipo_parto'  => 'required|max:191',
      'complicacao_durante_parto'  => 'required',
      'amamentacao_natural' => 'required',
      'atraso_ou_problema_na_fala' => 'required',
      'tem_enurese_noturna' => 'required',
      'desenvolvimento_motor_no_tempo_esperado' => 'required',
      'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => 'required',
      'letras_ou_fonemas_trocados'=> 'required',
      'fatos_que_afetaram_o_desenvolvimento_do_paciente' => 'required',
      'ate_quantos_anos_usou_chupetas' => 'required|max:191',
      'ja_fez_tratamento_fonoaudiologo' => 'required',
      'se_sim_tratamento_fono_anterior_onde' => 'required',
      'se_sim_tratamento_fono_anterior_quando' => 'required',
      'dificuldade_na_fala' => 'required',
      'dificuldade_na_visao' => 'required',
      'dificuldade_na_locomocao' => 'required',
      'problemas_de_saude' => 'required',
      'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => 'required',
      'toma_banho_sozinho' => 'required',
      'escova_os_dentes_sozinho' => 'required',
      'usa_o_banheiro_sozinho' => 'required',
      'necessita_auxilio_para_se_vestir_ou_despir' => 'required',
      'atende_intervencoes_quando_esta_desobedecendo' => 'required',
      'chora_facil' => 'required',
      'recusa_auxilio' => 'required',
      'tem_resistencia_ao_toque'=> 'required|max:191',
      'serie_atual_na_escola' => 'required|max:191',
      'alfabetizada' => 'required',
      'tem_dificuldades_de_aprendizagem' => 'required',
      'repetiu_algum_ano' => 'required',
      'faz_amigos_com_facilidade' => 'required|max:191',
      'adaptase_facilmente_ao_meio' => 'required|max:191',
      'dorme_sozinho' => 'required',
      'dorme_no_quarto_dos_pais' => 'required',
      'medidas_disciplinares_empregadas_pelos_pais' => 'required',
      'outras_ocorrencias_observacoes' => 'required',
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
