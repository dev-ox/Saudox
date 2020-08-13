<?php

use Illuminate\Database\Seeder;

class ProfissionaisAutSeeds extends Seeder
{
    public function run()
    {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando profissionais automaticamente
        for($i = 0; $i < $qtd_profissionals; $i++){
          DB::table('profissionals')->insert([
            'nome' => Str::random(10),
            'cpf' => (string)rand(10000000000,99999999999),
            'rg' => (string)rand(1000000,9999999),
            'status' => rand(0,1) >= 0.5,
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => Str::random(20),
            'numero_conselho' => rand(100000000,999999999),
            'id_endereco' => rand(1,$qtd_enderecos),
            'telefone_1' => (string)rand(10000000000,99999999999),
            'telefone_2' => (string)rand(10000000000,99999999999),
            'email' => Str::random(10).'@gmail.com',
            'estado_civil' => Str::random(10),
            'nacionalidade' => Str::random(15),
            'descricao_de_conhecimento_e_experiencia' => texto(20),
          ]);
        }
    }
}
