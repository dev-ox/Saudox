<?php

use Illuminate\Database\Seeder;

class AvaliacaoJudosAutSeeds extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        include('database/seeds/SeedsConfig.php');

        //Gerando avaliacao de judo automaticamente
        for($i = 0; $i < $qtd_avaliacao_judo; $i++){
          DB::table('avaliacao__judos')->insert([
            'id_paciente' => rand(1,$qtd_pacientes),
            'id_profissional' => rand(1,$qtd_profissionals),
            'diagnostico' => Str::random(100),
            'relacao_com_as_pessoas_judo' => Str::random(15),
            'resposta_emocional' => Str::random(15),
            'uso_do_corpo' => Str::random(15),
            'uso_de_objetos' => Str::random(15),
            'adaptacao_a_mudancas' => Str::random(15),
            'resposta_auditiva' => Str::random(15),
            'resposta_visual' => Str::random(15),
            'medo_ou_nervosismo' => Str::random(15),
            'comunicacao_verbal' => Str::random(15),
            'comunicacao_nao_verbal' => Str::random(15),
            'orienta_se_por_som' => Str::random(15),
            'reacao_ao_nao' => Str::random(15),
            'compreendem_comandos_simples_palavras_que_descrevam_objetos' => Str::random(15),
            'manipula_brinquedos_objetos' => Str::random(15),
            'equilibrio' => Str::random(15),
            'forca' => Str::random(15),
            'resistencia' => Str::random(15),
            'marcha' => Str::random(15),
            'agilidade' => Str::random(15),
            'coordenacao_motora_fina' => Str::random(15),
            'coordenacao_motora_grossa' => Str::random(15),
            'propriocepcao' => Str::random(15),
            'compreende_direcoes' => Str::random(15),
            'compreende_comandos_professoras' => Str::random(15),
            'concentracao' => Str::random(15),
            'comportamento_reflexo' => Str::random(15),
            'observacoes' => Str::random(100),
            'terapias' => Str::random(100),
            'objetivos' => Str::random(15),
            'tipo_da_aula' => Str::random(15),
          ]);
        }
    }
}
