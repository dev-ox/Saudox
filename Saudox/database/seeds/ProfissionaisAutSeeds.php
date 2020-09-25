<?php

use App\Profissional;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfissionaisAutSeeds extends Seeder
{

    public function run()
    {
        // Possíveis profissões
        $profissoes = Profissional::TodasProfissoes;

        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');


        DB::table('profissionals')->insert([
            'nome' => 'Ruan Yuri Melo',
            'cpf' => '24787461400',
            'rg' => '375448044',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Administrador; Fonoaudiologo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737610000',
            'telefone_2' => '87996250000',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Cristiane Fabiana Tânia Rodrigues',
            'cpf' => '12834657874',
            'rg' => '484111139',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'TerapeutaOcupacional',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737621122',
            'telefone_2' => '87996384568',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Arthur Heitor da Mata',
            'cpf' => '24787461402',
            'rg' => '375448042',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Administrador; Fonoaudiologo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737610000',
            'telefone_2' => '87996250000',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
            // 'id_profissional' => $id_profissional[0],
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Raimundo Marcos Vinicius Victor Carvalho',
            'cpf' => '29372764159',
            'rg' => '495596176',
            'status' => 'Demitido',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Neuropsicologo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737617896',
            'telefone_2' => '87996789647',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Ryan Ian César Rezende',
            'cpf' => '10313626227',
            'rg' => '497387025',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Neuropsicologo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737678899',
            'telefone_2' => '87996257415',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Ruan Yuri Melo',
            'cpf' => '24787461405',
            'rg' => '375448046',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Psicopedagogo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737610000',
            'telefone_2' => '87996250000',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Brenda Antonella Nascimento',
            'cpf' => '99206379470',
            'rg' => '385148392',
            'status' => 'Demitido',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Recepcionista',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737610796',
            'telefone_2' => '879982479696',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Olivia Stefany Josefa Farias',
            'cpf' => '05731493561',
            'rg' => '494664551',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Recepcionista',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737638899',
            'telefone_2' => '87996157799',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Mário Roberto Nascimento',
            'cpf' => '30882550454',
            'rg' => '229842549',
            'status' => 'Demitido',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Psicopedagogo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737624788',
            'telefone_2' => '87996278899',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

        DB::table('profissionals')->insert([
            'nome' => 'Heitor Cláudio Teixeira',
            'cpf' => '04332080742',
            'rg' => '448547958',
            'status' => 'Trabalhando',
            'login' => "ProfissionalLogin" . rand(1, 10000),
            'password' => Hash::make("123123123"),
            'profissao' => 'Psicopedagogo',
            'numero_conselho' => rand(100000000, 999999999),
            'id_endereco' => rand(1, $qtd_enderecos),
            'telefone_1' => '8737678899',
            'telefone_2' => '87999687788',
            'email' => Str::random(5) . '@gmail.com',
            'estado_civil' => 'Casado',
            'nacionalidade' => 'Brasileiro',
            'descricao_de_conhecimento_e_experiencia' => texto(20),
        ]);

    }
}
