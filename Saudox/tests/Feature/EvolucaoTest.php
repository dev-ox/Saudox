<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class EvolucaoTest extends TestCase
{
    public $funcionario;

    private $endereco;

    private $paciente;

    public function setUp() : void {
        parent::setUp();

        $this->funcionario = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
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
    public function funcionarioPermitidoPodeAcessarEvolucaoPacienteExistente()
    {
       $func = $this->$funcionario;

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $copiaPac = $this->$paciente;

       $this->post('/profissional/criarpaciente', $copiaPac);

       $pacie = Paciente::first();

       $this->visit('/profissional/paciente/{$pacie->id}/evolucao');
       $this->seePageIs('/profissional/paciente/{$pacie->id}/evolucao');
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarEvolucaoPacienteInexistente()
    {
       $func = $this->$funcionario;

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit('/profissional/paciente/0/evolucao');
       $this->seePageIs('/profissional/home');
    }


    /** @test **/
    public function funcionarioNaoPermitidoNaoPodeAcessarEvolucaoPacienteExistente()
    {
         $func = $this->$funcionario;


         $this->post('/profissional/login', [
              'login' => $func->login,
              'password' => $password,
         ]);

         $f = factory(Profissional::class)->create([
          'password' => bcrypt($password = '123123123'),
          'profissao' => 'Lutador',
         ]);


         $this->assertAuthenticatedAs($funcionario);

         $copiaPac = $this->$paciente;

         $this->post('/profissional/criarpaciente', $copiaPac);
         $this->post('/profissional/logout');

         $this->post('/profissional/login', [
              'login' => $f->login,
              'password' => $password,
         ]);

         $pacie = Paciente::first();

         $this->visit('/profissional/paciente/{$pacie->id}/evolucao');
         $this->seePageIs('/profissional/home');
    }


    /** @test **/
    public function pacientePodeVerPaginaEvolucaoPacienteSeEstiverLogado()
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

        $this->visit('/paciente/evolucao');
        $this->seePageIs('/paciente/evolucao');
    }


    /** @test **/
    public function pacientePodeVerEvolucaoJudoPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evoluJudo = factory(Evolucao_judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/judo/{$evoluJudo->id}');
        $this->seePageIs('/paciente/evolucao/judo/{$evoluJudo->id}');
    }

    /** @test **/
    public function pacientePodeVerEvolucaoPsicologiaPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evoluPsi = factory(Evolucao_psicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/psicologica/{$evoluPsi->id}');
        $this->seePageIs('/paciente/evolucao/psicologica/{$evoluPsi->id}');
    }

    /** @test **/
    public function pacientePodeVerEvolucaoFonoaudiologicaPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evoluFono = factory(Evolucao_fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}');
        $this->seePageIs('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}');
    }

    /** @test **/
    public function pacientePodeVerEvolucaoTerapiaOcupacionalPacienteSeEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $evoluTO = factory(Evolucao_terapia_ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');
        $this->seePageIs('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');
    }


    /** @test **/
    public function pacienteNaoPodeVerEvolucaoJudoPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluJudo = factory(Evolucao_judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/evolucao/fonoaudiologia/{$evoluJudo->id}');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoPsicologiaPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluPsi = factory(Evolucao_psicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/evolucao/psicologica/{$evoluPsi->id}');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoTerapiaOcupacionalPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluTO = factory(Evolucao_terapia_ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');
        $this->seePageIs('/paciente/login');
    }



    /** @test **/
    public function pacienteNaoPodeVerEvolucaoFonoaudiologiaPacienteSeNaoEstiverLogado()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluFono = factory(Evolucao_fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->post('/paciente/logout');

        $this->visit('/paciente/evolucao/judo/{$evoluFono->id}');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeVerPaginaEvolucaoPacienteSeNaoEstiverLogado()
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

        $this->visit('/paciente/evolucao');
        $this->seePageIs('/paciente/login');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarEvolucaoJudo()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluJudo = factory(Evolucao_judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_judo::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/judo/{$evoluJudo->id}');

        $res = $this->post('/paciente/evolucao/judo/{$evoluJudo->id}/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/judo/{$evoluJudo->id}');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarEvolucaoPsicologia()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluPsi = factory(Evolucao_psicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_psicologica::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/psicologica/{$evoluPsi->id}');

        $res = $this->post('/paciente/evolucao/psicologica/{$evoluPsi->id}/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/psicologica/{$evoluPsi->id}');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarEvolucaoFonoaudiologica()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluFono = factory(Evolucao_fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_fonoaudiologia::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}');

        $res = $this->post('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarEvolucaoTerapiaOcupacional()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluTO = factory(Evolucao_terapia_ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_terapia_ocupacional::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');

        $res = $this->post('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}/delete');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');
    }


    /** @test **/
    public function pacienteNaoPodeEditarEvolucaoJudo()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluJudo = factory(Evolucao_judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_judo::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/judo/{$evoluJudo->id}');

        $res = $this->post('/paciente/evolucao/judo/{$evoluJudo->id}/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/judo/{$evoluJudo->id}');
    }


    /** @test **/
    public function pacienteNaoPodeEditarEvolucaoPsicologia()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluPsi = factory(Evolucao_psicologica::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_psicologica::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/psicologica/{$evoluPsi->id}');

        $res = $this->post('/paciente/evolucao/psicologica/{$evoluPsi->id}/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/psicologica/{$evoluPsi->id}');
    }

    /** @test **/
    public function pacienteNaoPodeEditarEvolucaoFonoaudiologica()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluFono = factory(Evolucao_fonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_fonoaudiologia::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}');

        $res = $this->post('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/fonoaudiologia/{$evoluFono->id}');
    }

    /** @test **/
    public function pacienteNaoPodeEditarEvolucaoTerapiaOcupacional()
    {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $evoluTO = factory(Evolucao_terapia_ocupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Evolucao_terapia_ocupacional::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');

        $res = $this->post('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}/edit');
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/evolucao/terapiaOcupacional/{$evoluTO->id}');
    }




    /** @test **/
    public function pacienteNaoPodeVerEvolucaoJudoQueNaoExiste()
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

        $this->visit('/paciente/evolucao/judo/999');
        $this->seePageIs('/paciente/evolucao/judo');
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoPsicologiaQueNaoExiste()
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

        $this->visit('/paciente/evolucao/neuroPsicomotora/999');
        $this->seePageIs('/paciente/evolucao/neuroPsicomotora');
    }

    /** @test **/
    public function pacienteNaoPodeVerEvolucaoTerapiaOcupacionalQueNaoExiste()
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

        $this->visit('/paciente/evolucao/terapiaOcupacional/999');
        $this->seePageIs('/paciente/evolucao/terapiaOcupacional/');
    }



    /** @test **/
    public function pacienteNaoPodeVerEvolucaoFonoaudiologiaQueNaoExiste()
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

        $this->visit('/paciente/evolucao/fonoaudiologia/999');
        $this->seePageIs('/paciente/evolucao/fonoaudiologia');
    }

}
