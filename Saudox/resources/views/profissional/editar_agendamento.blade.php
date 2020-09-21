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
                    <h4>Editar agendamento para o paciente {{ $agendamento->nome_paciente }}</h4>


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('agendamento.editar.salvar') }}">

                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf

                        <input value="{{ $agendamento->id                       }}" type="hidden"  name="id" id="id">
                        <label class="required">Nome:</label><br>
                        <input value="{{ $agendamento->nome                     }}" placeholder="Nome Completo" type="text" name="nome" id="nome">
                        <label class="required">Cpf:</label><br>
                        <input value="{{ $agendamento->cpf                      }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="CPF (apenas números)" type="number"  name="cpf" id="cpf">
                        <label>Data de nascimento</label><br>
                        <input value="{{ $agendamento->data_nascimento_paciente }}" placeholder="" type="date" name="data_nascimento_paciente" id="data_nascimento_paciente">
                        <label class="required">Telefone:</label><br>
                        <input value="{{ $agendamento->telefone                 }}" placeholder="Telefone" type="text" name="telefone" id="telefone">
                        <label class="required">Email:</label><br>
                        <input value="{{ $agendamento->email                    }}" placeholder="E-Mail" type="text" name="email" id="email">

                        <hr class="hr_form">
                        <h3>Endereço</h3>
                        <label class="required">Estado:</label><br>
                        <input value="{{ $agendamento->endereco->estado           }}" placeholder="Estado" type="text" name="estado" id="estado">
                        <label class="required">Cidade:</label><br>
                        <input value="{{ $agendamento->endereco->cidade           }}" placeholder="Cidade" type="text" name="cidade" id="cidade">
                        <label class="required">Bairro:</label><br>
                        <input value="{{ $agendamento->endereco->bairro           }}" placeholder="Bairro" type="text" name="bairro" id="bairro">
                        <label class="required">Rua:</label><br>
                        <input value="{{ $agendamento->endereco->nome_rua         }}" placeholder="Rua" type="text" name="nome_rua" id="nome_rua">
                        <label class="required">Nº:</label><br>
                        <input value="{{ $agendamento->endereco->numero_casa      }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número" type="number" name="numero_casa" id="numero_casa">
                        <label class="required">Complemento:</label><br>
                        <input value="{{ $agendamento->endereco->descricao        }}" placeholder="Descrição" type="text" name="descricao" id="descricao">
                        <label class="required">Ponto de referência:</label><br>
                        <input value="{{ $agendamento->endereco->ponto_referencia }}" placeholder="Ponto de referência" type="text" name="ponto_referencia" id="ponto_referencia">



                        <hr class="hr_form">
                        <h3>Dados do agendamento</h3>
                        <label class="required">Local de atendimento</label><br>
                        <input value="{{ $agendamento->local_de_atendimento }}" type="text" name="local_de_atendimento" id="local_de_atendimento">

                        <label class="required">Dia da consulta</label><br>
                        <input value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $agendamento->data_entrada)->toDateString() }}" type="date" name="dia_da_consulta" id="dia_da_consulta" min="{{ date('Y-m-d H:i:s') }}">
                        <label class="required">Hora de Entrada</label><br>
                        <input value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $agendamento->data_entrada)->toTimeString() }}" type="time" name="hora_entrada" id="hora_entrada">
                        <label class="required">Hora de Saída</label><br>
                        <input value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $agendamento->data_saida)->toTimeString() }}" type="time" name="hora_saida" id="hora_saida">

                        <hr class="hr_form">
                        <h3>Sobre a volta</h3>

                        <input type="checkbox" id="recorrencia_do_agendamento" name="recorrencia_do_agendamento" style="margin-left: -2%;" {{ $agendamento->recorrencia_do_agendamento ? "checked" : "" }}>
                <label class="required">É volta?</label><br>

                <label class="tipo_da_recorrencia">Motivo da volta</label><br>
                <textarea class="textareas_form tipo_da_recorrencia" id="tipo_da_recorrencia" name="tipo_da_recorrencia" rows="4" cols="50" style=""> {{ $agendamento->tipo_da_recorrencia }} </textarea>

                <hr class="hr_form">
                <h3>Observações</h3>
                <textarea class="textareas_form" id="observacoes" name="observacoes" rows="4" cols="50" style=""> {{$agendamento->observacoes}} </textarea>

                <hr class="hr_form">
                <h3 class="required">Profissional Responsável</h3>

                <select name="id_profissional">
                    @foreach($profissionais as $profissional)
                        <option value="{{ $profissional->id }}" {{ $agendamento->id_profissional == $profissional->id ? "selected" : "" }}> {{ $profissional->nome }} </option>
                    @endforeach
                </select>



                <hr class="hr_form">
                <h3>Convênio</h3>
                <select name="id_convenio">
                    <option value="0" {{ !$agendamento->id_convenio ? "selected" : "" }}> Nenhum </option>
                    @foreach($convenios as $convenio)
                        <option value="{{ $convenio->id }}"  {{ $agendamento->id_convenio == $convenio->id ? "selected" : "" }}> {{ $convenio->nome_convenio }} </option>
                    @endforeach
                </select>


                <input type="submit" value="Salvar">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
