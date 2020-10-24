@extends('layouts.mainlayout')
@section('content')

<div class="container">
    @if($buscou)
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md text-center justify-content-center">

                <h3>Você buscou por ({{$tipo_user}}), com ({{$tipo_busca}}) similar a ({{$info}})</h3>
                <br>
                <br>

                        @if($tipo_user == 'paciente')
                            @if(count($pacientes) > 0)
                                <table class="table table-dark table-bordered table-hover tabela_agendamentos_do_dia">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">CPF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @foreach ($pacientes as $pac)
                                    <tr data-href="{{route('profissional.ver_paciente', ['id' => $pac->id])}}" onclick="verAgendamento(this)">
                                        <td>{{$pac->nome_paciente}}</td>
                                        <td>{{$pac->cpf}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                            @else
                                <h4>Nenhum paciente encontrado!</h4><br>
                            @endif
                        @else
                            @if(count($profissionais) > 0)
                                <table class="table table-dark table-bordered table-hover tabela_agendamentos_do_dia">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">CPF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @foreach ($profissionais as $prof)
                                    <tr data-href="{{route('profissional.ver', ['id' => $prof->id])}}" onclick="verAgendamento(this)">
                                        <td>{{$prof->nome}}</td>
                                        <td>{{$prof->cpf}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                            @else
                                <h4>Nenhum profissional encontrado!</h4><br>
                            @endif
                        @endif

            </div>
        </div>
    @endif

    <br>
    <br>

    <div class="row">
        <div class = "caixa_form">

            <h1 style="margin-bottom: -7%;">Busca</h1>

            <form action="{{route('profissional.buscar')}}" method="get">
                <input type="hidden" id="buscou" name="buscou" value="true">

                <h3>Profissional ou Paciente?</h3>
                <label for="tipo_user_paciente">Paciente</label>
                <input type="radio" id="tipo_user_paciente" name="tipo_user" value="paciente" checked>
                <label for="tipo_user_profissional">Profissional</label>
                <input type="radio" id="tipo_user_profissional" name="tipo_user" value="profissional">

                <br>

                <h3>Nome ou CPF?</h3>
                <label for="tipo_busca_nome">Nome</label>
                <input type="radio" id="tipo_busca_nome" name="tipo_busca" value="nome" checked>
                <label for="tipo_busca_cpf">CPF</label>
                <input type="radio" id="tipo_busca_cpf" name="tipo_busca" value="cpf">

                <br>

                <label for="info">Informe o que deseja buscar:</label><br>
                <input placeholder="Nome ou CPF" type="text" id="info" name="info"><br>

                <input type="submit" value="Buscar">
            </form>

            <br>
            <br>
        </div>
    </div>
</div>

@endsection
