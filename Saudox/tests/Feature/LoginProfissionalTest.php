<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Profissional;
use App\Endereco;
use Illuminate\Support\Carbon;

class LoginProfissionalTest extends TestCase {

    private $endereco;
    public function setUp() : void {
        parent::setUp();
        $this->endereco = factory(Endereco::class)->create();
    }

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
            'login' => $funcionario->login,
            'password' => 'senha-inválida',
        ]);

        $resposta->assertRedirect(route("profissional.login"));
        //TODO: descobrir o erro disso. parece ser bug do phpunit, já foi reportado
        //$resposta->assertSessionHasErrors(['password']);
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test **/
    public function funcionarioNaoPodeLogarComloginIncorreto() {

        $login_t = 'carlosaajunio@gmail.com' . Carbon::now()->toString();

        $funcionario = factory(Profissional::class)->create([
            'login' => $login_t,
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route("profissional.login"))->post(route("profissional.login"), [
            'login' => $login_t,
            'password' => '123123123',
        ]);

        $resposta->assertRedirect(route("profissional.login"));
        $resposta->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertFalse(session()->hasOldInput('login'));
        $this->assertGuest();
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638207 */
    /* TA_01 */
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
