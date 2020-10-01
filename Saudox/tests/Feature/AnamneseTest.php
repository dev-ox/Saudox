<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Endereco;
use App\Profissional;
use App\Paciente;

use Illuminate\Support\Facades\Auth;

use App\AnamneseFonoaudiologia;
use App\AnamneseTerapiaOcupacional;
use App\AnamneseGigantePsicopedaNeuroPsicomoto;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt1;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt2;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt3;

class AnamneseTest extends TestCase {
    public $profissional;
    private $endereco;
    private $paciente;

    private $password = '123123123';

    public function setUp() : void {
        parent::setUp();

        $this->endereco = factory(Endereco::class)->create();
        $this->paciente = factory(Paciente::class)->create([
            'password' => bcrypt($this->password),
            'id_endereco' => $this->endereco->id,
        ]);
        $this->profissional = factory(Profissional::class)->create([
            'password' => bcrypt($this->password),
            'profissao' => Profissional::Adm,
        ]);
        $this->anamnese_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);
        $this->anamnese_terapiaOcupacional = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);
        $this->anamnese_fono_completo = [
            'posicao_bloco_familiar' => 'filho',
            'reacao_crianca_status_relacao_pais' => 'normalidade',
            'crianca_desejada' => true,
            'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => 'Não',
            'duracao_da_gestacao' => '9 meses',
            'fez_pre_natal' => 'Sim',
            'tipo_parto' => 'Normal',
            'complicacao_durante_parto' => 'Não',
            'foi_necessario_utilizar_algum_recurso' => 'Não',
            'mae_apresentou_algum_problema_durante_gravidez' => 'Não',
            'amamentacao_natural' => false,
            'atraso_ou_problema_na_fala'=>false,
            'tem_enurese_noturna' => false,
            'desenvolvimento_motor_no_tempo_esperado' => true,
            'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' =>true,
            'letras_ou_fonemas_trocados' =>'Não',
            'fatos_que_afetaram_o_desenvolvimento_do_paciente' => 'Não houve.',
            'ate_quantos_anos_usou_chupetas' =>'5 meses',
            'ja_fez_tratamento_fonoaudiologo' => false,
            'se_sim_tratamento_fono_anterior_onde' =>'Não fez',
            'se_sim_tratamento_fono_anterior_quando' =>'Não fez',
            'dificuldades_na_fala' => 'Não',
            'dificuldades_na_visao' => 'Não',
            'dificuldades_na_locomocao' => 'Não',
            'problemas_de_saude' => 'Não',
            'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' =>'Não',
            'toma_banho_sozinho' =>true,
            'escova_os_dentes_sozinho' =>true,
            'usa_o_banheiro_sozinho' =>true,
            'necessita_de_auxilio_para_se_vestir_ou_despir' =>false,
            'atende_as_intervencoes_quando_esta_desobedecendo' =>true,
            'chora_facil' =>true,
            'recusa_auxilio' =>true,
            'tem_resistencia_ao_toque' => 'Não',
            'serie_atual_na_escola'=>'5º do ensino fundamental',
            'alfabetizada' =>true,
            'tem_dificuldades_de_aprendizagem'=>'Não',
            'repetiu_algum_ano'=>false,
            'faz_amigos_com_facilidade' =>'Sim',
            'adapta_se_facilmente_ao_meio' =>'Sim',
            'dorme_sozinho' =>true,
            'dorme_no_quarto_dos_pais'=>false,
            'medidas_disciplinares_empregadas_pelos_pais'=>'',
            'outras_ocorrencias_observacoes'=>'',
            'distracoes_preferidas'=>'Televisão, computador e celular',
        ];
      
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
                Profissional::Adm,
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
        $copia_anamnese = array($this->anamnese_fono);
        $copia_anamnese['id_paciente'] = $paciente_aux->id;
        $copia_anamnese['id_profissional'] = $prof_aux->id;

        // Cria a Anamnese
        $resposta_ver_terapiaOcupacional = $this->post(route("profissional.anamnese.fonoaudiologia.salvar", $copia_anamnese));

        // Verifica se a anamnese agora existe
        $resposta_ver_fono = $this->get(route("profissional.anamnese.fonoaudiologia.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Posição no bloco familiar");
    }

    /** @test **/
    /* url: https://www.pivotaltracker.com/story/show/174639150 */
    /* TA_02 */
    public function profissionalPodeAcessarAnamneseFonoaudiologia() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $resposta_ver_fono = $this->get(route("profissional.anamnese.fonoaudiologia.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Posição no bloco familiar");
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
            'password' => bcrypt($this->password),
            'id_endereco' => $this->endereco->id,
        ]);

        // Verifica se pode acessar a área de criação de anamnse de fonoaudiologia
        //TODO: @sekva (erro no old, na view _pendência_)
        // $resposta_ver_terapiaOcupacional = $this->get(route("profissional.anamnese.terapia_ocupacional.criar", ['id_paciente' => $paciente_aux->id]));
        // $resposta_ver_terapiaOcupacional->assertSee("gestação");

        // Gera uma cópia da anamnese da Factory, indicando os ids
        $copia_anamnese = array($this->anamnese_terapiaOcupacional);
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
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::TerapeutaOcupacional
            ), $this->password);

        $resposta_ver_fono = $this->get(route("profissional.anamnese.terapia_ocupacional.ver", ['id_paciente' => $this->paciente->id]));
        $resposta_ver_fono->assertSee("Gestação");
    }



    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerPaginaAnamnesePacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [

            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese"));
        //$this->seePageIs(route("paciente.anamnese"));

    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamnesePsicoNeuroMotoPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();


        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);
        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese.neuropsicomotora"));
        //$this->seePageIs(route("paciente.anamnese.neuropsicomotora"));
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamneseFonoaudiologicaPacienteSeEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $anamne_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);
        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese.fonoaudiologia"));
        //$this->seePageIs(route("paciente.anamnese.fonoaudiologia"));
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacientePodeVerAnamneseTerapiaOcupacionalPacienteSeEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta = $this->post(route("login"), [

            'login' => $paciente->login,
            'password' => $password,
        ]);
        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        //$this->visit(route("paciente.anamnese.terapia_ocupacional"));
        //$this->seePageIs(route("paciente.anamnese.terapia_ocupacional"));

    }


    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerAnamnesePsicologiaPacienteSeNaoEstiverLogado() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [

            'login' => $paciente->login,
            'password' => $password,
        ]);
        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese.neuropsicomotora"));
        //$this->seePageIs(route("login"));
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerAnamneseTerapiaOcupacionalPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);
        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese.terapia_ocupacional"));
        //$this->seePageIs(route("login"));

    }



    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerAnamneseFonoaudiologiaPacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $anamne_fonoaudiologia = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->profissional->id,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese.fonoaudiologia"));
        //$this->seePageIs(route("login"));
    }

    /** @ test **/
    /* url: https://www.pivotaltracker.com/story/show/174638550 */
    /* TA_01 */
    public function pacienteNaoPodeVerPaginaAnamnesePacienteSeNaoEstiverLogado() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $resposta = $this->post(route("login"), [
            'login' => $paciente->login,
            'password' => $password,
        ]);

        $resposta->assertRedirect(route("paciente.home"));
        $this->assertAuthenticatedAs($paciente);

        $this->post(route("paciente.logout"));

        //$this->visit(route("paciente.anamnese"));
        //$this->seePageIs(route("login"));
    }


    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamnesePsicologia() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Psicologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);


        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();

        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.neuropsicomotora.delete", ['id_paciente' => $paciente->id]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseFonoaudiologica() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);


        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseFonoaudiologia::all());
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.fonoaudiologia.delete", ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeDeletarAnamneseTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);


        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseTerapiaOcupacional::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.terapia_ocupacional.delete", ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

    }



    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseNeuroPsicoMoto() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Neurologista',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);


        $anamne_psi = factory(AnamneseGigantePsicopedaNeuroPsicomoto::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->create();
        factory(AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->create();
        $this->assertCount(1, AnamneseGigantePsicopedaNeuroPsicomoto::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.neuropsicomotora.edit", ['id_paciente' => $paciente->id]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.neuropsicomotora", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseFonoaudiologica() {

        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);

        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Fonoaudiologo',
        ]);

        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_fono = factory(AnamneseFonoaudiologia::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseFonoaudiologia::all());
        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.fonoaudiologia.edit", ['id_paciente' => $paciente->id]));
        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();
        //$this->seePageIs(route("profissional.anamnese.fonoaudiologia", ['id_paciente' => $paciente->id]));
    }

    /** @ test **/
    public function profissionalNaoAutorizadoNaoPodeEditarAnamneseTerapiaOcupacional() {
        $paciente = factory(Paciente::class)->create([
            'password' => bcrypt($password = '123123123'),
        ]);
        $this->func_novo = factory(Profissional::class)->create([
            'password' => bcrypt($password = '123123123'),
            'profissao' => 'Terapeuta',
        ]);
        $resposta = $this->post(route("profissional.login"), [
            'login' => $this->profissional->login,
            'password' => $this->profissional->password
        ]);

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        $anamne_to = factory(AnamneseTerapiaOcupacional::class)->create([
            'id_paciente' => $paciente->id,
            'id_profissional' => $this->func_novo->id,
        ]);

        $this->assertCount(1, AnamneseTerapiaOcupacional::all());

        $resposta->assertRedirect(route("profissional.home"));
        $this->assertAuthenticatedAs($this->profissional);

        //$this->visit(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

        $res = $this->post(route("profissional.anamnese.terapia_ocupacional.edit", ['id_paciente' => $paciente->id]));

        $value = 'Você não possui privilégios para isso.';
        $tempo = 5; // Tempo em segundo até o fim da espera
        $res->waitForText($value, $tempo);
        $res->assertOk();

        //$this->seePageIs(route("profissional.anamnese.terapia_ocupacional", ['id_paciente' => $paciente->id]));

    }

    /** @ test */
    public function funcaoTesteSoPraNaoFicarWarning() {
        $this->assertTrue(true);
    }
    
    /** @test **/
    public function posicaoBlocoFamiliarAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['posicao_bloco_familiar'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('posicao_bloco_familiar');
    }


    /** @test **/
    public function criancaDesejadaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['crianca_desejada'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('crianca_desejada');
    }


    /** @test **/
    public function reacaoCriancaRelacaoPaisAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['reacao_crianca_status_relacao_pais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('reacao_crianca_status_relacao_pais');
    }

    /** @test **/
    public function expectativaSexoCriancaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['tinha_expectativa_em_relacao_ao_sexo_da_crianca'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tinha_expectativa_em_relacao_ao_sexo_da_crianca');
    }

    /** @test **/
    public function duracaoGestacaoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['duracao_da_gestacao'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('duracao_da_gestacao');
    }

    /** @test **/
    public function fezPreNatalAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['fez_pre_natal'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('fez_pre_natal');
    }
    /** @test **/
    public function tipoPartoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['tipo_parto'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tipo_parto');
    }

    /** @test **/
    public function complicacaoDurantePartoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['complicacao_durante_parto'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('complicacao_durante_parto');
    }

    /** @test **/
    public function recursoPartoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['foi_necessario_algum_recurso'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('foi_necessario_algum_recurso');
    }

    /** @test **/
    public function maeApresentouProblemaGravidezAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['mae_apresentou_algum_problema_durante_gravidez'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('mae_apresentou_algum_problema_durante_gravidezz');
    }

    /** @test **/
    public function amamentacaoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['amamentacao_natural'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('amamentacao_natural');
    }

    /** @test **/
    public function atrasoProblemaFalaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['atraso_ou_problema_na_fala'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('atraso_ou_problema_na_fala');
    }

    /** @test **/
    public function temEnureseNoturnaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['tem_enurese_noturna'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tem_enurese_noturna');
    }

    /** @test **/
    public function desenvolvimentoMotorAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['desenvolvimento_motor_no_tempo_esperado'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('desenvolvimento_motor_no_tempo_esperado');
    }

    /** @test **/
    public function pertubacoesSonoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['perturbacoes_como_pesadelos_sonambulismo_agitacao_etc'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('perturbacoes_como_pesadelos_sonambulismo_agitacao_etc');
    }

    /** @test **/
    public function trocaLetraFonemaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['letras_ou_fonrmas_trocados'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('letras_ou_fonemas_trocados');
    }

    /** @test **/
    public function fatosAfetaramDesenvolvimentoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['fatos_que_afetaram_o_desenvolvimento_do_paciente'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('fatos_que_afetaram_o_desenvolvimento_do_paciente');

    }

    /** @test **/
    public function idadeUsouChupetaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['ate_quantos_anos_usou_chupetas'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('ate_quantos_anos_usou_chupetas');
    }

    /** @test **/
    public function dificuldadeNaFalaAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['dificuldades_na_fala'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dificuldades_na_fala');
    }

    /** @test **/
    public function dificuldadeNaVisaoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['dificuldades_na_visao'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dificuldades_na_visao');
    }

    /** @test **/
    public function problemasDeSaudeAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['problemas_de_saude'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('problemas_de_saude');
    }

    /** @test **/
    public function tomouRemedioControladoAnamneseFonoNaoPodeSerVazio() {
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['toma_ou_ja_tomou_remedio_controlado_se_sim_quais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('toma_ou_ja_tomou_remedio_controlado_se_sim_quais');
    }

    /** @test **/
    public function tomaBanhoSozinhoAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['toma_banho_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('toma_banho_sozinho');
    }

    /** @test **/
    public function escovaDentesSozinhoAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['escova_os_dentes_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('escova_os_dentes_sozinho');
    }

    /** @test **/
    public function usaBanheiroSozinhoAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['usa_o_banheiro_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('usa_o_banheiro_sozinho');
    }
    /** @test **/
    public function necessitaAuxilioVestirAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['necessita_de_auxilio_para_se_vestir_ou_despir'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('necessita_de_auxilio_para_se_vestir_ou_despir');
    }

    /** @test **/
    public function atendeIntervencoesAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['atende_as_intervencoes_quando_esta_desobedecendo'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('atende_as_intervencoes_quando_esta_desobedecendo');
    }

    /** @test **/
    public function choraFacilAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['chora_facil'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('chora_facil');
    }

    /** @test **/
    public function recusaAuxilioAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['recusa_auxilio'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('recusa_auxilio');
    }

    /** @test **/
    public function resistenciaAoToqueAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['tem_resistencia_ao_toque'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tem_resistencia_ao_toque');
    }
    /** @test **/
    public function serieEscolarAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['serie_atual_na_escola'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('serie_atual_na_escola');
    }

    /** @test **/
    public function alfabetizadaAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['alfabetizada'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('alfabetizada');
    }

    /** @test **/
    public function dificuldadeAprendizagemAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['tem_dificuldades_de_aprendizagem'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('tem_dificuldades_de_aprendizagem');
    }

    /** @test **/
    public function repetiuAnoAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['repetiu_algum_ano'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('repetiu_algum_ano');
    }

    /** @test **/
    public function fazAmigosFacilidadeAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['faz_amigos_com_facilidade'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('faz_amigos_com_facilidade');
    }

    /** @test **/
    public function adaptaFacilmenteMeioAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['adapta_se_facilmente_ao_meio'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('adapta_se_facilmente_ao_meio');
    }

    /** @test **/
    public function dormeSozinhoAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['dorme_sozinho'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dorme_sozinho');
    }
    /** @test **/
    public function dormeQuartoPaisAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['dorme_no_quarto_dos_pais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('dorme_no_quarto_dos_pais');
    }

    /** @test **/
    public function medidasDisciplinaresAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['medidas_disciplinares_empregadas_pelos_pais'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('medidas_disciplinares_empregadas_pelos_pais');
    }

    /** @test **/
    public function observacoesAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['outras_ocorrencias_observacoes'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('outras_ocorrencias_observacoes');
    }

    /** @test **/
    public function distracoesPreferidasAnamneseFonoNaoPodeSerVazio() {

        // Gera um profissional com as profissões indicadas e realiza o login
        $criarProf_Logar = $this->criarProfELogar(
            array(
                Profissional::Adm,
                Profissional::Fonoaudiologo
            ), $this->password);

        $anamnese_fono_incompleto = $this->anamnese_fono_completo;
        $anamnese_fono_incompleto['distracoes_preferidas'] = '';
        $resposta = $this->post(route('profissional.anamnese.fonoaudiologia.salvar'), $anamnese_fono_incompleto);
        $resposta->assertSee('distracoes_preferidas');
    }
}
