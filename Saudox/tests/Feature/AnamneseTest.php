<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;

use App\AnamneseFonoaudiologia;
use App\AnamneseTerapiaOcupacional;
use App\AnamneseGigantePsicopedaNeuroPsicomoto;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt1;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt2;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt3;

class AnamneseTest extends TestCase {
    public $profissional;
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

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamnesePsicoNeuroMotoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
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

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamneseFonoaudiologicaPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $anamne_fono = factory(AnamneseFonoaudiologia::class)->create([
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

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamneseTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
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

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerAnamnesePsicologiaPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [

            'login' => $paciente->login,
            'password' => $password,
        ]);
        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese.neuropsicomotora"));
        //$this->seePageIs(route("login"));
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerAnamneseTerapiaOcupacionalPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);
        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese.terapia_ocupacional"));
        //$this->seePageIs(route("login"));

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

        $anamne_fonoaudiologia = factory(AnamneseFonoaudiologia::class)->create([
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

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamnesePsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();

        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.neuropsicomotora.delete", ['id_paciente' => $paciente->id]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseFonoaudiologica() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);


        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseFonoaudiologia::all());
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.fonoaudiologia.delete", ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);


        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseTerapiaOcupacional::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.terapia_ocupacional.delete", ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseNeuroPsicoMoto() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Neurologista',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);


        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();
        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.neuropsicomotora.edit", ['id_paciente' => $paciente->id]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseFonoaudiologica() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseFonoaudiologia::all());
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.fonoaudiologia.edit", ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);
        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseTerapiaOcupacional::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.terapia_ocupacional.edit", ['id_paciente' => $paciente->id]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));
    }

}
