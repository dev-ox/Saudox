@extends('layouts.mainlayout')
@section('content')

    <div class="desktop">
        <head>
            <div class="welcome-adm bg-padrao">
                <h1 "adm-page">Você está na página do Administrador!</h1>
            </div>
        </head>

        <div class="profissionais-adm bg-padrao">
            <h3>Profissionais:</h3>
            <div class="adm-page">
                <a class="bt-new-adm" href= {{route('profissional.admin.cadastro')}}>Cadastrar Novo Profissional</a>
                <div class="search-part">
                    <label for="prof" class="search-label">Buscar profissional:</label>
                    <input id="prof" type="text" class="search" name="buscar">
                    <a class="bt-search" href="/">buscar</a>
                </div>
            </div>
            <div class="table-wrapper-adm">
                <table class="adm-table">
                    <thead>
                        <tr class="adm table-row">
                            <th class="tag-adm" colspan="3">Profissional:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="corsim-adm">Nome</td>
                            <td class="corsim-adm">CPF</td>
                            <td class="corsim-adm">Editar</td>
                        </tr>
                        @foreach($profissionais as $pro)
                            <tr>
                                <td class="corsim-adm"> <a class="corsim-adm" href= {{route('profissional.ver', ['id' => $pro->id])}}>{{$pro->nome}}</a> </td>
                                <td class="corsim-adm"> <a class="corsim-adm">{{$pro->cpf}}</a> </td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-editar" href= {{route('profissional.admin.editar', ['id_profissional' => $pro->id])}}>Editar</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pacientes-adm bg-padrao">
            <h3>Pacientes:</h3>
            <div class="adm-page">
                <a class="bt-new-adm" href= {{route('profissional.criar_paciente')}}>Cadastrar Novo Paciente</a>
                <div class="search-part">
                    <label for="pac" class="search-label">Buscar paciente:</label>
                    <input id="pac" type="text" class="search" name="buscar">
                    <a class="bt-search" href="/">buscar</a>
                </div>
            </div>
            <div class="table-wrapper-adm">
                <table class="adm-table">
                    <thead>
                        <tr class="adm table-row">
                            <th class="tag-adm" colspan="3">Paciente:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $pac)
                            {{$pac->nome}}
                            <tr>
                                <td class="corsim-adm"> <a class="corsim-adm" href={{route('profissional.ver_paciente', ['id' => $pac->id])}}>{{$pac->nome_paciente}}</a> </td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-editar" href= {{route('profissional.criar_paciente.editar', $pac->id)}}>Editar</a> </td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-remover" href= {{route('profissional.ver', ['id' => $pac->id])}}>Remover</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="celular">
        <head>
            <div class="welcome-phone">
                <h1 "adm-page">Você está na página do Administrador!</h1>
            </div>
        </head>

        <div class="profissionais-adm-phone">
            <h3>Profissionais:</h3>
            <a class="bt-new-adm-phone" href= {{route('profissional.home')}}>Cadastrar Novo Profissional</a>
            <div class="adm-page-phone">
                <label for="prof" class="search-label-phone">Buscar profissional</label>
                <input id="prof" type="text" class="search-phone" name="buscar">
                <a class="bt-search-phone" href="/">buscar</a>
            </div>
            <div class="table-wrapper-adm-phone">
                <table class="adm-table-phone">
                    <thead>
                        <tr class="adm table-row">
                            <th class="tag-adm" colspan="3">Profissional:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profissionais as $pro)
                            <tr>
                                <td class="corsim"> <a class="corsim" href={{route('profissional.ver', ['id' => $pro->id])}}> {{$pro->nome}} </a> </td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-editar" href={{route('profissional.ver', ['id' => $pro->id])}}>Editar</a> </td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-remover" href={{route('profissional.ver', ['id' => $pro->id])}}>Remover</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pacientes-adm-phone">
            <h3>Pacientes:</h3>
            <a class="bt-new-adm-phone" href= {{route('profissional.home')}}>Cadastrar Novo Paciente</a>
            <div class="adm-page-phone">
                <label for="pac" class="search-label-phone">Buscar paciente</label>
                <input id="pac" type="text" class="search-phone" name="buscar">
                <a class="bt-search-phone" href="/">buscar</a>
            </div>
            <div class="table-wrapper-adm-phone">
                <table class="adm-table-´hone">
                    <thead>
                        <tr class="adm table-row">
                            <th class="tag-adm" colspan="3">Paciente:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $pac)
                            {{$pac->nome}}
                            <tr>
                                <td class="corsim"> <a class="corsim" href={{route('profissional.ver_paciente', ['id' => $pac->id])}}> {{$pac->nome_paciente}} </a> </td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-editar" href={{route('profissional.ver', ['id' => $pac->id])}}>Editar</a></td>
                                <td class="bt-acao-adm-tb"> <a class="bt-acao-adm-remover" href={{route('profissional.ver', ['id' => $pac->id])}}>Remover</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
