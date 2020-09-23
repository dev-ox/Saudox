<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PacientesAutSeeder extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando pacientes automaticamente
        for($i = 0; $i < $qtd_pacientes; $i++){
            DB::table('pacientes')->insert([
                'login' => "PacienteLogin" . rand(1, 10000),
                'password' => Hash::make("123123123"),
                'nome_paciente' => Str::random(10),
                'cpf' => (string)rand(10000000000,99999999999),
                'sexo' => rand(0,1) >= 0.5,
                'data_nascimento' => Carbon::now()->format('Y-m-d H:i:s'),
                'responsavel' => Str::random(8),
                'numero_irmaos' => rand(0,10),
                'lista_irmaos' => texto(1),
                'nome_pai' => Str::random(10),
                'nome_mae' => Str::random(10),
                'telefone_pai' => (string)rand(10000000000,99999999999),
                'telefone_mae' => (string)rand(10000000000,99999999999),
                'email_pai' => Str::random(10).'@gmail.com',
                'email_mae' => Str::random(10).'@gmail.com',
                'idade_pai' => rand(20,100),
                'idade_mae' => rand(20,100),
                'id_endereco' => rand(1,$qtd_enderecos),
                'naturalidade' => Str::random(15),
                'pais_sao_casados' => rand(0,1) >= 0.5,
                'pais_sao_divorciados' => rand(0,1) >= 0.5,
                'reacao_sobre_a_relacao_pais_caso_divorciados' => texto(5),
                'vive_com_quem_caso_pais_divorciados'=> Str::random(20),
                'tipo_filho_biologico_adotivo' => rand(0,1) >= 0.5,
                'crianca_sabe_se_adotivo' => rand(0,1) >= 0.5,
                'reacao_quando_descobriu_se_adotivo' => texto(2),
            ]);
        }
    }
}
