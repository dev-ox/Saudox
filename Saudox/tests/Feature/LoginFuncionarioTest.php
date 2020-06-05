<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;

class LoginFuncionarioTest extends TestCase
{
    public function funcionarioPodeLogarComDadosCorretos()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);
    }

    public function funcionarioNaoPodeLogarComSenhaIncorreta()
    {
        $funcionario = factory(Funcionario::class)->create([
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

    public function funcionarioNaoPodeLogarComloginIncorreto()
    {
        $funcionario = factory(Funcionario::class)->create([
            'login' => 'carlosaajunio@gmail.com'
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

    public function funcionarioPodeFazerLogout()
    {
        $funcionario = factory(Funcionario::class)->create([
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
        $funcionario = factory(Funcionario::class)->create([
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

    public function funcionarioPodeVerAgendamentos()
    {
        $funcionario = factory(Funcionario::class)->create([
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


    public function funcionarioNaoPodeVerAgendamentosSeNaoEstiverLogado()
    {
        $funcionario = factory(Funcionario::class)->create([
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

    public function funcionarioPodeVerPerfil()
    {
        $funcionario = factory(Funcionario::class)->create([
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

    public function funcionarioNaoPodeVerPerfilSeNaoEstiverLogado()
    {
        $funcionario = factory(Funcionario::class)->create([
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
