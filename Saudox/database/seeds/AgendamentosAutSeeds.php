<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgendamentosAutSeeds extends Seeder {
    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $nome = ['Maria', 'Miguel', 'Alice', 'Arthur', 'Laura', 'Heitor', 'Manuela', 'Bernardo', 'Valentina', 'Davi', 'Shophia', 'Pedro', 'Júlia', 'João', 'Lívia', 'Lucas', 'Beatriz', 'Gustavo', 'Maria Clara', 'Murilo', 'Beatriz', 'Isaac'];
        $sobrenome = ['Monteiro da Silva', 'Alves de Melo', 'Dias Cardoso', 'Ferreira dos Santos', 'da Silva Nascimento', 'Medeiros de Lima', 'Vieira Nazário', 'Dantas de Oliveira', 'Rodrigues dos Santos', 'Souza Pereira', 'Gomes Ribeiro', 'Martins Andrade'];
        $local_de_atendimento = ['Clínica', 'Residência do paciente'];
        $tipo_da_recorrencia = ['Primeira vez', 'Frequente'];
        $observacoes = ['Sem observações', 'Glicose baixa ao nascer'];

        //Gerando anamnese terapia ocupacional automaticamente
        for($i = 0; $i < $qtd_agendamentos; $i++){

            DB::table('agendamentos')->insert([
                'id_convenio' => rand(1,$qtd_convenios),
                'id_profissional' => rand(1,$qtd_profissionals),
                'nome' => $nome[rand(0, sizeof($nome)-1)] . " " . $sobrenome[rand(0, sizeof($sobrenome)-1)],
                'cpf' => (string)rand(10000000000,99999999999),
                'data_nascimento_paciente' => Carbon::now()->format('Y-m-d H:i:s'),
                'telefone' => (string)rand(10000000000,99999999999),
                'email' => Str::random(10).'@gmail.com',
                'id_endereco' => rand(1,$qtd_enderecos),
                'data_entrada' => Carbon::now()->format('Y-m-d H:i:s'),
                'data_saida' => Carbon::now()->format('Y-m-d H:i:s'),
                'local_de_atendimento' => $local_de_atendimento[rand(0, sizeof($local_de_atendimento)-1)],
                'recorrencia_do_agendamento' => rand(0,1) >= 0.5,
                'tipo_da_recorrencia' => $tipo_da_recorrencia[rand(0, sizeof($tipo_da_recorrencia)-1)],
                'observacoes' => $observacoes[rand(0, sizeof($observacoes)-1)],
                'status' => rand(0,1) >= 0.3,
            ]);
        }
    }
}
