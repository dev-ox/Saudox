<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Endereco;
use App\Profissional;
use Illuminate\Support\Facades\Auth;

class CadastroProfissionalTest extends TestCase {

    private $array_funcionario;
    private $funcionario_logado;
    private $password;

    public function setUp() : void {
        parent::setUp();

        $this->end = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->array_funcionario = [
            'nome' => 'Carlos Antônio',
            //CPF precisa ser valido aqui...
            'cpf' => '90653263163',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => 'loooogin',
            'password' => '123123123',
            'profissao' => ['Administrador', 'Psicopedagogo'],
            'numero_conselho' => '123',
            'telefone_1' => '12345678910',
            'telefone_2'=> '12345678911',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'solteiro',
            'nacionalidade' => 'Brasileiro',
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Boa Vista',
            'nome_rua' => 'Rua Antonio carlos souto',
            'numero_casa' => '857',
            'descricao' => 'ali',
            'ponto_referencia' => 'lá',
            'profissoes' => ['fonocoiso', 'admin'],
            'descricao_de_conhecimento_e_experiencia' => 'descricao_de_conhecimento_e_experiencia',
        ];

        $this->funcionario_logado = factory(Profissional::class)->create([
            'password' => bcrypt($this->password = '123123123'),
        ]);

        $this->login();
    }

    private function login() {

        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $this->funcionario_logado->login,
            'password' => $this->password,
        ]);
        $resposta->assertRedirect('/profissional/home');
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    public function funcionarioPodeSerAdicionado() {
        $this->withoutExceptionHandling();
        $num_funcionarios = Profissional::all()->count();
        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $this->array_funcionario);
        $resposta->assertSessionHasNoErrors();
        $this->assertCount($num_funcionarios + 1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function nomeNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();
        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['nome'] = '';
        $num_funcionarios = Profissional::all()->count();
        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);
        $resposta->assertSessionHasErrors('nome');
        $this->assertCount($num_funcionarios, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_01 */
    public function cpfNaoPodeFicarEmBranco() {
        $this->withoutExceptionHandling();
        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '';
        $num_funcionarios = Profissional::all()->count();
        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);
        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount($num_funcionarios, Profissional::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_01 */
    public function cpfNaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '123456789AO';

        $num_funcionarios = Profissional::all()->count();
        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount($num_funcionarios, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_01 */
    public function cpfNaoPodeSerMenorQueOnzeNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '123456789';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_01 */
    public function cpfNaoPodeSerMaiorQueOnzeNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['cpf'] = '1234567891011';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);
        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(1, Profissional::all());
    }

    //TODO: fazer validacao do cpf (modulo 11)




    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function rgNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['rg'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function rgNaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['rg'] = '123456SE';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('rg');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function loginNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['login'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function passwordNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['password'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_02 */
    public function passwordNaoPodeTerPoucosCaracteres() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['password'] = '123';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function profissaoNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['profissoes'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('profissoes');
        $this->assertCount(1, Profissional::all());
    }


    /* TODO: esse teste vai ter que ser quebrado em varios, um pra cada campo... */
    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function enderecoNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();


        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['id_endereco'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function telefoneNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function telefoneNaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '123456789DE';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function telefoneNaoPodeTerPoucosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '123456789';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function telefoneNaoPodeTerMuitosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_1'] = '1234567890101112';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_1');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function telefone2NaoPodeTerLetras() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_2'] = '123456789DE';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function telefone2NaoPodeTerPoucosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_2'] = '123456789';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function telefone2NaoPodeTerMuitosNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['telefone_2'] = '12345678910111213';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('telefone_2');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function emailNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['email'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('email');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function emailPrecisaTerFormatoCorreto() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['email'] = 'juniorgmail.com';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('email');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function nacionalidadeNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['nacionalidade'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);

        $resposta->assertSessionHasErrors('nacionalidade');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function nacionalidadeNaoPodeTerNumero() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['nacionalidade'] = 'Brasi131r0';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);


        $resposta->assertSessionHasErrors('nacionalidade');
        $this->assertCount(1, Profissional::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_03 */
    public function estadoCivilNaoPodeFicarEmBranco() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['estado_civil'] = '';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);


        $resposta->assertSessionHasErrors('estado_civil');
        $this->assertCount(1, Profissional::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function estadoCivilPrecisaSerValido() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['estado_civil'] = 'Na Pista';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);


        $resposta->assertSessionHasErrors('estado_civil');
        $this->assertCount(1, Profissional::all());
    }


    /* TODO: verificar esses 7 numeros... */
    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function conselhoNaoPodeTerMaisDeSeteNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['numero_conselho'] = '12345678';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }


    /* TODO: verificar esses 4 numeros... */
    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function conselhoNaoPodeTerMenosQueQuatroNumeros() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['numero_conselho'] = '123';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }

    /* TODO: verificar se é isso mesmo... */
    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638563 */
    /* TA_04 */
    public function conselhoNaoPodeTerLetra() {

        $this->withoutExceptionHandling();

        $copia_funcionario = $this->array_funcionario;
        $copia_funcionario['numero_conselho'] = 'Abacate';

        $resposta = $this->post(route("profissional.admin.cadastro.salvar"), $copia_funcionario);


        $resposta->assertSessionHasErrors('numero_conselho');
        $this->assertCount(1, Profissional::all());
    }
}
