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
        $this->array_ava_terapia_ocupacional = [
            'id_paciente' => $this->paciente->id,
            'id_profissional' => $this->profissional->id,
            'data_avaliacao' => Carbon::now()->format('Y-m-d H:i:s'),
            'entrevistado' => 'paulinho',
            'queixa_principal' => 'safhasoufhasofa',
            'brincadeiras_favoritas' => 'safhasoufhasofa',
            'onde_brinca' => 'safhasoufhasofa',
            'com_quem_prefere_brincar' => 'safhasoufhasofa',
            'o_que_faz_rir' => 'safhasoufhasofa',
            'brincadeiras_evitadas' => 'safhasoufhasofa',
            'brinca_sozinho_ou_precisa_de_atencao' => 'safhasoufhasofa',
            'postura_crianca_quando_brinca' => 'safhasoufhasofa',
            'reacao_ao_ser_frustrada_ou_raiva' => 'safhasoufhasofa',
            'quem_disciplina_a_crianca' => 'safhasoufhasofa',
            'como_reage_a_orientacao_dos_pais' => 'safhasoufhasofa',
            'reacao_a_abracos_carinhos' => 'safhasoufhasofa',
            'areas_maior_habilidade' => 'safhasoufhasofa',
            'areas_maior_dificuldade' => 'safhasoufhasofa',
            'hora_de_levantar' => 'safhasoufhasofa',
            'hora_cafe_da_manha' => 'safhasoufhasofa',
            'hora_da_escola' => 'safhasoufhasofa',
            'hora_almoco' => 'safhasoufhasofa',
            'hora_janta' => 'safhasoufhasofa',
            'hora_dormir' => 'safhasoufhasofa',
            'dorme_durante_dia' => 1,
            'dorme_com_facilidade' => 1,
            'sono_tranqulo' => 1,
            'acorda_noite' => 'safhasoufhasofa',
            'pesadelos' => 1,
            'sonambulismo' => 1,
            'rola_balanca_cabeca_enquanto_dorme' => 1,
            'come_com_os_dedos' => 1,
            'come_com_talheres' => 1,
            'brinca_com_comida' => 1,
            'derrama_comida' => 1,
            'usa_mao_direita_para_comer' => 1,
            'bebe_em_garrafa' => 1,
            'usa_canudo' => 1,
            'segura_copo_garrafa_com_uma_ou_duas_maos' => 'safhasoufhasofa',
            'ajuda_a_colocar_a_mesa' => 1,
            'tipo_alimentacao' => 'safhasoufhasofa',
            'tem_bom_apetite' => 1,
            'o_que_gosta_de_comer' => 'safhasoufhasofa',
            'nao_gosta_de_comer' => 'safhasoufhasofa',
            'houve_dificuldade_transicao_pastoso_solido' => 1,
            'gosta_de_vestir_roupa' => 'safhasoufhasofa',
            'veste_roupa_sozinho_quais_pecas' => 'safhasoufhasofa',
            'tira_roupa_sozinho_quais_pecas' => 'safhasoufhasofa',
            'abotoa' => 1,
            'amarra' => 1,
            'usa_fralda' => 1,
            'usa_vaso_sanitario' => 1,
            'lava_maos_face_corpo' => 1,
            'escova_dentes' => 1,
            'se_diverte_com_o_banho' => 1,
            'gosta_molhar_cabeca' => 1,
            'enxuga_se' => 1,
            'gosta_pentear_cabelos' => 1,
            'gosta_cortar_cabelos' => 1,
            'gosta_cortar_unhas' => 1,
            'info_extras_relevante' => 'asofugasoufgsafgasçiufgasuifgasuifgasuf',
        ];
        $this->avaliacao_terapia_ocupacional = factory(AvaliacaoTerapiaOcupacional::class)->create([
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
