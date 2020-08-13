<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use App\AvaliacaoJudo;
use App\Profissional;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory=>define(AvaliacaoJudo::class, function (Faker $faker),  {
    return [
        'id' => 0,
        'id_paciente' => 0,
        'id_profissional' => 0,
        'diagnostico' => 'Ta com câncer',
        'resposta_emocional' => 'Sofrendo pq ta com cancer',
        'uso_do_corpo' => 'Nao ta usando por causa do cancer',
        'uso_de_objetos' => 'infelizmente nao sabe usar * emoji de ok com os dedos *',
        'adaptacao_a_mudancas' => 'Mudou muito por causa do cancer ne',
        'resposta_auditiva' => 'Ouviu que ta com cancer e nao saiu nada do ouvido :o',
        'resposta_visual' => 'Aterrorizador',
        'medo_ou_nervosismo' => 'Ta, mas quem nao estaria ne',
        'comunicacao_verbal' => 'Verbal n sabe n, so adverbial',
        'orienta_se_por_som' => 'Nossa sim, o mlk ouve só as melhores do queen, brabo d+',
        'comunicacao_nao_verbal' => 'Ele sabe mexer os bracos, entao acho que conta',
        'orienta_se_por_som' => 'obvio',
        'reacao_ao_nao' => 'Ameaca sim matar',
        'compreendem_comandos_simples_palavras_que_descrevam_objetos' => 'nao, pois eh burro',
        'manipula_brinquedos_objetos' => 'sim, mlk eh doente d+, fica ameacando os brinquedo kkk',
        'equilibrio' => 'acima de tudo',
        'forca' => 'tem nao, o bixinho',
        'resistencia' => '+5',
        'marcha' => 'ré',
        'agilidade' => '+4',
        'coordenacao_motora_fina' => 'finissima caralhon',
        'coordenacao_motora_grossa' => 'rsrsrs',
        'propriocepcao' => 'nao sei o q eh issor',
        'compreende_direcoes' => 'nao, pois eh de direita',
        'compreende_comandos_professoras' => 'nao sei, nao sou professora',
        'concentracao' => 'nao',
        'comportamento_reflexo' => 'burro',
        'observacoes' => 'nenhuma',
        'terapias' => 'vai ter pia, vai ter torneira, vai ter tudo kkkkkk',
        'objetivos' => 'morrer',
        'tipo_da_aula' => 'ruim',

    ];
});
