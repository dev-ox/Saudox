<?php

use App\Profissional;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfissionaisAutSeeds extends Seeder {

    public function run() {
        // Possíveis profissões
        $profissoes = Profissional::TodasProfissoes;

        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $nome = ['Maria', 'Miguel', 'Alice', 'Arthur', 'Laura', 'Heitor', 'Manuela', 'Bernardo', 'Valentina', 'Davi', 'Shophia', 'Pedro', 'Júlia', 'João', 'Lívia', 'Lucas', 'Beatriz', 'Gustavo', 'Maria Clara', 'Murilo', 'Beatriz', 'Isaac'];
        $sobrenome = ['Monteiro da Silva', 'Alves de Melo', 'Dias Cardoso', 'Ferreira dos Santos', 'da Silva Nascimento', 'Medeiros de Lima', 'Vieira Nazário', 'Dantas de Oliveira', 'Rodrigues dos Santos', 'Souza Pereira', 'Gomes Ribeiro', 'Martins Andrade'];
        $estado_civil = ['Solteiro(a)', 'Casado(a)', 'Separado(a)', 'Divorciado(a)', 'Viúvo(a)', 'Amasiado(a)'];
        $nacionalidade = ['Brasileira', 'Chilena', 'Colombiana', 'Argentina', 'Cubana', 'Equatoriana', 'Egípcia', 'Inglesa', 'Francesa', 'Alemã', 'Grega', 'Holandesa', 'Italiana', 'Espanhola'];
        $descricao_de_conhecimento_e_experiencia = ['Biopsia muscular; Reabilitação neuromuscular; Especialização em Neurogerontologia; Pilates associado a Neurologia; Experiência em Gestão'];

        //Gerando profissionais automaticamente
        for($i = 0; $i < $qtd_profissionals; $i++){

            // Gera um conjunto de profissões para aquele profissional
            //  ja no formato correto de armazenamento no BD
            $res_keys = array_rand($profissoes, random_int(1, intval(count($profissoes)*0.6)));
            // Caso o random_int retorne 1 elemento, o array_rand não retorna um array, mas sim um int
            if(!is_array($res_keys)) {
                $res_keys = array($res_keys);
            }
            $str_prof = '';
            foreach($res_keys as $r) {
                $str_prof = $str_prof . $profissoes[$r] . ";";
            }

            DB::table('profissionals')->insert([
                'nome' => $nome[rand(0, sizeof($nome)-1)] . " " . $sobrenome[rand(0, sizeof($sobrenome)-1)],
                'cpf' => (string)rand(10000000000,99999999999),
                'rg' => (string)rand(1000000,9999999),
                'status' => rand(0,1) >= 0.2 ? Profissional::Trabalhando : Profissional::Demitido,
                'login' => "ProfissionalLogin" . rand(1, 10000),
                'password' => Hash::make("123123123"),
                'profissao' => $str_prof,
                'numero_conselho' => rand(100000000,999999999),
                'id_endereco' => rand(1,$qtd_enderecos),
                'telefone_1' => (string)rand(10000000000,99999999999),
                'telefone_2' => (string)rand(10000000000,99999999999),
                'email' => Str::random(10).'@gmail.com',
                'estado_civil' => $estado_civil[rand(0, sizeof($estado_civil)-1)],
                'nacionalidade' => $nacionalidade[rand(0, sizeof($nacionalidade)-1)],
                'descricao_de_conhecimento_e_experiencia' => $descricao_de_conhecimento_e_experiencia[rand(0, sizeof($descricao_de_conhecimento_e_experiencia)-1)],
            ]);
        }
    }
}
