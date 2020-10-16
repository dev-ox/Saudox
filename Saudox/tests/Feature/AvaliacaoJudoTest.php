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

        $this->array_ava_judo = [
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
            'diagnostico' => 4,
            'relacao_com_as_pessoas_judo' => 4,
            'resposta_emocional' => 4,
            'uso_do_corpo' => 4,
            'uso_de_objetos' => 4,
            'adaptacao_a_mudancas' => 4,
            'resposta_auditiva' => 4,
            'resposta_visual' => 4,
            'medo_ou_nervosismo' => 4,
            'comunicacao_verbal' => 4,
            'orienta_se_por_som' => 4,
            'comunicacao_nao_verbal' => 4,
            'orienta_se_por_som' => 4,
            'reacao_ao_nao' => 4,
            'compreendem_comandos_simples_palavras_que_descrevam_objetos' => 4,
            'manipula_brinquedos_objetos' => 4,
            'equilibrio' => 4,
            'forca' => 4,
            'resistencia' => 4,
            'marcha' => 4,
            'agilidade' => 4,
            'coordenacao_motora_fina' => 4,
            'coordenacao_motora_grossa' => 4,
            'propriocepcao' => 4,
            'compreende_direcoes' => 4,
            'compreende_comandos_professoras' => 4,
            'concentracao' => 4,
            'comportamento_reflexo' => 4,
            'observacoes' => 4,
            'terapias' => 4,
            'objetivos' => 4,
            'tipo_da_aula' => 4,
        ];

        $this->avaliacao_judo = factory(AvaliacaoJudo::class)->create([
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
        $copia_anamnese = array($this->avaliacao_judo);
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

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174990436 */
    /* TA_01 */
    public function profissionalPodeEditarAvaliacaoJudo() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo,
                Profissional::TerapeutaOcupacional,
            ), $this->password);
            $prof_aux = $criarProf_Logar['profissional'];


            // Gera uma cópia da anamnese da Factory, indicando os ids
            $copia_ava = array($this->avaliacao_judo);
            $copia_ava['id_paciente'] = $this->paciente->id;
            $copia_ava['id_profissional'] = $this->profissional->id;
            $copia_ava['diagnostico'] = 9;

            // Cria a Anamnese
            $res = $this->post(route("profissional.avaliacao.judo.editar.salvar", $copia_ava));

            $resposta_ver_ava_judo = $this->get(route("profissional.avaliacao.judo.ver", ['id_paciente' => $this->paciente->id]));
            $resposta_ver_ava_judo->assertSee("9");

        }

}
