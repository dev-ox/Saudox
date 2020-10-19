<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AvaliacaoNeuropsicologica;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(AvaliacaoNeuropsicologica::class, function (Faker $faker) {
    return [
        'id_paciente' => 1,
        'id_profissional' => 1,
        'queixa_principal' => 'Nao existe nenhuma queixa',
        'encaminhado_por' => 'asfosafohsahf',
        'participantes_durante_anaminese' => 'asfsafasf',
        'descricao_das_funcoes_cognitivas_avaliadas' => 'asfasfsafsa',
        'testes_neuropsicologicos' => 'asdasdasd',
        'recursos_complementares' => 'safasfasfasf',
        'dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias' => 'asdasdasdasd',
        'alimentacao_nos_dias_da_avalicao' => 'asfasfasfaf',
        'sono_nos_dias_da_avalicao' => 'safsafasfasfsaf',
        'higiene_nos_dias_da_avalicao' => 'asfasfasfsafsaf',
        'humor_nos_dias_da_avalicao' => 'ASFASFSAFASF',
        'areas_preservadas' => 'asfasfasfasfsa',
        'areas_lesionadas' => 'asfasfasfasfasf',
        'anexar_arquivos' => base64_encode(file_get_contents(addslashes(dirname(__FILE__) . "/../seeds/pdf_seed.pdf"))),
        'hipotese_diagnostica' => 'asfasfasfasfas',
        'dia_hora_devolutiva_aos_responsavel' => Carbon::now()->format('Y-m-d H:i:s'),
        'participantes' => 'safafasfasfasfa',
        'atividades_para_ser_feito_na_clinica' => "{}",
        'atividades_para_ser_feito_em_casa' => "{}",
        'sugestao_encaminhamento' => 'asfiaosfuashfioashfoais',
        'exames_clinicos_se_houver' => null,
    ];
});
