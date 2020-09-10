<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Paciente;
use App\Endereco;

use Illuminate\Support\Carbon;

class LoginPacienteTest extends TestCase {

    private $endereco;
    protected static $db_ok = false;
    public function setUp() : void {
        parent::setUp();

        if(!self::$db_ok) {
            fwrite(STDERR, "Migrando sqlite...");
            $this->artisan('migrate:fresh');
            fwrite(STDERR, "Feito.\n");
            fwrite(STDERR, "Fazendo seed no sqlite...");
            $this->artisan('db:seed');
            fwrite(STDERR, "Feito.\n");
            self::$db_ok = true;
        }

        $this->endereco = factory(Endereco::class)->create();
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638236 */
    /* TA_01 */
    public function pacientePodeLogarComDadosCorretos() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638236 */
    /* TA_03 */
    public function pacienteNaoPodeLogarComSenhaIncorreta() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route('login'))->post(route('login'), [
            'login' => $paciente->login,
            'password' => 'senha-inválida',
        ]);

        $resposta->assertRedirect(route('login'));
        $resposta->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638236 */
    /* TA_02 */
    public function pacienteNaoPodeLogarComloginIncorreto() {

        $login_t = 'carlosaajunio@gmail.com' . Carbon::now()->toString();
        $paciente = factory(Paciente::class)->create([
            'login' => $login_t,
            'password' => bcrypt('123123123'),
        ]);

        $resposta = $this->from(route('login'))->post(route('login'), [
            'login' => 'carlos@gmail.com',
            'password' => $paciente->password
        ]);

        $resposta->assertRedirect(route('login'));
        $resposta->assertSessionHasErrors('login');
        $this->assertTrue(session()->hasOldInput('password'));
        $this->assertFalse(session()->hasOldInput('login'));
        $this->assertGuest();
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174639028 */
    /* TA_01 */
    public function pacientePodeFazerLogout() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);
        $this->post(route('paciente.logout'));
        //$this->visit(route('paciente.home'));
        //$this->seePageIs(route('login'));
    }


    /** @test **/
    public function pacientePodeVerPerfil() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route('paciente.perfil'));
        //$this->seePageIs(route('paciente.perfil'));
    }


    /** @test **/
    public function pacienteNaoPodeVerPerfilSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        //$this->visit(route('paciente.perfil'));
        //$this->seePageIs(route('login'));
    }

}
