<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\Profissional\AdminController;
use App\Profissional;

class AdminControllerTest extends TestCase {

    protected static $db_ok = false;

    protected function setUp(): void {
        parent::setUp();

        if(!self::$db_ok) {
            fwrite(STDERR, "Migrando sqlite...");
            $this->artisan('migrate:fresh');
            fwrite(STDERR, "Feito.\n");
            fwrite(STDERR, "Fazendo seed no sqlite...");
            $this->artisan('db:seed');
            fwrite(STDERR, "Feito.\n");
            self::$db_ok = true;
        }

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
