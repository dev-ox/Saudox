<?php

use Illuminate\Database\Seeder;

class AnamneseTerapiaOcupacionalsAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        $gestacao = ['6 meses ou menos', '7 meses', '8 meses', '9 meses'];
        $doencas_da_mae_na_gravidez = ['Anemia', 'Diabetes gestacional', 'Sarampo', 'Rubéola'];
        $inquietacoes_da_mae_na_gravidez = ['Houve', 'Não houve'];
        $parto = ['Normal', 'Cesariana', 'Fórceps'];
        $amamentacao_natural = ['Sim', 'Não'];
        $dificuldade_ou_atraso_no_controle_do_esfincter = ['Sim', 'Não'];
        $desenvolvimento_motor_no_tempo_certo = ['Sim', 'Não, teve atraso'];
        $perturbacoes_no_sono = ['Sim', 'Não'];
        $habitos_especiais_ao_dormir = ['Sim', 'Não'];
        $troca_letras_ou_fonemas = ['Sim', 'Não'];
        $dificuldade_na_fala = ['Sim', 'Não'];
        $dificuldade_na_visao = ['Sim, somente enxerga de perto', 'Não'];
        $dificuldade_na_locomocao = ['Sim, caminha com dificuldade', 'Não'];
        $toma_banho_sozinho = ['Sim', 'Não'];
        $escova_os_dentes_sozinho = ['Sim', 'Não'];
        $usa_o_banheiro_sozinho = ['Sim', 'Não'];
        $necessita_auxilio_para_se_vestir_ou_despir = ['Sim', 'Não'];
        $idade_da_retirada_das_fraldas = ['2 anos ou menos', '3 anos', '4 anos ou mais'];
        $atende_intervencoes_quando_esta_desobedecendo = ['Sim', 'Não'];
        $chora_facil = ['Sim', 'Não'];
        $recusa_auxilio = ['Sim', 'Não'];
        $resistencia_ao_toque = ['Sim', 'Não'];
        $ja_estudou_antes_em_outra_escola = ['Sim', 'Não'];
        $motivo_transferencia_escola_se_estudou_em_outra_antes = ['Mudança de endereço'];
        $ja_repetiu_alguma_serie = ['Sim', 'Não'];
        $possui_acompanhante_terapeutico_em_sala = ['Sim', 'Não'];
        $recebe_orientacao_aos_deveres_em_casa = ['Sim', 'Não'];
        $quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres = ['Pais', 'Irmãos'];
        $quanto_tempo_executa_os_deveres_em_casa = ['Uma hora', 'Duas horas', 'Três horas ou mais'];
        $quais_linguas_estrangeiras_fala = ['Não fala nenhuma outra', 'Ingles', 'Francês'];
        $quais_esportes_pratica = ['Não pratica',  'Futebol', 'Vôlei', 'Natação', 'Corrida'];
        $quais_intrumentos_toca = ['Não toca nenhum', 'Violão', 'Flauta', 'Bateria'];
        $outras_atividades_que_pratica = ['Aulas de dança', 'Aulas de canto'];
        $faz_amigos_com_facilidade = ['Sim', 'Não'];
        $adaptase_facilmente_ao_meio = ['Sim', 'Não'];
        $companheiros_da_crianca_em_brincadeiras = ['Irmãos', 'Colegas da escola', 'Crianças vizinhas'];
        $escolha_de_grupo_lista = ['Mesmo Sexo', 'Sexo Oposto', 'Criança da Mesma Idade', 'Criança Mais Nova', 'Criança Mais Velha'];
        $distracoes_preferidas = ['TV', 'Computador', 'Video-game', 'Livros'];
        $descricao_se_sim_dependente = ['Sim, gosta de receber ajuda'];
        $descricao_se_sim_indepedente = ['Sim, gosta de fazer tarefas sozinho'];
        $descricao_se_sim_agressivo = ['Sim, ao ser contrariado quer bater nos pais'];
        $descricao_se_sim_cooperador = ['Sim, gosta de cooperar nas atividades'];
        $divide_quarto_com_alguem = ['Não divide', 'Divide com irmão'];
        $medidas_disciplinares_empregadas_pelos_pais = ['Castigo', 'Punição', 'Retirada de privilégios', 'Medida sócio-educativa', 'Repreensão'];
        $reacao_do_filho_ao_ser_contrariado = ['Irritação', 'Tristeza'];
        $atitude_dos_pais_a_reacao_filho_contrareado = ['Castigo', 'Ignora'];
        $acompanhamento_medico = ['Sim', 'Não'];
        $qual_medico_responsavel = ['Dr. José'];
        $diagnostico_medico = ['Sem diagnóstico'];

        //Gerando anamnese terapia ocupacional automaticamente
        for($i = 0; $i < $qtd_anamnese_terapia_ocupacionals; $i++){

            $escolha_de_grupo = '';
            $qnt_escolha_de_grupo = rand(1, 5);
            for ($j=0; $j<$qnt_escolha_de_grupo; $j++){
                $escolha_de_grupo = $escolha_de_grupo . $escolha_de_grupo_lista[rand(0, sizeof($escolha_de_grupo_lista)-1)];
                $escolha_de_grupo = $escolha_de_grupo . ', ';
            }
            $escolha_de_grupo = substr($escolha_de_grupo, 0, -1);


            DB::table('anamnese__terapia__ocupacionals')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'gestacao' => $gestacao[rand(0, sizeof($gestacao)-1)],
                'doencas_da_mae_na_gravidez' => $doencas_da_mae_na_gravidez[rand(0, sizeof($doencas_da_mae_na_gravidez)-1)],
                'inquietacoes_da_mae_na_gravidez' => $inquietacoes_da_mae_na_gravidez[rand(0, sizeof($inquietacoes_da_mae_na_gravidez)-1)],
                'parto' => $parto[rand(0, sizeof($parto)-1)],
                'amamentacao_natural' => $amamentacao_natural[rand(0, sizeof($amamentacao_natural)-1)],
                'dificuldade_ou_atraso_no_controle_do_esfincter' => $dificuldade_ou_atraso_no_controle_do_esfincter[rand(0, sizeof($dificuldade_ou_atraso_no_controle_do_esfincter)-1)],
                'desenvolvimento_motor_no_tempo_certo' => $desenvolvimento_motor_no_tempo_certo[rand(0, sizeof($desenvolvimento_motor_no_tempo_certo)-1)],
                'perturbacoes_no_sono' => $perturbacoes_no_sono[rand(0, sizeof($perturbacoes_no_sono)-1)],
                'habitos_especiais_ao_dormir' => $habitos_especiais_ao_dormir[rand(0, sizeof($habitos_especiais_ao_dormir)-1)],
                'troca_letras_ou_fonemas' => $troca_letras_ou_fonemas[rand(0, sizeof($troca_letras_ou_fonemas)-1)],
                'dificuldade_na_fala' => $dificuldade_na_fala[rand(0, sizeof($dificuldade_na_fala)-1)],
                'dificuldade_na_visao' => $dificuldade_na_visao[rand(0, sizeof($dificuldade_na_visao)-1)],
                'dificuldade_na_locomocao' => $dificuldade_na_locomocao[rand(0, sizeof($dificuldade_na_locomocao)-1)],
                'movimentos_estereotipados' => rand(0,1) >= 0.5,
                'ecolalias' => rand(0,1) >= 0.5,
                'toma_banho_sozinho' => $toma_banho_sozinho[rand(0, sizeof($toma_banho_sozinho)-1)],
                'escova_os_dentes_sozinho' => $escova_os_dentes_sozinho[rand(0, sizeof($escova_os_dentes_sozinho)-1)],
                'usa_o_banheiro_sozinho' => $usa_o_banheiro_sozinho[rand(0, sizeof($usa_o_banheiro_sozinho)-1)],
                'necessita_auxilio_para_se_vestir_ou_despir' => $necessita_auxilio_para_se_vestir_ou_despir[rand(0, sizeof($necessita_auxilio_para_se_vestir_ou_despir)-1)],
                'idade_da_retirada_das_fraldas' => $idade_da_retirada_das_fraldas[rand(0, sizeof($idade_da_retirada_das_fraldas)-1)],
                'atende_intervencoes_quando_esta_desobedecendo' => $atende_intervencoes_quando_esta_desobedecendo[rand(0, sizeof($atende_intervencoes_quando_esta_desobedecendo)-1)],
                'chora_facil' =>$chora_facil[rand(0, sizeof($chora_facil)-1)],
                'recusa_auxílio' => $recusa_auxilio[rand(0, sizeof($recusa_auxilio)-1)],
                'resistencia_ao_toque' => $resistencia_ao_toque[rand(0, sizeof($resistencia_ao_toque)-1)],
                'crianca_estuda' => rand(0,1) >= 0.5,
                'ja_estudou_antes_em_outra_escola' => $ja_estudou_antes_em_outra_escola[rand(0, sizeof($ja_estudou_antes_em_outra_escola)-1)],
                'motivo_transferencia_escola_se_estudou_em_outra_antes' => $motivo_transferencia_escola_se_estudou_em_outra_antes[rand(0, sizeof($motivo_transferencia_escola_se_estudou_em_outra_antes)-1)],
                'ja_repetiu_alguma_serie' => $ja_repetiu_alguma_serie[rand(0, sizeof($ja_repetiu_alguma_serie)-1)],
                'possui_acompanhante_terapeutico_em_sala' => $possui_acompanhante_terapeutico_em_sala[rand(0, sizeof($possui_acompanhante_terapeutico_em_sala)-1)],
                'recebe_orientacao_aos_deveres_em_casa' => $recebe_orientacao_aos_deveres_em_casa[rand(0, sizeof($recebe_orientacao_aos_deveres_em_casa)-1)],
                'quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres' => $quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres[rand(0, sizeof($quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres)-1)],
                'quanto_tempo_executa_os_deveres_em_casa' => $quanto_tempo_executa_os_deveres_em_casa[rand(0, sizeof($quanto_tempo_executa_os_deveres_em_casa)-1)],
                'quais_linguas_estrangeiras_fala' => $quais_linguas_estrangeiras_fala[rand(0, sizeof($quais_linguas_estrangeiras_fala)-1)],
                'quais_esportes_pratica' => $quais_esportes_pratica[rand(0, sizeof($quais_esportes_pratica)-1)],
                'quais_intrumentos_toca' => $quais_intrumentos_toca[rand(0, sizeof($quais_intrumentos_toca)-1)],
                'outras_atividades_que_pratica' => $outras_atividades_que_pratica[rand(0, sizeof($outras_atividades_que_pratica)-1)],
                'faz_amigos_com_facilidade' => $faz_amigos_com_facilidade[rand(0, sizeof($faz_amigos_com_facilidade)-1)],
                'adaptase_facilmente_ao_meio' => $adaptase_facilmente_ao_meio[rand(0, sizeof($adaptase_facilmente_ao_meio)-1)],
                'companheiros_da_crianca_em_brincadeiras' => $companheiros_da_crianca_em_brincadeiras[rand(0, sizeof($companheiros_da_crianca_em_brincadeiras)-1)],
                'escolha_de_grupo' => $escolha_de_grupo,
                'distracoes_preferidas' => $distracoes_preferidas[rand(0, sizeof($distracoes_preferidas)-1)],
                'obediente' => rand(0,1) >= 0.5,
                'dependente' => rand(0,1) >= 0.5,
                'comunicativo' => rand(0,1) >= 0.5,
                'agressivo' => rand(0,1) >= 0.5,
                'cooperativo' => rand(0,1) >= 0.5,
                'descricao_se_sim_dependente' => $descricao_se_sim_dependente[rand(0, sizeof($descricao_se_sim_dependente)-1)],
                'descricao_se_sim_indepedente' => $descricao_se_sim_indepedente[rand(0, sizeof($descricao_se_sim_indepedente)-1)],
                'descricao_se_sim_agressivo' => $descricao_se_sim_agressivo[rand(0, sizeof($descricao_se_sim_agressivo)-1)],
                'descricao_se_sim_cooperador' => $descricao_se_sim_cooperador[rand(0, sizeof($descricao_se_sim_cooperador)-1)],
                'tranquilo' => rand(0,1) >= 0.5,
                'seguro' => rand(0,1) >= 0.5,
                'ansioso' => rand(0,1) >= 0.5,
                'emotivo' => rand(0,1) >= 0.5,
                'alegre' => rand(0,1) >= 0.5,
                'queixoso' => rand(0,1) >= 0.5,
                'insonia' => rand(0,1) >= 0.5,
                'pesadelos' => rand(0,1) >= 0.5,
                'hipersonia' => rand(0,1) >= 0.5,
                'dorme_sozinho' => rand(0,1) >= 0.5,
                'dorme_no_quarto_dos_pais' => rand(0,1) >= 0.5,
                'divide_quarto_com_alguem' => $divide_quarto_com_alguem[rand(0, sizeof($divide_quarto_com_alguem)-1)],
                'medidas_disciplinares_empregadas_pelos_pais' => $medidas_disciplinares_empregadas_pelos_pais[rand(0, sizeof($medidas_disciplinares_empregadas_pelos_pais)-1)],
                'reação_do_filho_ao_ser_contrariado' => $reacao_do_filho_ao_ser_contrariado[rand(0, sizeof($reacao_do_filho_ao_ser_contrariado)-1)],
                'atitude_dos_pais_a_reacao_filho_contrareado' => $atitude_dos_pais_a_reacao_filho_contrareado[rand(0, sizeof($atitude_dos_pais_a_reacao_filho_contrareado)-1)],
                'acompanhamento_medico' => $acompanhamento_medico[rand(0, sizeof($acompanhamento_medico)-1)],
                'qual_medico_responsavel' => $qual_medico_responsavel[rand(0, sizeof($qual_medico_responsavel)-1)],
                'diagnostico_medico' => $diagnostico_medico[rand(0, sizeof($diagnostico_medico)-1)],
            ]);
        }
    }
}
