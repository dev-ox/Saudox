@extends('layouts.mainlayout')
@section('content')

    <div class="container bordas_amarelas bg-padrao">
        <br>
        <br>
        <h1> Evolução neuropsicológica de {{$paciente->nome_paciente}} </h1>
        @if(Auth::guard('profissional')->check())
            <h3 class="pessoal"> <a href="{{ route('profissional.evolucao.neuropsicologica.criar', $paciente->id) }}">Criar nova</a> </h3>
        @endif
        <br>


        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <ul class="timeline">
                        @foreach($evolucoes as $evolucao)
                            <li>
                                <a class="anchor_data">{{ date_format(date_create($evolucao->data_evolucao), 'd-m-Y')  }}</a>
                                <a href="{{ route('profissional.ver', $evolucao->id_profissional) }}" class="float-right">Dr(a). {{ $evolucao->profissional->nome }}</a>
                                <p>Tipo de atendimento: {{ $evolucao->tipo_atendimento }}</p>
                                <p>{{ $evolucao->texto }}</p>
                                <a class="float-right btn_editar_evolucao" href="{{ route('profissional.evolucao.neuropsicologica.editar', $evolucao->id) }}">Editar</a>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>



    </div>

@endsection
<link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
