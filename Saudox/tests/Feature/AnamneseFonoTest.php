<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;

use App\AnamneseFonoaudiologia;

class AnamneseFonoTest extends TestCase {
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
        $this->anamnese_fono = array(factory(AnamneseFonoaudiologia::class)->create([
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
    /* url: https://www.pivotaltracker.com/story/show/174639150 */
    /* TA_01 */
    public function profissionalPodeCriarAnamneseFonoaudiologia() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);
        $prof_aux = $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem anamnese)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => bcrypt($this->password),
            'id_endereco' => $this->endereco->id,
        ]);

        // Verifica se pode acessar a área de criação de anamnse de fonoaudiologia
        $resposta_ver_terapiaOcupacional = $this->get(route("profissional.anamnese.fonoaudiologia.criar", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_terapiaOcupacional->assertSee("Posição no bloco familiar");

        // Gera uma cópia da anamnese da Factory, indicando os ids
        $copia_anamnese = $this->anamnese_fono;
        $copia_anamnese['id_paciente'] = $paciente_aux->id;
        $copia_anamnese['id_profissional'] = $prof_aux->id;

        // Cria a Anamnese
        $resposta_ver_terapiaOcupacional = $this->post(route("profissional.anamnese.fonoaudiologia.salvar", $copia_anamnese));

        // Verifica se a anamnese agora existe
        $resposta_ver_fono = $this->get(route("profissional.anamnese.fonoaudiologia.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Posição no bloco familiar");
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174639150 */
    /* TA_01 */
    public function profissionalPodeEditarAnamneseFonoaudiologia() {
        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);
        $criarProf_Logar['profissional'];

        // Gera um novo paciente (sem anamnese)
        $paciente_aux = factory(Paciente::class)->create([
            'password' => bcrypt($this->password),
            'id_endereco' => $this->endereco->id,
        ]);

        $str_valor_comparacao_antes = 'Sim, e isso é um teste';
        $str_valor_comparacao_depois = 'Não, e isso foi editado';

        $anamnese_novo_paciente = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => 1,
            'id_profissional' => $this->profissional->id,
            'dificuldades_na_visao' => $str_valor_comparacao_antes,
        ]);

        // Verifica o valor colocado no cmapo que será editado (para confirmar que aquele valor será editado)
        $this->get(route("profissional.anamnese.fonoaudiologia.ver", ['id_paciente' => $paciente_aux->id]));

        // Gera uma cópia da anamnese da já existente para submeter via post para edição
        $copia_anamnese_editada = $anamnese_novo_paciente;
        // Suposta edição feita na tabela
        $copia_anamnese_editada['dificuldades_na_visao'] = $str_valor_comparacao_depois;

        // Salva Edição realizada
        $this->post(route("profissional.anamnese.fonoaudiologia.editar.salvar", $copia_anamnese_editada));

        // Verifica se a anamnese foi editada
        $resposta_ver_anamnese_editada = $this->get(route("profissional.anamnese.fonoaudiologia.ver", ['id_paciente' => $paciente_aux->id]));
        $resposta_ver_anamnese_editada->assertSee($str_valor_comparacao_depois);
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174639150 */
    /* TA_02 */
    public function profissionalPodeAcessarAnamneseFonoaudiologia() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $resposta_ver_fono = $this->get(route("profissional.anamnese.fonoaudiologia.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Posição no bloco familiar");
    }

    /** @test **/
    public function posicaoBlocoFamiliarAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['posicao_bloco_familiar'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('posicao_bloco_familiar');
    }

    /** @test **/
    public function criancaDesejadaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['crianca_desejada'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('crianca_desejada');
    }

    /** @test **/
    public function reacaoCriancaRelacaoPaisAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['reacao_crianca_status_relacao_pais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('reacao_crianca_status_relacao_pais');
    }

    /** @test **/
    public function expectativaSexoCriancaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['tinha_expectativa_em_relacao_ao_sexo_da_crianca'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tinha_expectativa_em_relacao_ao_sexo_da_crianca');
    }

    /** @test **/
    public function duracaoGestacaoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['duracao_da_gestacao'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('duracao_da_gestacao');
    }

    /** @test **/
    public function fezPreNatalAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['fez_pre_natal'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('fez_pre_natal');
    }
    /** @test **/
    public function tipoPartoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['tipo_parto'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tipo_parto');
    }

    /** @test **/
    public function complicacaoDurantePartoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['complicacao_durante_parto'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('complicacao_durante_parto');
    }

    /** @test **/
    public function recursoPartoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['foi_necessario_algum_recurso'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('foi_necessario_algum_recurso');
    }

    /** @test **/
    public function maeApresentouProblemaGravidezAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['mae_apresentou_algum_problema_durante_gravidez'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('mae_apresentou_algum_problema_durante_gravidezz');
    }

    /** @test **/
    public function amamentacaoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['amamentacao_natural'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('amamentacao_natural');
    }

    /** @test **/
    public function atrasoProblemaFalaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['atraso_ou_problema_na_fala'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('atraso_ou_problema_na_fala');
    }

    /** @test **/
    public function temEnureseNoturnaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['tem_enurese_noturna'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tem_enurese_noturna');
    }

    /** @test **/
    public function desenvolvimentoMotorAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['desenvolvimento_motor_no_tempo_esperado'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('desenvolvimento_motor_no_tempo_esperado');
    }

    /** @test **/
    public function pertubacoesSonoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['perturbacoes_como_pesadelos_sonambulismo_agitacao_etc'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('perturbacoes_como_pesadelos_sonambulismo_agitacao_etc');
    }

    /** @test **/
    public function trocaLetraFonemaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['letras_ou_fonrmas_trocados'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('letras_ou_fonemas_trocados');
    }

    /** @test **/
    public function fatosAfetaramDesenvolvimentoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['fatos_que_afetaram_o_desenvolvimento_do_paciente'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('fatos_que_afetaram_o_desenvolvimento_do_paciente');

    }

    /** @test **/
    public function idadeUsouChupetaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['ate_quantos_anos_usou_chupetas'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('ate_quantos_anos_usou_chupetas');
    }

    /** @test **/
    public function dificuldadeNaFalaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['dificuldades_na_fala'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dificuldades_na_fala');
    }

    /** @test **/
    public function dificuldadeNaVisaoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['dificuldades_na_visao'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dificuldades_na_visao');
    }

    /** @test **/
    public function problemasDeSaudeAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['problemas_de_saude'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('problemas_de_saude');
    }

    /** @test **/
    public function tomouRemedioControladoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['toma_ou_ja_tomou_remedio_controlado_se_sim_quais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('toma_ou_ja_tomou_remedio_controlado_se_sim_quais');
    }

    /** @test **/
    public function tomaBanhoSozinhoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['toma_banho_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('toma_banho_sozinho');
    }

    /** @test **/
    public function escovaDentesSozinhoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['escova_os_dentes_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('escova_os_dentes_sozinho');
    }

    /** @test **/
    public function usaBanheiroSozinhoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['usa_o_banheiro_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('usa_o_banheiro_sozinho');
    }

    /** @test **/
    public function necessitaAuxilioVestirAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['necessita_de_auxilio_para_se_vestir_ou_despir'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('necessita_de_auxilio_para_se_vestir_ou_despir');
    }

    /** @test **/
    public function atendeIntervencoesAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['atende_as_intervencoes_quando_esta_desobedecendo'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('atende_as_intervencoes_quando_esta_desobedecendo');
    }

    /** @test **/
    public function choraFacilAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['chora_facil'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('chora_facil');
    }

    /** @test **/
    public function recusaAuxilioAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['recusa_auxilio'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('recusa_auxilio');
    }

    /** @test **/
    public function resistenciaAoToqueAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['tem_resistencia_ao_toque'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tem_resistencia_ao_toque');
    }

    /** @test **/
    public function serieEscolarAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['serie_atual_na_escola'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('serie_atual_na_escola');
    }

    /** @test **/
    public function alfabetizadaAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['alfabetizada'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('alfabetizada');
    }

    /** @test **/
    public function dificuldadeAprendizagemAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['tem_dificuldades_de_aprendizagem'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tem_dificuldades_de_aprendizagem');
    }

    /** @test **/
    public function repetiuAnoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['repetiu_algum_ano'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('repetiu_algum_ano');
    }

    /** @test **/
    public function fazAmigosFacilidadeAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['faz_amigos_com_facilidade'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('faz_amigos_com_facilidade');
    }

    /** @test **/
    public function adaptaFacilmenteMeioAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['adapta_se_facilmente_ao_meio'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('adapta_se_facilmente_ao_meio');
    }

    /** @test **/
    public function dormeSozinhoAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['dorme_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dorme_sozinho');
    }

    /** @test **/
    public function dormeQuartoPaisAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['dorme_no_quarto_dos_pais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dorme_no_quarto_dos_pais');
    }

    /** @test **/
    public function medidasDisciplinaresAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['medidas_disciplinares_empregadas_pelos_pais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('medidas_disciplinares_empregadas_pelos_pais');
    }

    /** @test **/
    public function observacoesAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['outras_ocorrencias_observacoes'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('outras_ocorrencias_observacoes');
    }

    /** @test **/
    public function distracoesPreferidasAnamneseFonoNaoPodeSerVazio() {
        $this->criarProfELogar(
            array(
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono;
        $anamnese_fono_incompleto['distracoes_preferidas'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('distracoes_preferidas');
    }

}
