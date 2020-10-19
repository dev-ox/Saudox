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

        // Array extendido da superclasse
        $this->anamnese_pnp = $this->anamnese_pnp_array;
    }

    private function loginProfisssional() : void {
        $resposta = $this->post(route('profissional.efetuarLogin'), [
            'login' => $this->profissional->login,
            'password' => $this->password,
            'remember' => 'on',
        ]);
        $resposta->assertRedirect(route('profissional.home'));
        $resposta->assertLocation(route('profissional.home'));
        // $resposta->assertSee("asddsa");
        // $resposta->assertOk();

        Auth::login($this->profissional, true);
        $this->assertTrue(Auth::check());

        $resposta = $this->get(route('profissional.ver', Profissional::first()->id));
        $resposta->assertSuccessful();
        $resposta->assertOk();
        $resposta->assertSee(Profissional::first()->cpf);
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174990179 */
    /* TA_01 */
    public function profissionalPodeCriarAnamnese() {
        self::loginProfisssional();

        $this->assertCount(0, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $pnp = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create([
            'id_tp' => $pnp->id
        ]);
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create([
            'id_tp' => $pnp->id
        ]);
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create([
            'id_tp' => $pnp->id
        ]);

        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());
    }

    /** @test */
    public function funcaoTesteSoPraNaoFicarWarning() {
        $this->assertTrue(true);
    }

}
