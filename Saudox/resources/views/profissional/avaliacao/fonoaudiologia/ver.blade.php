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
                <h3>Calculo dos escores</h3><br>
                <hr class="hr_form">


                <table class="table table-dark" style="width: 85%; margin: auto;">
                    <tbody>


                        <tr>
                            <td style="width: 25%;padding-top: 2.75rem;font-size: 25px; border-right: 2px solid; " rowspan="4">Linguagem Receptiva</td>
                        </tr>

                        <tr>
                            <td>Ultima tarefa correta</td>
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
                            <td>Ultimá tarefa correta</td>
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

                        <h4>3.Comunica-se de forma não verbal, usando gestos, chamando atenção <br>
                            para si ou apontando para um objeto ou pessoa. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[18] }}</span></h4>
                        (1 ponto = se apresenta alguns dos comportamentos descritos. Ex.: entrega brinquedo, puxa pela mão, aponta etc.)<br><br>

                        <i>Descreva o que a criança faz: </i> <br>
                        <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[19] }}</span> <br><br>

                        <br><br><br><br>


                        <h4>4.Imita uma palavra. <span class="quest_p">{{ $avaliacao->respostas->quest_12_17[20] }}</span></h4>
                        (1 ponto = repete 1 palavra)<br><br>

                        Material: bola, carro, miniatura de boneco ou palavras do contexto da criança como “mamãe” e “papai”. <br><br>

                        <i>

                            A examinadora aponta para o objeto e em seguida nomeia para a <br>
                            criança, estimulando-a a repetir:<br>
                        </i>
                        Ex.: Olhe a bola....bola <br>

                    @else
                        Questionário ainda não implementado...
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
