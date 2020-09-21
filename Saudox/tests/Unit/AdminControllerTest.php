<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\Profissional\AdminController;
use App\Profissional;

class AdminControllerTest extends TestCase {


    protected function setUp(): void {
        parent::setUp();
    }



    public function testCadastroProfissionalRetornaView() {
        $controller = new AdminController;
        $view = $controller->cadastroProfissional();
        $this->assertEquals($view->getName(), "profissional.admin.criar_profissional");
    }

    public function testEditarProfissionalRetornaView() {
        $profissional = factory(Profissional::class)->create();
        $controller = new AdminController;
        $view = $controller->editarProfissional($profissional->id);
        $this->assertEquals($view->getName(), "profissional.admin.editar_profissional");
    }

    public function testEditarProfissionalRetornaViewSeIdNaoExiste() {
        $controller = new AdminController;
        $view = $controller->editarProfissional(-1);
        $this->assertEquals($view->getName(), "erro");
    }

    //TODO: testes unitarios enviando requests

}
