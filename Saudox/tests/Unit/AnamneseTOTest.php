<?php

namespace Tests\Unit;

use App\AnamneseTerapiaOcupacional;
use App\Endereco;
use App\Http\Controllers\Profissional\ProfissionalAnamneseController;
use Tests\TestCase;
use App\Paciente;
use App\Profissional;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnamneseTerapiaOcupacionalTest extends TestCase {


    private $controller;
    protected function setUp(): void {
        parent::setUp();
        $this->endereco = factory(Endereco::class)->create();
        $this->profissional = factory(Profissional::class)->create();
        $this->controller = new ProfissionalAnamneseController;
    }


    private function criarAnamneseTO() {
        $this->assertCount(0, AnamneseTerapiaOcupacional::all());
        factory(AnamneseTerapiaOcupacional::class)->create();
        $this->assertCount(1, AnamneseTerapiaOcupacional::all());
    }

    private function criarPaciente() {
        $this->assertCount(0, Paciente::all());
        factory(Paciente::class)->create();
        $this->assertCount(1, Paciente::all());
    }


    public function testVerRetornaViewQuandoPacienteExisteEAnamneseExiste() {
        $this->criarPaciente();
        $this->criarAnamneseTO();
        $resposta = $this->controller->verTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.anamnese.terapia_ocupacional.ver');
    }


    public function testVerRetornaRedirectQuandoPacienteNaoExiste() {
        $resposta = $this->controller->verTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }

    public function testVerRetornaRedirectQuandoPacienteExisteEAnamneseNaoExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->verTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Anamnese%20do%20paciente%201%20n%C3%A3o%20existe", strval($resposta));
    }


    public function testCriarRetornaViewPacienteExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->criarTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.anamnese.terapia_ocupacional.criar');
    }

    public function testCriarRetornaRedirectPacienteNaoExiste() {
        $resposta = $this->controller->criarTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }


    public function tetSalvarATOQuandoTudoOkRetornaRedirect() {
        /* TODO: esse teste */
        $this->assertTrue(true);
    }

    public function testEditarRetornaViewQuandoPacienteExisteEAnamneseExiste() {
        $this->criarPaciente();
        $this->criarAnamneseTO();
        $resposta = $this->controller->editarTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.anamnese.terapia_ocupacional.editar');
    }

    public function testEditarRetornaRedirectQuandoPacienteNaoExiste() {
        $resposta = $this->controller->editarTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }

    public function testEditarRetornaRedirectQuandoPacienteExisteEAnamneseNaoExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->editarTerapiaOcupacional(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Anamnese%20do%20paciente%201%20n%C3%A3o%20existe", strval($resposta));
    }

    public function testSalvarEditarATOQuandoTudoOkRetornaRedirect() {
        /* TODO: esse teste */
        $this->assertTrue(true);
    }




}
