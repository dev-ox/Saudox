<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgendamentosAutSeeds extends Seeder
{
    public function run()
    {
      include('database/seeds/SeedsConfig.php');
      include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

      //Gerando anamnese terapia ocupacional automaticamente
      for($i = 0; $i < $qtd_agendamentos; $i++){
        DB::table('agendamentos')->insert([
          'id_convenio' => rand(1,$qtd_convenios),
          'id_profissional' => rand(1,$qtd_profissionals),
          'nome' => Str::random(10),
          'cpf' => (string)rand(10000000000,99999999999),
          'data_nascimento_paciente' => Carbon::now()->format('Y-m-d H:i:s'),
          'telefone' => (string)rand(10000000000,99999999999),
          'email' => Str::random(10).'@gmail.com',
          'id_endereco' => rand(1,$qtd_enderecos),
          'data_entrada' => Carbon::now()->format('Y-m-d H:i:s'),
          'data_saida' => Carbon::now()->format('Y-m-d H:i:s'),
          'local_de_atendimento' => Str::random(10),
          'recorrencia_do_agendamento' => rand(0,1) >= 0.5,
          'tipo_da_recorrencia' => Str::random(10),
          'observacoes' => texto(5),
          'status' => rand(0,1) >= 0.3,
        ]);
      }
    }
}
