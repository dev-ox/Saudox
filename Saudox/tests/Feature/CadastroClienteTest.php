<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class CadastroClienteTest extends TestCase
{
    public $funcionario;

    private $endereco;

    private $paciente;

    public function setUp() : void {
        parent::setUp();

        $this->funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

        $this->endereco = factory(Endereco::class)->create();

        $this->paciente = [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
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
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ];
    }


    private function loginFunc() : void {
        $func = $this->$funcionario;

        $resposta = $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
        ]);
    }


    /** @test **/
    public function admPodeAcessarCriacaoPaciente()
    {
        $func = $this->$funcionario;

        $resposta = $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);


        $this->visit('/profissional/criarpaciente');
        $this->seePageIs('/profissional/criarpaciente');
    }

    /** @test **/
    public function profissionalDaSaudePodeAcessarCriacaoPaciente()
    {

        $func = $this->$funcionario;

        $resposta = $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);


        $this->visit('/profissional/criarpaciente');
        $this->seePageIs('/profissional/criarpaciente');
    }

    /** @test **/
    public function pacienteNaoPodeAcessarCriacaoPaciente()
    {

        $pac = $this->$paciente;

        $paciente = factory(Paciente::class)->create($pac);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);


        $this->visit('/profissional/criarpaciente');
        $this->seePageIs('/paciente/home');
    }

    /** @test **/
    public function profissionalPodeCriarPaciente()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertOk();
        $this->assertCount(1, Paciente::all());

        $paciente = Paciente::first();

        $this->post('/profissional/logout');

        $respostaLog = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $respostaLog->assertOk();
        $this->assertAuthenticatedAs($paciente);
        $this->seePageIs('/paciente/home');
    }

    /** @test **/
    public function loginPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['login'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function senhaPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();
        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['password'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function senhaPacienteNaoPodeTerPoucosCaracteres()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['password'] = '123';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function nomePacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['nome_paciente'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('nome');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function cpfPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['cpf'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function cpfPacienteNaoPodeTerPoucosCaracteres()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['cpf'] = '123456789';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function cpfPacienteNaoPodeTerMuitosCaracteres()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['cpf'] = '1234567891011';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function cpfPacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['cpf'] = '123456789UM';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function sexoPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['sexo'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function sexoPacienteNaoPodeTerNumeros()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['sexo'] = 'Mascul1no';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function sexoPacienteNaoPodeSerInvalido()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['sexo'] = 'Genero do Tumblr';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nascimentoPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['data_nascimento'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nascimentoPacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['data_nascimento'] = 'UM-05-1999';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nascimentoPacientePrecisaTerFormatoCerto()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['data_nascimento'] = '1999-10-05';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function responsavelPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['responsavel'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('responsavel');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function numeroIrmaoPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['numero_irmaos'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function numeroIrmaoPacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['numero_irmaos'] = 'u';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function nomePaiPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['nome_pai'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('nome_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nomeMaePacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['nome_mae'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('nome_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function telefonePaiPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_pai'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefoneMaePacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_mae'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function telefoneMaePacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_mae'] = 'UM111111111';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefoneMaePacienteNaoPodeTerPoucosNumeros()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_mae'] = '111111111';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefoneMaePacienteNaoPodeTerMuitosNumeros()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_mae'] = '1111111111111111';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefonePaiPacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_pai'] = '666666666UM';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefonePaiPacienteNaoPodeTerPoucosNumeros()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_pai'] = '666666666';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefonePaiPacienteNaoPodeTerMuitosNumeros()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['telefone_pai'] = '66666666666666';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function emailPaiPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['email_pai'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function emailPaiPacienteNaoPodeSerInvalido()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['email_pai'] = 'satanasinferno.com';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function emailMaePacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['email_mae'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function emailMaePacienteNaoPodeSerInvalido()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['email_mae'] = 'emailtestegemail.com';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadePaiPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['idade_pai'] ='';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadePaiPacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['idade_pai'] = 'U';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadePaiPacienteNaoPodeSerGrande()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['idade_pai'] = 300;

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadeMaePacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['idade_mae'] ='';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadeMaePacienteNaoPodeTerLetras()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['idade_mae'] = 'U';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadeMaePacienteNaoPodeSerGrande()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['idade_mae'] = 300;

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function enderecoPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['id_endereco'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function naturalidadePacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['naturalidade'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);


        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function naturalidadePacienteNaoPodeTerNumeros()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['naturalidade'] = 'Brasi131r0';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function estadoCivilPaisPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['pais_sao_casados'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);



        $resposta->assertSessionHasErrors('pais_sao_casados');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function estadoCivilPaisPacienteDivorciadosNaoPodeFicarEmBranco()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $copiaPac['pais_sao_divorciados'] = '';

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);



        $resposta->assertSessionHasErrors('pais_sao_divorciados');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function tipoDeFilhoPacienteNaoPodeFicarEmBranco()
    {
        $this->loginFunc();
        $this->assertAuthenticatedAs($funcionario);
        $copiaPac = $this->$paciente;
        $copiaPac['tipo_filho_biologico_adotivo'] = '';
        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);
        $resposta->assertSessionHasErrors('tipo_filho_biologico_adotivo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function clienteNaoPodeSerCadastradoDuasVezes()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $this->post('/profissional/criarpaciente', $copiaPac);

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

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
    public function mensagemSucessoApareceAoCadastrarCliente()
    {
        $this->loginFunc();

        $this->assertAuthenticatedAs($funcionario);

        $copiaPac = $this->$paciente;

        $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

        $value = 'sucesso';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $resposta->waitForText($value, $tempo);
        $resposta->assertOk();
        $this->assertCount(1, Paciente::all());

    }

    /** @test **/
    public function funcionarioNaoPermitidoNaoPodeCriarPaciente()
    {

         $f = factory(Profissional::class)->create([
         'password' => bcrypt($password = '123123123'),
         'profissao' => 'Lutador',
         ]);

         $this->post('/profissional/login', [
              'login' => $f->login,
              'password' => $password,
         ]);

         $this->assertAuthenticatedAs($funcionario);

         $copiaPac = $this->$paciente;

         $resposta = $this->post('/profissional/criarpaciente', $copiaPac);

         $this->seePageIs('/profissional/home');
         $this->assertCount(0, Paciente::all());
    }

}
