<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;

use App\AnamneseTerapiaOcupacional;

class AnamneseTerapiaOTest extends TestCase {
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
        $this->anamnese_terapiaOcupacional = array(factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]));
    }

    // Função que cria um profissional e já loga ele.
    // O parametro $profissoes é um array de profissoes
    public function criarProfELogar($profissoes, $password) {
        // Concatenação das profissões com ';'
        $str_profissoes = '';
        foreach($profissoes as $p) {
            $str_profissoes = $str_profissoes . $p . ";";
        }
        // Criação do profissional
        $prof_aux = factory(Profissional::class)->create([
            'password' => bcrypt($password),
            'profissao' => $str_profissoes,
        ]);

        // Login
        $resposta_login = $this->post(route("profissional.login"), [
            'login' => $prof_aux->login,
            'password' => $password,
        ]);

        // Login teste
        Auth::login($prof_aux, true);
        $this->assertTrue(Auth::check());
        // Ao fazer login ele é redirecionado para a home (fazendo verificação)
        $resposta_login->assertRedirect(route("profissional.home"));

        // Retorna o profissional criado e o resultado do login
        return ['profissional' => $prof_aux, 'resposta_login' => $resposta_login];
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990176 */
    /* TA_01 */
    public function profissionalPodeCriarAnamneseTerapiaOcupacional() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo,
                Profissional::TerapeutaOcupacional,
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem anamnese)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => $this->password_encrypt,
            'id_endereco' => $this->endereco->id,
        ]);

        // Verifica se pode acessar a área de criação de anamnse de fonoaudiologia
        $resposta_ver_terapiaOcupacional = $this->get(route("profissional.anamnese.terapia_ocupacional.criar", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_terapiaOcupacional->assertSee("gestação");

        // Gera uma cópia da anamnese da Factory, indicando os ids
        $copia_anamnese = $this->anamnese_terapiaOcupacional;
        $copia_anamnese['id_paciente'] = $paciente_aux->id;
        $copia_anamnese['id_profissional'] = $prof_aux->id;

        // Cria a Anamnese
        $this->post(route("profissional.anamnese.terapia_ocupacional.salvar", $copia_anamnese));

        // Verifica se a anamnese agora existe
        $resposta_ver_fono = $this->get(route("profissional.anamnese.terapia_ocupacional.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Gestação");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990176 */
    /* TA_02 */
    public function profissionalPodeAcessarAnamneseTerapiaOcupacional() {
        $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::TerapeutaOcupacional
            ), $this->password);

        $resposta_ver_fono = $this->get(route("profissional.anamnese.terapia_ocupacional.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Gestação");
    }

    /** @ test **/
    public function duracaoGestacaoAnamneseTerapiaOcupNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::TerapeutaOcupacional
            ), $this->password);

        $copia_anamnese = $this->anamnese_terapiaOcupacional;
        $copia_anamnese['gestacao'] = '';
        $resposta = $this->post(route('profissional.anamnese.terapia_ocupacional.salvar'), $copia_anamnese);
        $resposta->assertSessionHasErrors('gestacao');
    }

    /** @ test **/
    public function movimentosEsterotipadosAnamneseTerapiaOcupNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::TerapeutaOcupacional
            ), $this->password);

        $copia_anamnese = $this->anamnese_terapiaOcupacional;
        $copia_anamnese['movimentos_estereotipados'] = '';
        $resposta = $this->post(route('profissional.anamnese.terapia_ocupacional.salvar'), $copia_anamnese);
        $resposta->assertSessionHasErrors('movimentos_estereotipados');
    }

}
