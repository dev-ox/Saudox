<?php

use Illuminate\Database\Seeder;

class ProfissionaisAutSeeds extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Gerando profissionais automaticamente
        $qtd = 10;
        for($i = 0; $i < $qtd; $i++){
          DB::table('profissionais')->insert([
            'id' => $i,
            'nome' => Str::random(10),
            'cpf' => (string)rand(10000000000,99999999999),
            'rg' => (string)rand(1000000,9999999),
            'status' => rand(0,1) >= 0.5,
            'login' => Str::random(8),
            'senha' => Hash::make(Str::random(8)),
            'profissao' => Str::random(20),
            'numero_conselho' => rand(100000000,999999999),
            'id_endereco' => rand(0,9), // MUDAR RANGE A DEPENDER DA QUANTIDADE DE ENDERECOS GERADOS
            'telefone_1' => (string)rand(10000000000,99999999999),
            'telefone_2' => (string)rand(10000000000,99999999999),
            'email' => Str::random(10).'@gmail.com',
            'estado_civil' => Str::random(10),
            'nacionalidade' => Str::random(15),
            'descricao_de_conhecimento_e_experiencia' => Str::random(100),
          ]);
        }
    }
}
