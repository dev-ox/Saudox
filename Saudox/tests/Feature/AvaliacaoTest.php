<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

class avaliacaoTest extends TestCase
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
    public function funcionarioPermitidoPodeAcessarAvaliacaoPacienteExistente()
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

       $this->visit('/profissional/paciente/{$pacie->id}/avaliacao');
       $this->seePageIs('/profissional/paciente/{$pacie->id}/avaliacao');
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarAvaliacaoPacienteInexistente()
    {
       $func = $this->$funcionario;

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit('/profissional/paciente/0/avaliacao');
       $this->seePageIs('/profissional/home');
    }

    /** @test **/
    public function funcionarioNaoPermitidoNaoPodeAcessarAvaliacaoPacienteExistente()
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

         $this->visit('/profissional/paciente/{$pacie->id}/avaliacao');
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

        $this->visit('/paciente/avaliacao/judo/{$avaliJudo->id}');
        $this->seePageIs('/paciente/avaliacao/judo/{$avaliJudo->id}');
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

        $this->visit('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');
        $this->seePageIs('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');
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

        $this->visit('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}');
        $this->seePageIs('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}');
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

        $this->visit('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');
        $this->seePageIs('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');
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

        $this->visit('/paciente/avaliacao/fonoaudiologia/{$avaliJudo->id}');
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

        $this->visit('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');
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

        $this->visit('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');
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

        $this->visit('/paciente/avaliacao/judo/{$avaliFono->id}');
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

        $resposta = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $avaliJudo = factory(Avalicao_Judo::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->$funcionario->id,
        ]);

        $this->assertCount(1, Avalicao_Judo::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/judo/{$avaliJudo->id}');

        $res = $this->post('/paciente/avaliacao/judo/{$avaliJudo->id}/delete')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/judo/{$avaliJudo->id}');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarAvalicaoPsicologia()
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

        $this->assertCount(1, Avalicao_Neuropsicologica::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');

        $res = $this->post('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}/delete')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarAvalicaoFonoaudiologica()
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

        $this->assertCount(1, Avalicao_Fonoaudiologia::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}');

        $res = $this->post('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}/delete')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}');
    }

    /** @test **/
    public function pacienteNaoPodeDeletarAvalicaoTerapiaOcupacional()
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

        $this->assertCount(1, Avalicao_Terapia_Ocupacional::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');

        $res = $this->post('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}/delete')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');
    }


    /** @test **/
    public function pacienteNaoPodeEditarAvalicaoJudo()
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

        $this->assertCount(1, Avalicao_Judo::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/judo/{$avaliJudo->id}');

        $res = $this->post('/paciente/avaliacao/judo/{$avaliJudo->id}/edit')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/judo/{$avaliJudo->id}');
    }


    /** @test **/
    public function pacienteNaoPodeEditarAvalicaoPsicologia()
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

        $this->assertCount(1, Avalicao_Neuropsicologica::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');

        $res = $this->post('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}/edit')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/neuropsicologica/{$avaliPsi->id}');
    }

    /** @test **/
    public function pacienteNaoPodeEditarAvalicaoFonoaudiologica()
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

        $this->assertCount(1, Avalicao_Fonoaudiologia::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}');

        $res = $this->post('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}/edit')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/fonoaudiologia/{$avaliFono->id}');
    }

    /** @test **/
    public function pacienteNaoPodeEditarAvalicaoTerapiaOcupacional()
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

        $this->assertCount(1, Avalicao_Terapia_Ocupacional::all());

        $resposta->assertRedirect('/paciente/home');
        $this->assertAuthenticatedAs($paciente);

        $this->visit('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');

        $res = $this->post('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}/edit')
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        $this->seePageIs('/paciente/avaliacao/terapiaOcupacional/{$avaliTO->id}');
    }


        /** @test **/
        public function pacienteNaoPodeVerAvaliacaoJudoQueNaoExiste()
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

            $this->visit('/paciente/avaliacao/judo/999');
            $this->seePageIs('/paciente/avaliacao/judo');
        }

        /** @test **/
        public function pacienteNaoPodeVerAvaliacaoPsicologiaQueNaoExiste()
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

            $this->visit('/paciente/avaliacao/neuroPsicomotora/999');
            $this->seePageIs('/paciente/avaliacao/neuroPsicomotora');
        }

        /** @test **/
        public function pacienteNaoPodeVerAvaliacaoTerapiaOcupacionalQueNaoExiste()
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

            $this->visit('/paciente/avaliacao/terapiaOcupacional/999');
            $this->seePageIs('/paciente/avaliacao/terapiaOcupacional/');
        }



        /** @test **/
        public function pacienteNaoPodeVerAvaliacaoFonoaudiologiaQueNaoExiste()
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

            $this->visit('/paciente/avaliacao/fonoaudiologia/999');
            $this->seePageIs('/paciente/avaliacao/fonoaudiologia');
        }


}
