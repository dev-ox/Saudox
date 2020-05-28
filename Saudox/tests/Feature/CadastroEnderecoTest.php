<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CadastroEnderecoTest extends TestCase
{

    /** @test **/
    public function enderecoPodeSerAdicionadoSemNulablles(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertCount(1, Endereco::all());

    }


    /** @test **/
    public function estadoNaoPodeSernulo(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => '',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertCount(0, Endereco::all());

    }

    /** @test **/
    public function cidadeNaoPodeSernulo(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => '',
            'ponto_referencia' => 'Favela',
        ]);

        $this->assertCount(0, Endereco::all());

    }

    /** @test **/
    public function pontoReferenciaNaoPodeSernulo(){

        $this->withoutExceptionHandling();

        $endereco = factory(Endereco::class)->create([
            'estado' => 'MG',
            'cidade' => 'Joao Pinheiro',
            'ponto_referencia' => '',
        ]);

        $this->assertCount(0, Endereco::all());

    }
}
