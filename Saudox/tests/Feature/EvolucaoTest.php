<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class EvolucaoTest extends TestCase {
    public $funcionario;

    private $endereco;

    private $paciente;

    public function setUp() : void {
        parent::setUp();

        $this->funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Atendente',
        ]);

        $this->endereco = factory(Endereco::class)->create();

        $this->paciente = [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Maria Sueli',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ];
    }

    /** @test **/
    public function funcionarioPermitidoPodeAcessarEvolucaoPacienteExistente() {

        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post(route("profissional.login"), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $copia_paciente = factory(Paciente::class)->create($this->paciente);

       $pacie = Paciente::first();

       $this->visit(route("profissional.evolucao", ['id_paciente' -> $pacie->id]));
       $this->seePageIs(route("profissional.evolucao", ['id_paciente' -> $pacie->id]));
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarEvolucaoPacienteInexistente() {

        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post(route("profissional.login"), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit(route("profissional.evolucao", ['id_paciente' -> 0]));
       $this->seePageIs(route("profissional.home"));
    }


    /** @test **/
    public function funcionarioNaoAutorizadoNaoPodeAcessarEvolucaoPacienteExistente() {


       $func = $this->funcionario;

       $this->post(route("profissional.login"), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit(route("profissional.evolucao", ['id_paciente' -> 0]));

       $value = 'Você não possui privilégios para isso.';
       $tempo = 5; // Tempo em segundo até o fim da espera
       $res->waitForText($value, $tempo);
       $res->assertOk();
       $this->seePageIs(route("profissional.home"));
    }

    /** @test **/
    public function pacientePodeVerPaginaEvolucaoPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao"));
        $this->seePageIs(route("paciente.evolucao"));
    }


    /** @test **/
    public function pacientePodeVerEvolucaoJudoPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_judo = factory(EvolucaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.judo", ['id_evolucao_judo' -> $evolucao_judo->id]));
        $this->seePageIs(route("paciente.evolucao.judo", ['id_evolucao_judo' -> $evolucao_judo->id]));
    }

    /** @test **/
    public function pacientePodeVerEvolucaoPsicologiaPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_psicologica = factory(EvolucaoPsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.psicologica", ['id_evolucao_psicologica' -> $evolucao_psicologica->id]));
        $this->seePageIs(route("paciente.evolucao.psicologica", ['id_evolucao_psicologica' -> $evolucao_psicologica->id]));
    }

    /** @test **/
    public function pacientePodeVerEvolucaoFonoaudiologicaPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_fonoaudiologica = factory(EvolucaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.fonoaudiologica", ['id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
        $this->seePageIs(route("paciente.evolucao.fonoaudiologica", ['id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
    }

    /** @test **/
    public function pacientePodeVerEvolucaoTerapiaOcupacionalPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_to = factory(EvolucaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.terapia_ocupacional", ['id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
        $this->seePageIs(route("paciente.evolucao.terapia_ocupacional", ['id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
    }


    /** @test **/
    public function pacienteNaoPodeVerEvolucaoJudoPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evolucao_judo = factory(EvolucaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.evolucao.judo", ['id_evolucao_judo' -> $evolucao_judo->id]));
        $this->seePageIs(route("paciente.login"));
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoPsicologiaPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evolucao_psicologica = factory(EvolucaoPsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.evolucao.psicologica", ['id_evolucao_psicologica' -> $evolucao_psicologica->id]));
        $this->seePageIs(route("paciente.login"));
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoTerapiaOcupacionalPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evolucao_to = factory(EvolucaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.evolucao.terapia_ocupacional", ['id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
        $this->seePageIs(route("paciente.login"));
    }



    /** @test **/
    public function pacienteNaoPodeVerEvolucaoFonoaudiologiaPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evolucao_fonoaudiologica = factory(EvolucaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.evolucao.fonoaudiologica", ['id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
        $this->seePageIs(route("paciente.login"));
    }

    /** @test **/
    public function pacienteNaoPodeVerPaginaEvolucaoPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.evolucao"));
        $this->seePageIs(route("paciente.login"));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarEvolucaoJudo() {


        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_judo = factory(EvolucaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoJudo::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.judo", ['id_paciente' -> $paciente->id, 'id_evolucao_judo' -> $evolucao_judo->id]));

        $res = $this->post(route("profissional.evolucao.judo.delete", ['id_paciente' -> $paciente->id, 'id_evolucao_judo' -> $evolucao_judo->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.judo", ['id_paciente' -> $paciente->id, 'id_evolucao_judo' -> $evolucao_judo->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarEvolucaoPsicologia() {


        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_psicologica = factory(EvolucaoPsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoPsicologica::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.psicologica", ['id_paciente' -> $paciente->id, 'id_evolucao_psicologica' -> $evolucao_psicologica->id]));

        $res = $this->post(route("profissional.evolucao.psicologica.delete", ['id_paciente' -> $paciente->id, 'id_evolucao_psicologica' -> $evolucao_psicologica->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.psicologica", ['id_paciente' -> $paciente->id, 'id_evolucao_psicologica' -> $evolucao_psicologica->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarEvolucaoFonoaudiologica() {


        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_fonoaudiologica = factory(EvolucaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoFonoaudiologia::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.fonoaudiologica", ['id_paciente' -> $paciente->id, 'id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));

        $res = $this->post(route("profissional.evolucao.fonoaudiologica.delete", ['id_paciente' -> $paciente->id, 'id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.fonoaudiologica", ['id_paciente' -> $paciente->id, 'id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarEvolucaoTerapiaOcupacional() {


        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_to = factory(EvolucaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoTerapiaOcupacional::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.terapia_ocupacional", ['id_paciente' -> $paciente->id, 'id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));

        $res = $this->post(route("profissional.evolucao.terapia_ocupacional.delete", ['id_paciente' -> $paciente->id, 'id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.terapia_ocupacional", ['id_paciente' -> $paciente->id, 'id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarEvolucaoJudo() {


        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_judo = factory(EvolucaoJudo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoJudo::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.judo", ['id_paciente' -> $paciente->id, 'id_evolucao_judo' -> $evolucao_judo->id]));

        $res = $this->post(route("profissional.evolucao.judo.edit", ['id_paciente' -> $paciente->id, 'id_evolucao_judo' -> $evolucao_judo->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.judo", ['id_paciente' -> $paciente->id, 'id_evolucao_judo' -> $evolucao_judo->id]));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarEvolucaoPsicologia() {

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);


        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);


        $evolucao_psicologica = factory(EvolucaoPsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoPsicologica::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.psicologica", ['id_paciente' -> $paciente->id, 'id_evolucao_psicologica' -> $evolucao_psicologica->id]));

        $res = $this->post(route("profissional.evolucao.psicologica.edit", ['id_paciente' -> $paciente->id, 'id_evolucao_psicologica' -> $evolucao_psicologica->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.psicologica", ['id_paciente' -> $paciente->id, 'id_evolucao_psicologica' -> $evolucao_psicologica->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarEvolucaoFonoaudiologica() {

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);


        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);


        $evolucao_fonoaudiologica = factory(EvolucaoFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoFonoaudiologia::all() {);

        $resposta->assertRedirect('/profisional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.fonoaudiologica", ['id_paciente' -> $paciente->id, 'id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));

        $res = $this->post(route("profissional.evolucao.fonoaudiologica.edit", ['id_paciente' -> $paciente->id, 'id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.fonoaudiologica", ['id_paciente' -> $paciente->id, 'id_evolucao_fonoaudiologica' -> $evolucao_fonoaudiologica->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarEvolucaoTerapiaOcupacional() {


        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evolucao_to = factory(EvolucaoTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, EvolucaoTerapiaOcupacional::all() {);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.evolucao.terapia_ocupacional", ['id_paciente' -> $paciente->id, 'id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));

        $res = $this->post(route("profissional.evolucao.terapia_ocupacional.edit", ['id_paciente' -> $paciente->id, 'id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.evolucao.terapia_ocupacional", ['id_paciente' -> $paciente->id, 'id_evolucao_terapia_ocupacional' -> $evolucao_to->id]));
    }




    /** @test **/
    public function pacienteNaoPodeVerEvolucaoJudoQueNaoExiste() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.judo", ['id_evolucao_judo' -> 999]));
        $this->seePageIs(route("paciente.evolucao.judo"));
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoPsicologiaQueNaoExiste() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.psicologica", ['id_evolucao_psicologica' -> 999]));
        $this->seePageIs(route("paciente.evolucao.psicologica"));
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoTerapiaOcupacionalQueNaoExiste() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.terapia_ocupacional", ['id_evolucao_terapia_ocupacional' -> 999]));
        $this->seePageIs(route("paciente.evolucao.terapia_ocupacional"));
    }



    /** @test **/
    public function pacienteNaoPodeVerEvolucaoFonoaudiologiaQueNaoExiste() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);


        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.evolucao.fonoaudiologica", ['id_evolucao_fonoaudiologica' -> 999]));
        $this->seePageIs(route("paciente.evolucao.fonoaudiologica"));
    }

}
