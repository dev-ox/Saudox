<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvaliacaoNeuropsicologicasAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando avaliacao neuropisicologica automaticamente
        for($i = 0; $i < $qtd_avaliacao_neuropisicologica; $i++){
            DB::table('avaliacao__neuropsicologicas')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'id_anaminese' => rand(1,$qtd_anamnese_gigante),
                'queixa_principal' => texto(20),
                'encaminhado_por' => Str::random(10),
                'participantes_durante_anaminese' => texto(5),
                'descricao_das_funcoes_cognitivas_avaliadas' => texto(5),
                'testes_neuropsicologicos' => texto(5),
                'recursos_complementares' => texto(5),
                'dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias' => texto(5),
                'alimentacao_nos_dias_da_avalicao' => texto(5),
                'sono_nos_dias_da_avalicao' => texto(5),
                'higiene_nos_dias_da_avalicao' => texto(5),
                'humor_nos_dias_da_avalicao' => texto(5),
                'areas_preservadas' => texto(5),
                'areas_lesionadas' => texto(5),
                'anexar_arquivos' => base64_encode(file_get_contents(addslashes(dirname(__FILE__) . "/pdf_seed.pdf"))),
                'hipotese_diagnostica' => texto(10),
                'dia_hora_devolutiva_aos_responsavel' => Carbon::now()->format('Y-m-d H:i:s'),
                'participantes' => texto(5),
                'atividades_para_ser_feito_na_clinica' => "{}",
                    'atividades_para_ser_feito_em_casa' => "{}",
                        'sugestao_encaminhamento' => Str::random(10),
                        'exames_clinicos_se_houver' => null,
                    ]);
                }
            }
        }
