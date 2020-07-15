<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Paciente;

class LoginPacienteTest extends TestCase
{

    /** @test **/
    public function pacientePodeLogarComDadosCorretos()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);
    }

    /** @test **/
    public function pacienteNaoPodeLogarComSenhaIncorreta()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from('/paciente/login')->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => 'senha-inválida',
        ]);

        $response->assertRedirect('/paciente/login');
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test **/
    public function pacienteNaoPodeLogarComloginIncorreto()
    {
        $paciente = factory(Paciente::class)->create([
            'login' => 'carlosaajunio@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from('/paciente/login')->post('/paciente/login', [
            'login' => 'carlos@gmail.com',
            'password' => $paciente->password
        ]);

        $response->assertRedirect('/paciente/login');
        $response->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertFalse(session()->hasOldInput('login'));
        $this->assertGuest();
    }

    /** @test **/
    public function pacientePodeFazerLogout()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);
        $this->post('/paciente/logout');
        $this->visit('/paciente/home');
        $this->seePageIs('/paciente/login');
    }


    /** @test **/
    public function pacientePodeVerPerfil()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/perfil');
        $this->seePageIs('/paciente/perfil');
    }


    /** @test **/
    public function pacienteNaoPodeVerPerfilSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/perfil');
        $this->seePageIs('/paciente/login');
    }



}
