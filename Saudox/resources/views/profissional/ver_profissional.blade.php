@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal"> Perfil de {{$profissional->nome}} </h1>
                @if(Auth::guard('profissional')->check() && App\Profissional::find(Auth::id())->ehAdmin())
                    <h3 class="pessoal"> <a href="{{ route('profissional.admin.editar', $profissional->id) }}">Editar</a> </h3>
                @endif


                @if($profissional->aviso != "")
                    <br>
                    <div class="row justify-content-center text-center">
                        <div class="col-md-5 bordas_vermelhas">
                            <br>
                            <h3 class="marker-label">Aviso:</h3>
                            <p style="font-size: 25px;"> {{ $profissional->aviso }} </p>
                        </div>
                    </div>
                    <br>
                @endif

                @if($profissional->id == Auth::id() || App\Profissional::find(Auth::id())->ehAdmin())
                    <div class="caixa_form" style="width: 43%;">
                        <h3>Edite seu aviso (deixe em branco para remover)</h3>
                        <form method="post" action="{{ route('profissional.aviso.editar.salvar') }}" style="margin-top: 0px;">
                            @csrf
                            <input value="{{ $profissional->id }}" type="hidden"  name="id" id="id">
                            <input value="{{ $profissional->aviso }}" placeholder="Aviso (em branco para remover)" type="text"  name="aviso" id="aviso" style="width: 70%;">
                            <input type="submit" value="Salvar">
                        </form>
                    </div>
                    <br>
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
                            <label class="lbinfo-static">Status:<br><label class="lbinfo-ntstatic">{{$profissional->status}}</label></label>
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
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Email:<br>
                            <label class="lbinfo-ntstatic"><a href="mailto:{{$profissional->email}}">{{$profissional->email}}</a></label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Telefone 1:<br>
                            <label class="lbinfo-ntstatic">{{$profissional->telefone_1}}</label></label>
                        </div>
                        <div class="col-md-4">
                            @if($profissional->telefone_2)
                                <label class="lbinfo-static">Telefone 2:<br>
                                <label class="lbinfo-ntstatic">{{$profissional->telefone_2}}</label></label>
                            @endif
                        </div>

                    </div>
                </div>
                <br>
                <br>

                <div class="final-perfil">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="marker-label-2">Profissões:</h3>
                            <br>
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
                        <div class="col-md-6">
                            <h3 class="marker-label-2">Conhecimento e Experiência:</h3>
                            <div class="descricao-wrapper">
                                {{$profissional->descricao_de_conhecimento_e_experiencia}}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>

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
                            @if($agendamento->status == '1')
                                <tr data-href="{{ route('agendamento.ver', $agendamento->id) }}" onclick="verAgendamento(this)">
                                    <th style="width: 20%;" scope="row">{{ $agendamento->dataEntradaFormatada()}}</th>
                                    <td>{{ $agendamento->nome }}</td>
                                    <td>{{ $agendamento->cpf }}</td>
                                    <td>{{ $agendamento->telefone }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>

@endsection
