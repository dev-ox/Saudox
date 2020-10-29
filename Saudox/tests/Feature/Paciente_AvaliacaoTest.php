<?php


namespace Tests\Feature;


use App\AvaliacaoFonoaudiologia;
use App\AvaliacaoJudo;
use App\AvaliacaoNeuropsicologica;
use App\AvaliacaoTerapiaOcupacional;
use App\Endereco;
use App\Paciente;
use App\Profissional;
use Tests\TestCase;

class Paciente_AvaliacaoTest extends TestCase
{

    public $funcionario;
    private $paciente;

    private $password;

    public function setUp() : void {
        parent::setUp();

        $this->password = bcrypt('123123123');

        $this->endereco = factory(Endereco::class)->create();
        $this->funcionario = factory(Profissional::class)->create([
            'password' => $this->password,
            'profissao' => Profissional::Recepcionista,
        ]);
        $this->paciente = factory(Paciente::class)->create([
            'login' => 'login_teste',
            'password' => $this->password,
        ]);
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_02 */
    public function funcionarioPermitidoPodeAcessarAvaliacaoPacienteExistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($this->funcionario);

        factory(Paciente::class)->create($this->paciente);

        Paciente::first();

        //$this->visit(route('profissional.avaliacao', ['id_paciente' => $pacie->id]));
        //$this->seePageIs(route('profissional.avaliacao', ['id_paciente' => $pacie->id]));
        $resposta->assertOk();
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_02 */
    public function funcionarioPermitidoNaoPodeAcessarAvaliacaoPacienteInexistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

        $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao', ['id_paciente' => 0]));
        //$this->seePageIs(route('profissional.home'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_02 */
    public function funcionarioNaoAutorizadoNaoPodeAcessarAvaliacaoPacienteExistente() {

        $func = $this->funcionario;

        $res = $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $this->funcionario->password,
        ]);

        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao', ['id_paciente' => 0]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route('profissional.home'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerPaginaAvalicaoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route('paciente.avaliacao'));
        //$this->seePageIs(route('paciente.avaliacao'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoJudoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        factory(AvaliacaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route('paciente.avaliacao.judo'));
        //$this->seePageIs(route('paciente.avaliacao.judo'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoNeuropsicologicaPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route('paciente.avaliacao.neuropsicologica'));
        //$this->seePageIs(route('paciente.avaliacao.neuropsicologica'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoFonoaudiologicaPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        factory(AvaliacaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route('paciente.avaliacao.fonoaudiologia'));
        //$this->seePageIs(route('paciente.avaliacao.fonoaudiologia'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        factory(AvaliacaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route('paciente.avaliacao.terapiaOcupacional'));
        //$this->seePageIs(route('paciente.avaliacao.terapiaOcupacional'));
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/n/projects/2447911/stories/175467753 */
    /* TA_08 */
    public function pacienteNaoPodeVerAvalicaoJudoPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);
        factory(AvaliacaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
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
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerAvalicaoNeuropsicologicaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt( '123123123'),
        ]);
        factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
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
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerAvalicaoTerapiaOcupacionalPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);
        factory(AvaliacaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
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
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerAvalicaoFonoaudiologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        factory(AvaliacaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        //$this->visit(route('paciente.avaliacao.judo'));
        //$this->seePageIs(route('login'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerPaginaAvalicaoPacienteSeNaoEstiverLogado() {
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

        //$this->visit(route('paciente.avaliacao'));
        //$this->seePageIs(route('login'));
    }


    /** @ test **/
    public function pacienteNaoPodeDeletarAvalicaoJudo() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        factory(AvaliacaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoJudo::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.judo.delete', ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));
    }

}
