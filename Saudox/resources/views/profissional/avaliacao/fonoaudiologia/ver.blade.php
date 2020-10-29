@extends('layouts.mainlayout')
@section('content')


    <div class="container bordas_amarelas bg-padrao">
        <br>
        <br>
        <h1> Avaliação de Fonoaudiologia de {{$paciente->nome_paciente}} </h1>
        @if(Auth::guard('profissional')->check())
            <h3 class="pessoal"><a href="{{ route('profissional.avaliacao.fonoaudiologia.editar', $paciente->id) }}">Editar</a></h3>
        @endif
        <br>
        <div class="row">
            <div class="col-md text-center justify-content-center">



                <h3 >Dia da avaliação</h3> {{ $avaliacao->data_avaliacao }}

                <hr class="hr_form">
                <h3>Motivo da avaliação</h3><br> {{ $avaliacao->motivo_avaliacao }}


                <hr class="hr_form">
                <h3>Cálculo dos escores</h3><br>
                <hr class="hr_form">


                <table class="table table-dark" style="width: 85%; margin: auto;">
                    <tbody>


                        <tr>
                            <td style="width: 25%;padding-top: 2.75rem;font-size: 25px; border-right: 2px solid; " rowspan="4">Linguagem Receptiva</td>
                        </tr>

                        <tr>
                            <td>Última tarefa correta</td>
                            <td>{{ $avaliacao->ultima_tarefa_correta_linguagem_receptiva }}</td>
                        </tr>

                        <tr>
                            <td>Menos o total de respostas incorretas</td>
                            <td>{{ $avaliacao->menos_total_respostas_incorretoas_linguagem_receptiva }}</td>
                        </tr>

                        <tr>
                            <td>Linguagem Receptiva – Escore Bruto</td>
                            <td>{{ $avaliacao->linguagem_receptiva }}</td>
                        </tr>






                        <tr>
                            <td style="width: 25%;padding-top: 2.75rem;font-size: 25px; border-right: 2px solid; " rowspan="4">Linguagem Expressiva</td>
                        </tr>

                        <tr>
                            <td>Última tarefa correta</td>
                            <td>{{ $avaliacao->ultima_tarefa_correta_linguagem_expressiva }}</td>
                        </tr>

                        <tr>
                            <td>Menos o total de respostas incorretas</td>
                            <td>{{ $avaliacao->menos_total_respostas_incorretoas_linguagem_expressiva }}</td>
                        </tr>

                        <tr>
                            <td>Linguagem Expressiva – Escore Bruto</td>
                            <td>{{ $avaliacao->linguagem_expressiva }}</td>
                        </tr>






                        <tr>
                            <td style="width: 25%;padding-top: 2.75rem;font-size: 25px; border-right: 2px solid; " rowspan="5">Linguagem Global</td>
                        </tr>

                        <tr>
                            <td>Escore padrão da Linguagem Receptiva</td>
                            <td>{{ $avaliacao->escore_padrao_linguagem_receptiva }}</td>
                        </tr>

                        <tr>
                            <td>Mais (+) o Escore padrão da Linguagem Expressiva</td>
                            <td>{{ $avaliacao->mais_escore_padrao_linguagem_expressiva }}</td>
                        </tr>

                        <tr>
                            <td>Total</td>
                            <td>{{ $avaliacao->total_linguagem_global }}</td>
                        </tr>

                        <tr>
                            <td>Escore padrão da Linguagem Global</td>
                            <td>{{ $avaliacao->escore_padrao_linguagem_global }}</td>
                        </tr>

                    </tbody>
                </table>


                <hr class="hr_form">
                <h3>Observação do comportamento:</h3><br>
                {{ $avaliacao->observacao_comportamento }}

                <hr class="hr_form">

                <h3>Questionário</h3><br>
                <div id="container_blocos_questionarios_ativo">

                    @if($avaliacao->seletor_questionario == "nenhum_bloco")
                        Nenhum questionário respondido...
                    @elseif($avaliacao->seletor_questionario == "bloco_12_17_meses")
                        <h3 style="margin-left: 12%;">12 a 17 meses</h3><br>
                        <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                        <br><br>

                        <h4>1. Mantém a atenção <i>(por dois minutos)</i>.<span class="quest_p">{{ $avaliacao->respostas->quest_12_17[0] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: – Auditivo: brinquedos sonoros. <br>
                                      – Visual: brinquedos em movimento – carrinho ou bichinho. <br><br>

                        <i>
                            <h4>Inicialmente, interaja com a criança, em seguida: </h4><br>

                            a. Auditiva: faça um som do lado direito, depois do lado esquerdo e, por faça um som do lado direito, depois do lado esquerdo e, por <br>
                            último atrás da criança, observando se ela procura a fonte sonora. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[1] }}</span><br><br>


                            b. Visual: movimente o objeto da esquerda para a direita, em sentido movimente o objeto da esquerda para a direita, em sentido <br>
                            contrário e para cima, observando se a criança acompanha com o olhar o movimento realizado). <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[2] }}</span><br><br>
                        </i>

                        <br><br><br><br>

                        <h4>2. Compreende ordens simples com pistas gestuais. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[3] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: bola e bonequinha. <br><br>

                        <i>
                            <h4>Coloque o material perto da criança e diga: Vamos brincar? </h4><br>

                            a. Pegue a bola. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[4] }}</span><br><br>
                            b. Dê a bola para mim. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[5] }}</span><br><br>
                            c. Agora, dê a bola para o neném. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[6] }}</span><br><br>
                        </i>

                        <br><br><br><br>

                        <h4>3. Identifica objetos familiares. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[7] }}</span></h4><br>
                        (1 ponto = reconhece pelo menos um objeto, sempre) <br><br>

                        Material: cachorro, carrinho, bola, bonequinha. <br><br>

                        <i>
                            <h4>Coloque o material perto da criança e diga: Onde está? </h4><br>
                            a. a bola <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[8] }}</span><br><br>
                            b. o carro <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[9] }}</span><br><br>
                            c. a neném <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[10] }}</span><br><br>
                            d. o cachorro <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[11] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>4. Identifica figuras. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[12] }}</span></h4><br>
                        (1 ponto = aponta consistentemente para uma figura) <br><br>

                        Material: Manual de Figuras, pág. 1. <br><br>

                        <i>
                            Você está vendo essas figuras? Mostre... <br><br>
                            a. a bola <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[13] }}</span><br><br>
                            b. o carro <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[14] }}</span><br><br>
                        </i>


                        <br><br><br><br>
                        <br><br><br><br>

                        <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                        <br><br>


                        <h4>1. Produz sons silábicos variados (faz combinação de sons). <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[15] }}</span></h4>
                        (1 ponto = produz duas sílabas ou mais variando os fonemas em uma emissão vocal)<br><br>

                        Observação realizada em contexto lúdico. <i>Escreva os exemplos</i>: <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[16] }}</span> <br><br>

                        <br><br><br><br>

                        <h4>2.Possui vocabulário de pelo menos uma palavra: <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[17] }}</span></h4>
                        (1 ponto = usa consistentemente a mesma combinação de sons para nomear uma pessoa ou um objeto)<br><br>

                        <br><br><br><br>

                        <h4>3. Comunica-se de forma não verbal, usando gestos, chamando atenção <br>
                            para si ou apontando para um objeto ou pessoa. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[18] }}</span></h4>
                        (1 ponto = se apresenta alguns dos comportamentos descritos. Ex.: entrega brinquedo, puxa pela mão, aponta etc.)<br><br>

                        <i>Descreva o que a criança faz: </i> <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[19] }}</span> <br><br>

                        <br><br><br><br>


                        <h4>4. Imita uma palavra. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[20] }}</span></h4>
                        (1 ponto = repete 1 palavra)<br><br>

                        Material: bola, carro, miniatura de boneco ou palavras do contexto da criança como “mamãe” e “papai”. <br><br>

                        <i>

                            A examinadora aponta para o objeto e em seguida nomeia para a <br>
                            criança, estimulando-a a repetir:<br>
                        </i>
                        Ex.: Olhe a bola....bola <br>
                        (bola, neném, carro, papai e mamãe) <br>

                    @elseif($avaliacao->seletor_questionario == "bloco_1e6_1e11_meses")

                        <h3 style="margin-left: 12%;">1 ano e 6 m. até 1 ano e 11 m.</h3><br>
                        <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                        <br><br>

                        <h4>5. Compreende ordens simples sem pistas gestuais.<span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[0] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: bolsa e algumas bolas. <br>
                        Ordem: Vamos ver as bolas que estão dentro da bolsa?. <br><br>

                        <i>
                            a. Tire as bolas da bolsa <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[1] }}</span><br><br>

                            b. Agora me dê uma bola <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[2] }}</span><br><br>

                            c. Agora ponha as bolas dentro da bolsa <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[3] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>6. Identifica figuras.<span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[4] }}</span></h4><br>
                        (1 ponto = 4 acertos) <br><br>

                        Material: Manual de Figuras, pág.2. <br>
                        Ordem: Olhe estas figuras. Mostre... <br><br>

                        <i>
                            a. a banana <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[5] }}</span><br><br>

                            b. o pé <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[6] }}</span><br><br>

                            c. o carro <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[7] }}</span><br><br>

                            d. o sapato <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[8] }}</span><br><br>

                            e. o gato <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[9] }}</span><br><br>

                            f. a mão <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[10] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>7. Identifica partes do corpo em si próprio.<span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[11] }}</span></h4><br>
                        (1 ponto = 4 acertos) <br><br>

                        Ordem: Mostre o(a) seu(ua)... <br><br>

                        <i>
                            a. cabelo <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[12] }}</span><br><br>

                            b. olho <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[13] }}</span><br><br>

                            c. nariz <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[14] }}</span><br><br>

                            d. pé <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[15] }}</span><br><br>

                            e. orelha <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[16] }}</span><br><br>

                            f. mão <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[17] }}</span><br><br>

                            g. boca <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[18] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>8. Compreende ações dentro de um contexto.<span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[19] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: um cachorrinho, um pratinho, uma colher e um copo. <br>
                        Ordem: Coloque o material sobre a mesa e fale para a criança: <br><br>

                        <i>
                            a. O cachorro está com fome. Dê comida pra ele comer. <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[20] }}</span><br><br>

                            b. O cachorro está com sede. Dê água pra ele beber. <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[21] }}</span><br><br>

                            c. O cachorro está com sono. Bote ele pra dormir. <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[22] }}</span><br><br>

                        </i>

                        <br><br><br><br>
                        <br><br><br><br>

                        <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                        <br><br>


                        <h4>5. Nomeia objetos. <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[23] }}</span></h4>
                        (1 ponto = 2 acertos)<br><br>

                        Material: carrinho, cachorro, bola, bonequinha. <br>
                        Aponte para cada objeto e pergunte para a criança: O que é isso? <br><br>

                        <i>
                            a. bola <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[24] }}</span><br><br>

                            b. carro <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[25] }}</span><br><br>

                            c. neném <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[26] }}</span><br><br>

                            d. cachorro <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[27] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>6. Produz sequência de palavras soltas: <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[28] }}</span></h4>
                        (1 ponto = fala sobre um objeto, pessoa ou acontecimento através da sequência de duas ou mais palavras em uma mesma emissão vocal)<br><br>
                        Observação da linguagem espontânea em atividades lúdicas.<br>
                        <i>Crie situações através de brincadeiras para estimular a criança a falar</i>: <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[29] }}</span> <br><br>


                        <br><br><br><br>

                        <h4>7. Compreende relação de posse.<span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[30] }}</span></h4>
                        (1 ponto = se emprega espontaneamente: meu, minha ou diz o próprio nome)<br><br>
                        <i>Ex.: aponte para o seu sapato e diga para a criança:.</i><br>
                        <i>Este é o meu sapato. Em seguida aponte para o sapato da criança e pergunte: Este sapato é meu?</i> <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[31] }}</span><br><br>

                        <br><br><br><br>

                        <h4>8. Adquiriu vocabulário de pelo menos 10 palavras diferentes.<span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[32] }}</span></h4>
                        (1 ponto = disse 10 palavras de forma espontânea no período da avaliação)<br><br>
                        <i>Escreva aqui as palavras que a criança disser durante a avaliação:</i>: <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_1e6_1e11_meses[33] }}</span> <br><br>


                        <br><br><br><br>

                    @elseif($avaliacao->seletor_questionario == "bloco_2_2e5_meses")

                        <h3 style="margin-left: 12%;">2 anos até 2 anos e 5 meses</h3><br>
                        <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                        <br><br>

                        <h4>9. Compreende conceitos espaciais.<span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[0] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: uma bolsa e três bolas. <br>
                        <i>Coloque a bolsa com duas bolas dentro e uma do lado e diga:</i> <br><br>

                        <i>
                            a. Tire as bolas de dentro da bolsa <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[1] }}</span><br><br>

                            b. Bote a bola em cima da mesa <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[2] }}</span><br><br>

                            c. Bote as bolas dentro da bolsa <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[3] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>10. Compreende alguns pronomes.<span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[4] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: uma cachorrinho e três bolas. <br>
                        Diga: <i>Vamos brincar com as bolas e o cachorrinho? <br>
                                Eu dou todas as bolas para você!</i> <br><br>

                        <i>
                            a. Mostre a sua bola <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[5] }}</span><br><br>

                            b. Agora, você dá uma bola para mim <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[6] }}</span><br><br>

                            <b>Pegue uma bola e pergunte à criança:</b><br>

                            c. Onde está a minha bola? <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[7] }}</span><br><br>

                            d. Agora dê uma bola para ele (cachorrinho) <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[8] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>11. Compreende conceitos de quantidade.<span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[9] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: Uma bolsa e três bolas. <br>
                        <i>Coloque a bolsa com as bolas em frente a criança e diga:</i><br><br>

                        <i>
                            a. Me dê só uma bola. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[10] }}</span><br><br>

                            b. Agora bote o resto das bolas na mesa. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[11] }}</span><br><br>

                            c. Agora dê todas as bolas para mim. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[12] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>12.Reconhece a ação nas figuras.<span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[13] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: Manual de figuras pág. 3.<br>
                        <i><b>“Mostre quem está...</b></i><br><br>

                        <i>
                            a. chutando <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[14] }}</span><br><br>

                            b. bebendo. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[15] }}</span><br><br>

                            c. comendo. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[16] }}</span><br><br>

                        </i>

                        <br><br><br><br>


                        <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                        <br><br>

                        <h4>9. Usa entonação adequada para fazer pergunta. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[17] }}</span></h4>
                        (1 ponto = faz uma pergunta usando a entonação correta; Ex.: eleva a voz quando faz uma pergunta).<br><br>
                        Observação da linguagem espontânea em atividades lúdicas.<br>
                        <i>Crie situações através de brincadeiras para estimular a criança a falar</i>: <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[18] }}</span> <br><br>


                        <br><br><br><br>

                        <h4>10. Combina duas ou mais palavras na fala espontânea. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[19] }}</span></h4>
                        (1 ponto = se a criança produz duas ou mais palavras em uma emissão vocal e, com significado <br> semântico; Ex.: posse: “papato neném” = o sapato da boneca).<br><br>
                        Observação da linguagem espontânea em atividades lúdicas. A examinadora poderá <br> criar situações através de brincadeiras para estimular a criança a falar..<br>
                        <i>Escreva os exemplos:</i>: <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[20] }}</span> <br><br>


                        <br><br><br><br>

                        <h4>11.Nomeia figuras.<span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[21] }}</span></h4><br>
                        (1 ponto = 4 acertos) <br><br>

                        Material: Manual de figuras, pág. 51.<br>
                        <i>Aponte para cada figura e pergunte: <b>O que é isto?</b></i><br><br>

                        <i>
                            a. tênis ou sapato <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[22] }}</span><br><br>

                            b. carro. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[23] }}</span><br><br>

                            c. mão. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[24] }}</span><br><br>

                            d. banana. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[25] }}</span><br><br>

                            e. pé. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[26] }}</span><br><br>

                            f. gato. <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[27] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>12.Reconhece e nomeia ação em figuras.<span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[28] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: Manual de figuras, pág. 52.<br>
                        <i>Aponte para cada figura e pergunte:</i><br><br>


                            <i>a. O que este menino está fazendo?</i> <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[29] }}</span> (chutando ou jogando)<br><br>

                            <i>b. O que esta menina está fazendo?</i> <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[30] }}</span> (bebendo)<br><br>

                            <i>c. E esta menina?</i> <span class="quest_p">{{ $avaliacao->respostas->quest_2_2e5_meses[31] }}</span> (dormindo)<br><br>

                        <br><br><br><br>



                    @elseif($avaliacao->seletor_questionario == "bloco_2e6_2e11_meses")

                    <h3 style="margin-left: 12%;">2 anos e 6 m. até 2 anos e 11 m</h3><br>
                    <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                    <br><br>

                    <h4>13. Compreende o uso dos objetos.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[0] }}</span></h4><br>
                    (1 ponto = 3 acertos) <br><br>

                    Material: Manual de figuras, pág. 4.<br>
                    <i>Aponte para cada figura e diga: <b>Mostre...</b></i><br><br>


                    <i>
                        a. O que você usa para beber? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[1] }}</span><br><br>

                        b. O que nós usamos para varrer o chão? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[2] }}</span><br><br>

                        c. Com o que você penteia o cabelo? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[3] }}</span><br><br>

                        d. O que nós usamos para cortar papel? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[4] }}</span><br><br>

                        e. O que você usa para comer? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[5] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>14. Compreende os conceitos dos adjetivos.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[6] }}</span></h4><br>
                    (1 ponto = 3 acertos) <br><br>

                    Material: Manual de figuras, págs. 5 a 8.<br>
                    <i>Mostre uma página de cada vez e diga: <b>Mostre...</b></i><br><br>


                    <i>
                        a. o bicho grande <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[7] }}</span><br><br>

                        b. a bola pequena <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[8] }}</span><br><br>

                        c. o que está quente <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[9] }}</span><br><br>

                        d. quem está molhado <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[10] }}</span><br><br>

                        e. quem está sujo <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[11] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>15. Compreende relações parte/todo.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[12] }}</span></h4><br>
                    (1 ponto = 3 acertos) <br><br>

                    Material: Manual de figuras, pág. 9.<br>
                    <i><b>Mostre...</b></i><br><br>


                    <i>
                        a. a porta do caminhão <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[13] }}</span><br><br>

                        b. a perna do menino <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[14] }}</span><br><br>

                        c. o rabo do cachorro <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[15] }}</span><br><br>

                        d. as rodas do carro <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[16] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>16. Identifica figuras.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[17] }}</span></h4><br>
                    (1 ponto = 4 acertos) <br><br>

                    Material: Manual de figuras, págs. 10 e 11.<br>
                    <i><b>Mostre...</b></i><br><br>


                    <i>
                        a. o barco <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[18] }}</span><br><br>

                        b. o caminhão <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[19] }}</span><br><br>

                        c. o avião <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[20] }}</span><br><br>

                        d. a mochila <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[21] }}</span><br><br>

                        e. a bolsa <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[22] }}</span><br><br>

                        f. a mala <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[23] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                    <br><br>

                    <h4>13.Responde a questões sobre si mesmo.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[24] }}</span></h4><br>
                    (1 ponto = se responde a duas perguntas corretamente) <br><br>

                    <i>Pergunte:</i><br><br>

                    <i>
                        a. Qual é o seu nome? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[25] }}</span><br><br>

                        b. Você é menino ou menina? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[26] }}</span><br><br>

                        c. Você tem irmãos? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[27] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>14.Vocabulário.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[28] }}</span></h4><br>
                    (1 ponto = 4 acertos) <br><br>

                    Material: Manual de figuras, págs. 53 a 55.<br>
                    <i>Aponte para cada figura e pergunte: <b>O que é isto?</b></i><br><br>


                    <i>
                        a. cavalo <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[29] }}</span><br><br>

                        b. cachorro <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[30] }}</span><br><br>

                        c. avião <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[31] }}</span><br><br>

                        d. barco <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[32] }}</span><br><br>

                        e. calça <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[33] }}</span><br><br>

                        f. shorte <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[34] }}</span><br><br>

                        g. camisa ou blusa <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[35] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>15. Emprega palavras que indicam posse.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[36] }}</span></h4><br>
                    (1 ponto = 1 resposta correta) <br><br>

                    Material: Manual de figuras, pág. 56.<br>
                    <i>Aponte para cada figura e diga:</i><br><br>

                        <i>a. Esta bola é dele. De quem é esta bola? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[37] }}</span></i> (Dela, ou da menina) <br><br>

                        <i>b. Este sorvete é dela. De quem é este sorvete? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[38] }}</span></i> (Dele, ou da menina)<br><br>

                    <br><br><br><br>

                    <h4>Responde a questões que contenham: “o quê”, “onde” e questões <br>
                    que as respostas são sim/não.<span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[39] }}</span></h4><br>
                    (1 ponto = 2 corretos) <br><br>

                    Material: Manual de figuras, pág. 57.<br>
                    <i>Aponte para cada figura e pergunte:</i><br><br>

                        <i>a. O que ele está segurando? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[40] }}</span></i> (a bola) <br><br>

                        <i>b. Onde está o menino? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[41] }}</span></i> (no cavalo)<br><br>

                        <i>c. Este menino está acordado? <span class="quest_p">{{ $avaliacao->respostas->quest_2e6_2e11_meses[42] }}</span></i> (não)<br><br>

                    <br><br><br><br>

                    @elseif($avaliacao->seletor_questionario == "bloco_3_3e5_meses")

                    <h3 style="margin-left: 12%;">3 anos até 3 anos e 5 meses</h3><br>
                    <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                    <br><br>

                    <h4>17. Compreende conceitos de adjetivos.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[0] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de figuras, págs. 12 a 14.<br>
                    <i><b>Olhe estas figuras e mostre...</b></i><br><br>


                    <i>
                        a. o que é mais pesado <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[1] }}</span><br><br>

                        b. o que está vazio <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[2] }}</span><br><br>

                        c. os dois que são iguais <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[3] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>18. Compreende perguntas negativas.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[4] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de figuras, págs. 15 e 16.<br><br>


                    <i>
                        a. Qual o lápis que não está dentro da caixa? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[5] }}</span><br><br>

                        b. Que passarinho não está voando? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[6] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>19. Categoriza.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[7] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de figuras, pág. 17.<br>
                    <i><b>Olhe estas figuras e mostre...</b></i><br><br>

                    <i>
                        a. todos os bichinhos <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[8] }}</span><br><br>

                        b. todos os brinquedos <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[9] }}</span><br><br>

                        c. todas as coisas que comemos <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[10] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>20.Mostra partes do corpo.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[11] }}</span></h4><br>
                    (1 ponto = 6 acertos) <br><br>

                    <i><b>Mostre...</b></i><br><br>

                    <i>
                        a. a cabeça <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[12] }}</span><br><br>

                        b. o braço <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[13] }}</span><br><br>

                        c. o joelho <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[14] }}</span><br><br>

                        d. o dedo <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[15] }}</span><br><br>

                        e. o pescoço <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[16] }}</span><br><br>

                        f. o queixo <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[17] }}</span><br><br>

                        g. a bochecha <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[18] }}</span><br><br>

                    </i>

                    <br><br><br><br>



                    <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                    <br><br>

                    <h4>17. Compreende e responde questões sobre si.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[19] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    <i>
                        a. Qual é o seu nome? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[20] }}</span><br><br>

                        b. Quantos anos você tem? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[21] }}</span><br><br>

                        c. Você tem irmãos? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[22] }}</span><br><br>

                        d. Como se chama(m)? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[23] }}</span><br><br>

                        e. Quais os brinquedos que vocês gostam de brincar? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[24] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>18.Fala sobre o uso de um objeto.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[25] }}</span></h4><br>
                    (1 ponto = 2 acertos, gestos não são considerados) <br><br>

                    <i><b>O que você faz com...</b></i><br><br>

                    <i>
                        a. uma colher <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[26] }}</span><br><br>

                        b. um sabão <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[27] }}</span><br><br>

                        c. uma calça <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[28] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>19. Descreve ações diante de uma figura.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[29] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Figuras, págs. 58 e 59.<br><br>

                    <i>
                        a. Aqui este homem está andando, aqui ele está tocando a campainha. <br>
                        E aqui o que ele está fazendo? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[30] }}</span><br><br>

                        b. Este menino está comendo um sanduíche. E este o que está fazendo? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[31] }}</span><br><br>

                        c. Este menino está andando de bicicleta. E este o que está fazendo? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[32] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>20. Compreende e responde a questões com o pronome interrogativo<br>
                        “que”.<span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[33] }}</span></h4><br>
                    (1 ponto = 4 acertos, gestos não são considerados) <br><br>

                    <i>
                        a . O que voa? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[34] }}</span><br><br>

                        b. O que nada? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[35] }}</span><br><br>

                        c. O que dorme? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[36] }}</span><br><br>

                        d . O que morde? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[37] }}</span><br><br>

                        e. O que chora? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[38] }}</span><br><br>

                        f. O que queima? <span class="quest_p">{{ $avaliacao->respostas->quest_3_3e5_meses[39] }}</span><br><br>
                    </i>

                    <br><br><br><br>


                    @elseif($avaliacao->seletor_questionario == "bloco_3e6_3e11_meses")

                    <h3 style="margin-left: 12%;">3 anos e 6 m. até 3 anos e 11 m.</h3><br>
                    <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                    <br><br>

                    <h4>21. Compara objetos.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[0] }}</span></h4><br>
                    (1 ponto = 3 acertos) <br><br>

                    Material: Manual de figuras, pág. 18.<br>
                    <i><b>Qual é o mais pesado?</b></i><br><br>

                    <i>
                        a. o banco ou a mesa? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[1] }}</span><br><br>

                        b. a televisão ou a bola? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[2] }}</span><br><br>

                        c. o carro ou caminhão? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[3] }}</span><br><br>

                        d. o livro ou a flor? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[4] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>22.Faz deduções.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[5] }}</span></h4><br>
                    (1 ponto = 3 acertos) <br><br>

                    Material: Manual de Figuras, págs. 19 a 21.<br>
                    <i>Leia a estória e, em seguida, peça para a criança mostrar a figura que<br>
                        responde a pergunta:</i><br><br>

                    <i>
                        a. Se Tiago sair de casa ficará todo molhado. Como está o tempo lá <br>
                        fora? Mostre a figura. <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[6] }}</span><br><br>

                        b. A boneca de Vanessa está muito suja. O que você acha que Vanessa <br>
                        deve fazer com a boneca? Mostre a figura. <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[7] }}</span><br><br>

                        c. Lucas teve uma boa surpresa e ficou muito feliz. Mostre a figura. <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[8] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>23.Vocabulário receptivo.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[9] }}</span></h4><br>
                    (1 ponto = 4 acertos) <br><br>

                    Material: Manual de Figuras, págs. 22 a 24.<br>
                    <i><b>Mostre...</b></i><br><br>

                    <i>
                        a. a calça <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[10] }}</span><br><br>

                        b. o casaco <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[11] }}</span><br><br>

                        c. o círculo <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[12] }}</span><br><br>

                        d. o quadrado <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[13] }}</span><br><br>

                        d. o médico <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[14] }}</span><br><br>

                        d. o bombeiro <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[15] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>24. Compreende pronome pessoal.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[16] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs. 25 a 26.<br>
                    <i><b>Mostre a figura em que:</b></i><br><br>

                    <i>
                        a. Ela está chorando <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[17] }}</span><br><br>

                        b. Ele está tomando sorvete <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[18] }}</span><br><br>

                        c. Eles estão tomando sorvete <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[19] }}</span><br><br>
                    </i>

                    <br><br><br><br>



                    <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                    <br><br>

                    <h4>21. Habilidade para solucionar e responder a questões sobre situações <br>
                        problemas.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[20] }}</span></h4><br>
                    (ponto: 2 acertos, sendo que gestos não são considerados) <br><br>
                    <i><b>O que você faz quando...</b></i><br><br>

                    <i>
                        a. você está com sono? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[21] }}</span><br><br>

                        b. suas mãos estão sujas? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[22] }}</span><br><br>

                        c. você está com fome? <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[23] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>22. Habilidade para definir objetos.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[24] }}</span></h4><br>
                    (1 ponto = se fala sobre a utilização adequada de dois objetos) <br><br>
                    <i><b>Para que serve...</b></i><br><br>

                    <i>
                        a. uma bola <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[25] }}</span><br><br>

                        b. um carro <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[26] }}</span><br><br>

                        d. uma faca <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[27] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>23. Vocabulário expressivo.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[28] }}</span></h4><br>
                    (1 ponto = 4 acertos) <br><br>

                    Material: Manual de Figuras, págs. 60 a 62.<br>
                    <i><b>Diga o nome das figuras que eu apontar...</b></i><br><br>

                    <i>
                        a. círculo <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[29] }}</span><br><br>

                        b. estrela <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[30] }}</span><br><br>

                        c. computador <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[31] }}</span><br><br>

                        d. jornal <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[32] }}</span><br><br>

                        e. celular <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[33] }}</span><br><br>

                        f. lago <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[34] }}</span><br><br>

                        g. árvore <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[35] }}</span><br><br>

                        h. flor <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[36] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>24. Adquiriu plural regular.<span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[24] }}</span></h4><br>
                    (1 ponto = se a criança acrescenta o “s” no final de duas palavras) <br><br>
                    Material: Manual de Figuras, pág. 63.<br><br>

                        <i>a. Aqui tem um carro e aqui tem dois <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[25] }}</span></i>(carros)<br><br>

                        <i>b. Aqui tem uma meia e aqui tem duas <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[26] }}</span></i>(meias)<br><br>

                        <i>c. Aqui tem uma bola e aqui tem três <span class="quest_p">{{ $avaliacao->respostas->quest_3e6_3e11_meses[27] }}</span></i>(bolas)<br><br>


                    <br><br><br><br>


                    @elseif($avaliacao->seletor_questionario == "bloco_4_4e5_meses")

                    <h3 style="margin-left: 12%;">4 anos até 4 anos e 5 meses</h3><br>
                        <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                        <br><br>

                        <h4>25. Compreende conceitos espaciais (conjunções, advérbios).<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[0] }}</span></h4><br>
                        (1 ponto = 3 acertos) <br><br>

                        Material: Manual de Figuras, pág. 27.<br>
                        <i><b>Mostre o cachorro que está...</b></i><br><br>

                        <i>
                            a. em cima da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[1] }}</span><br><br>

                            b. embaixo da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[2] }}</span><br><br>

                            c. atrás da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[3] }}</span><br><br>

                            d. do lado da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[4] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>26. Compreende conceitos de tempo.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[5] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: Manual de Figuras, pág. 28.<br><br>

                        <i>
                            a. Quais as figuras que mostram a noite? <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[6] }}</span><br><br>

                            b. Quais as figuras que mostram o dia? <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[7] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>27. Compreende ordens complexas.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[8] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: Manual de Figuras, pág. 29.<br><br>

                        <i>
                            a. Mostre o cachorro branco que está dormindo <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[9] }}</span><br><br>

                            b. Mostre o cachorro branco com orelhas pretas <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[10] }}</span><br><br>

                            c. Mostre o cachorro malhado com orelha marrom <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[11] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>28. Identifica cores.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[12] }}</span></h4><br>
                        (1 ponto = 4 acertos) <br><br>

                        Material: Manual de Figuras, pág. 30.<br>
                        <i><b>Olhe estas bolas. Mostre a bola...</b></i><br><br>

                        <i>
                            a. vermelha <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[13] }}</span><br><br>

                            b. laranja <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[14] }}</span><br><br>

                            c. amarela <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[15] }}</span><br><br>

                            d. preta <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[16] }}</span><br><br>

                            e. verde <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[17] }}</span><br><br>

                            f. azul <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[18] }}</span><br><br>
                        </i>

                        <br><br><br><br>

                        <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                        <br><br>

                        <h4>25. Usa palavras que expressam relação espacial.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[19] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        Material: Figuras da pág. 64.<br>
                        Ordem: <i>Aponte para cada figura e diga: <br><b>Agora você me diz onde está este cachorro...</b></i><br><br>

                        <i>
                            a. em cima da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[20] }}</span><br><br>

                            b. atrás da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[21] }}</span><br><br>

                            c. embaixo da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[22] }}</span><br><br>

                            d. do lado da cadeira <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[23] }}</span><br><br>
                        </i>

                        <br><br><br><br>

                        <h4>26. Memória para sentença.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[24] }}</span></h4><br>
                        (1 ponto = 2 acertos; alterações articulatórias não são consideradas) <br><br>

                        Material: Figuras da pág. 64.<br>
                        <i><b>Repita o que eu disser...</b></i><br><br>
                        <i>
                            a. Lucas treinou bem e ganhou o jogo. <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[25] }}</span><br><br>

                            b. Ana caiu e derrubou o seu refrigerante. <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[26] }}</span><br><br>

                            c. Igor ouviu a música e dançou. <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[27] }}</span><br><br>
                        </i>

                        <br><br><br><br>

                        <h4>27. Categorização de nomes.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[28] }}</span></h4><br>
                        (1 ponto = 2 acertos) <br><br>

                        <i><b>Cachorro, gato, cavalo, porco, cobra – são todos bichinhos.<br>
                        Você sabe o que são:</b></i><br><br>

                        <i>
                            a. trenzinho, boneca, bola, carrinho <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[29] }}</span><br><br>

                            b. shorte, saia, vestido, camisa, calça <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[30] }}</span><br><br>

                            c. hamburguer, batata-frita, pizza, macarrão, feijão, pastel <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[31] }}</span><br><br>

                        </i>

                        <br><br><br><br>

                        <h4>28. Emprega adjetivos para descrever pessoas e objetos.<span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[32] }}</span></h4><br>
                        (1 ponto = se a criança emprega dois adjetivos) <br><br>

                        Material: Manual de Figuras, pág. 65.<br><br>

                        <i>
                            a. Olhe bem estas meninas, esta menina está feliz com seu vestido novo <br>
                            e bonito. E esta, como está? <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[33] }}</span><br><br>

                            b. Esse menino está alegre porque sua bicicleta é bonita e rápida. Esse <br>
                            menino, como ele está? <span class="quest_p">{{ $avaliacao->respostas->quest_4_4e5_meses[34] }}</span><br><br>
                        </i>

                        <br><br><br><br>

                    </div>

                    @elseif($avaliacao->seletor_questionario == "bloco_4e6_4e11_meses")

                    <h3 style="margin-left: 12%;">4 anos e 6 m. até 4 anos e 11 m.</h3><br>
                    <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                    <br><br>

                    <h4>29. Compreende conceitos de adjetivos.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[0] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs. 31 a 33.<br><br>

                    <i>
                        a. Você está vendo estas cobras? Aponte a mais comprida. <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[1] }}</span><br><br>

                        b. Olhe para estes cabelos. Qual deles é o mais curto? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[2] }}</span><br><br>

                        c. Você está vendo estas crianças? Aponte a mais alta. <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[3] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>30. Compreende os sufixos nominais.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[4] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs. 34 a 36.<br><br>

                    <i>
                        a. Mostre o jogador de futebol <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[5] }}</span><br><br>

                        a. Mostre o pintor <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[6] }}</span><br><br>

                        c. Mostre a cantora <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[7] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>31. Compreende nome + 2 adjetivos.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[8] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, pág. 37.<br><br>

                    <i>
                        a. Mostre o gato branco e peludo <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[9] }}</span><br><br>

                        b. Mostre o gato preto e pequeno <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[10] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>32. Compreende conceitos de quantidade.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[11] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs. 38 e 39.<br>
                    <i><b>Olhe estas figuras com atenção. Agora mostre...</b></i><br><br>

                    <i>
                        a. Conte os pirulitos em cada copo. Qual desses copos tem três pirulitos? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[12] }}</span><br><br>

                        b. Conte as bolas de cada conjunto. Qual conjunto tem cinco bolas? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[13] }}</span><br><br>
                    </i>

                    <br><br><br><br>


                    <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                    <br><br>

                    <h4>29. Nomeia cores.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[14] }}</span></h4><br>
                    (1 ponto = 4 acertos) <br><br>

                    Material: Manual de Figuras, pág. 66.<br>
                    <i><b>Olhe estas bolas; eu vou apontar e você diz a cor.</b></i><br><br>

                    <i>
                        a. vermelho <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[15] }}</span><br><br>

                        b. laranja <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[16] }}</span><br><br>

                        c. amarelo <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[17] }}</span><br><br>

                        d. preta <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[18] }}</span><br><br>

                        e. verde <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[19] }}</span><br><br>

                        f. azul <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[20] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>30. Construção de sentenças.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[21] }}</span></h4><br>
                    (1 ponto = se a criança faz frases sobre duas figuras) <br><br>

                    Material: Manual de Figuras, págs. 67 a 69.<br><br>

                    <i>
                        a. Olhe estes meninos e diga o que eles estão fazendo <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[22] }}</span><br><br>

                        b. E aqui? O que o menino, o cavalo e o cachorro estão fazendo? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[23] }}</span><br><br>

                        c. O nome dessa menina é Beatriz. O que ela está fazendo? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[24] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>31. Responde a questões que utilizam o pronome interrogativo “quando”.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[25] }}</span></h4><br>
                    (1 ponto = 1 correta, sendo que ela deve dizer pelo menos duas etapas <br>
                    consecutivas do procedimento) <br><br>

                    <i>
                        a. O que você faz quando vai escovar os dentes? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[26] }}</span><br><br>

                        b. O que você faz quando vai tomar banho? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[27] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>32. Responde a questões sobre a sua rotina diária.<span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[28] }}</span></h4><br>
                    (1 ponto = 2 acertos, se a criança explica o motivo, exemplo(32.a):<br>
                    para não ficar com bichinhos)<br><br>

                    <i>
                        a. Por que você escova os dentes? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[29] }}</span><br><br>

                        b. Por que você toma banho? <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[30] }}</span><br><br>

                        c. Por que você usa sapatos <span class="quest_p">{{ $avaliacao->respostas->quest_4e6_4e11_meses[31] }}</span><br><br>
                    </i>

                    <br><br><br><br>


                    @elseif($avaliacao->seletor_questionario == "bloco_5_5e11_meses")

                    <h3 style="margin-left: 12%;">5 anos até 5 anos e 11 meses</h3><br>
                    <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                    <br><br>

                    <h4>33. Compreende sentenças na voz passiva.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[0] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs 40 e 41.<br>
                    <i><b>Olhe estas figuras com atenção. Agora mostre...</b></i><br><br>

                    <i>
                        a. A menina foi beijada pelo menino <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[1] }}</span><br><br>

                        b. O menino foi empurrado pela menina <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[2] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>34. Compreende conceitos de quantidade.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[3] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, pág 42.<br>
                    <i><b>Joana cortou uma laranja ao meio...</b></i><br><br>

                    <i>
                        a. Mostre a metade da laranja <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[4] }}</span><br><br>

                        b. Mostre a laranja inteira <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[5] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>35. Identifica diferenças..<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[6] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, pág. 43.<br>
                    <i><b>Qual deles tem:</b></i><br><br>

                    <i>
                        a. as orelhas grandes <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[7] }}</span><br><br>

                        b. um rabo fino e comprido <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[8] }}</span><br><br>

                        c. um rabo grosso <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[9] }}</span><br><br>

                        d. bico pequeno <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[10] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>36. Compreende conceitos de sequência de tempo.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[11] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, pág. 44.<br>
                    <i><b>Preste atenção nestas figuras. Este menino está se arrumando para sair.</b></i><br><br>

                    <i>
                        a. O que ele botou por último? <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[12] }}</span><br><br>

                        b. O que ele botou primeiro?<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[13] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                    <br><br>


                    <h4>33. Adquiriu palavras que expressam quantidade.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[14] }}</span></h4><br>
                    (1 ponto = 1 acertos) <br><br>

                    Material: Manual de Figuras, pág. 70.<br>
                    <i><b>Qual deles tem:</b></i><br><br>

                        <i>a. O copo dessa menina tem muito suco e o desta menina tem <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[15] }}</span></i>(Pouco)<br><br>

                        <i>b. O prato deste menino tem pouca pipoca e o prato deste menino tem <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[16] }}</span></i>(Mais, muita)<br><br>

                    <br><br><br><br>

                    <h4>34. Habilidade para buscar palavras dentro de uma categoria.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[17] }}</span></h4><br>
                    (1 ponto = nomeia pelo menos seis animais ou comidas em um minuto) <br><br>

                    <i>Marque um minuto e escreva os nomes que a criança disser neste período.</i><br><br>

                    <i>
                        a. Diga o nome de todas as comidas que você se lembrar, até eu pedir<br>
                        para você parar: <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[18] }}</span><br><br>

                        b. Diga o nome de todos os bichos que você se lembrar, até eu pedir<br>
                        para parar: <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[19] }}</span><br><br>
                    </i>

                    <br><br><br><br>


                    <h4>35. Habilidade para solucionar e responder a questões sobre situações<br>
                        problemas.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[20] }}</span></h4><br>
                    (1 ponto = 1 acerto, se a criança responde com lógica) <br><br>

                    <i>
                        a. O que você faz quando perde o seu brinquedo? <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[21] }}</span><br><br>

                        b. O que você faz antes de atravessar a rua? <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[22] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>36. Conta uma estória diante de gravuras em quadrinhos.<span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[23] }}</span></h4><br>
                    (1 ponto = se a criança conta uma estória com lógica ou descreve<br>
                    as figuras seguindo a sua sequência) <br><br>

                    Material: Manual de Figuras, Págs. 71 e 72.<br>
                    <i>Diga:<b>Esta é uma estória sobre um menino, que quer ir ao jogo de futebol<br>
                        com o pai. Olhe os quadrinhos e conte uma estorinha para mim.</b></i><br><br>

                    <i>
                        a. (a examinadora anota o que a criança falar) <span class="quest_p">{{ $avaliacao->respostas->quest_5_5e11_meses[24] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    @elseif($avaliacao->seletor_questionario == "bloco_6_6e11_meses")

                    <h3 style="margin-left: 12%;">6 anos até 6 anos e 11 meses</h3><br>
                    <h3 style="margin-left: 12%;">Linguagem Receptiva</h3><br>

                    <br><br>

                    <h4>37. Faz cálculo de soma e subtração até 5.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[0] }}</span></h4><br>
                    (1 ponto = 2 acertos; mostra com os dedos o número ou diz a resposta) <br><br>

                    <i>
                        a. Se você tem três balas e comeu uma, com quantas você ficou? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[1] }}</span><br><br>

                        b. Se você tem dois lápis e eu lhe dou mais dois, com quantos lápis você<br>
                        vai ficar? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[2] }}</span><br><br>

                        c. Se você tem três balas e eu lhe dou mais duas, com quantas você vai<br>
                        ficar? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[3] }}</span><br><br>

                    </i>

                    <br><br><br><br>

                    <h4>38. Compreende conceito de velocidade.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[4] }}</span></h4><br>
                    (1 ponto = 1 acerto) <br><br>

                    Material: Manual de Figuras, pág. 45.<br>
                    <i><b>Estas figuras mostram animais e transportes que se movem com<br>
                        velocidades diferentes.</b></i><br><br>

                    <i>
                        a. Mostre o transporte que é mais rápido <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[5] }}</span><br><br>

                        b. Mostre o bicho que é mais lento <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[6] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>39. Relação espacial.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[7] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs. 46 a 48.<br>
                    <i><b>Olhe as figuras destes meninos empinando pipas.</b></i><br><br>

                    <i>
                        a. Mostre a pipa que está mais longe do menino <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[8] }}</span><br><br>

                            <b>Olhe as figuras destes bichinhos.</b><br>

                        b. Mostre o bichinho que está entre o gato e o cachorro <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[9] }}</span><br><br>

                        c. Mostre o macaco que está mais perto do leão <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[10] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>40. Relação temporal.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[11] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, págs. 49 a 50.<br><br>

                    <i>
                        a. Depois de apontar para o gato amarelo, aponte para o gato branco <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[12] }}</span><br><br>

                        b. Antes de apontar o elefante, aponte para o macaco e o jacaré <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[13] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h3 style="margin-left: 12%;">Linguagem Expressiva</h3><br>

                    <br><br>

                    <h4>37. Habilidade para definir palavras.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[14] }}</span></h4><br>
                    (1 ponto=2 acertos. A criança tem que descrever pelo menos uma<br>
                    característica do objeto) <br><br>

                    <i><b>Diga duas coisas que você sabe sobre...</b></i><br><br>

                    <i>
                        a. a banana <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[15] }}</span><br><br>

                        b. o celular <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[16] }}</span><br><br>

                        b. o ônibus <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[17] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>38. Completa analogias.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[18] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    <i><b>Eu vou falar uma frase e queria que você terminasse para mim:</b></i><br><br>

                    <i>
                        a. O gato é pequeno, o leão é <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[19] }}</span><br><br>

                        b. O sorvete é gelado, o café é <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[20] }}</span><br><br>

                        c. A planta é verde, o céu é <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[21] }}</span><br><br>
                    </i>

                    <br><br><br><br>


                    <h4>39.Faz derivação de palavra (acrescenta sufixos).<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[22] }}</span></h4><br>
                    (1 ponto = 2 acertos) <br><br>

                    Material: Manual de Figuras, pág. 73.<br>
                    <i><b>Esse homem está trabalhando, ele é um trabalhador.</b></i><br><br>

                    <i>
                        a. Essa mulher canta, ela é uma <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[23] }}</span><br><br>

                        b. Esse homem joga, ele é um <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[24] }}</span><br><br>

                        c. Esse homem pinta, ele é um <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[25] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    <h4>40.Memória.<span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[26] }}</span></h4><br>
                    (1 ponto = se a criança repetir duas frases corretamente) <br><br>

                    Material: Manual de Figuras, págs. 74 e 75.<br>
                    <i><b>Vou contar uma estória. Preste muita atenção:</b></i><br><br>

                    <i>
                        1. Breno cai muito quando joga futebol. Mas sempre levanta e continua jogando.<br>
                        Quando sua mãe pergunta: Breno você machucou o joelho? Ele começa a chorar.<br>

                        a. O que acontece quando Breno joga futebol? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[27] }}</span><br><br>

                        b. O que Breno faz quando sua mãe pergunta se machucou o joelho? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[28] }}</span><br><br>

                        2. Surpresa! Hoje a sobremesa é sorvete, mas tem que comer tudo!<br>
                        Paulinho diz: Ôba! já acabei de comer!<br>
                        Mas sua irmã Ana, está com o prato cheio. Ana diz:<b> Eu também vou comer tudo!</b><br>

                        a. O que Paulinho falou? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[29] }}</span><br><br>

                        b. O que Ana falou? <span class="quest_p">{{ $avaliacao->respostas->quest_6_6e11_meses[30] }}</span><br><br>
                    </i>

                    <br><br><br><br>

                    @endif

                </div>


                <br>
                <br>
                <br>






            </div>
        </div>
    </div>

@endsection
<link href="{{ asset('css/ava_fono.css') }}" rel="stylesheet">
