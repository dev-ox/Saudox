<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class AvaliacaoTest extends TestCase {
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
    public function funcionarioPermitidoPodeAcessarAvaliacaoPacienteExistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $copia_pac = factory(Paciente::class)->create($this->paciente);

       $pacie = Paciente::first();

       $this->visit(route('profissional.avaliacao', ['id_paciente' => $pacie->id]));
       $this->seePageIs(route('profissional.avaliacao', ['id_paciente' => $pacie->id]));
       $resposta->assertOk();
    }


    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarAvaliacaoPacienteInexistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit(route('profissional.avaliacao', ['id_paciente' => 0]));
       $this->seePageIs(route('profissional.home'));
    }


    /** @test **/
    public function funcionarioNaoAutorizadoNaoPodeAcessarAvaliacaoPacienteExistente() {

       $func = $this->funcionario;

       $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit(route('profissional.avaliacao', ['id_paciente' => 0]));

       $value = 'Você não possui privilégios para isso.';
       $tempo = 5; // Tempo em segundo até o fim da espera
       $res->waitForText($value, $tempo);
       $res->assertOk();
       $this->seePageIs(route('profissional.home'));
    }


    /** @test **/
    public function pacientePodeVerPaginaAvalicaoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route('paciente.avaliacao'));
        $this->seePageIs(route('paciente.avaliacao'));
    }


    /** @test **/
    public function pacientePodeVerAvalicaoJudoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_judo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route('paciente.avaliacao.judo'));
        $this->seePageIs(route('paciente.avaliacao.judo'));
    }


    /** @test **/
    public function pacientePodeVerAvalicaoPsicologiaPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_neuro_psi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route('paciente.avaliacao.neuropsicologica'));
        $this->seePageIs(route('paciente.avaliacao.neuropsicologica'));
    }


    /** @test **/
    public function pacientePodeVerAvalicaoFonoaudiologicaPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_fono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route('paciente.avaliacao.fonoaudiologia'));
        $this->seePageIs(route('paciente.avaliacao.fonoaudiologia'));
    }


    /** @test **/
    public function pacientePodeVerAvalicaoTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avali_tera_ocu = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route('paciente.avaliacao.terapiaOcupacional'));
        $this->seePageIs(route('paciente.avaliacao.terapiaOcupacional'));
    }


    /** @test **/
    public function pacienteNaoPodeVerAvalicaoJudoPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_judo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        $this->visit(route('paciente.avaliacao.fonoaudiologia'));
        $this->seePageIs(route('paciente.login'));
    }


    /** @test **/
    public function pacienteNaoPodeVerAvalicaoPsicologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_neuro_psi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        $this->visit(route('paciente.avaliacao.neuropsicologica'));
        $this->seePageIs(route('paciente.login'));
    }


    /** @test **/
    public function pacienteNaoPodeVerAvalicaoTerapiaOcupacionalPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_tera_ocu = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        $this->visit(route('paciente.avaliacao.terapiaOcupacional'));
        $this->seePageIs(route('paciente.login'));
    }


    /** @test **/
    public function pacienteNaoPodeVerAvalicaoFonoaudiologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avali_fono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        $this->visit(route('paciente.avaliacao.judo'));
        $this->seePageIs(route('paciente.login'));
    }


    /** @test **/
    public function pacienteNaoPodeVerPaginaAvalicaoPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route('paciente.login'), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route('paciente.logout'));

        $this->visit(route('paciente.avaliacao'));
        $this->seePageIs(route('paciente.login'));
    }


    /** @test **/
    public function pacienteNaoPodeDeletarAvalicaoJudo() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $avali_judo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Judo::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.judo.delete', ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoPsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $avali_neuro_psi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Neuropsicologica::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.neuropsicologica', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.neuropsicologica.delete'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.neuropsicologica'));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoFonoaudiologica() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $avali_fono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Fonoaudiologia::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.fonoaudiologia', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.fonoaudiologia.delete'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.fonoaudiologia'));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);
        $avali_tera_ocu = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Terapia_Ocupacional::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.terapiaOcupacional', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.terapiaOcupacional.delete'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.terapiaOcupacional'));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoJudo() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $avali_judo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Judo::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.judo.edit'), ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.judo', ['id_paciente' => $paciente->id]));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoPsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $avali_neuro_psi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Neuropsicologica::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.neuropsicologica', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.neuropsicologica.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.neuropsicologica'));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoFonoaudiologica() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);
        $avali_fono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Fonoaudiologia::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.fonoaudiologia', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.fonoaudiologia.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.fonoaudiologia'));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $avali_tera_ocu = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Terapia_Ocupacional::all());

        $resposta->assertRedirect(route('profissional.home'));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route('profissional.avaliacao.terapiaOcupacional', ['id_paciente' => $paciente->id]));

        $res = $this->post(route('profissional.avaliacao.terapiaOcupacional.edit'), ['id_paciente' => $paciente->id]);
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route('profissional.avaliacao.terapiaOcupacional'));
    }


}
