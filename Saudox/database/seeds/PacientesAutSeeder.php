<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PacientesAutSeeder extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $nome = ['Maria', 'Miguel', 'Alice', 'Arthur', 'Laura', 'Heitor', 'Manuela', 'Bernardo', 'Valentina', 'Davi', 'Shophia', 'Pedro', 'Júlia', 'João', 'Lívia', 'Lucas', 'Beatriz', 'Gustavo', 'Maria Clara', 'Murilo', 'Beatriz', 'Isaac'];
        $nomeMasc = ['Miguel', 'Pedro', 'João', 'Enzo', 'Joaquim', 'Luciano', 'Ricardo', 'Aroldo', 'Paulo', 'José', 'Leonardo', 'Victor', 'Robson'];
        $nomeFem = ['Ana', 'Paula', 'Juliana', 'Aparecida', 'Luzia', 'Júlia', 'Francisca', 'Helena', 'Larissa', 'Cláudia', 'Monique', 'Cristina', 'Patrícia'];
        $sobrenome = ['Monteiro da Silva', 'Alves de Melo', 'Dias Cardoso', 'Ferreira dos Santos', 'da Silva Nascimento', 'Medeiros de Lima', 'Vieira Nazário', 'Dantas de Oliveira', 'Rodrigues dos Santos', 'Souza Pereira', 'Gomes Ribeiro', 'Martins Andrade'];
        $responsavel = ['Mãe', 'Pai', 'Tio', 'Tia', 'Avó', 'Avô', 'Irmão', 'Irmã', 'Prima', 'Primo'];
        $naturalidade = ['Garanhuns/PE', 'Caruaru/PE', 'Recife/PE', 'Petrolina/PE', 'Salgueiro/PE', 'Lajedo/PE', 'Angelim/PE', 'Vitória de Santos Antão/PE', 'São Paulo/SP', 'Rio de Janeiro/RJ', 'Salvador/BA', 'Belo Horizonte/MG', 'Maceió/AL'];
        $reacao_sobre_a_relacao_pais_caso_divorciados = ['Indiferente', 'Agitado', 'Problemas escolares'];
        $reacao_quando_descobriu_se_adotivo = ['Indiferente', 'Sentiu-se rejeitado', 'Medo', 'Insegurança', 'Assustado'];


        //Gerando pacientes automaticamente
        for($i = 0; $i < $qtd_pacientes; $i++){

            $lista_irmaos = '';
            $numero_irmaos = rand(0, 10);
            for ($j=0; $j<$numero_irmaos; $j++){
                $lista_irmaos = $lista_irmaos . $nome[rand(0, sizeof($nome)-1)];
                $lista_irmaos = $lista_irmaos . " " . $sobrenome[rand(0, sizeof($sobrenome)-1)];
                $lista_irmaos = $lista_irmaos . ', ';
            }
            $lista_irmaos = substr($lista_irmaos, 0, -2);

            DB::table('pacientes')->insert([
                'login' => "PacienteLogin" . rand(1, 10000),
                'password' => Hash::make("123123123"),
                'nome_paciente' => $nome[rand(0, sizeof($nome)-1)] . " " . $sobrenome[rand(0, sizeof($sobrenome)-1)],
                'cpf' => (string)rand(10000000000,99999999999),
                'sexo' => rand(0,1) >= 0.5,
                'data_nascimento' => Carbon::now()->format('Y-m-d H:i:s'),
                'responsavel' => $responsavel[rand(0, sizeof($responsavel)-1)],
                'numero_irmaos' => $numero_irmaos,
                'lista_irmaos' => $lista_irmaos,
                'nome_pai' => $nomeMasc[rand(0, sizeof($nomeMasc)-1)] . " " . $sobrenome[rand(0, sizeof($sobrenome)-1)],
                'nome_mae' => $nomeFem[rand(0, sizeof($nomeFem)-1)] . " " . $sobrenome[rand(0, sizeof($sobrenome)-1)],
                'telefone_pai' => (string)rand(10000000000,99999999999),
                'telefone_mae' => (string)rand(10000000000,99999999999),
                'email_pai' => Str::random(10).'@gmail.com',
                'email_mae' => Str::random(10).'@gmail.com',
                'idade_pai' => rand(20,100),
                'idade_mae' => rand(20,100),
                'id_endereco' => rand(1,$qtd_enderecos),
                'naturalidade' => $naturalidade[rand(0, sizeof($naturalidade)-1)],
                'pais_sao_casados' => rand(0,1) >= 0.5,
                'pais_sao_divorciados' => rand(0,1) >= 0.5,
                'reacao_sobre_a_relacao_pais_caso_divorciados' => $reacao_sobre_a_relacao_pais_caso_divorciados[rand(0, sizeof($reacao_sobre_a_relacao_pais_caso_divorciados)-1)],
                'vive_com_quem_caso_pais_divorciados'=> $responsavel[rand(0, sizeof($responsavel)-1)],
                'tipo_filho_biologico_adotivo' => rand(0,1) >= 0.5,
                'crianca_sabe_se_adotivo' => rand(0,1) >= 0.5,
                'reacao_quando_descobriu_se_adotivo' => $reacao_quando_descobriu_se_adotivo[rand(0, sizeof($reacao_quando_descobriu_se_adotivo)-1)],
            ]);
        }
    }
}
