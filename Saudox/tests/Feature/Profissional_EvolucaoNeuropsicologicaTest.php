<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;

class Profissional_EvolucaoNeuropsicologicaTest extends TestCase {
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
        $this->array_evo_neuro = $this->evolucao_neuropsicologica;
        $this->array_evo_neuro['id_paciente'] = $this->paciente->id;
        $this->array_evo_neuro['id_profissional'] = $this->profissional->id;
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
    /* url: https://www.pivotaltracker.com/story/show/175305991 */
    /* TA_01 */
    public function profissionalPodeAcessarACriacaoEvolucaoNeuropsicologica() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Neuropsicologo,
                Profissional::Adm,
            ), $this->password);
        $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem evolucao)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => $this->password_encrypt,
            'id_endereco' => $this->endereco->id,
        ]);

        // Verifica se pode acessar a área de criação de evolução
        $resposta_ver_criar_evo_neuro = $this->get(route("profissional.evolucao.neuropsicologica.criar", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_criar_evo_neuro->assertSee("atendimento");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/175305991 */
    /* TA_02 */
    public function profissionalPodeCriarEvolucaoNeuropsicologica() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Neuropsicologo,
                Profissional::Adm,
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera uma cópia da evolução da Factory, indicando os ids
        $copia_evolucao = $this->array_evo_neuro;
        $copia_evolucao['id_paciente'] = $this->paciente->id;
        $copia_evolucao['id_profissional'] = $prof_aux->id;
        $copia_evolucao['texto'] = 'texto de teste';

        // Cria a $resposta_ver_evo_neuro
        $res = $this->post(route("profissional.evolucao.neuropsicologica.salvar", $copia_evolucao));
        $res->assertSessionHasNoErrors();

        // Verifica se a evolução agora existe
        $resposta_ver_evo_neuro = $this->get(route("profissional.evolucao.neuropsicologica.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_evo_neuro->assertSee("texto de teste");
    }


    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/175305991 */
    /* TA_03 */
    public function profissionalNAOPodeCriarEvolucaoNeuropsicologicaCamposVazios() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Neuropsicologo,
                Profissional::Adm,
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera uma cópia da evolução da Factory, indicando os ids
        $copia_evolucao = $this->array_evo_neuro;
        $copia_evolucao['id_paciente'] = $this->paciente->id;
        $copia_evolucao['id_profissional'] = $prof_aux->id;
        $copia_evolucao['hora_evolucao'] = '';

        // Cria a $resposta_ver_evo_neuro
        $res = $this->post(route("profissional.evolucao.neuropsicologica.salvar", $copia_evolucao));
        $res->assertSessionHasErrors();
    }

}
