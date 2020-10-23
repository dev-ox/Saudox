<?php

namespace Tests\Unit;

use App\AvaliacaoJudo;
use App\Endereco;
use Tests\TestCase;
use App\Http\Controllers\Profissional\ProfissionalAvaliacaoController;
use App\Paciente;
use App\Profissional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvaliacaoJudoTest extends TestCase {


    private $controller;
    private $avaliacao_ok;
    protected function setUp(): void {
        parent::setUp();
        $this->endereco = factory(Endereco::class)->create();
        $this->profissional = factory(Profissional::class)->create();
        $this->controller = new ProfissionalAvaliacaoController;


        $this->avaliacao_ok = [
            'id_paciente' => "0",
            'id_profissional' => "0",
            'diagnostico' => "0",
            'relacao_com_as_pessoas_judo' => "0",
            'resposta_emocional' => "0",
            'uso_do_corpo' => "0",
            'uso_de_objetos' => "0",
            'adaptacao_a_mudancas' => "0",
            'resposta_auditiva' => "0",
            'resposta_visual' => "0",
            'medo_ou_nervosismo' => "0",
            'comunicacao_verbal' => "0",
            'comunicacao_nao_verbal' => "0",
            'orienta_se_por_som' => "0",
            'reacao_ao_nao' => "0",
            'compreendem_comandos_simples_palavras_que_descrevam_objetos' => "0",
            'manipula_brinquedos_objetos' => "0",
            'equilibrio' => "0",
            'forca' => "0",
            'resistencia' => "0",
            'marcha' => "0",
            'agilidade' => "0",
            'coordenacao_motora_fina' => "0",
            'coordenacao_motora_grossa' => "0",
            'propriocepcao' => "0",
            'compreende_direcoes' => "0",
            'compreende_comandos_professoras' => "0",
            'concentracao' => "0",
            'comportamento_reflexo' => "0",
            'observacoes' => "0",
            'terapias' => "0",
            'objetivos' => "0",
            'tipo_da_aula' => "0",
        ];


    }

    private function criarAvaliacaoJudo() {
        $this->assertCount(0, AvaliacaoJudo::all());
        factory(AvaliacaoJudo::class)->create();
        $this->assertCount(1, AvaliacaoJudo::all());
    }

    private function criarPaciente() {
        $this->assertCount(0, Paciente::all());
        factory(Paciente::class)->create();
        $this->assertCount(1, Paciente::all());
    }

    public function testVerRetornaViewQuandoPacienteExisteEAvaliacaoExiste() {
        $this->criarPaciente();
        $this->criarAvaliacaoJudo();
        $resposta = $this->controller->verJudo(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.avaliacao.judo.ver');
    }


    public function testVerRetornaRedirectQuandoPacienteNaoExiste() {
        $resposta = $this->controller->verJudo(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }

    public function testVerRetornaRedirectQuandoPacienteExisteEAvaliacaoNaoExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->verJudo(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Avalia%C3%A7%C3%A3o%20do%20paciente%201%20n%C3%A3o%20existe\r\n", strval($resposta));
    }


    public function testCriarRetornaViewPacienteExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->criarJudo(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.avaliacao.judo.criar');
    }

    public function testCriarRetornaRedirectPacienteNaoExiste() {
        $resposta = $this->controller->criarJudo(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }


    public function tetSalvarJudoQuandoTudoOkRetornaRedirect() {
        $this->criarPaciente();
        $this->assertCount(0, AvaliacaoJudo::all());
        /* TODO: entender como faz requests; csfr? */
        $request = Request::create(route('profissional.avaliacao.judo.criar.salvar'), 'POST', $this->avaliacao_ok);
        $resposta = $this->controller->salvarJudo($request);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertCount(1, AvaliacaoJudo::all());
    }

    public function testEditarRetornaViewQuandoPacienteExisteEAvaliacaoExiste() {
        $this->criarPaciente();
        $this->criarAvaliacaoJudo();
        $resposta = $this->controller->editarJudo(1);
        $this->assertEquals(get_class($resposta), View::class);
        $this->assertEquals($resposta->getName(), 'profissional.avaliacao.judo.editar');
    }

    public function testEditarRetornaRedirectQuandoPacienteNaoExiste() {
        $resposta = $this->controller->editarJudo(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Paciente%201%20inexistente\r\n", strval($resposta));
    }

    public function testEditarRetornaRedirectQuandoPacienteExisteEAvaliacaoNaoExiste() {
        $this->criarPaciente();
        $resposta = $this->controller->editarJudo(1);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertStringContainsString("/erro?msg_erro=Avalia%C3%A7%C3%A3o%20do%20paciente%201%20n%C3%A3o%20existe\r\n", strval($resposta));
    }

    public function tetSalvarEditarJudoQuandoTudoOkRetornaRedirect() {
        $this->criarPaciente();
        $this->criarAvaliacaoJudo();
        /* TODO: entender como faz requests; csfr? */
        $request = Request::create(route('profissional.avaliacao.judo.editar.salvar'), 'POST', $this->avaliacao_ok);
        $resposta = $this->controller->salvarJudo($request);
        $this->assertEquals(get_class($resposta), RedirectResponse::class);
        $this->assertCount(1, AvaliacaoJudo::all());
    }

}
