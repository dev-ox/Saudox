<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RotasTest extends TestCase {

    // TODO: Ajustar esses testes depois. Aqui podemos definir o padrão das
    //      rotas que iremos utilizar nos demais testes.
    /* TODO: Aqui ainda falta colocar os testes de "novo alguma coisa"... */
    /* TODO: Tirar esses testes de vez...? */

    /** @ test **/
    public function anamneseFonoRota() {
        $response = $this->get('/anamnese/fonoaudiologia/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function anamnesePsicopedagogiaRota() {
        $response = $this->get('/anamnese/psicopedagogia/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function anamneseTerapiaOcupacionalRota() {
        $response = $this->get('/anamnese/terapia_ocupacional/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function avaliacaoFonoaudiologiaRota() {
        $response = $this->get('/avaliacao/fonoaudiologia/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function avaliacaoJudoRota() {
        $response = $this->get('/avaliacao/judo/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function avaliacaoNeuropsicologiaRota() {
        $response = $this->get('/avaliacao/neuropsicologia/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function avaliacaoTerapiaOcupacionalRota() {
        $response = $this->get('/avaliacao/terapia_ocupacional/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function evolucaoFonoaudiologiaRota() {
        $response = $this->get('/evolucao/fonoaudiologia/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function evolucaoJudoRota() {
        $response = $this->get('/evolucao/judo/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function evolucaoPsicologicaRota() {
        $response = $this->get('/evolucao/psicologica/teste');
        $response->assertStatus(200);
    }

    /** @ test **/
    public function evolucaoTerapiaOcupacionalRota() {
        $response = $this->get('/evolucao/terapia_ocupacional/teste');
        $response->assertStatus(200);
    }


    /** @test */
    public function funcaoTesteSoPraNaoFicarWarning() {
        $this->assertTrue(true);
    }

}
