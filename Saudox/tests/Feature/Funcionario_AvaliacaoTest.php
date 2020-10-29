<?php


namespace Tests\Feature;


use App\Endereco;
use App\Paciente;
use App\Profissional;
use Tests\TestCase;

class Funcionario_AvaliacaoTest extends TestCase
{

    public $funcionario;
    private $paciente;

    private $password;

    public function setUp() : void {
        parent::setUp();

        $this->password = bcrypt('123123123');

        $this->endereco = factory(Endereco::class)->create();
        $this->funcionario = factory(Profissional::class)->create([
            'password' => $this->password,
            'profissao' => Profissional::Recepcionista,
        ]);
        $this->paciente = factory(Paciente::class)->create([
            'login' => 'login_teste',
            'password' => $this->password,
        ]);
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_02 */
    public function funcionarioPermitidoPodeAcessarAvaliacaoPacienteExistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

        $resposta = $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($this->funcionario);

        factory(Paciente::class)->create($this->paciente);

        Paciente::first();

        //$this->visit(route('profissional.avaliacao', ['id_paciente' => $pacie->id]));
        //$this->seePageIs(route('profissional.avaliacao', ['id_paciente' => $pacie->id]));
        $resposta->assertOk();
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_02 */
    public function funcionarioPermitidoNaoPodeAcessarAvaliacaoPacienteInexistente() {
        $func = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Administrador',
        ]);

        $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao', ['id_paciente' => 0]));
        //$this->seePageIs(route('profissional.home'));
    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639133 */
    /* TA_02 */
    public function funcionarioNaoAutorizadoNaoPodeAcessarAvaliacaoPacienteExistente() {

        $func = $this->funcionario;

        $res = $this->post(route('profissional.login'), [
            'login' => $func->login,
            'password' => $this->funcionario->password,
        ]);

        $this->assertAuthenticatedAs($this->funcionario);

        //$this->visit(route('profissional.avaliacao', ['id_paciente' => 0]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route('profissional.home'));
    }


}
