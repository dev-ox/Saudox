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


    /** **/
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
    public function funcionarioPermitidoPodeAcessarAnamnesePacienteExistente() {
       $func = factory(Profissional::class)->create([
           'password' => bcrypt($password = '123123123'),
           'profissao' => 'Administrador',
       ]);

       $this->post(route("profissional.login"), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $copia_pac = factory(Paciente::class)->create($this->paciente);

       $pacie = Paciente::first();

       $this->visit(route("profissional.anamnese", ['id_paciente' -> $pacie->id]));
       $this->seePageIs(route("profissional.anamnese", ['id_paciente' -> $pacie->id]));
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarAnamnesePacienteInexistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

       $this->post(route("profissional.login"), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit(route("profissional.anamnese", ['id_paciente' -> 0]));
       $this->seePageIs(route("profissional.home"));
    }

    /** @test **/
    public function funcionarioNaoAutorizadoNaoPodeAcessarAnamnesePacienteExistente() {
       $func = $this->funcionario;

       $this->post(route("profissional.login"), [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit(route("profissional.anamnese", ['id_paciente' -> 0]));

       $value = 'Você não possui privilégios para isso.';
       $tempo = 5; // Tempo em segundo até o fim da espera
       $res->waitForText($value, $tempo);
       $res->assertOk();
       $this->seePageIs(route("profissional.home"));
    }


    /** @test **/
    public function pacientePodeVerPaginaAnamnesePacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.anamnese"));
        $this->seePageIs(route("paciente.anamnese"));
    }


    /** @test **/
    public function pacientePodeVerAnamnesePsicoNeuroMotoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $anamne_psi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.anamnese.neuropsicomotora"));
        $this->seePageIs(route("paciente.anamnese.neuropsicomotora"));
    }

    /** @test **/
    public function pacientePodeVerAnamneseFonoaudiologicaPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $anamne_fono = factory(Anamnese_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.anamnese.fonoaudiologia"));
        $this->seePageIs(route("paciente.anamnese.fonoaudiologia"));
    }

    /** @test **/
    public function pacientePodeVerAnamneseTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->visit(route("paciente.anamnese.terapia_ocupacional"));
        $this->seePageIs(route("paciente.anamnese.terapia_ocupacional"));
    }


    /** @test **/
    public function pacienteNaoPodeVerAnamnesePsicologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamne_psi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.anamnese.neuropsicomotora"));
        $this->seePageIs(route("paciente.login"));
    }

    /** @test **/
    public function pacienteNaoPodeVerAnamneseTerapiaOcupacionalPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.anamnese.terapia_ocupacional"));
        $this->seePageIs(route("paciente.login"));
    }



    /** @test **/
    public function pacienteNaoPodeVerAnamneseFonoaudiologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("paciente.login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamne_fonoaudiologia = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        $this->visit(route("paciente.anamnese.fonoaudiologia"));
        $this->seePageIs(route("paciente.login"));
    }

    /** @test **/
    public function pacienteNaoPodeVerPaginaAnamnesePacienteSeNaoEstiverLogado() {
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

        $this->visit(route("paciente.anamnese"));
        $this->seePageIs(route("paciente.login"));
    }


    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamnesePsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);


        $anamne_psi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();

        $this->assertCount(1, Anamnese_psicologica::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.anamnese.neuropsicomotora", ['id_paciente' -> $paciente->id]));

        $res = $this->post(route("profissional.anamnese.neuropsicomotora.delete", ['id_paciente' -> $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.anamnese.neuropsicomotora", ['id_paciente' -> $paciente->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseFonoaudiologica() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $anamne_fono = factory(Anamnese_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$func_novo->id,
        ]);

        $this->assertCount(1, Anamnese_Fonoaudiologia::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.anamnese.fonoaudiologia", ['id_paciente' -> $paciente->id]));

        $res = $this->post(route("profissional.anamnese.fonoaudiologia.delete", ['id_paciente' -> $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.anamnese.fonoaudiologia", ['id_paciente' -> $paciente->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);


        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$func_novo->id,
        ]);

        $this->assertCount(1, AnamneseTerapiaOcupacional::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' -> $paciente->id]));

        $res = $this->post(route("profissional.anamnese.terapia_ocupacional.delete", ['id_paciente' -> $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' -> $paciente->id]));
    }



    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseNeuroPsicoMoto() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Neurologista',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);


        $anamne_psi = factory(Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::class)->create();
        $this->assertCount(1, Anamnese_Gigante_Psicopeda_Neuro_Psicomoto::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.anamnese.neuropsicomotora", ['id_paciente' -> $paciente->id]));

        $res = $this->post(route("profissional.anamnese.neuropsicomotora.edit", ['id_paciente' -> $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.anamnese.neuropsicomotora", ['id_paciente' -> $paciente->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseFonoaudiologica() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $anamne_fono = factory(Anamnese_Fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$func_novo->id,
        ]);

        $this->assertCount(1, Anamnese_Fonoaudiologia::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.anamnese.fonoaudiologia", ['id_paciente' -> $paciente->id]));

        $res = $this->post(route("profissional.anamnese.fonoaudiologia.edit", ['id_paciente' -> $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.anamnese.fonoaudiologia", ['id_paciente' -> $paciente->id]));
    }

    /** @test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $funcionario->login,
            'password' => $funcionario->$password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$func_novo->id,
        ]);

        $this->assertCount(1, AnamneseTerapiaOcupacional::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($funcionario);

        $this->visit(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' -> $paciente->id]));

        $res = $this->post(route("profissional.anamnese.terapia_ocupacional.edit", ['id_paciente' -> $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' -> $paciente->id]));
    }


}
