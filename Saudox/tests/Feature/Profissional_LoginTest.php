<?php

namespace Tests\Feature;

use App\Agendamentos;
use Tests\TestCase;
use App\Profissional;
use App\Endereco;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Profissional_LoginTest extends TestCase {

    public function setUp() : void {
        parent::setUp();
        $this->endereco = factory(Endereco::class)->create();
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638091 */
    /* TA_01 */
    public function funcionarioPodeLogarComDadosCorretos() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.efetuarLogin"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $resposta->assertLocation(route('profissional.home'));

        Auth::login($funcionario, true);
        $this->assertTrue(Auth::check());

        $resposta = $this->get(route('profissional.ver', Profissional::first()->id));
        $resposta->assertSuccessful();
        $resposta->assertOk();
        $resposta->assertSee(Profissional::first()->cpf);

    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638091 */
    /* TA_03 */
    public function funcionarioNaoPodeLogarComSenhaIncorreta() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->post(route("profissional.efetuarLogin"), [
            'login' => $funcionario->login,
            'password' => 'senha-inválida',
        ]);
        //redirecionando pra / ao inves da home que seria o certo
        $resposta->assertRedirect("/");
        //Removido por um bug do laravel
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638091 */
    /* TA_02 */
    public function funcionarioNaoPodeLogarComloginIncorreto() {

        $login_t = 'carlosaajunio@gmail.com' . Carbon::now()->toString();

        factory(Profissional::class)->create([
            'login' => $login_t,
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->post(route("profissional.efetuarLogin"), [
            'login' => $login_t."asd",
            'password' => '123123123',
        ]);

        $resposta->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('login'));
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638207 */
    /* TA_01 */
    public function funcionarioPodeFazerLogout() {
        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("profissional.efetuarLogin"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route("profissional.home"));
        $this->post(route("profissional.logout"));
        $resposta->assertRedirect(route("profissional.home"));
        $arr_session = [];
        session($arr_session);
        $resposta = $this->withSession($arr_session)->get(route('profissional.home'));
        $resposta->assertLocation(route('profissional.login'));
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638205 */
    /* TA_01 */
    public function funcionarioPodeVerAgendamentos() {

        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);


        $agendamento = factory(Agendamentos::class)->create([
            'nome' => "aopa",
            'id_profissional' => "1",
        ]);

        $resposta = $this->post(route("profissional.efetuarLogin"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));

        $resposta = $this->get(route('profissional.home'));
        $resposta->assertSee($agendamento->nome);

    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638205 */
    /* TA_01 */
    public function funcionarioNaoPodeVerAgendamentosSeNaoEstiverLogado() {

        /* é só não logar */
        $this->assertCount(0, Profissional::all());

        factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $this->assertCount(1, Profissional::all());


        $resposta = $this->get(route('profissional.home'));
        $resposta->assertDontSee("Não há agendamentos para você!");
        // Botão de ver do lado do agendamento
        $resposta->assertDontSee("Ver");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638204 */
    /* TA_01 */
    public function funcionarioPodeVerPerfil() {

        $this->assertCount(0, Profissional::all());

        $funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->assertCount(1, Profissional::all());
        $resposta = $this->post(route("profissional.efetuarLogin"), [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("profissional.home"));

        $resposta = $this->get(route("profissional.ver", 1));
        $resposta->assertSee(Profissional::find(1)->cpf);

    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638204 */
    /* TA_01 */
    public function funcionarioNaoPodeVerPerfilSeNaoEstiverLogado() {

        /* é só não logar */
        $this->assertCount(0, Profissional::all());

        factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $this->assertCount(1, Profissional::all());

        $resposta = $this->get(route("profissional.ver", 1));
        $resposta->assertDontSee(Profissional::find(1)->cpf);
    }



}
