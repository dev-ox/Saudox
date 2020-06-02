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

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);
    }

    public function funcionarioNaoPodeLogarComSenhaIncorreta()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from('/login')->post('/login', [
            'login' => $profissional->login,
            'password' => 'senha-inválida',
        ]);

        $response->assertRedirect('/login');
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

        $resposta = $this->from('/login')->post('/login', [
            'login' => 'carlos@gmail.com',
            'password' => $funcionario->password
        ]);

        $response->assertRedirect('/login');
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

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);
        $this->post('/logout');
        $this->visit('/home');
        $this->seePageIs('/login');
    }

    public function funcionarioPodeTrocarSenha()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);
        $this->post('/logout');
        $this->visit('/home');
        $this->seePageIs('/login');
    }

    public function funcionarioPodeVerAgendamentos()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/home/agenda');
        $this->seePageIs('/home/agenda');
    }


    public function funcionarioNaoPodeVerAgendamentosSeNaoEstiverLogado()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->post('/logout');

        $this->visit('/home/agenda');
        $this->seePageIs('/login');
    }

    public function funcionarioPodeVerPerfil()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/home/perfil');
        $this->seePageIs('/home/perfil');
    }

    public function funcionarioNaoPodeVerPerfilSeNaoEstiverLogado()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->post('/logout');

        $this->visit('/home/perfil');
        $this->seePageIs('/login');
    }



}
