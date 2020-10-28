<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvaliacaoNeuropsicologicasAutSeeds extends Seeder {

    public function run() {
        include('database/seeds/SeedsConfig.php');
        include_once('database/seeds/FuncoesAuxuliaresSeeds.php');


        $queixa_principal = ['Problemas de memória mas sem défice cognitivo', 'Problemas de memória com défice congnitivo'];
        $encaminhado_por = ['Neorologista', 'Psiquiatra', 'Fonoaudiológo'];
        $participantes_durante_anaminese = ['Paciente e responsável'];
        $descricao_das_funcoes_cognitivas_avaliadas = ['Percepção', 'Atenção', 'Memória', 'Linguagem e funções executivas'];
        $testes_neuropsicologicos = ['TDE', 'Columbia', 'Teste de Trilhas Coloridas', 'Escalas Beck'];
        $recursos_complementares = ['Conjunto de testes de inteligência e de desempenho escolar e a análise de correlação entre eles'];
        $dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias = ['Um', 'Dois', 'Três', 'Quatro ou mais em virtude de atividades escolares'];
        $alimentacao_nos_dias_da_avalicao = ['Alimentação saudável', 'Alimentação de fast food', 'Apenas frutas'];
        $sono_nos_dias_da_avalicao = ['REM (rapid eye moviment) (Movimento rápido dos olhos)', 'NREM (non rapid eye moviment) (Movimento ocular não rápidp)'];
        $higiene_nos_dias_da_avalicao = ['Higiene pessoal completa', 'Não tomou banho', 'Não lavou as mãos', 'Não escovou os dentes'];
        $humor_nos_dias_da_avalicao = ['Disfórico', 'Elevado', 'Eutímico', 'Expansivo', 'Irritável'];
        $areas_preservadas = ['Cerebelo', 'Amídgala', 'Hipocampo', 'Corpo Caloso', 'Cíngulo'];
        $areas_lesionadas = ['Cerebelo', 'Amídgala', 'Hipocampo', 'Corpo Caloso', 'Cíngulo'];
        $hipotese_diagnostica = ['Depressão', 'Distonia', 'Mal de Alzheimer', 'Esclerose múltipla'];
        $participantes = ['Um', 'Dois', 'Três ou mais'];
        $sugestao_encaminhamento = ['Psicólogo', 'Fisioterapeuta', 'Psiquiatra'];

        //Gerando avaliacao neuropisicologica automaticamente
        for($i = 0; $i < $qtd_avaliacao_neuropisicologica; $i++){
            DB::table('avaliacao__neuropsicologicas')->insert([
                'id_paciente' => rand(1,$qtd_pacientes),
                'id_profissional' => rand(1,$qtd_profissionals),
                'queixa_principal' => $queixa_principal[rand(0, sizeof($queixa_principal)-1)],
                'encaminhado_por' => $encaminhado_por[rand(0, sizeof($encaminhado_por)-1)],
                'participantes_durante_anaminese' => $participantes_durante_anaminese[rand(0, sizeof($participantes_durante_anaminese)-1)],
                'descricao_das_funcoes_cognitivas_avaliadas' => $descricao_das_funcoes_cognitivas_avaliadas[rand(0, sizeof($descricao_das_funcoes_cognitivas_avaliadas)-1)],
                'testes_neuropsicologicos' => $testes_neuropsicologicos[rand(0, sizeof($testes_neuropsicologicos)-1)],
                'recursos_complementares' => $recursos_complementares[rand(0, sizeof($recursos_complementares)-1)],
                'dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias' => $dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias[rand(0, sizeof($dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias)-1)],
                'alimentacao_nos_dias_da_avalicao' => $alimentacao_nos_dias_da_avalicao[rand(0, sizeof($alimentacao_nos_dias_da_avalicao)-1)],
                'sono_nos_dias_da_avalicao' => $sono_nos_dias_da_avalicao[rand(0, sizeof($sono_nos_dias_da_avalicao)-1)],
                'higiene_nos_dias_da_avalicao' => $higiene_nos_dias_da_avalicao[rand(0, sizeof($higiene_nos_dias_da_avalicao)-1)],
                'humor_nos_dias_da_avalicao' => $humor_nos_dias_da_avalicao[rand(0, sizeof($humor_nos_dias_da_avalicao)-1)],
                'areas_preservadas' => $areas_preservadas[rand(0, sizeof($areas_preservadas)-1)],
                'areas_lesionadas' => $areas_lesionadas[rand(0, sizeof($areas_lesionadas)-1)],
                'anexar_arquivos' => base64_encode(file_get_contents(addslashes(dirname(__FILE__) . "/pdf_seed.pdf"))),
                'hipotese_diagnostica' => $hipotese_diagnostica[rand(0, sizeof($hipotese_diagnostica)-1)],
                'dia_hora_devolutiva_aos_responsavel' => Carbon::now()->format('Y-m-d H:i:s'),
                'participantes' => $participantes[rand(0, sizeof($participantes)-1)],
                'atividades_para_ser_feito_na_clinica' => "[{\"nome_atividade\":\"Letras escondidas\",\"recursos_utilizados\":\"Tabuleiro\",\"tempo_de_duracao\":\"10 minutos\",\"funcao_cognitiva\":\"Aten\u00e7\u00e3o seletiva\",\"objetivo\":\"Encontrar a letra indicada em um grupo de letras aleat\u00f3rias\",\"resultados\":\"Reabilita\u00e7\u00e3o cognitiva\"}]",
                'atividades_para_ser_feito_em_casa' => "[{\"nome_atividade\":\"Ordem na fazenda\",\"recursos_utilizados\":\"Figuras\",\"tempo_de_duracao\":\"5 minutos\",\"funcao_cognitiva\":\"Velocidade de processamento\",\"objetivo\":\"Encontrar desenho diferente\",\"resultados\":\"Estimular pensamento\"}]",
                'sugestao_encaminhamento' => $sugestao_encaminhamento[rand(0, sizeof($sugestao_encaminhamento)-1)],
                'exames_clinicos_se_houver' => null,
            ]);
        }
    }
}
