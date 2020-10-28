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

        // Array extendido da superclasse
        $this->agendamento_completo = $this->agendamento_array;
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

        $resposta->assertSee("Informações Pessoais");
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
    public function pacienteNaoPodeEnviarAgendamento() {
        $this->loginPaciente();
        $this->assertCount(0, Agendamentos::all());
        $resposta = $this->post(route("agendamento.salvar"), $this->agendamento_completo);
        $this->assertCount(0, Agendamentos::all());
        $resposta->assertRedirect();
    }

}
