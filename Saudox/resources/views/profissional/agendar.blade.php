@extends('layouts.mainlayout')
@section('content')

    @php
        date_default_timezone_set('America/Recife');
    @endphp

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <br>
                    <h1>Agendar para o paciente {{ $paciente->nome_paciente }}</h1>


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('agendamento.salvar') }}" style="margin-top: 0px;">

                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf


                        <input value="{{ $paciente->id ? $paciente->id : -1}}" type="hidden"  name="id_paciente" id="id_paciente">
                        <label class="required">Nome do paciente:</label><br>
                        <input value="{{ $paciente->nome_paciente == "" ? old('nome') : $paciente->nome_paciente }}" placeholder="Nome Completo" type="text" name="nome" id="nome">
                        <label class="required">Cpf do paciente:</label><br>
                        <input value="{{ $paciente->cpf == "" ? old('cpf') : $paciente->cpf }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="CPF (apenas números)" type="number"  name="cpf" id="cpf">
                        <label class="required">Data de nascimento:</label><br>
                        <input value="{{ $paciente->data_nascimento == "" ? old('data_nascimento_paciente') : $paciente->data_nascimento }}" placeholder="" type="date" name="data_nascimento_paciente" id="data_nascimento_paciente">
                        <label class="required">Telefone da mãe:</label><br>
                        <input value="{{ $paciente->telefone_mae == "" ? old('telefone') : $paciente->telefone_mae }}" placeholder="Telefone" type="text" name="telefone" id="telefone">
                        <label>Email da mãe:</label><br>
                        <input value="{{ $paciente->email_mae == "" ?  old('email') : $paciente->email_mae }}" placeholder="E-Mail" type="text" name="email" id="email">
                        
                        <hr class="hr_form">
                        <h3>Endereço</h3>
                        <label class="required">Estado:</label><br>
                        <input value="{{ $paciente->endereco->estado           == "" ? old('estado')           : $paciente->endereco->estado }}" placeholder="Estado" type="text" name="estado" id="estado">
                        <label class="required">Cidade:</label><br>
                        <input value="{{ $paciente->endereco->cidade           == "" ? old('cidade')           : $paciente->endereco->cidade }}" placeholder="Cidade" type="text" name="cidade" id="cidade">
                        <label>Bairro:</label><br>
                        <input value="{{ $paciente->endereco->bairro           == "" ? old('bairro')           : $paciente->endereco->bairro }}" placeholder="Bairro" type="text" name="bairro" id="bairro">
                        <label>Rua:</label><br>
                        <input value="{{ $paciente->endereco->nome_rua         == "" ? old('nome_rua')         : $paciente->endereco->nome_rua }}" placeholder="Rua" type="text" name="nome_rua" id="nome_rua">
                        <label>Nº:</label><br>
                        <input value="{{ $paciente->endereco->numero_casa      == "" ? old('numero_casa')      : $paciente->endereco->numero_casa }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número" type="number" name="numero_casa" id="numero_casa">
                        <label>Complemento:</label><br>
                        <input value="{{ $paciente->endereco->descricao        == "" ? old('descricao')        : $paciente->endereco->descricao }}" placeholder="Descrição" type="text" name="descricao" id="descricao">
                        <label class="required">Ponto de referência:</label><br>
                        <input value="{{ $paciente->endereco->ponto_referencia == "" ? old('ponto_referencia') : $paciente->endereco->ponto_referencia }}" placeholder="Ponto de referência" type="text" name="ponto_referencia" id="ponto_referencia">



                        <hr class="hr_form">
                        <h3>Dados do agendamento</h3>
                        <label class="required">Local de atendimento</label><br>
                        <input value="UniSaúde" type="text" name="local_de_atendimento" id="local_de_atendimento">

                        <label class="required">Dia da consulta</label><br>
                        <input type="date" name="dia_da_consulta" id="dia_da_consulta" min="{{ date('Y-m-d H:i:s') }}">

                        <label class="required">Hora de Entrada</label><br>
                        <input value="13:00" type="time" name="hora_entrada" id="hora_entrada">

                        <label class="required">Hora de Saída</label><br>
                        <input value="15:00" type="time" name="hora_saida" id="hora_saida">

                        <hr class="hr_form">
                        <h3>Sobre a volta</h3>

                        <input type="checkbox" id="recorrencia_do_agendamento" name="recorrencia_do_agendamento" style="margin-left: -2%;">
                        <label class="required">É volta?</label><br>

                        <label class="tipo_da_recorrencia">Motivo da volta</label><br>
                        <textarea class="textareas_form tipo_da_recorrencia" id="tipo_da_recorrencia" name="tipo_da_recorrencia" rows="4" cols="50" style=""></textarea>

                        <hr class="hr_form">
                        <h3>Observações (Opcional)</h3>
                        <textarea class="textareas_form" id="observacoes" name="observacoes" rows="4" cols="50" style=""></textarea>

                        <hr class="hr_form">
                        <h3 class="required">Profissional Responsável</h3>

                        <select name="id_profissional">
                            @foreach($profissionais as $profissional)
                                <option value="{{ $profissional->id }}"> {{ $profissional->nome }} </option>
                            @endforeach
                        </select>



                        <hr class="hr_form">
                        <h3>Convênio</h3>
                        <select name="id_convenio">
                            <option value="0"> Nenhum </option>
                            @foreach($convenios as $convenio)
                                <option value="{{ $convenio->id }}"> {{ $convenio->nome_convenio }} </option>
                            @endforeach
                        </select>


                        <input type="submit" value="Salvar">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
