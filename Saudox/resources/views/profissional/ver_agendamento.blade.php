@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">


                <div class="caixa">
                    <br>
                    <br>
                    <h1>Agendamento</h1>
                    <br>
                    <br>
                    @if(Auth::guard('profissional'))
                        <span style="display: inline-flex; margin-left: -8%;">
                            <a style="margin: auto; margin-right: 10px; width: auto" class="bt paciente-bt" href="{{ route('agendamento.marcar_concluida', $agendamento->id) }}">Finalizar agendamento</a>
                            <a style="margin: auto; margin-right: 10px;" class="bt paciente-bt" href="{{ route('profissional.criar_paciente', $agendamento->id) }}">Cadastrar paciente</a>
                            <a style="margin: auto; margin-right: -20%;" class="bt paciente-bt" href="{{ route('agendamento.editar', $agendamento->id) }}">Editar agendamento</a>
                        </span>
                    @endif
                    <br>
                    <br>
                    <div class="bordas_amarelas" id="conteudo_agendamento">

                        <table style="margin: auto;">
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Nome:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->nome }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">CPF:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->cpf }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Data de Nascimento:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->dataNascimentoFormatada() }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Telefone:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->telefone }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Email:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->email }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Endereco:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->nome }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Data de Entrada:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->dataEntradaFormatada() }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Data de Saida:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->dataSaidaFormatada() }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Local de Atendimento:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->local_de_atendimento }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Recorrencia do agendamento:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->recorrencia_do_agendamento ? "É volta" : "Primeira vez" }}</td>
                            </tr>
                            @if($agendamento->recorrencia_do_agendamento)
                                <tr class="agendamento_tr">
                                    <td class="agendamento_td corsim">Motivo da recorrencia:</td>
                                    <td class="agendamento_td corsim">{{ $agendamento->tipo_da_recorrencia }}</td>
                                </tr>
                            @endif
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Observações:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->observacoes }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Status:</td>
                                <td class="agendamento_td corsim">{{ $agendamento->status == 1 ? "Pedente" : "Concluido/Cancelado" }}</td>
                            </tr>

                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Médico responsável:</td>
                                <td class="agendamento_td corsim">{{ App\Profissional::find($agendamento->id_profissional)->nome ?? '' }}</td>
                            </tr>

                            <tr class="agendamento_tr">
                                <td class="agendamento_td corsim">Convênio:</td>
                                <td class="agendamento_td corsim">{{ App\Convenios::find($agendamento->id_convenio)->nome_convenio ?? 'Nenhum' }}</td>
                            </tr>

                        </table>

                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection
