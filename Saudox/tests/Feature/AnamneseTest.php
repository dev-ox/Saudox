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
    public function funcionarioPermitidoPodeAcessarAnamnesePacienteExistente()
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

       $this->visit('/profissional/paciente/{$pacie->id}/anamnese');
       $this->seePageIs('/profissional/paciente/{$pacie->id}/anamnese');
       $resposta->assertOk();
    }

    /** @test **/
    public function funcionarioPermitidoNaoPodeAcessarAnamnesePacienteInexistente()
    {
       $func = $this->$funcionario;

       $this->post('/profissional/login', [
            'login' => $func->login,
            'password' => $password,
       ]);

       $this->assertAuthenticatedAs($funcionario);

       $this->visit('/profissional/paciente/0/anamnese');
       $this->seePageIs('/profissional/home');
    }

    /** @test **/
    public function funcionarioNaoPermitidoNaoPodeAcessarAnamnesePacienteExistente()
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

         $this->visit('/profissional/paciente/{$pacie->id}/anamnese');
         $this->seePageIs('/profissional/home');
    }



}
