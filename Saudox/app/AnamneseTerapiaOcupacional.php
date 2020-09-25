<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamneseTerapiaOcupacional extends Model {
      protected $table = 'anamnese__terapia__ocupacionals';

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
          'gestacao',
          'doencas_da_mae_na_gravidez',
          'inquietacoes_da_mae_na_gravidez',
          'parto',
          'amamentacao_natural',
          'dificuldade_ou_atraso_no_controle_do_esfincter',
          'desenvolvimento_motor_no_tempo_certo',
          'perturbacoes_no_sono',
          'habitos_especiais_ao_dormir',
          'troca_letras_ou_fonemas',
          'dificuldade_na_fala',
          'dificuldade_na_visao',
          'dificuldade_na_locomocao',
          'movimentos_estereotipados',
          'ecolalias',
          'toma_banho_sozinho',
          'escova_os_dentes_sozinho',
          'usa_o_banheiro_sozinho',
          'necessita_auxilio_para_se_vestir_ou_despir',
          'idade_da_retirada_das_fraldas',
          'atende_intervencoes_quando_esta_desobedecendo',
          'chora_facil',
          'recusa_auxílio',
          'resistencia_ao_toque',
          'crianca_estuda',
          'ja_estudou_antes_em_outra_escola',
          'motivo_transferencia_escola_se_estudou_em_outra_antes',
          'ja_repetiu_alguma_serie',
          'possui_acompanhante_terapeutico_em_sala',
          'recebe_orientacao_aos_deveres_em_casa',
          'quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres',
          'quanto_tempo_executa_os_deveres_em_casa',
          'quais_linguas_estrangeiras_fala',
          'quais_esportes_pratica',
          'quais_intrumentos_toca',
          'outras_atividades_que_pratica',
          'faz_amigos_com_facilidade',
          'adaptase_facilmente_ao_meio',
          'companheiros_da_crianca_em_brincadeiras',
          'obediente',
          'dependente',
          'comunicativo',
          'agressivo',
          'cooperativo',
          'descricao_se_sim_dependente',
          'descricao_se_sim_indepedente',
          'descricao_se_sim_agressivo',
          'descricao_se_sim_cooperador',
          'tranquilo',
          'seguro',
          'ansioso',
          'emotivo',
          'alegre',
          'queixoso',
          'insonia',
          'pesadelos',
          'hipersonia',
          'dorme_sozinho',
          'dorme_no_quarto_dos_pais',
          'divide_quarto_com_alguem',
          'medidas_disciplinares_empregadas_pelos_pais',
          'reação_do_filho_ao_ser_contrariado',
          'atitude_dos_pais_a_reacao_filho_contrareado',
          'acompanhamento_medico',
          'qual_medico_responsavel',
          'diagnostico_medico',
          'quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres',
      ];


      public static $regras_validacao = [
          'gestacao' => 'required|max:255',
          'doencas_da_mae_na_gravidez' => 'required|max:255',
          'inquietacoes_da_mae_na_gravidez' => 'required',
          'parto' => 'required|max:255',
          'amamentacao_natural' => 'required|max:255',
          'dificuldade_ou_atraso_no_controle_do_esfincter' => 'required|max:255',
          'desenvolvimento_motor_no_tempo_certo' => 'required|max:255',
          'perturbacoes_no_sono' => 'required|max:255',
          'habitos_especiais_ao_dormir' => 'required|max:255',
          'troca_letras_ou_fonemas' => 'required|max:255',
          'dificuldade_na_fala' => 'required|max:255',
          'dificuldade_na_visao' => 'required|max:255',
          'dificuldade_na_locomocao' => 'required|max:255',
          'movimentos_estereotipados' => 'required' ,
          'ecolalias' => 'required',
          'toma_banho_sozinho' => 'required|max:255',
          'escova_os_dentes_sozinho' => 'required|max:255',
          'usa_o_banheiro_sozinho' => 'required|max:255',
          'necessita_auxilio_para_se_vestir_ou_despir' => 'required|max:255',
          'idade_da_retirada_das_fraldas' => 'required',
          'atende_intervencoes_quando_esta_desobedecendo' => 'required|max:255',
          'chora_facil' => 'required|max:255',
          'recusa_auxílio' => 'required|max:255',
          'resistencia_ao_toque' => 'required|max:255',
          'crianca_estuda' => 'required',
          'faz_amigos_com_facilidade' => 'required|max:255',
          'adaptase_facilmente_ao_meio' => 'required|max:255',
          'companheiros_da_crianca_em_brincadeiras' => 'required|max:255',
          'obediente' => 'required',
          'dependente' => 'required',
          'comunicativo' => 'required',
          'agressivo' => 'required',
          'cooperativo' => 'required',
          'tranquilo' => 'required',
          'seguro' => 'required',
          'ansioso' => 'required',
          'emotivo' => 'required',
          'alegre' => 'required',
          'queixoso' => 'required',
          'insonia' => 'required',
          'pesadelos' => 'required',
          'hipersonia' => 'required',
          'dorme_sozinho' => 'required',
          'dorme_no_quarto_dos_pais' => 'required',
          'divide_quarto_com_alguem' => 'required|max:255',
          'medidas_disciplinares_empregadas_pelos_pais' => 'required',
          'reação_do_filho_ao_ser_contrariado' => 'required',
          'atitude_dos_pais_a_reacao_filho_contrareado' => 'required',
          'acompanhamento_medico' => 'required',
          'qual_medico_responsavel' => 'required|max:255',
          'diagnostico_medico' => 'required',
          'motivo_transferencia_escola_se_estudou_em_outra_antes' => 'required_if:ja_estudou_antes_em_outra_escola,Sim',
          'quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres' => 'required_if:recebe_orientacao_aos_deveres_em_casa,Sim',
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
