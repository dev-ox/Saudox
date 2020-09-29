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
    }

    // Função que cria um profissional e já loga ele.
    // O parametro $profissoes é um array de profissoes
    public function criarProfELogar($profissoes, $password) {
        // Concatenação das profissões com ';'
        $str_profissoes = '';
        foreach($profissoes as $p) {
            $str_profissoes = $str_profissoes . ";";
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
        $prof_aux = $criarProf_Logar['profissional'];

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
        $resposta_ver_terapiaOcupacional = $this->post(route("profissional.anamnese.terapia_ocupacional.salvar", $copia_anamnese));

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
        $prof_aux = $criarProf_Logar['profissional'];

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



}
