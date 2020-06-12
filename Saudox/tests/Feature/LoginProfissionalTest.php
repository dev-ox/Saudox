<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;

class LoginProfissionalTest extends TestCase
{

    /** @test **/
    public function funcionarioPodeLogarComDadosCorretos()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);
    }

    /** @test **/
    public function funcionarioNaoPodeLogarComSenhaIncorreta()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from('/profissional/login')->post('/profissional/login', [
            'login' => $profissional->login,
            'password' => 'senha-inválida',
        ]);

        $response->assertRedirect('/profissional/login');
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test **/
    public function funcionarioNaoPodeLogarComloginIncorreto()
    {
        $funcionario = factory(Profissional::class)->create([
            'login' => 'carlosaajunio@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from('/profissional/login')->post('/profissional/login', [
            'login' => 'carlos@gmail.com',
            'password' => $funcionario->password
        ]);

        $response->assertRedirect('/profissional/login');
        $response->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertFalse(session()->hasOldInput('login'));
        $this->assertGuest();
    }

    /** @test **/
    public function funcionarioPodeFazerLogout()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);
        $this->post('/profissional/logout');
        $this->visit('/profissional/home');
        $this->seePageIs('/profissional/login');
    }

    /*public function funcionarioPodeTrocarSenha()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);
        $this->post('/profissional/logout');
        $this->visit('/profissional/home');
        $this->seePageIs('/profissional/login');
    } */

    /** @test **/
    public function funcionarioPodeVerAgendamentos()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/agenda');
        $this->seePageIs('/profissional/agenda');
    }

    /** @test **/
    public function funcionarioNaoPodeVerAgendamentosSeNaoEstiverLogado()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->post('/profissional/logout');

        $this->visit('/profissional/agenda');
        $this->seePageIs('/profissional/login');
    }

    /** @test **/
    public function funcionarioPodeVerPerfil()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/perfil');
        $this->seePageIs('/profissional/perfil');
    }

    /** @test **/
    public function funcionarioNaoPodeVerPerfilSeNaoEstiverLogado()
    {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->post('/profissional/logout');

        $this->visit('/profissional/perfil');
        $this->seePageIs('/profissional/login');
    }



}
