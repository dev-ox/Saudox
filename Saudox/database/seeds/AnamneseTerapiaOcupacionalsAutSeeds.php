<?php

use Illuminate\Database\Seeder;

class AnamneseTerapiaOcupacionalsAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');

        //Gerando anamnese terapia ocupacional automaticamente
        for($i = 0; $i < $qtd_anamnese_terapia_ocupacionals; $i++){
            DB::table('anamnese__terapia__ocupacionals')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'gestacao' => Str::random(10),
                'doencas_da_mae_na_gravidez' => Str::random(10),
                'inquietacoes_da_mae_na_gravidez' => texto(10),
                'parto' => Str::random(10),
                'amamentacao_natural' => Str::random(10),
                'dificuldade_ou_atraso_no_controle_do_esfincter' => Str::random(10),
                'desenvolvimento_motor_no_tempo_certo' => Str::random(10),
                'perturbacoes_no_sono' => Str::random(10),
                'habitos_especiais_ao_dormir' => Str::random(10),
                'troca_letras_ou_fonemas' => Str::random(10),
                'dificuldade_na_fala' => Str::random(10),
                'dificuldade_na_visao' => Str::random(10),
                'dificuldade_na_locomocao' => Str::random(10),
                'movimentos_estereotipados' => rand(0,1) >= 0.5,
                'ecolalias' => rand(0,1) >= 0.5,
                'toma_banho_sozinho' => Str::random(10),
                'escova_os_dentes_sozinho' => Str::random(10),
                'usa_o_banheiro_sozinho' => Str::random(10),
                'necessita_auxilio_para_se_vestir_ou_despir' => Str::random(10),
                'idade_da_retirada_das_fraldas' => Str::random(10),
                'atende_intervencoes_quando_esta_desobedecendo' => Str::random(10),
                'chora_facil' => Str::random(10),
                'recusa_auxílio' => Str::random(10),
                'resistencia_ao_toque' => Str::random(10),
                'crianca_estuda' => rand(0,1) >= 0.5,
                'ja_estudou_antes_em_outra_escola' => Str::random(10),
                'motivo_transferencia_escola_se_estudou_em_outra_antes' => Str::random(10),
                'ja_repetiu_alguma_serie' => Str::random(10),
                'possui_acompanhante_terapeutico_em_sala' => Str::random(10),
                'recebe_orientacao_aos_deveres_em_casa' => Str::random(10),
                'quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres' => texto(10),
                'quanto_tempo_executa_os_deveres_em_casa' => Str::random(10),
                'quais_linguas_estrangeiras_fala' => Str::random(10),
                'quais_esportes_pratica' => Str::random(10),
                'quais_intrumentos_toca' => Str::random(10),
                'outras_atividades_que_pratica' => Str::random(10),
                'faz_amigos_com_facilidade' => Str::random(10),
                'adaptase_facilmente_ao_meio' => Str::random(10),
                'companheiros_da_crianca_em_brincadeiras' => Str::random(10),
                'escolha_de_grupo' => Str::random(10),
                'distracoes_preferidas' => Str::random(10),
                'obediente' => rand(0,1) >= 0.5,
                'dependente' => rand(0,1) >= 0.5,
                'comunicativo' => rand(0,1) >= 0.5,
                'agressivo' => rand(0,1) >= 0.5,
                'cooperativo' => rand(0,1) >= 0.5,
                'descricao_se_sim_dependente' => Str::random(10),
                'descricao_se_sim_indepedente' => Str::random(10),
                'descricao_se_sim_agressivo' => Str::random(10),
                'descricao_se_sim_cooperador' => Str::random(10),
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
                'divide_quarto_com_alguem' => Str::random(10),
                'medidas_disciplinares_empregadas_pelos_pais' => texto(10),
                'reação_do_filho_ao_ser_contrariado' => texto(5),
                'atitude_dos_pais_a_reacao_filho_contrareado' => texto(5),
                'acompanhamento_medico' => texto(5),
                'qual_medico_responsavel' => Str::random(10),
                'diagnostico_medico' => texto(20),
            ]);
        }
    }
}
