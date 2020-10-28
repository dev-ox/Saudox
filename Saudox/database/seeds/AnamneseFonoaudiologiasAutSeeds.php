<?php

use Illuminate\Database\Seeder;

class AnamneseFonoaudiologiasAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $responsavel_pelo_paciente = ['Mãe', 'Pai', 'Tio', 'Tia', 'Avó', 'Avô', 'Irmão', 'Irmã', 'Prima', 'Primo'];
        $posicao_bloco_familiar = ['Filho único',  'Promogênito', 'Do meio', 'Caçula', 'Temporão'];
        $status_relacao_pais = ['Ótimo', 'Bom', 'Ruim', 'Péssimo'];
        $reacao_crianca_status_relacao_pais = ['Ótimo', 'Bom', 'Ruim', 'Péssimo'];
        $se_pais_separados_paciente_vive_com_quem = ['Mãe', 'Pai', 'Tio', 'Tia', 'Avó', 'Avô', 'Irmão', 'Irmã', 'Prima', 'Primo'];
        $tinha_expectativa_em_relacao_ao_sexo_da_crianca = ['Sim', 'Não'];
        $duracao_da_gestacao = ['6 meses ou menos', '7 meses', '8 meses', '9 meses'];
        $fez_pre_natal = ['Sim', 'Não'];
        $tipo_parto = ['Normal', 'Cesariana', 'Fórceps'];
        $complicacao_durante_parto = ['Não houve', 'Pré-eclâmpsia'];
        $foi_necessario_utilizar_algum_recurso = ['Não foi necessário'];
        $mae_apresentou_algum_problema_durante_gravidez = ['Sim', 'Não'];
        $letras_ou_fonemas_trocados = ['Não', 'Sim, R e L', 'Sim, B e D', 'Sim, C e G'];
        $fatos_que_afetaram_o_desenvolvimento_do_paciente = ['Saúde',  'Nutrição', 'Educação e Cuidados', 'Contexto socioeconômico'];
        $ate_quantos_anos_usou_chupetas = ['1 ano', '2 anos', '3 anos', '4 anos', '5 anos', '6 anos ou mais'];
        $se_sim_tratamento_fono_anterior_onde = ['Clínica'];
        $se_sim_tratamento_fono_anterior_quando = ['Há um ano', 'Há dois anos', 'Há três anos', 'Há quatro anos ou mais'];
        $dificuldades_na_fala = ['Sim', 'Não'];
        $dificuldades_na_visao = ['Sim', 'Não'];
        $dificuldades_na_locomocao = ['Sim', 'Não'];
        $problemas_de_saude = ['Não possui', 'Apnéia do sono', 'Convulsão', 'Dificuldade de concentração', 'Insônia', 'Pré-diabetes'];
        $toma_ou_ja_tomou_remedio_controlado_se_sim_quais = ['Não', 'Sim, ansiolíticos', 'Sim, ansiolíticos', 'Sim, anorexígenos', 'Sim, anticonsulsivantes', 'Sim, antidepressivos', 'Sim, entorpecentes e psicotrópicos', 'Sim, imunossupressores e antidepressivos'];
        $tem_resistencia_ao_toque = ['Sim', 'Não'];
        $serie_atual_na_escola = ['Educação Infantil', '1º Ensino Fundamental I', '2º Ensino Fundamental I', '3º Ensino Fundamental I', '4º Ensino Fundamental I', '5º Ensino Fundamental I', '6º Ensino Fundamental II', '7º Ensino Fundamental II', '8º Ensino Fundamental II', '9º Ensino Fundamental II', '1º Ensino Médio', '2º Ensino Médio', '3º Ensino Médio'];
        $tem_dificuldades_de_aprendizagem = ['Sim', 'Não'];
        $faz_amigos_com_facilidade = ['Sim', 'Não'];
        $adapta_se_facilmente_ao_meio = ['Sim', 'Não'];
        $companheiros_da_crianca_nas_brincadeiras_lista = ['Mesmo Sexo', 'Sexo Oposto', 'Criança da Mesma Idade', 'Criança Mais Nova', 'Criança Mais Velha'];
        $distracoes_preferidas = ['Brincadeiras', 'Video-game', 'Computador', 'Televisão', 'Piscina'];
        $atitudes_sociais_predominantes = ['Obediente', 'Independente', 'Comunicativo', 'Agressivo', 'Cooperador'];
        $comportamento_emocional = ['Tranquilo', 'Seguro', 'Ansioso', 'Alegre', 'Emotivo', 'Queixoso'];
        $comportamento_sono = ['Insônia', 'Pesadelos', 'Hipersonia'];
        $medidas_disciplinares_empregadas_pelos_pais = ['Castigo', 'Punição', 'Retirada de privilégios', 'Medida sócio-educativa', 'Repreensão'];
        $outras_ocorrencias_observacoes = ['Sem observações'];

        //Gerando anamnese fonoaudiologia automaticamente
        for($i = 0; $i < $qtd_anamnese_fonoaudiologia; $i++){

            $companheiros_da_crianca_nas_brincadeiras = '';
            $qnt_companheiros_da_crianca_nas_brincadeiras = rand(1, 5);
            for ($j=0; $j<$qnt_companheiros_da_crianca_nas_brincadeiras; $j++){
                $companheiros_da_crianca_nas_brincadeiras = $companheiros_da_crianca_nas_brincadeiras . $companheiros_da_crianca_nas_brincadeiras_lista[rand(0, sizeof($companheiros_da_crianca_nas_brincadeiras_lista)-1)];
                $companheiros_da_crianca_nas_brincadeiras = $companheiros_da_crianca_nas_brincadeiras . ', ';
            }
            $companheiros_da_crianca_nas_brincadeiras = substr($companheiros_da_crianca_nas_brincadeiras, 0, -1);


            DB::table('anamnese_fonoaudiologias')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'responsavel_pelo_paciente' =>  $responsavel_pelo_paciente[rand(0, sizeof($responsavel_pelo_paciente)-1)],
                'numero_de_irmaos' => rand(0,10),
                'posicao_bloco_familiar' => $posicao_bloco_familiar[rand(0, sizeof($posicao_bloco_familiar)-1)],
                'status_relacao_pais' => $status_relacao_pais[rand(0, sizeof($status_relacao_pais)-1)],
                'reacao_crianca_status_relacao_pais' => $reacao_crianca_status_relacao_pais[rand(0, sizeof($reacao_crianca_status_relacao_pais)-1)],
                'se_pais_separados_paciente_vive_com_quem' => $se_pais_separados_paciente_vive_com_quem[rand(0, sizeof($se_pais_separados_paciente_vive_com_quem)-1)],
                'crianca_desejada' => rand(0,1) >= 0.5,
                'idade_mae' => rand(20,100),
                'idade_pai' => rand(20,100),
                'tinha_expectativa_em_relacao_ao_sexo_da_crianca' => $tinha_expectativa_em_relacao_ao_sexo_da_crianca[rand(0, sizeof($tinha_expectativa_em_relacao_ao_sexo_da_crianca)-1)],
                'duracao_da_gestacao' => $duracao_da_gestacao[rand(0, sizeof($duracao_da_gestacao)-1)],
                'fez_pre_natal' => $fez_pre_natal[rand(0, sizeof($fez_pre_natal)-1)],
                'tipo_parto' => $tipo_parto[rand(0, sizeof($tipo_parto)-1)],
                'complicacao_durante_parto' => $complicacao_durante_parto[rand(0, sizeof($complicacao_durante_parto)-1)],
                'foi_necessario_utilizar_algum_recurso' => $foi_necessario_utilizar_algum_recurso[rand(0, sizeof($foi_necessario_utilizar_algum_recurso)-1)],
                'mae_apresentou_algum_problema_durante_gravidez' => $mae_apresentou_algum_problema_durante_gravidez[rand(0, sizeof($mae_apresentou_algum_problema_durante_gravidez)-1)],
                'amamentacao_natural' => rand(0,1) >= 0.5,
                'atraso_ou_problema_na_fala' => rand(0,1) >= 0.5,
                'tem_enurese_noturna' => rand(0,1) >= 0.5,
                'desenvolvimento_motor_no_tempo_esperado' => rand(0,1) >= 0.5,
                'perturbacoes_como_pesadelos_sonambulismo_agitacao_etc' => rand(0,1) >= 0.5,
                'letras_ou_fonemas_trocados' => $letras_ou_fonemas_trocados[rand(0, sizeof($letras_ou_fonemas_trocados)-1)],
                'fatos_que_afetaram_o_desenvolvimento_do_paciente' => $fatos_que_afetaram_o_desenvolvimento_do_paciente[rand(0, sizeof($fatos_que_afetaram_o_desenvolvimento_do_paciente)-1)],
                'ate_quantos_anos_usou_chupetas' => $ate_quantos_anos_usou_chupetas[rand(0, sizeof($ate_quantos_anos_usou_chupetas)-1)],
                'ja_fez_tratamento_fonoaudiologo' => rand(0,1) >= 0.5,
                'se_sim_tratamento_fono_anterior_onde' => $se_sim_tratamento_fono_anterior_onde[rand(0, sizeof($se_sim_tratamento_fono_anterior_onde)-1)],
                'se_sim_tratamento_fono_anterior_quando' => $se_sim_tratamento_fono_anterior_quando[rand(0, sizeof($se_sim_tratamento_fono_anterior_quando)-1)],
                'dificuldades_na_fala' => $dificuldades_na_fala[rand(0, sizeof($dificuldades_na_fala)-1)],
                'dificuldades_na_visao' => $dificuldades_na_visao[rand(0, sizeof($dificuldades_na_visao)-1)],
                'dificuldades_na_locomocao' => $dificuldades_na_locomocao[rand(0, sizeof($dificuldades_na_locomocao)-1)],
                'problemas_de_saude' => $problemas_de_saude[rand(0, sizeof($problemas_de_saude)-1)],
                'toma_ou_ja_tomou_remedio_controlado_se_sim_quais' => $toma_ou_ja_tomou_remedio_controlado_se_sim_quais[rand(0, sizeof($toma_ou_ja_tomou_remedio_controlado_se_sim_quais)-1)],
                'toma_banho_sozinho' => rand(0,1) >= 0.5,
                'escova_os_dentes_sozinho' => rand(0,1) >= 0.5,
                'usa_o_banheiro_sozinho' => rand(0,1) >= 0.5,
                'necessita_de_auxilio_para_se_vestir_ou_despir' => rand(0,1) >= 0.5,
                'atende_as_intervencoes_quando_esta_desobedecendo' => rand(0,1) >= 0.5,
                'chora_facil' => rand(0,1) >= 0.5,
                'recusa_auxilio' => rand(0,1) >= 0.5,
                'tem_resistencia_ao_toque' => $tem_resistencia_ao_toque[rand(0, sizeof($tem_resistencia_ao_toque)-1)],
                'serie_atual_na_escola' => $serie_atual_na_escola[rand(0, sizeof($serie_atual_na_escola)-1)],
                'alfabetizada' => rand(0,1) >= 0.5,
                'tem_dificuldades_de_aprendizagem' => $tem_dificuldades_de_aprendizagem[rand(0, sizeof($tem_dificuldades_de_aprendizagem)-1)],
                'repetiu_algum_ano' => rand(0,1) >= 0.5,
                'faz_amigos_com_facilidade' => $faz_amigos_com_facilidade[rand(0, sizeof($faz_amigos_com_facilidade)-1)],
                'adapta_se_facilmente_ao_meio' => $adapta_se_facilmente_ao_meio[rand(0, sizeof($adapta_se_facilmente_ao_meio)-1)],
                'companheiros_da_crianca_nas_brincadeiras' => $companheiros_da_crianca_nas_brincadeiras,
                'distracoes_preferidas' => $distracoes_preferidas[rand(0, sizeof($distracoes_preferidas)-1)],
                'atitudes_sociais_predominantes' => $atitudes_sociais_predominantes[rand(0, sizeof($atitudes_sociais_predominantes)-1)],
                'comportamento_emocional' => $comportamento_emocional[rand(0, sizeof($comportamento_emocional)-1)],
                'comportamento_sono' => $comportamento_sono[rand(0, sizeof($comportamento_sono)-1)],
                'dorme_sozinho' => rand(0,1) >= 0.5,
                'dorme_no_quarto_dos_pais' => rand(0,1) >= 0.5,
                'medidas_disciplinares_empregadas_pelos_pais' => $medidas_disciplinares_empregadas_pelos_pais[rand(0, sizeof($medidas_disciplinares_empregadas_pelos_pais)-1)],
                'outras_ocorrencias_observacoes' => $outras_ocorrencias_observacoes[rand(0, sizeof($outras_ocorrencias_observacoes)-1)],
            ]);
        }
    }
}
