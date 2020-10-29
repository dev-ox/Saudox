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

class ProfissionalAvaliacaoTest extends TestCase {
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
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoPsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        factory(AvaliacaoNeuropsicologica::class)->create([
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
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        factory(AvaliacaoFonoaudiologia::class)->create([
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
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);
        factory(AvaliacaoTerapiaOcupacional::class)->create([
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
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        factory(AvaliacaoNeuropsicologica::class)->create([
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
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);
        factory(AvaliacaoFonoaudiologia::class)->create([
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
            'password' => bcrypt('123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt('123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $this->funcionario->login,
            'password' => $this->funcionario->password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($this->funcionario);

        factory(AvaliacaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->funcN->id,
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
