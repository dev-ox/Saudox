<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Paciente;
use App\Endereco;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;

class PacienteHomeTest extends TestCase {
    private $paciente;

    private $nome_test;

    public function setUp() : void {
        parent::setUp();
        $this->password = '123123123';
        $this->password_encrypt = bcrypt($this->password);

        $nome_test = "Jose Carlos";
        $this->endereco = factory(Endereco::class)->create();
        $this->paciente = factory(Paciente::class)->create([
            'password' => $this->password_encrypt,
            'id_endereco' => $this->endereco->id,
            'nome_paciente' => 'Jose Carlos',
        ]);
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174982748 */
    /* TA_01 */
    public function pacienteVisualizaInformacoesPessoais() {
        $resposta = $this->post(route('login'), [
            'login' => $this->paciente->login,
            'password' => $this->password,
        ]);

        $resposta->assertRedirect(route('paciente.home'));
        $this->assertAuthenticatedAs($this->paciente);
        $resposta->assertSee($this->nome_test);


    }

}
