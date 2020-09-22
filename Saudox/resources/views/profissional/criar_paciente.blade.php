@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <h4>Cadastro de Paciente</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('profissional.criar_paciente.salvar') }}">

                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf

                        <input value="{{ old('login') }}" placeholder="Login" type="text"  name="login" id="login">
                        <input value="{{ old('password') }}" placeholder="Senha" type="password"  name="password" id="password">

                        <hr class="hr_form">
                        <h3>Informação Pessoal</h3>
                        <input value="{{ old('nome_paciente', $agendamento->nome) }}" placeholder="Nome Completo" type="text" name="nome_paciente" id="nome_paciente">
                        <input value="{{ old('cpf', $agendamento->cpf) }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="CPF (apenas números)" type="number"  name="cpf" id="cpf">
                        <h3>Sexo</h3>
                        <label for="masculino">Masculino</label>
                        <input value="0" type="radio" name="sexo" id="sexo">
                        <label for="feminino">Feminino</label>
                        <input value="1" type="radio" name="sexo" id="sexo">
                        <input value="{{ old('naturalidade') }}" placeholder="Naturalidade" type="text" name="naturalidade" id="naturalidade">
                        <input value="{{ old('data_nascimento', $agendamento->data_nascimento_paciente) }}" class="noscroll" type="date"  name="data_nascimento" id="data_nascimento">
                        <input value="{{ old('responsavel') }}" placeholder="Responsável" type="text" name="responsavel" id="responsavel">
                        <input value="{{ old('numero_irmaos') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número de Irmãos" type="number"  name="numero_irmaos" id="numero_irmaos">
                        <input value="{{ old('lista_irmaos') }}" placeholder="Nome dos Irmãos" type="text" name="lista_irmaos" id="lista_irmaos">
                        <h3>Filho Biológico ou Adotivo?</h3>
                        <label for="biologico">Biológico</label>
                        <input value="0" type="radio" name="tipo_filho_biologico_adotivo" id="tipo_filho_biologico_adotivo">
                        <label for="adotivo">Adotivo</label>
                        <input value="1" class="command_hidden" type="radio" name="tipo_filho_biologico_adotivo" id="tipo_filho_biologico_adotivo">
                        <div class="hidden">
                            <h3>Filho sabe que é Adotado?</h3>
                            <label for="sim">Sim</label>
                            <input value="1" class="command_hidden_extra" type="radio" name="'crianca_sabe_se_adotivo'" id="'crianca_sabe_se_adotivo'">
                            <label for="nao">Não</label>
                            <input value="0" type="radio" name="'crianca_sabe_se_adotivo'" id="'crianca_sabe_se_adotivo'">
                            <input value="{{ old('reacao_quando_descobriu_se_adotivo') }}" placeholder="Reação ao descobrir que era adotado (Opcional)" type="text" name="reacao_quando_descobriu_se_adotivo" id="reacao_quando_descobriu_se_adotivo">
                        </div>

                        <hr class="hr_form">
                        <h3>Informações dos Pais</h3>
                        <input value="{{ old('nome_pai') }}" placeholder="Nome do Pai" type="text" name="nome_pai" id="nome_pai">
                        <input value="{{ old('nome_mae') }}" placeholder="Nome da Mãe" type="text" name="nome_mae" id="nome_mae">
                        <input value="{{ old('telefone_pai') }}" placeholder="Telefone do Pai (Apenas números)" type="text" name="telefone_pai" id="telefone_pai">
                        <input value="{{ old('telefone_mae', $agendamento->telefone) }}" placeholder="Telefone da Mãe (Apenas números)" type="text" name="telefone_mae" id="telefone_mae">
                        <input value="{{ old('email_pai') }}" placeholder="E-Mail do Pai (Opcional)" type="text" name="email_pai" id="email_pai">
                        <input value="{{ old('email_mae', $agendamento->email) }}" placeholder="E-Mail da Mãe (Opcional)" type="text" name="email_mae" id="email_mae">
                        <input value="{{ old('idade_pai') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Idade do Pai (Número)" type="number"  name="idade_pai" id="idade_pai">
                        <input value="{{ old('idade_mae') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Idade da Mae (Número)" type="number"  name="idade_mae" id="idade_mae">
                        <h3>Situação Atual</h3>
                        <h3>Casados?</h3>
                        <label for="pais_sao_casados">Sim</label>
                        <input value="1" type="radio" name="pais_sao_casados" id="pais_sao_casados">
                        <label for="pais_sao_casados">Não</label>
                        <input value="0" type="radio" name="pais_sao_casados" id="pais_sao_casados">
                        <h3>Divorciados?</h3>
                        <label for="pais_sao_divorciados">Sim</label>
                        <input value="1" class="command_hidden" type="radio" name="pais_sao_divorciados" id="pais_sao_divorciados">
                        <label for="pais_sao_casados">Não</label>
                        <input value="0" type="radio" name="pais_sao_divorciados" id="pais_sao_divorciados">
                        <input value="{{ old('reacao_sobre_a_relacao_pais_caso_divorciados') }}" placeholder="Reação a relação dos pais" type="text" name="reacao_sobre_a_relacao_pais_caso_divorciados" id="reacao_sobre_a_relacao_pais_caso_divorciados">
                        <input value="{{ old('vive_com_quem_caso_pais_divorciados') }}" placeholder="Vive com quem?" type="text" name="vive_com_quem_caso_pais_divorciados" id="vive_com_quem_caso_pais_divorciados">

                        <hr class="hr_form">
                        <h3>Endereço</h3>
                        <input value="{{ old('estado', $agendamento->endereco->estado) }}" placeholder="Estado" type="text" name="estado" id="estado">
                        <input value="{{ old('cidade', $agendamento->endereco->cidade) }}" placeholder="Cidade" type="text" name="cidade" id="cidade">
                        <input value="{{ old('bairro', $agendamento->endereco->bairro) }}" placeholder="Bairro" type="text" name="bairro" id="bairro">
                        <input value="{{ old('nome_rua', $agendamento->endereco->nome_rua) }}" placeholder="Rua" type="text" name="nome_rua" id="nome_rua">
                        <input value="{{ old('numero_casa', $agendamento->endereco->numero_casa) }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número" type="number" name="numero_casa" id="numero_casa">
                        <input value="{{ old('descricao', $agendamento->endereco->descricao) }}" placeholder="Descrição" type="text" name="descricao" id="descricao">
                        <input value="{{ old('ponto_referencia', $agendamento->endereco->descricao) }}" placeholder="Ponto de referência" type="text" name="ponto_referencia" id="ponto_referencia">

                        <input type="submit" value="Cadastrar">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
