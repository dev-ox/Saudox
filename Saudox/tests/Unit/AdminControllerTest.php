<?php

namespace Tests\Unit;

use App\Endereco;
use Tests\TestCase;
use App\Http\Controllers\Profissional\AdminController;
use App\Profissional;

class AdminControllerTest extends TestCase {


    private $controller;
    private $endereco;
    private $profissional;
    protected function setUp(): void {
        parent::setUp();
        $this->endereco = factory(Endereco::class)->create();
        $this->profissional = factory(Profissional::class)->create();
        $this->controller = new AdminController;
    }


    public function testAdminHome() {
        $view = $this->controller->adminHome();
        $this->assertEquals($view->getName(), "profissional.admin.home");
    }


    public function testCadastroProfissionalRetornaView() {
        $view = $this->controller->cadastroProfissional();
        $this->assertEquals($view->getName(), "profissional.admin.criar_profissional");
    }

    public function testEditarProfissionalRetornaView() {
        $view = $this->controller->editarProfissional($this->profissional->id);
        $this->assertEquals($view->getName(), "profissional.admin.editar_profissional");
    }

    public function testEditarProfissionalRetornaViewSeIdNaoExiste() {
        $view = $this->controller->editarProfissional(-1);
        $this->assertEquals($view->getName(), "erro");
    }

}
