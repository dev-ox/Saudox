@extends('layouts.mainlayout')
@section('content')


    <div class="container bordas_amarelas bg-padrao">
        <br>
        <br>
        <h1> Avaliação de Judô</h1>

        <div class="row">
            <div class="col-md-6 m-auto">
                <br>

                <br>
                <br>

                <table class="table table-bordered bordas_amarelas" style="text-align: center;">
                    <thead>
                    </thead>
                    <tbody>
                        <tr><td class="corsim-adm">Relação com os outros no Judô</td><td class="corsim">{{$avaliacao->relacao_com_as_pessoas_judo}}</td></tr>
                        <tr><td class="corsim-adm">Resposta emocional</td><td class="corsim">{{$avaliacao->resposta_emocional}}</td></tr>
                        <tr><td class="corsim-adm">Uso do corpo</td><td class="corsim">{{$avaliacao->uso_do_corpo}}</td></tr>
                        <tr><td class="corsim-adm">Uso de objetos</td><td class="corsim">{{$avaliacao->uso_de_objetos}}</td></tr>
                        <tr><td class="corsim-adm">Adaptação a mudanças</td><td class="corsim">{{$avaliacao->adaptacao_a_mudancas}}</td></tr>
                        <tr><td class="corsim-adm">Resposta auditiva</td><td class="corsim">{{$avaliacao->resposta_auditiva}}</td></tr>
                        <tr><td class="corsim-adm">Resposta visual</td><td class="corsim">{{$avaliacao->resposta_visual}}</td></tr>
                        <tr><td class="corsim-adm">Medo ou Nervosismo</td><td class="corsim">{{$avaliacao->medo_ou_nervosismo}}</td></tr>
                        <tr><td class="corsim-adm">Comunicação Verbal</td><td class="corsim">{{$avaliacao->comunicacao_verbal}}</td></tr>
                        <tr><td class="corsim-adm">Comunicação não Verbal</td><td class="corsim">{{$avaliacao->comunicacao_nao_verbal}}</td></tr>
                        <tr><td class="corsim-adm">Orientação por som</td><td class="corsim">{{$avaliacao->orienta_se_por_som}}</td></tr>
                        <tr><td class="corsim-adm">Reação ao som</td><td class="corsim">{{$avaliacao->reacao_ao_nao}}</td></tr>
                        <tr><td class="corsim-adm">Compreensão de comandos simples <br> com palavras que descrevem objetos</td><td class="corsim">{{$avaliacao->compreendem_comandos_simples_palavras_que_descrevam_objetos}}</td></tr>
                        <tr><td class="corsim-adm">Manipulação de brinquedos e/ou objetos</td><td class="corsim">{{$avaliacao->manipula_brinquedos_objetos}}</td></tr>
                        <tr><td class="corsim-adm">Equilibio</td><td class="corsim">{{$avaliacao->equilibrio}}</td></tr>
                        <tr><td class="corsim-adm">Força</td><td class="corsim">{{$avaliacao->forca}}</td></tr>
                        <tr><td class="corsim-adm">Resistencia</td><td class="corsim">{{$avaliacao->resistencia}}</td></tr>
                        <tr><td class="corsim-adm">Marcha</td><td class="corsim">{{$avaliacao->marcha}}</td></tr>
                        <tr><td class="corsim-adm">Agilidade</td><td class="corsim">{{$avaliacao->agilidade}}</td></tr>
                        <tr><td class="corsim-adm">Coordenação motora fina</td><td class="corsim">{{$avaliacao->coordenacao_motora_fina}}</td></tr>
                        <tr><td class="corsim-adm">Coordenação motora grossa</td><td class="corsim">{{$avaliacao->coordenacao_motora_grossa}}</td></tr>
                        <tr><td class="corsim-adm">Propriocepção</td><td class="corsim">{{$avaliacao->propriocepcao}}</td></tr>
                        <tr><td class="corsim-adm">Compreensão de direções</td><td class="corsim">{{$avaliacao->compreende_direcoes}}</td></tr>
                        <tr><td class="corsim-adm">Compreensão de comandos de professores</td><td class="corsim">{{$avaliacao->compreende_comandos_professoras}}</td></tr>
                        <tr><td class="corsim-adm">Concentração</td><td class="corsim">{{$avaliacao->concentracao}}</td></tr>
                        <tr><td class="corsim-adm">Comportamento reflexivo</td><td class="corsim">{{$avaliacao->comportamento_reflexo}}</td></tr>
                    </tbody>
                </table>

                <br>
                <br>
                <br>

                <h3 class="marker-label">Observações</h3>
                <p> {{ $avaliacao->observacoes }}</p>

                <br>

                <h3 class="marker-label">Terapias</h3>
                <p> {{ $avaliacao->terapias}}</p>

                <br>

                <h3 class="marker-label">Objetivos</h3>
                <p> {{ $avaliacao->objetivos}}</p>

                <br>

                <h3 class="marker-label">Tipo da aula</h3>
                <p> {{ $avaliacao->tipo_da_aula}}</p>

                <br>

                <h3 class="marker-label">Diagnostico</h3>
                <p> {{ $avaliacao->diagnostico}}</p>
                <br>
                <br>
            </div>
        </div>
    </div>

@endsection
