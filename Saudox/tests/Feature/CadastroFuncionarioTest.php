<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('cpf');
    }


    /** @test **/
    public function cpfNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '123456789AO',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('cpf');
    }

    /** @test **/
    public function cpfNaoPodeSerMenorQueOnzeNumeros(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '123456789',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('cpf');
    }

    /** @test **/
    public function cpfNaoPodeSerMaiorQueOnzeNumeros(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);


        $end_id = Endereco::first();

        $resposta = $this->post('/funcionarios', [
            'nome' => 'Carlos Antônio',
            'cpf' => '1234567891011',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('rg');
    }

    /** @test **/
    public function rgNaoPodeTerLetras(){

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
            'rg' => '123456SE',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('rg');
    }

    /** @test **/
    public function rgNaoPodeTerMenosQueOitoNumeros(){

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
            'rg' => '123456',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('rg');
    }

    /** @test **/
    public function rgNaoPodeTerMaisQueOitoNumeros(){

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
            'rg' => '123456789',
            'status' => 'Ativo',
            'login' => '12345678910',
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('senha');
   }

   /** @test **/
   public function senhaNaoPodeTerPoucosCaracteres(){

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
           'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => '',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => '',
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
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
    public function telefoneNaoPodeTerLetras(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '123456789DE',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefoneNaoPodeTerMenosDeOnzeNumeros(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '1234567891',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefoneNaoPodeTerMaisDeOnzeNumeros(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '1234567891011',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefone2NaoPodeTerLetras(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'telefone_2' => '123456789DE',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_2');
    }

    /** @test **/
    public function telefone2NaoPodeTerMenosDeOnzeNumeros(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'telefone_2' => '123456789',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_2');
    }

    /** @test **/
    public function telefone2NaoPodeTerMaisDeOnzeNumeros(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'telefone_2' => '1234567891011',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('telefone_2');
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => '',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('email');
    }

    /** @test **/
    public function emailPrecisaTerPontoCom(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunio@gmail',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('email');
    }

    /** @test **/
    public function emailPrecisaTerArroba(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajuniogmail.com',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => '',
        ]);

        $resposta->assertSessionHasErrors('nacionalidade');
    }

    /** @test **/
    public function nacionalidadeNaoPodeTerNumero(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasi131r0',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Na Pista',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('estado_civil');
    }

    /** @test **/
    public function conselhoNaoPodeTerLetra(){

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
            'senha' => '123123123',
            'profissao' => 'Psicologo',
            'numero_conselho' => 'abacate',
            'id_endereco' => $end_id->id,
            'telefone_1' => '12345678910',
            'email' => 'carlosaajunior@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ]);

        $resposta->assertSessionHasErrors('numero_conselho');
    }
}
