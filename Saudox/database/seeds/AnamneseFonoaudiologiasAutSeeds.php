<?php

use Illuminate\Database\Seeder;

class AnamneseFonoaudiologiasAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');
      include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

      //Gerando anamnese fonoaudiologia automaticamente
      for($i = 0; $i < $qtd_anamnese_fonoaudiologia; $i++){
        DB::table('anamnese_fonoaudiologias')->insert([
          'id_paciente' => rand(1,$qtd_pacientes),
          'id_profissional' => rand(1,$qtd_profissionals),
          'responsavel_pelo_paciente' => Str::random(10),
          'numero_de_irmaos' => rand(0,10),
          'posicao_bloco_familiar' => Str::random(10),
          'status_relacao_pais' => texto(5),
          'reacao_crianca_status_relacao_pais' => texto(5),
          'se_pais_separados_paciente_vive_com_quem' => Str::random(10),
          'crianca_desejada' => rand(0,1) >= 0.5,
          'idade_mae' => rand(20,100),
          'idade_pai' => rand(20,100),
          'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => texto(5),
          'duracao_da_gestacao' => Str::random(10),
          'fez_pre_natal' => Str::random(10),
          'tipo_parto' => Str::random(10),
          'complicacao_durante_parto' => texto(5),
          'foi_necessario_utilizar_algum_recurso' => texto(2),
          'mae_apresentou_algum_problema_durante_gravidez' => texto(5),
          'amamentacao_natural' => rand(0,1) >= 0.5,
          'atraso_ou_problema_na_fala' => rand(0,1) >= 0.5,
          'tem_enurese_noturna' => rand(0,1) >= 0.5,
          'desenvolvimento_motor_no_tempo_esperado' => rand(0,1) >= 0.5,
          'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => rand(0,1) >= 0.5,
          'letras_ou_fonemas_trocados' => texto(2),
          'fatos_que_afetaram_o_desenvolvimento_do_paciente' => texto(5),
          'ate_quantos_anos_usou_chupetas' => Str::random(10),
          'ja_fez_tratamento_fonoaudiologo' => rand(0,1) >= 0.5,
          'se_sim_tratamento_fono_anterior_onde' => texto(2),
          'se_sim_tratamento_fono_anterior_quando' => texto(2),
          'dificuldades_na_fala' => texto(10),
          'dificuldades_na_visao' => texto(10),
          'dificuldades_na_locomocao' => texto(10),
          'problemas_de_saude' => texto(10),
          'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => texto(2),
          'toma_banho_sozinho' => rand(0,1) >= 0.5,
          'escova_os_dentes_sozinho' => rand(0,1) >= 0.5,
          'usa_o_banheiro_sozinho' => rand(0,1) >= 0.5,
          'necessita_de_auxilio_para_se_vestir_ou_despir' => rand(0,1) >= 0.5,
          'atende_as_intervencoes_quando_esta_desobedecendo' => rand(0,1) >= 0.5,
          'chora_facil' => rand(0,1) >= 0.5,
          'recusa_auxilio' => rand(0,1) >= 0.5,
          'tem_resistencia_ao_toque' => Str::random(10),
          'serie_atual_na_escola' => Str::random(10),
          'alfabetizada' => rand(0,1) >= 0.5,
          'tem_dificuldades_de_aprendizagem' => texto(5),
          'repetiu_algum_ano' => rand(0,1) >= 0.5,
          'faz_amigos_com_facilidade' => Str::random(10),
          'adapta_se_facilmente_ao_meio' => Str::random(10),
          'companheiros_da_crianca_nas_brincadeiras' => texto(2),
          'distracoes_preferidas' => texto(2),
          'atitudes_sociais_predominantes' => texto(2),
          'comportamento_emocional' => texto(2),
          'comportamento_sono' => texto(2),
          'dorme_sozinho' => rand(0,1) >= 0.5,
          'dorme_no_quarto_dos_pais' => rand(0,1) >= 0.5,
          'medidas_disciplinares_empregadas_pelos_pais' => texto(10),
          'outras_ocorrencias_observacoes' => texto(20),
        ]);
      }
    }
}
