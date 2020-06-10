<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;

class CadastroClienteTest extends TestCase
{

    /** @test **/
    public function admPodeAcessarCriacaoPaciente()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);


        $this->visit('/profissional/criarpaciente');
        $this->seePageIs('/profissional/criarpaciente');
    }

    /** @test **/
    public function profissionalDaSaudePodeAcessarCriacaoPaciente()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $resposta = $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect('/profissional/home');
        $this->assertAuthenticatedAs($funcionario);


        $this->visit('/profissional/criarpaciente');
        $this->seePageIs('/profissional/criarpaciente');
    }

    /** @test **/
    public function pacienteNaoPodeAcessarCriacaoPaciente()
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


        $this->visit('/profissional/criarpaciente');
        $this->seePageIs('/paciente/home');
    }

    /** @test **/
    public function profissionalPodeCriarPaciente()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
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
        ]);

        $resposta->assertOk();
        $this->assertCount(1, Paciente::all());

        $paciente = Paciente::first();

        $this->post('/profissional/logout');

        $respostaLog = $this->post('/paciente/login', [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $respostaLog->assertOk();
        $this->assertAuthenticatedAs($paciente);
        $this->seePageIs('/paciente/home');
    }

    /** @test **/
    public function loginPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => '',
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
        ]);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function loginPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => '',
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
        ]);

        $resposta->assertSessionHasErrors('login');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function senhaPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '',
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
        ]);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function senhaPacienteNaoPodeTerPoucosCaracteres()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123',
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
        ]);

        $resposta->assertSessionHasErrors('password');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function nomePacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => '',
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
        ]);

        $resposta->assertSessionHasErrors('nome');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function cpfPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '',
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
        ]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function cpfPacienteNaoPodeTerPoucosCaracteres()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '987654321',
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
        ]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function cpfnPacienteNaoPodeTerMuitosCaracteres()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '9876543211110',
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
        ]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function cpfPacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '987654321UM',
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
        ]);

        $resposta->assertSessionHasErrors('cpf');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function sexoPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => '',
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
        ]);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function sexoPacienteNaoPodeTerNumeros()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Mascul1n0',
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
        ]);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function sexoPacienteNaoPodeSerInvalido()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Genero do Tumblr',
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
        ]);

        $resposta->assertSessionHasErrors('sexo');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nascimentoPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '',
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
        ]);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nascimentoPacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => 'UM-05-1999',
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
        ]);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nascimentoPacientePrecisaTerFormatoCerto()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '1999-10-05',
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
        ]);

        $resposta->assertSessionHasErrors('data_nascimento');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function responsavelPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => '',
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
        ]);

        $resposta->assertSessionHasErrors('responsavel');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nirmaoPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => ,
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
        ]);

        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function nirmaoPacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 'u',
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
        ]);

        $resposta->assertSessionHasErrors('numero_irmaos');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function nomePaiPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => '',
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
        ]);

        $resposta->assertSessionHasErrors('nome_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function nomeMaePacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => '',
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
        ]);

        $resposta->assertSessionHasErrors('nome_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function telefonePaiPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '',
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
        ]);

        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefoneMaePacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function telefoneMaePacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => 'UM111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefoneMaePacienteNaoPodeTerPoucosNumeros()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefoneMaePacienteNaoPodeTerMuitosNumeros()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '1111111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('telefone_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefonePaiPacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '666666666UM',
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
        ]);

        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefonePaiPacienteNaoPodeTerPoucosNumeros()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '666666666',
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
        ]);

        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function telefonePaiPacienteNaoPodeTerMuitosNumeros()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '6666666666666',
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
        ]);

        $resposta->assertSessionHasErrors('telefone_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function emailPaiPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => '',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function emailPaiPacienteNaoPodeSerInvalido()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanasinferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('email_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function emailMaePacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => '',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function emailMaePacienteNaoPodeSerInvalido()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailtestegmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('email_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadePaiPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => ,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadePaiPacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 'UM',
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadePaiPacienteNaoPodeSerGrande()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 300,
            'idade_mae' => 45,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('idade_pai');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadeMaePacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => ,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadeMaePacienteNaoPodeTerLetras()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 'UM',
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function idadeMaePacienteNaoPodeSerGrande()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 300,
            'id_endereco' => $endereco->id,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('idade_mae');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function enderecoPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);


        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'id_endereco' => ,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('id_endereco');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function naturalidadePacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'naturalidade' => '',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function naturalidadePacienteNaoPodeTerNumeros()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'naturalidade' => 'Brasi131r0',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }


    /** @test **/
    public function naturalidadePacientePrecisaExistir()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'naturalidade' => 'Brasilianor',
            'pais_sao_casados' => false,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('naturalidade');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function estadoCivilPaisPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'pais_sao_casados' => ,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('pais_sao_casados');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function estadoCivilPaisPacienteDivorciadosNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'pais_sao_divorciados' => ,
            'tipo_filho_biologico_adotivo' => false,
        ]);

        $resposta->assertSessionHasErrors('pais_sao_divorciados');
        $this->assertCount(0, Paciente::all());
    }

    /** @test **/
    public function tipoDeFilhoPacienteNaoPodeFicarEmBranco()
    {
        $funcionario = factory(Funcionario::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador'
        ]);

        $this->post('/profissional/login', [
            'login' => $funcionario->login,
            'password' => $password,
        ]);

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertAuthenticatedAs($funcionario);

        $resposta = $this->post('/profissional/criarpaciente', [
            'login' => 'literalmentequalquercoisa',
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            'cpf' => '98765432110',
            'sexo' => 'Masculino',
            'data_nascimento' => '10-05-1999',
            'responsavel' => 'Mãe',
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
            'pais_sao_casados' => ,
            'pais_sao_divorciados' => false,
            'tipo_filho_biologico_adotivo' => ,
        ]);

        $resposta->assertSessionHasErrors('tipo_filho_biologico_adotivo');
        $this->assertCount(0, Paciente::all());
    }

























}
