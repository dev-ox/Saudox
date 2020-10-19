<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\AvaliacaoTerapiaOcupacional;

class AvaliacaoTerapiaOTest extends TestCase {
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
        $this->array_ava_terapia_ocupacional = $this->avaliacao_to_array;
        $this->array_ava_terapia_ocupacional['id_paciente'] = $this->paciente->id;
        $this->array_ava_terapia_ocupacional['id_profissional'] = $this->profissional->id;
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
    public function profissionalPodeAcessarACriacaoAvaliacaoTerapiaOcupacional() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo,
                Profissional::TerapeutaOcupacional,
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem avaliacao)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => $this->password_encrypt,
            'id_endereco' => $this->endereco->id,
        ]);

        // Verifica se pode acessar a área de criação de anamnse de fonoaudiologia
        $resposta_ver_terapiaOcupacional = $this->get(route("profissional.avaliacao.terapia_ocupacional.criar", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_terapiaOcupacional->assertSee("Entrevistado");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990176 */
    /* TA_01 */
    public function profissionalPodeCriarAvaliacaoTerapiaOcupacional() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo,
                Profissional::TerapeutaOcupacional,
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem avaliacao)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => $this->password_encrypt,
            'id_endereco' => $this->endereco->id,
        ]);

        // Verifica se pode acessar a área de criação de anamnse de fonoaudiologia
        $resposta_ver_terapiaOcupacional = $this->get(route("profissional.avaliacao.terapia_ocupacional.criar", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_terapiaOcupacional->assertSee("Entrevistado");

        // Gera uma cópia da avaliacao da Factory, indicando os ids
        $copia_avaliacao = $this->array_ava_terapia_ocupacional;
        $copia_avaliacao['id_paciente'] = $paciente_aux->id;
        $copia_avaliacao['id_profissional'] = $prof_aux->id;
        $copia_avaliacao['entrevistado'] = 'nome_test';

        // Cria a Anamnese
        $res = $this->post(route("profissional.avaliacao.terapia_ocupacional.criar.salvar", $copia_avaliacao));
        $res->assertSessionHasNoErrors();

        // Verifica se a avaliacao agora existe
        $resposta_ver_to = $this->get(route("profissional.avaliacao.terapia_ocupacional.ver", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_to->assertSee("nome_test");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990176 */
    /* TA_02 */
    public function profissionalPodeEditarAvaliacaoTerapiaOcupacional() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::TerapeutaOcupacional
            ), $this->password);

        // Gera uma cópia da avaliacao da Factory, indicando os ids
        $copia_avaliacao = $this->array_ava_terapia_ocupacional;
        $copia_avaliacao['id_paciente'] = $this->paciente->id;
        $copia_avaliacao['id_profissional'] = $this->profissional->id;
        $copia_avaliacao['entrevistado'] = 'paulinho';

        // Cria a Anamnese
        $res = $this->post(route("profissional.avaliacao.terapia_ocupacional.criar.salvar", $copia_avaliacao));
        $res->assertSessionHasNoErrors();

        $copia_avaliacao['entrevistado'] = 'maria';
        $resposta_ver_to = $this->get(route("profissional.avaliacao.terapia_ocupacional.editar.salvar", $copia_avaliacao));
        $resposta_ver_to->assertSee("maria");
    }

}
