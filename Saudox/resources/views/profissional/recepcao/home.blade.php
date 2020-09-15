@extends('layouts.mainlayout')
@section('content')

    <div class="container">


        <div class="row justify-content-center ">
            <div class="col-md text-center justify-content-center" style="display: flex;">
                <hr>
                <h1>
                    Agendamentos do dia
                </h1>
                <hr>
            </div>
        </div>

        <br>
        <br>


        <!-- TODO: implementar buscar -->
        <div class="row justify-content-center ">
            <div class="col-md-3 text-center justify-content-center" style="display: flex;">
                <a class="bt" style="margin: 5px;">Buscar Paciente</a>
            </div>
            <div class="col-md-3 text-center justify-content-center" style="display: flex;">
                <a class="bt" style="margin: 5px;">Buscar Profissional</a>
            </div>
        </div>

        <br>
        <br>


        @foreach($agendamentos_agrupados_por_profissional as $id_profissional => $agendamentos_do_profissional)

            <div class="row bordas_amarelas bg-padrao">
                <div class="col-md">




                    <div class="row">
                        <div class="col-md">
                            <h1>
                                <a href="{{ route('profissional.ver', $profissionais[$id_profissional]->id) }}">Dr(a). {{ $profissionais[$id_profissional]->nome }}</a>
                            </h1>
                        </div>
                    </div>



                    <br>
                    <br>


                    <div class="row justify-content-center text-center">
                        <div class="col-md">
                            <table class="table table-dark table-bordered table-hover tabela_agendamentos_do_dia">
                                <thead>
                                    <tr>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">Telefone</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($agendamentos_do_profissional as $agendamento)
                                        <tr data-href="{{ route('agendamento.ver', $agendamento->id) }}" onclick="verAgendamento(this)">
                                            <th style="width: 20%;" scope="row">{{ $agendamento->data_entrada }}</th>
                                            <td>{{ $agendamento->nome }}</td>
                                            <td>{{ $agendamento->cpf }}</td>
                                            <td>{{ $agendamento->telefone }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
        @endforeach



    </div>

@endsection
