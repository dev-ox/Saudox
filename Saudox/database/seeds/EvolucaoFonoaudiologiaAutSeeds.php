<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvolucaoFonoaudiologiaAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');

        //Gerando evolução fonoaudiologia automaticamente
        for($i = 0; $i < $qtd_fonoaudiologia; $i++){
            DB::table('evolucao_fonoaudiologias')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'id_evolucao_anterior' => null, //rand(1,$qtd_fonoaudiologia),
                'data_evolucao' => Carbon::now()->format('Y-m-d H:i:s'),
                'processo_perceptual_visualizacao' => Str::random(10),
                'melhora_processo_perceptual_visualizacao' => rand(0,1) >= 0.5,
                'dificuldade_mantida_no_processo_perceptual_vizualizacao' => rand(0,1) >= 0.5,
                'processo_perceptual_audibilizacao' => Str::random(10),
                'melhora_processo_perceptual_audibilizacao' => rand(0,1) >= 0.5,
                'dificuldade_mantida_processo_perceptual_audibilizacao' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_cor' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_cor' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_cor' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_forma' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_forma' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_forma' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_tamanho' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_tamanho' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_tamanho' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_espaco' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_espaco' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_espaco' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_igual_diferente' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_igual_diferente' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_igual_diferente' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_esquerda_direita' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_esquerda_direita' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_esquerda_direita' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_esquema_corporal' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_esquema_corporal' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_esquema_corporal' => rand(0,1) >= 0.5,
                'funcoes_basicas_linguagem_dominancia_lateral' => Str::random(10),
                'melhora_funcoes_basicas_linguagem_dominancia_lateral' => rand(0,1) >= 0.5,
                'dificuldade_mantida_funcoes_basicas_linguagem_dominancia_lateral' => rand(0,1) >= 0.5,
                'resolucao_problemas' => Str::random(10),
                'melhora_resolucao_problemas' => rand(0,1) >= 0.5,
                'dificuldade_mantida_resolucao_problemas' => rand(0,1) >= 0.5,
                'compreensao_ordens' => Str::random(10),
                'melhora_compreensao_ordens' => rand(0,1) >= 0.5,
                'dificuldade_mantida_compreensao_ordens' => rand(0,1) >= 0.5,
                'memoria_imediata_auditiva' => Str::random(10),
                'melhora_memoria_imediata_auditiva' => rand(0,1) >= 0.5,
                'dificuldade_mantida_memoria_imediata_auditiva' => rand(0,1) >= 0.5,
                'memoria_mediativa_auditiva' => Str::random(10),
                'melhora_memoria_mediativa_auditiva' => rand(0,1) >= 0.5,
                'dificuldade_mantida_memoria_mediativa_auditiva' => rand(0,1) >= 0.5,
                'memoria_imediata_visual' => Str::random(10),
                'melhora_memoria_imediata_visual' => rand(0,1) >= 0.5,
                'dificuldade_mantida_memoria_imediata_visual' => rand(0,1) >= 0.5,
                'memoria_mediativa_visual' => Str::random(10),
                'melhora_memoria_mediativa_visual' => rand(0,1) >= 0.5,
                'dificuldade_mantida_memoria_mediativa_visual' => rand(0,1) >= 0.5,
                'habilidades_comunicativas' => Str::random(10),
                'melhora_habilidades_comunicativas' => rand(0,1) >= 0.5,
                'dificuldade_mantida_habilidades_comunicativas' => rand(0,1) >= 0.5,
                'comunicacao_oral_sintatico_semantica' => Str::random(10),
                'melhora_comunicacao_oral_sintatico_semantica' => rand(0,1) >= 0.5,
                'dificuldade_mantida_comunicacao_oral_sintatico_semantica' => rand(0,1) >= 0.5,
                'comunicacao_oral_articulacao' => Str::random(10),
                'melhora_comunicacao_oral_articulacao' => rand(0,1) >= 0.5,
                'dificuldade_mantida_comunicacao_oral_articulacao' => rand(0,1) >= 0.5,
                'comunicacao_oral_fluencia' => Str::random(10),
                'melhora_comunicacao_oral_fluencia' => rand(0,1) >= 0.5,
                'dificuldade_mantida_comunicacao_oral_fluencia' => rand(0,1) >= 0.5,
                'comunicacao_oral_voz' => Str::random(10),
                'melhora_comunicacao_oral_voz' => rand(0,1) >= 0.5,
                'dificuldade_mantida_comunicacao_oral_voz' => rand(0,1) >= 0.5,
                'linguagem' => Str::random(10),
                'melhora_linguagem' => rand(0,1) >= 0.5,
                'dificuldade_mantida_linguagem' => rand(0,1) >= 0.5,
            ]);
        }
    }
}
