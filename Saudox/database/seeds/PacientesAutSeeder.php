<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PacientesAutSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $qtd = 10;
        for($i = 0; $i < $qtd; $i++){
          DB::table('pacientes')->insert([
            'login' => Str::random(8),
            'senha' => Hash::make(Str::random(8)),
            'nome_paciente' => Str::random(10),
            'cpf' => (string)rand(10000000000,99999999999),
            'sexo' => rand(0,1) >= 0.5,
            'data_nascimento' => Carbon::now()->format('Y-m-d H:i:s'),
            'responsavel' => Str::random(8),
            'numero_irmaos' => rand(0,10),
            'lista_irmaos' => Str::random(30),
            'nome_pai' => Str::random(10),
            'nome_mae' => Str::random(10),
            'telefone_pai' => (string)rand(10000000000,99999999999),
            'telefone_mae' => (string)rand(10000000000,99999999999),
            'email_pai' => Str::random(10).'@gmail.com',
            'email_mae' => Str::random(10).'@gmail.com',
            'idade_pai' => rand(20,100),
            'idade_mae' => rand(20,100),
            'id_endereco' => rand(1,10), // MUDAR RANGE A DEPENDER DA QUANTIDADE DE ENDERECOS GERADOS
            'naturalidade' => Str::random(15),
            'pais_sao_casados' => rand(0,1) >= 0.5,
            'pais_sao_divorciados' => rand(0,1) >= 0.5,
            'reacao_sobre_a_relacao_pais_caso_divorciados' => Str::random(100),
            'vive_com_quem_caso_pais_divorciados'=> Str::random(20),
            'tipo_filho_biologico_adotivo' => rand(0,1) >= 0.5,
            'crianca_sabe_se_adotivo' => rand(0,1) >= 0.5,
            'reacao_quando_descobriu_se_adotivo' => Str::random(100),
          ]);
        }
    }
}
