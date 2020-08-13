<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;

class LoginProfissionalTest extends TestCase
{

    /** @test **/
    public function funcionarioPodeLogarComDadosCorretos() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);
    }

    /** @test **/
    public function funcionarioNaoPodeLogarComSenhaIncorreta() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route("profissional.login"))->post(route("profissional.login"), [
            'login' => $profissional->login,
            'password' => 'senha-inválida',
        ]);

        $response->assertRedirect(route("profissional.login"));
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test **/
    public function funcionarioNaoPodeLogarComloginIncorreto() {
        $funcionario = factory(Profissional::class)->create([
            'login' => 'carlosaajunio@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route("profissional.login"))->post(route("profissional.login"), [
            'login' => 'carlos@gmail.com',
            'password' => $funcionario->password
        ]);

        $response->assertRedirect(route("profissional.login"));
        $response->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertFalse(session()->hasOldInput('login'));
        $this->assertGuest();
    }

    /** @test **/
    public function funcionarioPodeFazerLogout() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);
        $this->post(route("profissional.logout"));
        $this->visit(route("profissional.home"));
        $this->seePageIs(route("profissional.login"));
    }

    /*public function funcionarioPodeTrocarSenha()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);
        $this->post(route("profissional.logout"));
        $this->visit(route("profissional.home"));
        $this->seePageIs(route("profissional.login"));
    } */

    /** @test **/
    public function funcionarioPodeVerAgendamentos() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.agenda"));
        $this->seePageIs(route("profissional.agenda"));
    }

    /** @test **/
    public function funcionarioNaoPodeVerAgendamentosSeNaoEstiverLogado() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->post(route("profissional.logout"));

        $this->visit(route("profissional.agenda"));
        $this->seePageIs(route("profissional.login"));
    }

    /** @test **/
    public function funcionarioPodeVerPerfil() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.perfil"));
        $this->seePageIs(route("profissional.perfil"));
    }

    /** @test **/
    public function funcionarioNaoPodeVerPerfilSeNaoEstiverLogado() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->post(route("profissional.logout"));

        $this->visit(route("profissional.perfil"));
        $this->seePageIs(route("profissional.login"));
    }



}
