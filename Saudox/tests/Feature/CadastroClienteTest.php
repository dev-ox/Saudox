<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;
use Illuminate\Support\Carbon;

class CadastroClienteTest extends TestCase {
    public $funcionario;
    private $paciente;
    private $password;

    public function setUp() : void {
        parent::setUp();

        $this->password = '123123123';

        $this->endereco = factory(Endereco::class)->create();
        $this->funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($this->password),
            'profissao' => 'psicologo;',
        ]);


        $this->paciente = [
            'login' => "literalmentequalquercoisa" . Carbon::now()->toString(),
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110'. Carbon::now()->toString(),
            'sexo' => 1,
            'data_nascimento' => '1999-05-10',
            'responsavel' => 'Maria Sueli',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Boa Vista',
            'nome_rua' => 'Rua Antonio carlos souto',
            'numero_casa' => '857',
            'descricao' => 'ali',
            'ponto_referencia' => 'lá',
        ];

        $this->loginFunc();
    }


    private function loginFunc() : void {
        $func = $this->funcionario;

        $resposta = $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $this->password,
        ]);

        $resposta->assertRedirect('/profissional/home');
    }

    private function logoutFunc() {
        $this->post(route('profissional.logout'), []);
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function profissionalDaSaudePodeAcessarCriacaoPaciente() {
        $resposta = $this->get(route('profissional.criar_paciente'));
        $resposta->assertOk();
        $resposta->assertSee("Cadastro de Paciente");
    }


    /* TODO: arrumar esse login de paciente */
    /** @test **/
    public function pacienteNaoPodeAcessarCriacaoPaciente() {

        $this->logoutFunc();

        $paciente = factory(Paciente::class)->create([
            'login' => "loginus",
            'password' => bcrypt("123123123"),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => "loginus",
            'password' => "123123123",
        ]);

        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $resposta = $this->get(route('profissional.criar_paciente'));
        $resposta->assertOk();
        $resposta->assertSee("Cadastro de Paciente");

        //$this->visit(route('profissional.criarpaciente'));
        //$this->seePageIs(route('paciente.home'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function profissionalPodeCriarPaciente() {
        $copia_pac = $this->paciente;

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), ['paciente' => $copia_pac]);
        $resposta->assertOk();
        $this->assertCount(1, Paciente::all());

        $paciente = Paciente::first();

        $this->post(route('profissional.logout'));

        $respostaLog = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $this->password,
        ]);

        $respostaLog->assertOk();
        $this->assertAuthenticatedAs($paciente);
        //$this->seePageIs(route('paciente.home'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function loginPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['login'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function senhaPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();
        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['password'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function senhaPacienteNaoPodeTerPoucosCaracteres() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['password'] = '123';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nomePacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['nome_paciente'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('nome');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeTerPoucosCaracteres() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '123456789';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeTerMuitosCaracteres() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '1234567891011';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '123456789UM';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }

    //TODO: teste de cpf valido (continhas modulo 11)


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function sexoPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['sexo'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    //TODO: esse teste não funciona, o sexo é um inteiro, e não uma string
    // isso vai ser tratado na view, então fica pro teste de browser
    /** @test **/
    public function sexoPacienteNaoPodeTerNumeros() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['sexo'] = 'Mascul1no';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function sexoPacienteNaoPodeSerInvalido() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['sexo'] = 'Genero do Tumblr';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nascimentoPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['data_nascimento'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function nascimentoPacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['data_nascimento'] = 'UM-05-1999';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function nascimentoPacientePrecisaTerFormatoCerto() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['data_nascimento'] = '1999-10-05';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function responsavelPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['responsavel'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('responsavel');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function numeroIrmaoPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['numero_irmaos'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function numeroIrmaoPacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['numero_irmaos'] = 'u';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nomePaiPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['nome_pai'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('nome_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nomeMaePacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['nome_mae'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('nome_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function telefonePaiPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function telefoneMaePacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefoneMaePacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = 'UM111111111';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefoneMaePacienteNaoPodeTerPoucosNumeros() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = '111111111';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefoneMaePacienteNaoPodeTerMuitosNumeros() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = '1111111111111111';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefonePaiPacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '666666666UM';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefonePaiPacienteNaoPodeTerPoucosNumeros() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '666666666';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefonePaiPacienteNaoPodeTerMuitosNumeros() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '66666666666666';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function emailPaiPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['email_pai'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function emailPaiPacienteNaoPodeSerInvalido() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['email_pai'] = 'satanasinferno.com';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function emailMaePacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['email_mae'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function emailMaePacienteNaoPodeSerInvalido() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['email_mae'] = 'emailtestegemail.com';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function idadePaiPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_pai'] ='';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadePaiPacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_pai'] = 'U';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadePaiPacienteNaoPodeSerGrande() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_pai'] = 300;

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function idadeMaePacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_mae'] ='';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadeMaePacienteNaoPodeTerLetras() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_mae'] = 'U';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadeMaePacienteNaoPodeSerGrande() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_mae'] = 300;

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function enderecoPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['id_endereco'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function naturalidadePacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['naturalidade'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);


        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function naturalidadePacienteNaoPodeTerNumeros() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['naturalidade'] = 'Brasi131r0';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function estadoCivilPaisPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['pais_sao_casados'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);



        $resposta->assertSessionHasErrors('pais_sao_casados');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function estadoCivilPaisPacienteDivorciadosNaoPodeFicarEmBranco() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['pais_sao_divorciados'] = '';

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);



        $resposta->assertSessionHasErrors('pais_sao_divorciados');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function tipoDeFilhoPacienteNaoPodeFicarEmBranco() {
        $this->loginFunc();
        $this->assertAuthenticatedAs($this->funcionario);
        $copia_pac = $this->paciente;
        $copia_pac['tipo_filho_biologico_adotivo'] = '';
        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);
        $resposta->assertSessionHasErrors('tipo_filho_biologico_adotivo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function clienteNaoPodeSerCadastradoDuasVezes() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $resposta->assertSessionHasErrors();
        $this->assertCount(1, Paciente::all());

        //Essa parte pode ser que seja desnecessária
        //Garantindo que os dados fiquem digitados no form:
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertTrue(session()->hasOldInput('nome_paciente'));
        $this->assertTrue(session()->hasOldInput('cpf'));
        $this->assertTrue(session()->hasOldInput('sexo'));
        $this->assertTrue(session()->hasOldInput('data_nascimento'));
        $this->assertTrue(session()->hasOldInput('responsavel'));
        $this->assertTrue(session()->hasOldInput('numero_irmaos'));
        $this->assertTrue(session()->hasOldInput('nome_pai'));
        $this->assertTrue(session()->hasOldInput('nome_mae'));
        $this->assertTrue(session()->hasOldInput('telefone_pai'));
        $this->assertTrue(session()->hasOldInput('telefone_mae'));
        $this->assertTrue(session()->hasOldInput('idade_pai'));
        $this->assertTrue(session()->hasOldInput('idade_mae'));
        $this->assertTrue(session()->hasOldInput('naturalidade'));
        $this->assertTrue(session()->hasOldInput('pais_sao_casados'));
        $this->assertTrue(session()->hasOldInput('pais_sao_divorciados'));
        $this->assertTrue(session()->hasOldInput('tipo_filho_biologico_adotivo'));

    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function mensagemSucessoApareceAoCadastrarCliente() {
        $this->loginFunc();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

        $value = 'sucesso';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $resposta->waitForText($value, $tempo);
        $resposta->assertOk();
        $this->assertCount(1, Paciente::all());

    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function funcionarioNaoPermitidoNaoPodeCriarPaciente() {

         $f = factory(Profissional::class)->create([
         'password' => bcrypt($this->password),
         'profissao' => 'Lutador',
         ]);

         $this->post(route('profissional.login'), [
              'login' => $f->login,
              'password' => $this->password,
         ]);

         $this->assertAuthenticatedAs($this->funcionario);

         $copia_pac = $this->paciente;

         $resposta = $this->post(route('profissional.criarpaciente'), ['paciente' => $copia_pac]);

         //$this->seePageIs(route('profissional.home'));
         $this->assertCount(0, Paciente::all());
    }


}
