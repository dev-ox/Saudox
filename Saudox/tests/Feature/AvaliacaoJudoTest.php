<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use App\AvaliacaoJudo;

use Illuminate\Support\Facades\Auth;

class AvaliacaoJudoTest extends TestCase {
    public $funcionario;
    private $endereco;
    private $paciente;

    public function setUp() : void {
        parent::setUp();

        $this->password = '123123123';
        $this->password_encrypt = bcrypt($this->password);

        $this->endereco = factory(Endereco::class)->create();
        $this->profissional = factory(Profissional::class)->create([
            'password' => $this->password,
            'profissao' => Profissional::Recepcionista,
        ]);
        $this->paciente = factory(Paciente::class)->create([
            'login' => 'login_teste',
            'password' => $this->password,
        ]);
        $this->evolucao_judo = factory(AvaliacaoJudo::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);
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
    /* url: https://www.pivotaltracker.com/story/show/174990377 */
    /* TA_01 */
    public function profissionalPodeCriarAvaliacaoJudo() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo,
                Profissional::TerapeutaOcupacional,
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem anamnese)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => $this->password,
            'id_endereco' => $this->endereco->id,
        ]);

        $resposta_ver_terapiaOcupacional = $this->get(route("profissional.avaliacao.judo.criar", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_terapiaOcupacional->assertSee("Resposta emocional");

        // Gera uma cópia da anamnese da Factory, indicando os ids
        $copia_anamnese = array($this->evolucao_judo);
        $copia_anamnese['id_paciente'] = $paciente_aux->id;
        $copia_anamnese['id_profissional'] = $prof_aux->id;

        // Cria a Anamnese
        $this->post(route("profissional.avaliacao.judo.criar.salvar", $copia_anamnese));

        // Verifica se a anamnese agora existe
        $resposta_ver_ava_judo = $this->get(route("profissional.avaliacao.judo.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_ava_judo->assertSee("Comportamento reflexivo");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990377 */
    /* TA_02 */
    public function profissionalPodeAcessarAvaliacaoJudo() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::TerapeutaOcupacional
            ), $this->password);

            // Verifica se a anamnese agora existe
            $resposta_ver_ava_judo = $this->get(route("profissional.avaliacao.judo.ver", ['id_paciente' => $this->paciente->id]));
            $resposta_ver_ava_judo->assertSee("Comportamento reflexivo");
    }

}
