<?php

namespace Tests\Unit;

use App\AnamneseFonoaudiologia;
use App\Endereco;
use App\Http\Controllers\Profissional\ProfissionalAnamneseController;
use Tests\TestCase;
use App\Paciente;
use App\Profissional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnamneseFonoTest extends TestCase {


    private $controller;
    private $endereco;
    private $profissional;
    private $anamnese_ok;
    protected function setUp(): void {
        parent::setUp();
        $this->endereco = factory(Endereco::class)->create();
        $this->profissional = factory(Profissional::class)->create();
        $this->controller = new ProfissionalAnamneseController;
    }


    private function criarAnamneseTO() {
        $this->assertCount(0, AnamneseFonoaudiologia::all());
        factory(AnamneseFonoaudiologia::class)->create();
        $this->assertCount(1, AnamneseFonoaudiologia::all());
    }

    private function criarPaciente() {
        $this->assertCount(0, Paciente::all());
        factory(Paciente::class)->create();
        $this->assertCount(1, Paciente::all());
    }


    public function testVerRetornaViewQuandoPacienteExisteEAnamneseExiste() {
        $this->criarPaciente();
        $this->criarAnamneseTO();
        $resposta = $this->controller->verFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.anamnese.fonoaudiologia.ver');
    }


    public function testVerRetornaRedirectQuandoPacienteNaoExiste() {
        $resposta = $this->controller->verFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }

    public function testVerRetornaRedirectQuandoPacienteExisteEAnamneseNaoExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->verFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Anamnese%20do%20paciente%201%20n%C3%A3o%20existe", strval($resposta));
    }


    public function testCriarRetornaViewPacienteExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->criarFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.anamnese.fonoaudiologia.criar');
    }

    public function testCriarRetornaRedirectPacienteNaoExiste() {
        $resposta = $this->controller->criarFonoaudiologia(1);
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
        $resposta = $this->controller->editarFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.anamnese.fonoaudiologia.editar');
    }

    public function testEditarRetornaRedirectQuandoPacienteNaoExiste() {
        $resposta = $this->controller->editarFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }

    public function testEditarRetornaRedirectQuandoPacienteExisteEAnamneseNaoExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->editarFonoaudiologia(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Anamnese%20do%20paciente%201%20n%C3%A3o%20existe", strval($resposta));
    }

    public function testSalvarEditarATOQuandoTudoOkRetornaRedirect() {
        /* TODO: esse teste */
        $this->assertTrue(true);
    }




}
