<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class AnamneseTest extends TestCase
{
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
    public function funcionarioPermitidoPodeAcessarAnamnesePacienteExistente()
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

       $this->visit('/profissional/paciente/{$pacie->id}/anamnese');
       $this->seePageIs('/profissional/paciente/{$pacie->id}/anamnese');
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarAnamnesePacienteInexistente()
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

       $this->visit('/profissional/paciente/0/anamnese');
       $this->seePageIs('/profissional/home');
    }

    /** @test **/
    public function funcionarioNaoAutorizadoNaoPodeAcessarAnamnesePacienteExistente()
    {

       $func = $this->funcionario;

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit('/profissional/paciente/0/anamnese');

       $value = 'Você não possui privilégios para isso.';
       $tempo = 5; // Tempo em segundo até o fim da espera
       $res->waitForText($value, $tempo);
       $res->assertOk();
       $this->seePageIs('/profissional/home');
    }


    /** @test **/
    public function pacientePodeVerPaginaAnamnesePacienteSeEstiverLogado()
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

        $this->visit('/paciente/anamnese');
        $this->seePageIs('/paciente/anamnese');
    }


    /** @test **/
    public function pacientePodeVerAnamnesePsicoNeuroMotoPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $anamnePsi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/anamnese/neuroPsicomotora/');
        $this->seePageIs('/paciente/anamnese/neuroPsicomotora/');
    }

    /** @test **/
    public function pacientePodeVerAnamneseFonoaudiologicaPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $anamneFono = factory(Anamnese_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/anamnese/fonoaudiologia');
        $this->seePageIs('/paciente/anamnese/fonoaudiologia');
    }

    /** @test **/
    public function pacientePodeVerAnamneseTerapiaOcupacionalPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $anamneTO = factory(Anamnese_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/anamnese/terapiaOcupacional/');
        $this->seePageIs('/paciente/anamnese/terapiaOcupacional/');
    }


    /** @test **/
    public function pacienteNaoPodeVerAnamnesePsicologiaPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamnePsi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/anamnese/neuroPsicomotora/');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerAnamneseTerapiaOcupacionalPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamneTO = factory(Anamnese_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/anamnese/terapiaOcupacional/');
        $this->seePageIs('/paciente/login');
    }



    /** @test **/
    public function pacienteNaoPodeVerAnamneseFonoaudiologiaPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamneFonoaudiologia = factory(Anamnese_fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/anamnese/fonoaudiologia');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerPaginaAnamnesePacienteSeNaoEstiverLogado()
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

        $this->visit('/paciente/anamnese');
        $this->seePageIs('/paciente/login');
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamnesePsicologia()
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


        $anamnePsi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();

        $this->assertCount(1, Anamnese_psicologica::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/anamnese/neuroPsicomotora/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/anamnese/neuroPsicomotora/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/anamnese/neuroPsicomotora/');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseFonoaudiologica()
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

        $anamneFono = factory(Anamnese_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Anamnese_Fonoaudiologia::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/anamnese/fonoaudiologia');

        $res = $this->post('/profissional/paciente/{$paciente->id}/anamnese/fonoaudiologia/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/anamnese/fonoaudiologia');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseTerapiaOcupacional()
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


        $anamneTO = factory(Anamnese_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Anamnese_Terapia_Ocupacional::all());

        $resposta->assertRedirect('/profisional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/anamnese/terapiaOcupacional/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/anamnese/terapiaOcupacional/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/anamnese/terapiaOcupacional/');
    }



    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseNeuroPsicoMoto()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->funcN = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Neurologista',
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);


        $anamnePsi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();
        $this->assertCount(1, Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::all());

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/anamnese/neuroPsicomotora/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/anamnese/neuroPsicomotora/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/anamnese/neuroPsicomotora/');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseFonoaudiologica()
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

        $anamneFono = factory(Anamnese_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Anamnese_Fonoaudiologia::all());

        $resposta->assertRedirect('/profisional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/anamnese/fonoaudiologia');

        $res = $this->post('/profissional/paciente/{$paciente->id}/anamnese/fonoaudiologia/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/anamnese/fonoaudiologia');
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseTerapiaOcupacional()
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

        $anamneTO = factory(Anamnese_Terapia_Ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcN->id,
        ]);

        $this->assertCount(1, Anamnese_Terapia_Ocupacional::all());

        $resposta->assertRedirect('/profisional/home');
        $this->assertAuthenticatedAs($funcionario);

        $this->visit('/profissional/paciente/{$paciente->id}/anamnese/terapiaOcupacional/');

        $res = $this->post('/profissional/paciente/{$paciente->id}/anamnese/terapiaOcupacional/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/profissional/paciente/{$paciente->id}/anamnese/terapiaOcupacional/');
    }


}
