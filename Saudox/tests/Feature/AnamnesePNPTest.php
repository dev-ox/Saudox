<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;

use App\AnamneseGigantePsicopedaNeuroPsicomoto;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt1;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt2;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt3;

class AnamnesePNPTest extends TestCase {
    public $profissional;
    private $endereco;
    private $paciente;

    public function setUp() : void {
        parent::setUp();

        $this->password = '123123123';
        $this->password_encrypt = bcrypt($this->password);

        $this->endereco = factory(Endereco::class)->create();
        $this->paciente = factory(Paciente::class)->create([
            'password' => $this->password_encrypt,
            'id_endereco' => $this->endereco->id,
        ]);
        $this->profissional = factory(Profissional::class)->create([
            'password' => $this->password_encrypt,
            'profissao' => Profissional::Adm,
        ]);
    }

    private function loginProfisssional() : void {
        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $this->profissional->login,
            'password' => $this->password,
            'remember' => 'on',
        ]);
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
    /* url: https://www.pivotaltracker.com/story/show/174990179 */
    /* TA_01 */
    public function profissionalPodeCriarAnamnese() {
        self::loginProfisssional();

        $this->assertCount(0, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $pnp = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
            'id_tp' => $pnp->id,
            'compareceram_entrevista' => "Joao de Deuso",
        ]);
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create([
            'id_tp' => $pnp->id
        ]);
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create([
            'id_tp' => $pnp->id
        ]);

        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        // Verifica se a anamnese agora existe
        $resposta_ver_fono = $this->get(route("profissional.anamnese.psicopedagogia.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Joao de Deuso");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990148 */
    /* TA_01 */
    public function profissionalPodeEditarAnamnese() {
        self::loginProfisssional();

        $this->assertCount(0, AnamneseGigantePsicopedaNeuroPsicomoto::all());
        $pnp = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        $arr_pt1 = array(factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
            'id_tp' => $pnp->id,
            'compareceram_entrevista' => "Joao de Deuso",
        ]));
        $arr_pt2 = array(factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create([
            'id_tp' => $pnp->id
        ]));
        $arr_pt3 = array(factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create([
            'id_tp' => $pnp->id
        ]));
        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $pnp_array_merged = $arr_pt1;
        $pnp_array_merged = array_merge($pnp_array_merged, $arr_pt2);
        $pnp_array_merged = array_merge($pnp_array_merged, $arr_pt3);

        // Verifica se a anamnese agora existe
        $resposta_ver_fono = $this->get(route("profissional.anamnese.psicopedagogia.editar", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Joao de Deuso");

        $pnp_array_merged['compareceram_entrevista'] = "Maria de Deuso";
        $resposta_ver_fono = $this->post(route("profissional.anamnese.psicopedagogia.editar.salvar", $pnp_array_merged));
        $resposta_ver_fono->assertSessionHasNoErrors();
        $resposta_ver_fono->assertSee("Maria de Deuso");

    }

}
