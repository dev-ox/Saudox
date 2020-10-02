@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md-6 m-auto">
                <br>
                <h1> Avaliação de Judô de {{$paciente->nome_paciente}} </h1>
                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.avaliacao.judo.editar', $paciente->id) }}">Editar</a> </h3>
                @endif
                <br>
                <br>

                <table class="table table-bordered bg-padrao" style="text-align: center;">
                    <thead>
                    </thead>
                    <tbody>
                        <tr><td>Relação com os outros no Judô</td><td>{{$avaliacao->relacao_com_as_pessoas_judo}}</td></tr>
                        <tr><td>Resposta emocional</td><td>{{$avaliacao->resposta_emocional}}</td></tr>
                        <tr><td>Uso do corpo</td><td>{{$avaliacao->uso_do_corpo}}</td></tr>
                        <tr><td>Uso de objetos</td><td>{{$avaliacao->uso_de_objetos}}</td></tr>
                        <tr><td>Adaptação a mudanças</td><td>{{$avaliacao->adaptacao_a_mudancas}}</td></tr>
                        <tr><td>Resposta auditiva</td><td>{{$avaliacao->resposta_auditiva}}</td></tr>
                        <tr><td>Resposta visual</td><td>{{$avaliacao->resposta_visual}}</td></tr>
                        <tr><td>Medo ou Nervosismo</td><td>{{$avaliacao->medo_ou_nervosismo}}</td></tr>
                        <tr><td>Comunicação Verbal</td><td>{{$avaliacao->comunicacao_verbal}}</td></tr>
                        <tr><td>Comunicação não Verbal</td><td>{{$avaliacao->comunicacao_nao_verbal}}</td></tr>
                        <tr><td>Orientação por som</td><td>{{$avaliacao->orienta_se_por_som}}</td></tr>
                        <tr><td>Reação ao som</td><td>{{$avaliacao->reacao_ao_nao}}</td></tr>
                        <tr><td>Compreensão de comandos simples <br> com palavras que descrevem objetos</td><td>{{$avaliacao->compreendem_comandos_simples_palavras_que_descrevam_objetos}}</td></tr>
                        <tr><td>Manipulação de brinquedos e/ou objetos</td><td>{{$avaliacao->manipula_brinquedos_objetos}}</td></tr>
                        <tr><td>Equilibio</td><td>{{$avaliacao->equilibrio}}</td></tr>
                        <tr><td>Força</td><td>{{$avaliacao->forca}}</td></tr>
                        <tr><td>Resistencia</td><td>{{$avaliacao->resistencia}}</td></tr>
                        <tr><td>Marcha</td><td>{{$avaliacao->marcha}}</td></tr>
                        <tr><td>Agilidade</td><td>{{$avaliacao->agilidade}}</td></tr>
                        <tr><td>Coordenação motora fina</td><td>{{$avaliacao->coordenacao_motora_fina}}</td></tr>
                        <tr><td>Coordenação motora grossa</td><td>{{$avaliacao->coordenacao_motora_grossa}}</td></tr>
                        <tr><td>Propriocepção</td><td>{{$avaliacao->propriocepcao}}</td></tr>
                        <tr><td>Compreensão de direções</td><td>{{$avaliacao->compreende_direcoes}}</td></tr>
                        <tr><td>Compreensão de comandos de professores</td><td>{{$avaliacao->compreende_comandos_professoras}}</td></tr>
                        <tr><td>Concentração</td><td>{{$avaliacao->concentracao}}</td></tr>
                        <tr><td>Comportamento reflexivo</td><td>{{$avaliacao->comportamento_reflexo}}</td></tr>
                    </tbody>
                </table>

                <br>
                <br>
                <br>

                <h3>Observações</h3>
                <p> {{ $avaliacao->observacoes }}</p>

                <br>

                <h3>Terapias</h3>
                <p> {{ $avaliacao->terapias}}</p>

                <br>

                <h3>Objetivos</h3>
                <p> {{ $avaliacao->objetivos}}</p>

                <br>

                <h3>Tipo da aula</h3>
                <p> {{ $avaliacao->tipo_da_aula}}</p>

                <br>

                <h3>Diagnostico</h3>
                <p> {{ $avaliacao->diagnostico}}</p>
            </div>
        </div>
    </div>

@endsection
