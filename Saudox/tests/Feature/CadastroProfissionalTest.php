<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Endereco;
use App\Profissional;

class CadastroProfissionalTest extends TestCase {

    private $end;

    private $array_funcionario;

    private $funcionario_logado;

    public function setUp() : void {
        parent::setUp();

        $this->end = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->array_funcionario = [
            'nome' => 'Carlos Antônio',
            'cpf' => '12345678910',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => '12345678910',
            'password' => '123123123',
            'profissao' => 'Psicologo',
            'numero_conselho' => '123',
            'id_endereco' => $this->end->id,
            'telefone_1' => '12345678910',
            'telefone_2'=> '12345678911',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'Solteiro',
            'nacionalidade' => 'Brasileiro',
        ];

        $this->funcionario_logado = factory(Profissional::class)->create([
             'password' => bcrypt($password = '123123123'),
             'profissao' => 'Administrador',
         ]);


         $this->post('/profissional/login', [
              'login' => $this->funcionario_logado->login,
              'password' => $this->funcionario_logado->$password,
          ]);


    }

// TODO: Alterar as rotas de criação de funcionario

    /** @test **/
    public function funcionarioPodeSerAdicionado() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertOk();
        $this->assertCount(2, Profissional::all());

        $profissional = Profissional::first();
        $resposta->assertRedirect($profissional->path());
    }

    /** @test **/
    public function nomeNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['nome'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('nome');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function cpfNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function cpfNaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '123456789AO';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function cpfNaoPodeSerMenorQueOnzeNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '123456789';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function cpfNaoPodeSerMaiorQueOnzeNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '1234567891011';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);
        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }




    /** @test **/
    public function rgNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['rg'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function rgNaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['rg'] = '123456SE';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function rgNaoPodeTerMenosQueOitoNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['rg'] = '1234567';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function rgNaoPodeTerMaisQueOitoNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['rg'] = '123456789';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);
        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }



    /** @test **/
    public function statusNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['status'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('status');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function statusPrecisaSerValido() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['status'] = 'status_invalido.png';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('status');
        $this->assertCount(1, Profissional::all());
    }



    /** @test **/
    public function loginNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['login'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function passwordNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['password'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(1, Profissional::all());
   }

   /** @test **/
   public function passwordNaoPodeTerPoucosCaracteres() {

       $this->withoutExceptionHandling();

       $copia_funcionario = $this->array_funcionario;
       $copia_funcionario['password'] = '123';

       $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

       $resposta->assertSessionHasErrors('password');
       $this->assertCount(1, Profissional::all());
   }

    /** @test **/
    public function profissaoNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['profissao'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('profissao');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function enderecoNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();


        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['id_endereco'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function enderecoPrecisaExistir() {

        $this->withoutExceptionHandling();


        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['id_endereco'] = 666;

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function telefoneNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefoneNaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '123456789DE';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefoneNaoPodeTerPoucosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '1234567891';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefoneNaoPodeTerMuitosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '1234567890101112';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefone2NaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_2'] = '123456789DE';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefone2NaoPodeTerPoucosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_2'] = '123456789';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefone2NaoPodeTerMuitosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_2'] = '12345678910111213';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function emailNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['email'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('email');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function emailPrecisaTerFormatoCorreto() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['email'] = 'juniorgmail.com';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('email');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function nacionalidadeNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['nacionalidade'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);

        $resposta->assertSessionHasErrors('nacionalidade');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function nacionalidadeNaoPodeTerNumero() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['nacionalidade'] = 'Brasi131r0';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);


        $resposta->assertSessionHasErrors('nacionalidade');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function estadoCivilNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['estado_civil'] = '';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);


        $resposta->assertSessionHasErrors('estado_civil');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function estadoCivilPrecisaSerValido() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['estado_civil'] = 'Na Pista';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);


        $resposta->assertSessionHasErrors('estado_civil');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function conselhoNaoPodeTerMaisDeSeteNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['numero_conselho'] = '12345678';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function conselhoNaoPodeTerMenosQueQuatroNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['numero_conselho'] = '123';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function conselhoNaoPodeTerLetra() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['numero_conselho'] = 'Abacate';

        $resposta = $this->post(route("profissional.cadastro"), $copia_funcionario);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }
}
