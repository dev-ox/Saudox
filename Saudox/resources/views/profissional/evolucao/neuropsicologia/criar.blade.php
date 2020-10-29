@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <h1>Criar uma evolução de Neuropsicológica de {{$paciente->nome_paciente}}</h1>

                    <form method="post" action="{{route('profissional.evolucao.neuropsicologica.salvar')}}">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul style="padding: 0px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf
                        <input value="{{$paciente->id}}" type="hidden"  name="id_paciente">
                        <input value="{{Auth::id()}}" type="hidden"  name="id_profissional">


                        <h3 class="required">Hora da evolução</h3>
                        <input value="{{ g_old($evolucao, "hora_evolucao") }}" type="time" name="hora_evolucao">

                        <h3 class="required">Dia da evolução</h3>
                        <input value="{{ g_old($evolucao, "dia_evolucao") }}" type="date" name="dia_evolucao">



                        <h3 class="required">Tipo de a atendimento</h3>
                        <input type="text" name="tipo_atendimento" value="{{ g_old($evolucao, "tipo_atendimento") }}">

                        <hr class="hr_form">
                        <h3 class="required">Descrição</h3>
                        <textarea class="textareas_form" name="texto" rows="8" cols="50" style="">{{ g_old($evolucao, "texto") }}</textarea>


                        <br>
                        <br>
                        <br>

                        <input type="submit" value="Salvar alterações">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
