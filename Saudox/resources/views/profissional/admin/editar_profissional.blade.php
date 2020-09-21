@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <h4>Editar o profissional {{ $profissional->nome }}</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('profissional.admin.editar.salvar') }}">
                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf

                        <input value="{{ $profissional->id }}" type="hidden"  name="id" id="id">
                        <input value="{{ $profissional->endereco->id }}" type="hidden"  name="id_endereco" id="id_endereco">

                        <label class="required">Login:</label><br>
                        <input value="{{ $profissional->login }}" placeholder="Login" type="text"  name="login" id="login">
                        <label class="required">Senha:</label><br>
                        <input placeholder="Senha" type="password"  name="password" id="password">
                        <label class="required">Nome:</label><br>
                        <input value="{{ $profissional->nome }}" placeholder="Nome Completo" type="text" name="nome" id="nome">
                        <label class="required">Cpf:</label><br>
                        <input value="{{ $profissional->cpf }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="CPF (apenas números)" type="number"  name="cpf" id="cpf">
                        <label class="required">RG:</label><br>
                        <input value="{{ $profissional->rg }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="RG (apenas números)" type="number"  name="rg" id="rg">
                        <label>CRM:</label><br>
                        <input value="{{ $profissional->numero_conselho }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número do CRM (apenas números)" type="number"  name="numero_conselho" id="numero_conselho">
                        <label class="required">Telefone 1:</label><br>
                        <input value="{{ $profissional->telefone_1 }}" placeholder="Telefone" type="text" name="telefone_1" id="telefone_1">
                        <label>Telefone 2:</label><br>
                        <input value="{{ $profissional->telefone_2 }}" placeholder="Segundo Telefone (opcional)" type="text" name="telefone_2" id="telefone_2">
                        <label class="required">Email:</label><br>
                        <input value="{{ $profissional->email }}" placeholder="E-Mail" type="text" name="email" id="email">
                        <label class="required">Nacionalidade:</label><br>
                        <input value="{{ $profissional->nacionalidade }}" placeholder="Nacionalidade" type="text" name="nacionalidade" id="nacionalidade">
                        <label class="required">Descrição do conhecimento e experiência:</label><br>
                        <input value="{{ $profissional->descricao_de_conhecimento_e_experiencia }}" placeholder="Descrição do conhecimento e experiência" type="text" name="descricao_de_conhecimento_e_experiencia" id="descricao_de_conhecimento_e_experiencia">

                        <hr class="hr_form">
                        <h3>Endereço</h3>
                        <label class="required">Estado:</label><br>
                        <input value="{{ $profissional->endereco->estado }}" placeholder="Estado" type="text" name="estado" id="estado">
                        <label class="required">Cidade:</label><br>
                        <input value="{{ $profissional->endereco->cidade }}" placeholder="Cidade" type="text" name="cidade" id="cidade">
                        <label class="required">Bairro:</label><br>
                        <input value="{{ $profissional->endereco->bairro }}" placeholder="Bairro" type="text" name="bairro" id="bairro">
                        <label class="required">Rua:</label><br>
                        <input value="{{ $profissional->endereco->nome_rua }}" placeholder="Rua" type="text" name="nome_rua" id="nome_rua">
                        <label class="required">Nº:</label><br>
                        <input value="{{ $profissional->endereco->numero_casa }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número" type="number" name="numero_casa" id="numero_casa">
                        <label class="required">Complemento:</label><br>
                        <input value="{{ $profissional->endereco->descricao }}" placeholder="Descrição" type="text" name="descricao" id="descricao">
                        <label class="required">Ponto de referência:</label><br>
                        <input value="{{ $profissional->endereco->ponto_referencia }}" placeholder="Ponto de referência" type="text" name="ponto_referencia" id="ponto_referencia">

                        <hr class="hr_form">
                        <h3 class="required">Profissão</h3>
                        <div class="checkbox_container">
                            <input type="checkbox" id="admin" name="profissoes[]" value="admin" {{ in_array('admin', $profissional->getProfissoes()) ? "checked" : "" }}>
                            <label>Administrador</label><br>

                            <input type="checkbox" id="fonoaudiologo" name="profissoes[]" value="fonoaudiologo" {{ in_array('fonoaudiologo', $profissional->getProfissoes()) ? "checked" : "" }}>
                            <label>Fonoaudiólogo</label><br>

                            <input type="checkbox" id="terapeuta_ocupacional" name="profissoes[]" value="terapeuta_ocupacional" {{ in_array('terapeuta_ocupacional', $profissional->getProfissoes()) ? "checked" : "" }}>
                            <label>Terapeuta Ocupacional</label><br>

                            <input type="checkbox" id="neuropsicologo" name="profissoes[]" value="neuropsicologo" {{ in_array('neuropsicologo', $profissional->getProfissoes()) ? "checked" : "" }}>
                            <label>Neuropsicólogo</label><br>

                            <input type="checkbox" id="psicologo" name="profissoes[]" value="psicologo" {{ in_array('psicologo', $profissional->getProfissoes()) ? "checked" : "" }}>
                            <label>Psicologo</label><br>

                            <input type="checkbox" id="psicopedagogo" name="profissoes[]" value="psicopedagogo" {{ in_array('psicopedagogo', $profissional->getProfissoes()) ? "checked" : "" }}>
                            <label>Psicopedagogo</label><br>
                        </div>

                        <hr class="hr_form">
                        <h3 class="required">Estado Civil</h3>
                        <label for="solteiro">Solteiro</label>
                        <input value="solteiro" type="radio" name="estado_civil" id="estado_civil"  {{ $profissional->estado_civil == "solteiro" ? "checked" : "" }}>

                        <br>
                        <label for="casado">Casado</label>
                        <input value="casado" type="radio" name="estado_civil" id="estado_civil"  {{ $profissional->estado_civil == "casado" ? "checked" : "" }}>


                        <hr class="hr_form">
                        <h3 class="required">Estado Trabalhista</h3>
                        <label for="{{ \App\Profissional::Trabalhando }}">{{ \App\Profissional::Trabalhando }}</label>
                        <input value="{{ \App\Profissional::Trabalhando }}" type="radio" name="status" id="status" {{ $profissional->status == \App\Profissional::Trabalhando ? "checked" : "" }}>
                        <br>
                        <label for="{{ \App\Profissional::Demitido }}">{{ \App\Profissional::Demitido }}</label>
                        <input value="{{ \App\Profissional::Demitido }}" type="radio" name="status" id="status" {{ $profissional->status == \App\Profissional::Demitido ? "checked" : "" }}>

                        <hr class="hr_form">
                        <h3>Aviso</h3>
                        <input value="{{ $profissional->aviso }}" placeholder="Aviso" type="text" name="aviso" id="aviso">


                        <input type="submit" value="Salvar">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
