<?php

use Illuminate\Database\Seeder;

class AnamneseFonoaudiologiasAutSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      include('database/seeds/SeedsConfig.php');

      //Gerando anamnese fonoaudiologia automaticamente
      for($i = 0; $i < $qtd_anamnese_fonoaudiologia; $i++){
        DB::table('anamnese_fonoaudiologias')->insert([
          'id_paciente' => rand(1,$qtd_pacientes),
          'id_profissional' => rand(1,$qtd_profissionals),
          'responsavel_pelo_paciente' => Str::random(10),
          'numero_de_irmaos' => rand(0,10),
          'posicao_bloco_familiar' => Str::random(10),
          'status_relacao_pais' => Str::random(100),
          'reacao_crianca_status_relacao_pais' => Str::random(100),
          'se_pais_separados_paciente_vive_com_quem' => Str::random(10),
          'crianca_desejada' => rand(0,1) >= 0.5,
          'idade_mae' => rand(20,100),
          'idade_pai' => rand(20,100),
          'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => Str::random(100),
          'duracao_da_gestacao' => Str::random(10),
          'fez_pre_natal' => Str::random(10),
          'tipo_parto' => Str::random(10),
          'complicacao_durante_parto' => Str::random(100),
          'foi_necessario_utilizar_algum_recurso' => Str::random(100),
          'mae_apresentou_algum_problema_durante_gravidez' => Str::random(100),
          'amamentacao_natural' => rand(0,1) >= 0.5,
          'atraso_ou_problema_na_fala' => rand(0,1) >= 0.5,
          'tem_enurese_noturna' => rand(0,1) >= 0.5,
          'desenvolvimento_motor_no_tempo_esperado' => rand(0,1) >= 0.5,
          'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => rand(0,1) >= 0.5,
          'letras_ou_fonemas_trocados' => Str::random(100),
          'fatos_que_afetaram_o_desenvolvimento_do_paciente' => Str::random(100),
          'ate_quantos_anos_usou_chupetas' => Str::random(10),
          'ja_fez_tratamento_fonoaudiologo' => rand(0,1) >= 0.5,
          'se_sim_tratamento_fono_anterior_onde' => Str::random(100),
          'se_sim_tratamento_fono_anterior_quando' => Str::random(100),
          'dificuldades_na_fala' => Str::random(100),
          'dificuldades_na_visao' => Str::random(100),
          'dificuldades_na_locomocao' => Str::random(100),
          'problemas_de_saude' => Str::random(100),
          'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => Str::random(100),
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
          'tem_dificuldades_de_aprendizagem' => Str::random(100),
          'repetiu_algum_ano' => rand(0,1) >= 0.5,
          'faz_amigos_com_facilidade' => Str::random(10),
          'adapta_se_facilmente_ao_meio' => Str::random(10),
          'companheiros_da_crianca_nas_brincadeiras' => Str::random(100),
          'distracoes_preferidas' => Str::random(100),
          'atitudes_sociais_predominantes' => Str::random(100),
          'comportamento_emocional' => Str::random(100),
          'comportamento_sono' => Str::random(100),
          'dorme_sozinho' => rand(0,1) >= 0.5,
          'dorme_no_quarto_dos_pais' => rand(0,1) >= 0.5,
          'medidas_disciplinares_empregadas_pelos_pais' => Str::random(100),
          'outras_ocorrencias_observacoes' => Str::random(100),
        ]);
      }
    }
}
