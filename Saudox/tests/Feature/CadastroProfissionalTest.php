<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use \App\Endereco;
use App\Profissional;

class CadastroProfissionalTest extends TestCase
{

    private $end;

    private $array_funcionario;

    private $funcionario_logado;

    public function setUp() : void{
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
            'id_endereco' => $end->id,
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
    public function funcionarioPodeSerAdicionado(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertOk();
        $this->assertCount(2, Profissional::all());

        $profissional = Profissional::first();
        $resposta->assertRedirect($profissional->path());
    }

    /** @test **/
    public function nomeNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['nome'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('nome');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function cpfNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function cpfNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '123456789AO';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function cpfNaoPodeSerMenorQueOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '123456789';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function cpfNaoPodeSerMaiorQueOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '1234567891011';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);
        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }




    /** @test **/
    public function rgNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function rgNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '123456SE';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function rgNaoPodeTerMenosQueOitoNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '1234567';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function rgNaoPodeTerMaisQueOitoNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '123456789';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);
        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }



    /** @test **/
    public function statusNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['status'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('status');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function statusPrecisaSerValido(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['status'] = 'status_invalido.png';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('status');
        $this->assertCount(1, Profissional::all());
    }



    /** @test **/
    public function loginNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['login'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function passwordNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['password'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(1, Profissional::all());
   }

   /** @test **/
   public function passwordNaoPodeTerPoucosCaracteres(){

       $this->withoutExceptionHandling();

       $copiaFunc = $this->array_funcionario;
       $copiaFunc['password'] = '123';

       $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

       $resposta->assertSessionHasErrors('password');
       $this->assertCount(1, Profissional::all());
   }

    /** @test **/
    public function profissaoNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['profissao'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('profissao');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function enderecoNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();


        $copiaFunc = $this->array_funcionario;
        $copiaFunc['id_endereco'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function enderecoPrecisaExistir(){

        $this->withoutExceptionHandling();


        $copiaFunc = $this->array_funcionario;
        $copiaFunc['id_endereco'] = 666;

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function telefoneNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefoneNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '123456789DE';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefoneNaoPodeTerPoucosNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '1234567891';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefoneNaoPodeTerMuitosNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '1234567890101112';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefone2NaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_2'] = '123456789DE';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefone2NaoPodeTerPoucosNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_2'] = '123456789';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function telefone2NaoPodeTerMuitosNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_2'] = '12345678910111213';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function emailNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['email'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('email');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function emailPrecisaTerFormatoCorreto(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['email'] = 'juniorgmail.com';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('email');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function nacionalidadeNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['nacionalidade'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);

        $resposta->assertSessionHasErrors('nacionalidade');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function nacionalidadeNaoPodeTerNumero(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['nacionalidade'] = 'Brasi131r0';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);


        $resposta->assertSessionHasErrors('nacionalidade');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function estadoCivilNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['estado_civil'] = '';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);


        $resposta->assertSessionHasErrors('estado_civil');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function estadoCivilPrecisaSerValido(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['estado_civil'] = 'Na Pista';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);


        $resposta->assertSessionHasErrors('estado_civil');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function conselhoNaoPodeTerMaisDeSeteNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['numero_conselho'] = '12345678';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    public function conselhoNaoPodeTerMenosQueQuatroNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['numero_conselho'] = '123';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    public function conselhoNaoPodeTerLetra(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['numero_conselho'] = 'Abacate';

        $resposta = $this->post('/profissional/criarProfissional', $copiaFunc);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }
}
