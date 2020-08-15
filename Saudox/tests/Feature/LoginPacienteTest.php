<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Paciente;

class LoginPacienteTest extends TestCase {

    /** @test **/
    public function pacientePodeLogarComDadosCorretos() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);
    }


    /** @test **/
    public function pacienteNaoPodeLogarComSenhaIncorreta() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route('paciente.login'))->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => 'senha-inválida',
        ]);

        $response->assertRedirect(route('paciente.login'));
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    /** @test **/
    public function pacienteNaoPodeLogarComloginIncorreto() {
        $paciente = factory(Paciente::class)->create([
            'login' => 'carlosaajunio@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route('paciente.login'))->post(route('paciente.login'), [
            'login' => 'carlos@gmail.com',
            'password' => $paciente->password
        ]);

        $response->assertRedirect(route('paciente.login'));
        $response->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertFalse(session()->hasOldInput('login'));
        $this->assertGuest();
    }


    /** @test **/
    public function pacientePodeFazerLogout() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);
        $this->post(route('paciente.logout'));
        $this->visit(route('paciente.home'));
        $this->seePageIs(route('paciente.login'));
    }


    /** @test **/
    public function pacientePodeVerPerfil() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route('paciente.perfil'));
        $this->seePageIs(route('paciente.perfil'));
    }


    /** @test **/
    public function pacienteNaoPodeVerPerfilSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        $this->visit(route('paciente.perfil'));
        $this->seePageIs(route('paciente.login'));
    }

}
