<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Illuminate\Support\Carbon;

abstract class TestCase extends BaseTestCase {

    // Esse carinha possui o método de limpar de cache
    use CreatesApplication;

    protected $cliente;

    protected function setUp(): void {
        parent::setUp();
        # Limpar cache para resolver bugs
        // $this->artisan('config:cache');
        // $this->artisan('view:clear');
        // $this->artisan('route:clear');
        $this->artisan('migrate:fresh');


        $this->agendamento_array = [
            'id_profissional' => '1',
            'id_paciente' => '-1',
            'id_convenio' => '0',
            'nome' => "Pessoa silva santos",
            'cpf' => "12312312312",
            'data_nascimento_paciente' => date('d-m-Y'),
            'telefone' => "87996811674",
            'email' => "Qp0zNP5fIx@yandex.com",
            'dia_da_consulta' => date('d-m-Y'),
            'hora_entrada' => date('H:i:s'),
            'hora_saida' => date('H:i:s'),
            'local_de_atendimento' => 'laaaa longe',
            'recorrencia_do_agendamento' => 0,
            'tipo_da_recorrencia' => "negocin",
            'observacoes' => 'observado',
            'status' => true,
            'estado' => "Pernambuco",
            'cidade' => "Garanhuns",
            'bairro' => "Boa Vista",
            'nome_rua' => "Rua negocin",
            'numero_casa' => 123,
            'descricao' => "casa engraçada não tinha teto não tinha nada",
            'ponto_referencia' => "ali lá",
        ];

        $this->anamnese_fono_array = [
            'id_paciente' => 1,
            'id_profissional' => 1,
            'responsavel_pelo_paciente' =>'Paulo Almeida',
            'numero_de_irmaos' => rand(0,5),
            'posicao_bloco_familiar' =>'Somente Alguma Coisa',
            'status_relacao_pais' => 'Boa, mas poderia melhorar',
            'reacao_crianca_status_relacao_pais' => 'Fica triste pra caramba',
            'se_pais_separados_paciente_vive_com_quem' =>'O pai',
            'crianca_desejada' => 1,
            'idade_mae' => rand(20,55),
            'idade_pai' => rand(20,65),
            'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => 'Sim, havia',
            'duracao_da_gestacao' =>'9 Mêses e 2 dias',
            'fez_pre_natal' =>'Não',
            'tipo_parto' =>'Normal',
            'complicacao_durante_parto' => 'Não',
            'foi_necessario_utilizar_algum_recurso' => 'Não',
            'mae_apresentou_algum_problema_durante_gravidez' => 'Não, tudo certo',
            'amamentacao_natural' => 1,
            'atraso_ou_problema_na_fala' => 1,
            'tem_enurese_noturna' => 1,
            'desenvolvimento_motor_no_tempo_esperado' => 1,
            'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => 1,
            'letras_ou_fonemas_trocados' => 'Sim, troca asd por qwe',
            'fatos_que_afetaram_o_desenvolvimento_do_paciente' => 'Fome por açúcar!',
            'ate_quantos_anos_usou_chupetas' =>'Até os 3 anos',
            'ja_fez_tratamento_fonoaudiologo' => 1,
            'se_sim_tratamento_fono_anterior_onde' => 'Não',
            'se_sim_tratamento_fono_anterior_quando' => 'Não',
            'dificuldades_na_fala' => 'Pouca coisa',
            'dificuldades_na_visao' => 'Pouca coisa',
            'dificuldades_na_locomocao' => 'Muita! Ele as vezes gosta de escrever um texto grande',
            'problemas_de_saude' => 'Não, só gripe mesmo',
            'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => 'Nunca tomou.',
            'toma_banho_sozinho' => 1,
            'escova_os_dentes_sozinho' => 1,
            'usa_o_banheiro_sozinho' => 1,
            'necessita_de_auxilio_para_se_vestir_ou_despir' => 1,
            'atende_as_intervencoes_quando_esta_desobedecendo' => 1,
            'chora_facil' => 1,
            'recusa_auxilio' => 1,
            'tem_resistencia_ao_toque' =>'Nenhuma',
            'serie_atual_na_escola' =>'Quinto ano',
            'alfabetizada' => 1,
            'tem_dificuldades_de_aprendizagem' => 'Sim, pois ele é danado.',
            'repetiu_algum_ano' => 1,
            'faz_amigos_com_facilidade' =>'Normalmente',
            'adapta_se_facilmente_ao_meio' =>'Não, gosta apenas de casa',
            'companheiros_da_crianca_nas_brincadeiras' => 'Meninas',
            'distracoes_preferidas' => 'Ninguém sabe, ele só dorme',
            'atitudes_sociais_predominantes' => 'Obediente',
            'comportamento_emocional' => 'Triste',
            'comportamento_sono' => 'Insônia',
            'dorme_sozinho' => 1,
            'dorme_no_quarto_dos_pais' => 1,
            'medidas_disciplinares_empregadas_pelos_pais' => 'Castigo (sem jogar Dwarf Fortress)',
            'outras_ocorrencias_observacoes' => 'Aqui eu gostaria de escrever bastante coisa, mas né... Quem danado vai fazer isso. ^^',
            'responsavel_por_este_documento' => '',
            'id_pode_ver' => '',
            'id_pode_editar' => '',
        ];

        $this->cliente_array = [
            'login' => "literalmentequalquercoisa",
            'password' => '123123123',
            'nome_paciente' => 'Carlos Antonio Alves Junior',
            //CPF precisa ser valido aqui...
            'cpf' => '90653263163',
            'sexo' => 1,
            //A data de nascimento precisa ser como vem na view...
            'data_nascimento' => '1999-05-10',
            'responsavel' => 'Maria Sueli',
            'numero_irmaos' => 1,
            'lista_irmaos' => 'Barbara Yorrana',
            'nome_pai' => 'Tenho Pai Nao',
            'nome_mae' => 'Maria Sueli de Melo',
            'telefone_pai' => '66666666666',
            'telefone_mae' => '11111111111',
            'email_pai' => 'satanas@inferno.com',
            'email_mae' => 'emailteste@gmail.com',
            'idade_pai' => 99,
            'idade_mae' => 45,
            'naturalidade' => 'Brasileiro',
            'pais_sao_casados' => "0",
            'pais_sao_divorciados' => "0",
            'tipo_filho_biologico_adotivo' => false,
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Boa Vista',
            'nome_rua' => 'Rua Antonio carlos souto',
            'numero_casa' => '857',
            'descricao' => 'ali',
            'ponto_referencia' => 'lá',
        ];

        $this->profissional_array = [
            'nome' => 'Carlos Antônio',
            //CPF precisa ser valido aqui...
            'cpf' => '90653263163',
            'rg' => '12345678',
            'status' => 'Ativo',
            'login' => 'loooogin',
            'password' => '123123123',
            'profissao' => ['Administrador', 'Psicopedagogo'],
            'numero_conselho' => '123',
            'telefone_1' => '12345678910',
            'telefone_2'=> '12345678911',
            'email' => 'carlosaajunior.jp@gmail.com',
            'estado_civil' => 'solteiro',
            'nacionalidade' => 'Brasileiro',
            'estado' => 'PE',
            'cidade' => 'Garanhuns',
            'bairro' => 'Boa Vista',
            'nome_rua' => 'Rua Antonio carlos souto',
            'numero_casa' => '857',
            'descricao' => 'ali',
            'ponto_referencia' => 'lá',
            'profissoes' => ['fonocoiso', 'admin'],
            'descricao_de_conhecimento_e_experiencia' => 'descricao_de_conhecimento_e_experiencia',
        ];

        $this->avaliacao_to_array = [
            'id_paciente' => 1,
            'id_profissional' => 1,
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

        $this->evolucao_neuropsicologica = [
            'id_paciente' => 0,
            'id_profissional' => 0,
            'id_evolucao_anterior' => null, //rand(1,$qtd_evolucao_psicologicas),
            'dia_evolucao' => "2020-10-28",
            'hora_evolucao' => '06:06',
            'tipo_atendimento' => '9',
            'texto' => 'asfohasofuhsaoufhasoufhasioufhsa kfukxzgfuisagfaiufas',
        ];

    }

}
