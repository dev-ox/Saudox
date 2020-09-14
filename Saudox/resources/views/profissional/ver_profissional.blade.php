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
                            <label class="lbinfo-static">Nome: <br>{{$profissional->nome}}</label>
                            <br>
                            <br>
                            <label class="lbinfo-static">CPF: {{$profissional->cpf}}</label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">RG: <br>{{$profissional->rg}}</label>
                            <br>
                            <br>
                            <label class="lbinfo-static"> Nacionalidade: {{$profissional->nacionalidade}}</label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Status: <br>
                                @if($profissional->status == 1)
                                    Ativo
                                @else
                                    Inativo
                                @endif
                            </label>
                            <br>
                            <br>
                            @if($profissional->numero_conselho)
                                <label class="lbinfo-static">Numero Conselho: {{$profissional->numero_conselho}}</label>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Estado Civil: {{$profissional->estado_civil}}</label>
                        </div>
                    </div>

                </div>



                <div class="Contato">
                    <h3 class="marker-label">Contato:</h3>
                    <label class="lbinfo-static">Email:</label>
                    <label class="lbinfo-ntstatic"><a href="mailto:{{$profissional->email}}">{{$profissional->email}}</a></label>
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
                    <h3 class="marker-label">Profissões:</h3>
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
                <br>
                <br>




                <div class="descricao">
                    <h3 class="marker-label">Conhecimento e Experiencia:</h3>
                    <div class="descricao-wrapper">
                        {{$profissional->descricao_de_conhecimento_e_experiencia}}
                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection
