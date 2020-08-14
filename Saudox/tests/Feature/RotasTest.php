<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RotasTest extends TestCase {

    /* TODO: Aqui ainda falta colocar os testes de "novo alguma coisa"... */

    /** @test **/
    public function anamnese_fono_rota()
    {
        $response = $this->get('/anamnese/fonoaudiologia/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function anamnese_psicopedagogia_rota()
    {
        $response = $this->get('/anamnese/psicopedagogia/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function anamnese_terapia_ocupacional_rota()
    {
        $response = $this->get('/anamnese/terapia_ocupacional/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function avaliacao_fonoaudiologia_rota()
    {
        $response = $this->get('/avaliacao/fonoaudiologia/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function avaliacao_judo_rota()
    {
        $response = $this->get('/avaliacao/judo/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function avaliacao_neuropsicologia_rota()
    {
        $response = $this->get('/avaliacao/neuropsicologia/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function avaliacao_terapia_ocupacional_rota()
    {
        $response = $this->get('/avaliacao/terapia_ocupacional/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function evolucao_fonoaudiologia_rota()
    {
        $response = $this->get('/evolucao/fonoaudiologia/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function evolucao_judo_rota()
    {
        $response = $this->get('/evolucao/judo/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function evolucao_psicologica_rota()
    {
        $response = $this->get('/evolucao/psicologica/teste');
        $response->assertStatus(200);
    }

    /** @test **/
    public function evolucao_terapia_ocupacional_rota()
    {
        $response = $this->get('/evolucao/terapia_ocupacional/teste');
        $response->assertStatus(200);
    }

}
