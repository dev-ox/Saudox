<?php

use Illuminate\Database\Seeder;

class AvaliacaoJudosAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $diagnostico = ['Sem informação'];
        $comportamento_reflexo = ['Rápido', 'Lento'];
        $observacoes = ['Sem observações'];
        $terapias = ['Sem observações'];
        $objetivos = ['Sem observações'];
        $tipo_da_aula = ['Sem informação'];

        //Gerando avaliacao de judo automaticamente
        for($i = 0; $i < $qtd_avaliacao_judo; $i++){
            DB::table('avaliacao__judos')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'diagnostico' => $diagnostico[rand(0, sizeof($diagnostico)-1)],
                'relacao_com_as_pessoas_judo' => rand(0,10),
                'resposta_emocional' => rand(0,10),
                'uso_do_corpo' => rand(0,10),
                'uso_de_objetos' => rand(0,10),
                'adaptacao_a_mudancas' => rand(0,10),
                'resposta_auditiva' => rand(0,10),
                'resposta_visual' => rand(0,10),
                'medo_ou_nervosismo' => rand(0,10),
                'comunicacao_verbal' => rand(0,10),
                'comunicacao_nao_verbal' => rand(0,10),
                'orienta_se_por_som' => rand(0,10),
                'reacao_ao_nao' =>rand(0,10),
                'compreendem_comandos_simples_palavras_que_descrevam_objetos' => rand(0,10),
                'manipula_brinquedos_objetos' => rand(0,10),
                'equilibrio' => rand(0,10),
                'forca' => rand(0,10),
                'resistencia' => rand(0,10),
                'marcha' => rand(0,10),
                'agilidade' => rand(0,10),
                'coordenacao_motora_fina' => rand(0,10),
                'coordenacao_motora_grossa' => rand(0,10),
                'propriocepcao' => rand(0,10),
                'compreende_direcoes' => rand(0,10),
                'compreende_comandos_professoras' => rand(0,10),
                'concentracao' => rand(0,10),
                'comportamento_reflexo' => $comportamento_reflexo[rand(0, sizeof($comportamento_reflexo)-1)],
                'observacoes' => $observacoes[rand(0, sizeof($observacoes)-1)],
                'terapias' => $terapias[rand(0, sizeof($terapias)-1)],
                'objetivos' => $objetivos[rand(0, sizeof($objetivos)-1)],
                'tipo_da_aula' => $tipo_da_aula[rand(0, sizeof($tipo_da_aula)-1)],
            ]);
        }
    }
}
