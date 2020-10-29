<?php


namespace Tests\Feature;


use App\AnamneseFonoaudiologia;
use App\AnamneseGigantePsicopedaNeuroPsicomoto;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt1;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt2;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt3;
use App\AnamneseTerapiaOcupacional;
use App\Endereco;
use App\Paciente;
use App\Profissional;
use Tests\TestCase;

class Paciente_AnamneseTest extends TestCase
{
    private $endereco;
    private $paciente;

    private $password = '123123123';

    public function setUp() : void {
        parent::setUp();

        $this->endereco = factory(Endereco::class)->create();
        $this->paciente = factory(Paciente::class)->create([
            'password' => bcrypt($this->password),
            'id_endereco' => $this->endereco->id,
        ]);
        $this->profissional = factory(Profissional::class)->create([
            'password' => bcrypt($this->password),
            'profissao' => Profissional::Adm,
        ]);
        $this->anamnese_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);
        $this->anamnese_terapiaOcupacional = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerPaginaAnamnesePacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [

            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese"));
        //$this->seePageIs(route("paciente.anamnese"));

    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamnesePNPPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();


        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);
        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese.neuropsicomotora"));
        //$this->seePageIs(route("paciente.anamnese.neuropsicomotora"));
    }
    /** @test **/
    /* url: https://www.pivotaltracker.com/n/projects/2447911/stories/175467753 */
    /* TA_07 */
    public function pacienteNaoPodeVerAnamnesePNPPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt( '123123123'),
        ]);

        factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();

        $resposta = $this->from(route("login"))->post(route('login'), [
            'login' => $paciente->login,
            'password' => '12312312',
        ]);

        $resposta->assertRedirect(route('login'));
        $resposta->assertSessionHasErrors();
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamneseFonoaudiologicaPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);
        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese.fonoaudiologia"));
        //$this->seePageIs(route("paciente.anamnese.fonoaudiologia"));
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/n/projects/2447911/stories/175467753 */
    /* TA_07 */
    public function pacienteNaoPodeVerAnamneseFonoaudiologaPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);
        factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta = $this->from(route("login"))->post(route('login'), [
            'login' => $paciente->login,
            'password' => '12312312',
        ]);

        $resposta->assertRedirect(route('login'));
        $resposta->assertSessionHasErrors();
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamneseTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta = $this->post(route("login"), [

            'login' => $paciente->login,
            'password' => $password,
        ]);
        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese.terapia_ocupacional"));
        //$this->seePageIs(route("paciente.anamnese.terapia_ocupacional"));

    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/n/projects/2447911/stories/175467753 */
    /* TA_07 */
    public function pacienteNaoPodeVerAnamneseTerapiaOcupacionalPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);
        factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta = $this->from(route("login"))->post(route('login'), [
            'login' => $paciente->login,
            'password' => '12312312',
        ]);

        $resposta->assertRedirect(route('login'));
        $resposta->assertSessionHasErrors();
        $this->assertTrue(session()->hasOldInput('login'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerAnamneseFonoaudiologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese.fonoaudiologia"));
        //$this->seePageIs(route("login"));
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerPaginaAnamnesePacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese"));
        //$this->seePageIs(route("login"));
    }

}
