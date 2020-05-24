<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CadastroFuncionarioTest extends TestCase
{

    /** @test **/
    public function funcionarioPodeSerAdicionado(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertOk();
        $this->assertCount(1, Funcionario::all());

        $profissional = Funcionario::first();
        $resposta->assertRedirect($profissional->path());
    }

    /** @test **/
    public function nomeNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => '',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('nome');
    }

    /** @test **/
    public function cpfNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('cpf');
    }

    /** @test **/
    public function rgNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('rg');
    }


    /** @test **/
    public function statusNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => '',
            'login' => '12345678910',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('status');
    }

    /** @test **/
    public function statusPrecisaSerValido(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Status-Invalido.png',
            'login' => '12345678910',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('status');
    }



    /** @test **/
    public function loginNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('login');
    }


    /** @test **/
    public function senhaNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('senha');
    }

    /** @test **/
    public function profissaoNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '123456789',
            'senha' => '123',
            'profissao' => '',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('profissao');
    }

    /** @test **/
    public function enderecoNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => '',
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('id_endereco');
    }


    /** @test **/
    public function telefoneNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function emailNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => '',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('email');
    }

    /** @test **/
    public function nacionalidadeNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => '',
        ]);

        $resposta->assertSessionHasErrors('nacionalidade');
    }

    /** @test **/
    public function estadoCivilNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => '',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('estado_civil');
    }

    /** @test **/
    public function estadoCivilPrecisaSerValido(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '1234556789',
            'senha' => '123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Na Pista',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('estado_civil');
    }
}
