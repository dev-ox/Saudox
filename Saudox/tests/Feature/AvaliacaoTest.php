<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class avaliacaoTest extends TestCase {
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
    public function funcionarioPermitidoPodeAcessarAvaliacaoPacienteExistente()
    {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $copiaPac = factory(Paciente::class)->create($this->paciente);

       $pacie = Paciente::first();

       $this->visit('/profissional/paciente/{$pacie->id}/avaliacao');
       $this->seePageIs('/profissional/paciente/{$pacie->id}/avaliacao');
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarAvaliacaoPacienteInexistente()
    {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit('/profissional/paciente/0/avaliacao');
       $this->seePageIs('/profissional/home');
    }

    /** @test **/
    public function funcionarioNaoAutorizadoNaoPodeAcessarAvaliacaoPacienteExistente()
    {

       $func = $this->funcionario;

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit('/profissional/paciente/0/avaliacao');

       $value = 'Você não possui privilégios para isso.';
       $tempo = 5; // Tempo em segundo até o fim da espera
       $res->waitForText($value, $tempo);
       $res->assertOk();
       $this->seePageIs('/profissional/home');
    }


    /** @test **/
    public function pacientePodeVerPaginaAvalicaoPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao');
        $this->seePageIs('/paciente/avaliacao');
    }


    /** @test **/
    public function pacientePodeVerAvalicaoJudoPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avaliJudo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/judo/');
        $this->seePageIs('/paciente/avaliacao/judo/');
    }

    /** @test **/
    public function pacientePodeVerAvalicaoPsicologiaPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avaliPsi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/neuropsicologica');
        $this->seePageIs('/paciente/avaliacao/neuropsicologica');
    }

    /** @test **/
    public function pacientePodeVerAvalicaoFonoaudiologicaPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avaliFono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/fonoaudiologia/');
        $this->seePageIs('/paciente/avaliacao/fonoaudiologia/');
    }

    /** @test **/
    public function pacientePodeVerAvalicaoTerapiaOcupacionalPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $avaliTO = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/terapiaOcupacional/');
        $this->seePageIs('/paciente/avaliacao/terapiaOcupacional/');
    }


    /** @test **/
    public function pacienteNaoPodeVerAvalicaoJudoPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avaliJudo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/avaliacao/fonoaudiologia/');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerAvalicaoPsicologiaPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avaliPsi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/avaliacao/neuropsicologica');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerAvalicaoTerapiaOcupacionalPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avaliTO = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/avaliacao/terapiaOcupacional/');
        $this->seePageIs('/paciente/login');
    }



    /** @test **/
    public function pacienteNaoPodeVerAvalicaoFonoaudiologiaPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avaliFono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/avaliacao/judo/');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerPaginaAvalicaoPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/avaliacao');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarAvalicaoJudo()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $avaliJudo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Judo::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/judo/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/judo/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/judo/');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoPsicologia()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $avaliPsi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Neuropsicologica::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/neuropsicologica');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/neuropsicologica/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/neuropsicologica');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoFonoaudiologica()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $avaliFono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Fonoaudiologia::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/fonoaudiologia/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/fonoaudiologia/eelete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/fonoaudiologia/');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAvalicaoTerapiaOcupacional()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);
        $avaliTO = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Terapia_Ocupacional::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/terapiaOcupacional/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/terapiaOcupacional/eelete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/terapiaOcupacional/');
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoJudo()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Professor de Judô',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $avaliJudo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Judo::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/judo/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/judo/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/judo/');
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoPsicologia()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $avaliPsi = factory(Avalicao_Neuropsicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Neuropsicologica::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/neuropsicologica');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/neuropsicologica/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/neuropsicologica');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoFonoaudiologica()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);
        $avaliFono = factory(Avalicao_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Fonoaudiologia::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/fonoaudiologia/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/fonoaudiologia/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/fonoaudiologia/');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAvalicaoTerapiaOcupacional()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $avaliTO = factory(Avalicao_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Avalicao_Terapia_Ocupacional::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/avaliacao/terapiaOcupacional/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/avaliacao/terapiaOcupacional/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/avaliacao/terapiaOcupacional/');
    }



}
