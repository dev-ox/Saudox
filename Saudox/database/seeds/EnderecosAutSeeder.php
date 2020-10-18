<?php

use Illuminate\Database\Seeder;

class EnderecosAutSeeder extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $estado = ['PE'];
        $cidade = ['Garanhuns', 'Recife', 'Caruaru', 'Vitória de Santo Antão', 'Lajedo', 'Petrolina', 'Olinda', 'Jaboatão dos Guararapes', 'Jupi'];
        $bairro = ['Centro', 'Boa Vista', 'São José', 'Cohab', 'Santo Antônio', 'Boa Vista'];
        $nome_rua = ['Avenida Santo Antônio', 'Avenida Rui Barbosa', 'Avenida Boa Viagem', 'Rua Real da Torre', 'Rua dos Navegantes', 'Rua de Apipucos', 'Rua Amazonas', 'Rua Salvador de Sá', 'Rua Pessoa de Melo', 'Rua Castro Alves', 'Avenida Conselheiro Aguiar', 'Rua Padre Roma'];
        $descricao = ['Casa', 'Apartamento'];
        $ponto_referencia = ['Farmácia PagueMenos', 'Estádio Municipal de Futebol', 'Igreja Matriz', 'Educandário Santa Isabel', 'UFRPE/UAG', 'Pizzaria Avenida', 'Shopping RioMar', 'Polo Heliópolis', 'Módulo Esportivo', 'Posto Caçulinha'];

        //Gerando endereços automaticamente
        for($i = 0; $i < $qtd_enderecos; $i++){
            DB::table('enderecos')->insert([
                'estado' => $estado[rand(0, sizeof($estado)-1)],
                'cidade' => $cidade[rand(0, sizeof($cidade)-1)],
                'bairro' => $bairro[rand(0, sizeof($bairro)-1)],
                'nome_rua' =>  $nome_rua[rand(0, sizeof($nome_rua)-1)],
                'numero_casa' => ($i.$i.$i),
                'descricao' => $descricao[rand(0, sizeof($descricao)-1)],
                'ponto_referencia' => $ponto_referencia[rand(0, sizeof($ponto_referencia)-1)],
            ]);
        }
    }
}
