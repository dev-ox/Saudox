<?php

use Illuminate\Database\Seeder;

class ConveniosAutSeeds extends Seeder {

    public function run()
    {
        include('database/seeds/SeedsConfig.php');


        DB::table('convenios')->insert([
            'nome_convenio' => 'Amil',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Capesaúde',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Bradesco Saúde',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'SulAmérica',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Unimed',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Saúde Caixa',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Cassi',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Petrobras',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'Postal Saúde',
            'numero_convenio' => rand(100, 999),
        ]);

        DB::table('convenios')->insert([
            'nome_convenio' => 'ABMED',
            'numero_convenio' => rand(100, 999),
        ]);
    }
}
