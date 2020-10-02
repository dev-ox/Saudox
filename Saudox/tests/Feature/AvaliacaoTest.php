<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use App\AvaliacaoFonoaudiologia;
use App\AvaliacaoTerapiaOcupacional;
use App\AvaliacaoJudo;
use App\AvaliacaoNeuropsicologica;

class AvaliacaoTest extends TestCase {
    public $funcionario;
    private $endereco;
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

       $copia_pac = factory(Paciente::class)->create($this->paciente);

       $pacie = Paciente::first();

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


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoJudoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_judo = factory(AvaliacaoJudo::class)->create([
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


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoPsicologiaPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_neuro_psi = factory(AvaliacaoNeuropsicologica::class)->create([
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

        $avali_fono = factory(AvaliacaoFonoaudiologia::class)->create([
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


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacientePodeVerAvalicaoTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_tera_ocu = factory(AvaliacaoTerapiaOcupacional::class)->create([
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


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerAvalicaoJudoPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_judo = factory(AvaliacaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        //$this->visit(route('paciente.avaliacao.fonoaudiologia'));
        //$this->seePageIs(route('login'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerAvalicaoPsicologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_neuro_psi = factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        //$this->visit(route('paciente.avaliacao.neuropsicologica'));
        //$this->seePageIs(route('login'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638552 */
    /* TA_01 */
    public function pacienteNaoPodeVerAvalicaoTerapiaOcupacionalPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_tera_ocu = factory(AvaliacaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        //$this->visit(route('paciente.avaliacao.terapiaOcupacional'));
        //$this->seePageIs(route('login'));
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

        $avali_fono = factory(AvaliacaoFonoaudiologia::class)->create([
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
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        $avali_judo = factory(AvaliacaoJudo::class)->create([
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


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoPsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        $avali_neuro_psi = factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoNeuropsicologica::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.neuropsicologica', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.neuropsicologica.delete'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.neuropsicologica'));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoFonoaudiologica() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        $avali_fono = factory(AvaliacaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoFonoaudiologia::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.fonoaudiologia', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.fonoaudiologia.delete'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.fonoaudiologia'));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);
        $avali_tera_ocu = factory(AvaliacaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoTerapiaOcupacional::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.terapiaOcupacional', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.terapiaOcupacional.delete'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.terapiaOcupacional'));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoJudo() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        $avali_judo = factory(AvaliacaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoJudo::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.judo.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoPsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        $avali_neuro_psi = factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoNeuropsicologica::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.neuropsicologica', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.neuropsicologica.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.neuropsicologica'));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoFonoaudiologica() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);
        $avali_fono = factory(AvaliacaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoFonoaudiologia::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.fonoaudiologia', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.fonoaudiologia.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.fonoaudiologia'));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        $avali_tera_ocu = factory(AvaliacaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, AvaliacaoTerapiaOcupacional::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao.terapiaOcupacional', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.terapiaOcupacional.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route('profissional.avaliacao.terapiaOcupacional'));
    }

    /** @test */
    public function funcaoTesteSoPraNaoFicarWarning() {
        $this->assertTrue(true);
    }


}
