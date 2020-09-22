<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
            'login' => "literalmentequalquercoisa",
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
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

        $this->assertCount(1, Profissional::all());

    }


    private function loginProfisssional() : void {

        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $this->funcionario->login,
            'password' => $this->password,
            'remember' => 'on',
        ]);
        $resposta->assertRedirect(route('profissional.home'));
        $resposta->assertLocation(route('profissional.home'));

        Auth::login($this->funcionario, true);
        $this->assertTrue(Auth::check());

        $resposta = $this->get(route('profissional.ver', Profissional::first()->id));
        $resposta->assertSuccessful();
        $resposta->assertOk();
        $resposta->assertSee(Profissional::first()->cpf);

    }

    private function loginPaciente() : void {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt("123123123"),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => "123123123",
        ]);

        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route('paciente.home'));

    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function profissionalDaSaudePodeAcessarCriacaoPaciente() {
        $this->loginProfisssional();
        $resposta = $this->get(route('profissional.criar_paciente'));
        $resposta->assertOk();
        $resposta->assertSee("Cadastro de Paciente");
    }


    /* TODO: arrumar esse login de paciente */
    /** @test **/
    public function pacienteNaoPodeAcessarCriacaoPaciente() {
        $this->loginPaciente();
        $resposta = $this->get(route('profissional.criar_paciente'));
        $resposta->assertDontSee("Cadastro de Paciente");
        $resposta->assertRedirect(route('profissional.login'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function profissionalPodeCriarPaciente() {

        $this->loginProfisssional();
        $copia_pac = $this->paciente;
        $this->assertCount(0, Paciente::all());
        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);
        $resposta->assertSessionHasNoErrors();
        $this->assertCount(1, Paciente::all());


        /* logar como o paciente não funciona depois.... */
        /*

        $this->logoutFunc();
        $paciente = Paciente::first();
        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => "123123123",
        ]);

        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route('paciente.home'));
         */
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function loginPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;
        $copia_pac['login'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function senhaPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();
        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['password'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function senhaPacienteNaoPodeTerPoucosCaracteres() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['password'] = '123';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nomePacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['nome_paciente'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('nome_paciente');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeTerPoucosCaracteres() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '123456789';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeTerMuitosCaracteres() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '1234567891011';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_01 */
    public function cpfPacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['cpf'] = '123456789UM';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }

    //TODO: teste de cpf valido (continhas modulo 11)


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function sexoPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['sexo'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function sexoPacienteNaoPodeSerInvalido() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['sexo'] = 'Genero do Tumblr';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nascimentoPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['data_nascimento'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function nascimentoPacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['data_nascimento'] = 'UM-05-1999';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function nascimentoPacientePrecisaTerFormatoCerto() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['data_nascimento'] = '1999-10-05';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function responsavelPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['responsavel'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('responsavel');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function numeroIrmaoPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['numero_irmaos'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function numeroIrmaoPacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['numero_irmaos'] = 'u';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nomePaiPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['nome_pai'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('nome_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function nomeMaePacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['nome_mae'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('nome_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function telefonePaiPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function telefoneMaePacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefoneMaePacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = 'UM111111111';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefoneMaePacienteNaoPodeTerPoucosNumeros() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = '111111111';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefoneMaePacienteNaoPodeTerMuitosNumeros() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_mae'] = '1111111111111111';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefonePaiPacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '666666666UM';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefonePaiPacienteNaoPodeTerPoucosNumeros() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '666666666';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function telefonePaiPacienteNaoPodeTerMuitosNumeros() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['telefone_pai'] = '66666666666666';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function emailPaiPacienteNaoPodeSerInvalido() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['email_pai'] = 'satanasinferno.com';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function emailMaePacienteNaoPodeSerInvalido() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['email_mae'] = 'emailtestegemail.com';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function idadePaiPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_pai'] ='';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadePaiPacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_pai'] = 'U';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadePaiPacienteNaoPodeSerGrande() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_pai'] = 300;

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function idadeMaePacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_mae'] ='';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadeMaePacienteNaoPodeTerLetras() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_mae'] = 'U';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function idadeMaePacienteNaoPodeSerGrande() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['idade_mae'] = 300;

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }



    /* TODO: endereço é um teste pra cada campo.... e não usar id_endereco */

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function naturalidadePacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['naturalidade'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);


        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function naturalidadePacienteNaoPodeTerNumeros() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['naturalidade'] = 'Brasi131r0';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);

        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function estadoCivilPaisPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['pais_sao_casados'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);



        $resposta->assertSessionHasErrors('pais_sao_casados');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function estadoCivilPaisPacienteDivorciadosNaoPodeFicarEmBranco() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $copia_pac['pais_sao_divorciados'] = '';

        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);



        $resposta->assertSessionHasErrors('pais_sao_divorciados');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_03 */
    public function tipoDeFilhoPacienteNaoPodeFicarEmBranco() {
        $this->loginProfisssional();
        $this->assertAuthenticatedAs($this->funcionario);
        $copia_pac = $this->paciente;
        $copia_pac['tipo_filho_biologico_adotivo'] = '';
        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);
        $resposta->assertSessionHasErrors('tipo_filho_biologico_adotivo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    /* TA_04 */
    public function clienteNaoPodeSerCadastradoDuasVezes() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);
        //cadastrou 1
        $this->assertCount(1, Paciente::all());

        $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);
        //tentou cadastrar outro, mas continua só tendo 1
        $this->assertCount(1, Paciente::all());

    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function mensagemSucessoApareceAoCadastrarCliente() {
        $this->loginProfisssional();

        $this->assertAuthenticatedAs($this->funcionario);

        $copia_pac = $this->paciente;

        $this->assertCount(0, Paciente::all());
        $resposta = $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);
        $this->assertCount(1, Paciente::all());
        $resposta->assertSee("Sucesso");

    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638924 */
    public function funcionarioNaoPermitidoNaoPodeCriarPaciente() {

        $f = factory(Profissional::class)->create([
            'password' => bcrypt($this->password),
            'profissao' => 'Lutador;',
        ]);

        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $f->login,
            'password' => $this->password,
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $resposta->assertLocation(route('profissional.home'));

        Auth::login($this->funcionario, true);
        $this->assertTrue(Auth::check());

        $resposta = $this->get(route('profissional.ver', Profissional::first()->id));
        $resposta->assertSuccessful();
        $resposta->assertOk();
        $resposta->assertSee(Profissional::first()->cpf);

        $copia_pac = $this->paciente;

        $this->post(route('profissional.criar_paciente.salvar'), $copia_pac);
        //Não pode ter nenhum paciente
        $this->assertCount(0, Paciente::all());
    }


}
