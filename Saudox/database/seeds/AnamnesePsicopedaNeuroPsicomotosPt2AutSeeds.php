<?php

use Illuminate\Database\Seeder;

class AnamnesePsicopedaNeuroPsicomotosPt2AutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');
      include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

      //Gerando anamnese gigante parte 2 automaticamente
      for($i = 0; $i < $qtd_anamnese_gigante; $i++){
        DB::table('anamnese__pnp__pt2s')->insert([
          'id_tp' => rand(1,$qtd_anamnese_gigante),
          'teve_otite_infancia' => Str::random(10),
          'teve_adenoides_infancia' => Str::random(10),
          'teve_amigdalites_infancia' => Str::random(10),
          'teve_alergias_infancia' => Str::random(10),
          'teve_acidentes_infancia' => Str::random(10),
          'teve_convulsoes_infancia' => Str::random(10),
          'teve_febres_infancia' => Str::random(10),
          'foi_internado_se_sim_por_quanto_tempo' => Str::random(10),
          'ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia' => texto(5),
          'quedas_e_traumatismos' => rand(0,1) >= 0.5,
          'teve_complicacao_com_vacina_se_sim_qual' => Str::random(10),
          'audicao_e_visao' => Str::random(10),
          'usa_oculos' => rand(0,1) >= 0.5,
          'se_usa_oculos_leva_para_escola' => rand(0,1) >= 0.5,
          'sono_tranquilo_se_for_agitado_quando_e_qual_frequencia' => texto(5),
          'range_dentes' => rand(0,1) >= 0.5,
          'terror_noturno' => rand(0,1) >= 0.5,
          'sonambulistmo' => rand(0,1) >= 0.5,
          'enurese' => rand(0,1) >= 0.5,
          'fala_durante_sono' => rand(0,1) >= 0.5,
          'dorme_so_se_nao_com_quem_dorme' => texto(5),
          'ate_quando_dormiu_com_os_pais' => Str::random(10),
          'como_foi_a_separacao_dormida_com_os_pais' => Str::random(10),
          'habitos_especiais_sono' => Str::random(10),
          'com_que_idade_sustentou_a_cabeca' => Str::random(10),
          'com_que_idade_sentou' => Str::random(10),
          'com_que_idade_engatinhou' => Str::random(10),
          'forma_de_engatinhar' => Str::random(10),
          'com_que_idade_comecou_a_andar' => Str::random(10),
          'caia_muito' => Str::random(10),
          'deixa_cair_as_coisas' => Str::random(10),
          'esbarra_muito' => Str::random(10),
          'acredita_que_apresenta_alguma_dificuldade_motora' => Str::random(10),
          'controle_vesical_bexiga' => Str::random(10),
          'controle_anal_fezes' => Str::random(10),
          'foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família' => texto(10),
          'balbucios' => Str::random(10),
          'quando_comecou_a_falar' => Str::random(10),
          'como_os_pais_reagiram_fala' => Str::random(10),
          'apresentou_problema_na_fala_se_sim_quais' => Str::random(10),
          'compreende_ordens' => Str::random(10),
          'presenca_de_bilinguismo_em_casa' => Str::random(10),
          'como_a_crianca_se_comunica' => Str::random(10),
          'apresenta_salivacao_no_canto_da_boca' => Str::random(10),
          'idade_entrou_na_escola' => Str::random(10),
          'adaptouse_bem' => Str::random(10),
          'metodo_alfabetizacao' => Str::random(10),
          'mudou_de_escola_se_sim_em_qual_serie_e_idade' => Str::random(10),
          'escola_atual' => Str::random(10),
          'metodo_alfabetizacao_atual' => Str::random(10),
          'serie' => Str::random(10),
          'turno' => Str::random(10),
          'professor' => Str::random(10),
          'faz_as_tarefaz_sozinho_se_nao_com_quem_faz' => Str::random(10),
          'descricao_momento_licoes' => Str::random(10),
          'opniao_paterna_sobre_escola' => Str::random(10),
          'opniao_materna_sobre_tarefas' => Str::random(10),
          'fato_importante_vida_escolar' => Str::random(10),
          'queixas_frequentes' => texto(20),
          'tem_dificuldades_para' => texto(20),
          'conhece_tais_coisas' => Str::random(10),
          'apresenta_tiques_se_sim_quais' => Str::random(10),
          'como_pegua_o_lapis' => Str::random(10),
          'forca_da_escrita' => Str::random(10),
          'como_acha_que_surgiu_o_problema_a_que_fatores_atribuem' => texto(20),
          'outras_questoes' => Str::random(10),
          'escolas_que_frequentou' => texto(10),
          'repetiu_ano_se_sim_qual_e_porque' => Str::random(10),
          'humor_habitual' => Str::random(10),
          'prefere_brincar_sozinho_ou_em_grupos' => Str::random(10),
          'estranha_mudancas_de_ambiente' => Str::random(10),
          'adaptase_facilmente_ao_meio' => rand(0,1) >= 0.5,
        ]);
      }
    }
}
