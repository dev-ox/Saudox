<?php

namespace Tests\Feature;

use App\Agendamentos;
use App\Paciente;
use App\Profissional;
use App\Endereco;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AgendamentosTest extends TestCase {


    private $profissional;
    private $paciente;
    private $senha;

    private $agendamento_completo;


    public function setUp() : void {
        parent::setUp();

        factory(Endereco::class)->create();
        $this->senha = "123123123";

        $this->paciente = factory(Paciente::class)->create([
            'password' => bcrypt($this->senha),
        ]);

        $this->profissional = factory(Profissional::class)->create([
            'password' => bcrypt($this->senha),
            'profissao' => 'recepcionista;',
        ]);

        $this->agendamento_completo = [
            'id_profissional' => '1',
            'id_paciente' => '-1',
            'id_convenio' => '0',
            'nome' => "Pessoa silva santos",
            'cpf' => "12312312312",
            'data_nascimento_paciente' => date('d-m-Y'),
            'telefone' => "87996811674",
            'email' => "Qp0zNP5fIx@yandex.com",
            'dia_da_consulta' => date('d-m-Y'),
            'hora_entrada' => date('H:i:s'),
            'hora_saida' => date('H:i:s'),
            'local_de_atendimento' => 'laaaa longe',
            'recorrencia_do_agendamento' => 0,
            'tipo_da_recorrencia' => "negocin",
            'observacoes' => 'observado',
            'status' => true,
            'estado' => "Pernambuco",
            'cidade' => "Garanhuns",
            'bairro' => "Boa Vista",
            'nome_rua' => "Rua negocin",
            'numero_casa' => 123,
            'descricao' => "casa engraçada não tinha teto não tinha nada",
            'ponto_referencia' => "ali lá",
        ];

    }



    private function loginProfisssional() {
        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $this->profissional->login,
            'password' => $this->senha,
        ]);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route('profissional.home'));
        $resposta->assertLocation(route('profissional.home'));

        Auth::login($this->profissional, true);
        $this->assertTrue(Auth::check());
        $this->assertAuthenticated();
    }


    private function loginPaciente() {
        $resposta = $this->post(route('login'), [
            'login' => $this->paciente->login,
            'password' => $this->senha,
            'remember' => "on",
        ]);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route('paciente.home'));
        $resposta->assertLocation(route('paciente.home'));

        Auth::login($this->paciente, true);
        $this->assertTrue(Auth::check());
        $this->assertAuthenticated();

        $resposta = $this->get("/paciente/home");
        $resposta->assertOk();

        /* TODO: mudar isso quando a view tiver pronta */
        $resposta->assertSee("Sou Paciente");
    }


    private function logout() {
        $this->post(route('logout'));
        Auth::logout();
        $this->assertFalse(Auth::check());
        $this->assertGuest();
    }

    /** @test **/
    public function pacienteNaoPodeVerPaginaDeAgendamento() {
        $this->loginPaciente();
        $respota = $this->get(route("agendamento.criar"));
        $respota->assertRedirect();
        $respota->assertDontSee("Agendar para o paciente");
    }

    /** @test **/
    public function profissioanlPodeVerPaginaDeAgendamento() {
        $this->loginProfisssional();
        $respota = $this->get(route("agendamento.criar"));
        $respota->assertOk();
        $respota->assertSee("Agendar para o paciente");
    }


    /** @test **/
    public function pacienteNaoPodeEnviarAgendamento() {
        $this->loginPaciente();
        $this->assertCount(0, Agendamentos::all());
        $resposta = $this->post(route("agendamento.salvar"), $this->agendamento_completo);
        $this->assertCount(0, Agendamentos::all());
        $resposta->assertRedirect();
    }

    /** @test **/
    public function profissioanlPodeEnviarAgendamento() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $resposta = $this->post(route('agendamento.salvar'), $this->agendamento_completo);
        $resposta->assertSessionHasNoErrors();
        //Assume que é o primeiro agendamento
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }


    /** @test **/
    public function nomeAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['nome'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('nome');
        $this->assertCount(0, Agendamentos::all());
    }

    /** @test **/
    public function cpfAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['cpf'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Agendamentos::all());
    }

    /** @test **/
    public function dataNascimentoAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['data_nascimento_paciente'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('data_nascimento_paciente');
        $this->assertCount(0, Agendamentos::all());
    }


    /** @test **/
    public function telefoneAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['telefone'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('telefone');
        $this->assertCount(0, Agendamentos::all());
    }


    /** @test **/
    public function emailAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['email'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }



    /** @test **/
    public function estadoAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['estado'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('estado');
        $this->assertCount(0, Agendamentos::all());
    }


    /** @test **/
    public function cidadeAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['cidade'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('cidade');
        $this->assertCount(0, Agendamentos::all());
    }


    /** @test **/
    public function bairroAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['bairro'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }

    /** @test **/
    public function ruaAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['nome_rua'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }

    /** @test **/
    public function numeroAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['numero_casa'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }



    /** @test **/
    public function complementoAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['descricao'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }

    /** @test **/
    public function pontoReferenciaAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['ponto_referencia'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('ponto_referencia');
        $this->assertCount(0, Agendamentos::all());
    }


    /** @test **/
    public function localAtendimentoAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['local_de_atendimento'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('local_de_atendimento');
        $this->assertCount(0, Agendamentos::all());
    }

    /** @test **/
    public function dataConsultaAtendimentoAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['dia_da_consulta'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors();
        $this->assertCount(0, Agendamentos::all());
    }


    /** @test **/
    public function horaEntradaAtendimentoAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['hora_entrada'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('hora_entrada');
        $this->assertCount(0, Agendamentos::all());
    }

    /** @test **/
    public function horaSaidaAtendimentoAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['hora_saida'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasErrors('hora_saida');
        $this->assertCount(0, Agendamentos::all());
    }

    /** @test **/
    public function observacoesAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['observacoes'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }

    /** @test **/
    public function profissioalAgendamentoNaoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['id_profissional'] = '';
        $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $this->assertCount(0, Agendamentos::all());
    }

    /** @test **/
    public function conevioAgendamentoPodeSerVazio() {
        $this->loginProfisssional();
        $this->assertCount(0, Agendamentos::all());
        $agendamento_incompleto = $this->agendamento_completo;
        $agendamento_incompleto['id_convenio'] = '';
        $resposta = $this->post(route('agendamento.salvar'), $agendamento_incompleto);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("agendamento.ver", 1));
        $this->assertCount(1, Agendamentos::all());
    }

    /* TODO: testes de validar datas e horarios, e emails, e telefones */

}
