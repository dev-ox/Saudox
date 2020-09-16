@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal"> Perfil de {{$profissional->nome}} </h1>
                @if(Auth::guard('profissional')->check() && App\Profissional::find(Auth::id())->ehAdmin())
                    <h3 class="pessoal"> <a href="{{ route('profissional.admin.editar', $profissional->id) }}">Editar</a> </h3>
                @endif



                <div class="info-pessoal prof">
                    <h3 class="marker-label">Informações Pessoais:</h3>
                    <br>
                    <br>

                    <div class="row">

                        <div class="col-md-3">
                            <label class="lbinfo-static">Nome:<br><label class="lbinfo-ntstatic">{{$profissional->nome}}</label></label>
                            <br>
                            <br>
                            <label class="lbinfo-static">CPF:<br><label class="lbinfo-ntstatic">{{$profissional->cpf}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">RG:<br><label class="lbinfo-ntstatic">{{$profissional->rg}}</label></label>
                            <br>
                            <br>
                            <label class="lbinfo-static">Nacionalidade:<br><label class="lbinfo-ntstatic">{{$profissional->nacionalidade}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Status:<br><label class="lbinfo-ntstatic">
                                    @if($profissional->status == 1)
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                </label></label>
                                <br>
                                <br>
                                @if($profissional->numero_conselho)
                                    <label class="lbinfo-static">Numero Conselho:<br><label class="lbinfo-ntstatic">{{$profissional->numero_conselho}}</label></label>
                                @endif
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Estado Civil:<br><label class="lbinfo-ntstatic">{{$profissional->estado_civil}}</label></label>
                        </div>
                    </div>

                </div>



                <div class="Contato">
                    <h3 class="marker-label">Contato:</h3>
                    <label class="lbinfo-static">Email:</label></label>
                <label class="lbinfo-ntstatic"><a href="mailto:{{$profissional->email}}"><br><label class="lbinfo-ntstatic">{{$profissional->email}}</a></label></label>
                <br>
                <br>
                <label class="lbinfo-static">Telefone 1:</label>
                <label class="lbinfo-ntstatic">{{$profissional->telefone_1}}</label>
                @if($profissional->telefone_2)
                    <label class="lbinfo-static">Telefone 2:</label>
                    <label class="lbinfo-ntstatic">{{$profissional->telefone_2}}</label>
                @endif
                </div>
                <br>
                <br>


                <div class="profissoes">
                    <h3 class="marker-label-2">Profissões:</h3>
                    <div class="row">
                        <div class="profissoes-table-wrapper">
                            <table class="profissoes-table">
                                <tbody>
                                    @foreach($profissoes as $pr)
                                        <tr>
                                            <td>{{$pr}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <br>




                <div class="descricao">
                    <h3 class="marker-label-2">Conhecimento e Experiencia:</h3>
                    <div class="row">
                        <div class="descricao-wrapper">
                            {{$profissional->descricao_de_conhecimento_e_experiencia}}
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <br>
        <br>




        <div class="row justify-content-center text-center bordas_amarelas bg-padrao">
            <div class="col-md">
                <h1>Agenda</h1>
                <br>
                <br>


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
                        @foreach($agenda as $agendamento)
                            <tr data-href="{{ route('agendamento.ver', $agendamento->id) }}" onclick="verAgendamento(this)">
                                <th style="width: 20%;" scope="row">{{ date('H:m - d-m-Y', strtotime($agendamento->data_entrada)) }}</th>
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

@endsection
