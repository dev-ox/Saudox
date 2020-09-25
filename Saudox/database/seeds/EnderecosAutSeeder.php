<?php

use Illuminate\Database\Seeder;

class EnderecosAutSeeder extends Seeder {

    public function run()
    {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Heliópolis',
            'nome_rua' => 'Rua João de Assis Moreno',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Bonanza Supermercado',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Heliópolis',
            'nome_rua' => 'Rua Paulo Barbosa Ferreira',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Panificadora Garanhuns',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Boa Vista',
            'nome_rua' => 'Rua Ailton Vilela de Moraes',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Posto Jatobá',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Recife',
            'bairro' => 'Dois Unidos',
            'nome_rua' => '2ª Travessa Córrego São José',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Farmácia Pague Menos',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Recife',
            'bairro' => 'Torrões',
            'nome_rua' => 'Rua Aracaju',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Escola Municipal',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Caruaru',
            'bairro' => 'Kennedy',
            'nome_rua' => 'Rua Professor Carlos Bezerra',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Matadouro Municipal',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Caruaru',
            'bairro' => 'Agamenom Magalhães',
            'nome_rua' => 'Rua Pastor Pedro Alves',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Sorveteria',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Caruaru',
            'bairro' => 'Petrópolis',
            'nome_rua' => 'Rua Manoel Lopes',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Creche',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Caruaru',
            'bairro' => 'Universitário',
            'nome_rua' => 'Avenida Madrid',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Farmácia',
        ]);

        DB::table('enderecos')->insert([
            'estado' => 'PE',
            'cidade' => 'Caruaru',
            'bairro' => 'Nossa Senhora das Dores',
            'nome_rua' => 'Travessa João Condé',
            'numero_casa' => rand(1, 999),
            'descricao' => texto(2),
            'ponto_referencia' => 'Estádio',
        ]);
    }
}
