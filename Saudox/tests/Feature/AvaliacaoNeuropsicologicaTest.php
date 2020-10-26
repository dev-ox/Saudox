<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use App\AvaliacaoNeuropsicologica;

use Illuminate\Support\Facades\Auth;

class AvaliacaoNeuropsicologicaTest extends TestCase {
    public $funcionario;
    private $paciente;

    public function setUp() : void {
        parent::setUp();

        $this->password = '123123123';
        $this->password_encrypt = bcrypt($this->password);

        $this->endereco = factory(Endereco::class)->create();
        $this->profissional = factory(Profissional::class)->create([
            'password' => $this->password_encrypt,
            'profissao' => Profissional::Adm,
        ]);
        $this->paciente = factory(Paciente::class)->create([
            'login' => 'login_teste',
            'password' => $this->password_encrypt,
        ]);
    }

    public function loginProfisssional() : void {
        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $this->profissional->login,
            'password' => $this->password,
            'remember' => 'on',
        ]);
        $resposta->assertSessionHasNoErrors();
        $resposta->assertRedirect(route('profissional.home'));
        $resposta->assertLocation(route('profissional.home'));
        Auth::login($this->profissional, true);
        $this->assertTrue(Auth::check());

        $resposta = $this->get(route('profissional.ver', Profissional::first()->id));
        $resposta->assertSuccessful();
        $resposta->assertOk();
        $resposta->assertSee(Profissional::first()->cpf);
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_01 */
    public function profissionalPodeCriarAvaliacaoNeuro() {
        $this->loginProfisssional();

        $this->assertCount(0, AvaliacaoNeuropsicologica::all());

        factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $this->assertCount(1, AvaliacaoNeuropsicologica::all());
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_01 */
    public function profissionalPodeConsultarAvaliacaoNeuro() {
        $this->loginProfisssional();

        $this->assertCount(0, AvaliacaoNeuropsicologica::all());

        factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
            'queixa_principal' => 'teste alguma coisa',
        ]);

        $this->assertCount(1, AvaliacaoNeuropsicologica::all());

        $resposta_ava_neuro = $this->get(route("profissional.avaliacao.neuropsicologia.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ava_neuro->assertSee("teste alguma coisa");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174982702 */
    /* TA_01 */
    public function profissionalPodeEditarAvaliacaoNeuro() {
        $this->loginProfisssional();

        $this->assertCount(0, AvaliacaoNeuropsicologica::all());

        $ava_array = factory(AvaliacaoNeuropsicologica::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
            'queixa_principal' => 'teste alguma coisa',
        ]);

        $ava_array['queixa_principal'] = "pipoco teste";
        $resposta_ava_neuro = $this->get(route("profissional.avaliacao.neuropsicologia.editar.salvar", $ava_array));
        $resposta_ava_neuro->assertSee("pipoco teste");

        $this->assertCount(1, AvaliacaoNeuropsicologica::all());
    }

}
