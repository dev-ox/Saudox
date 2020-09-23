@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">


                <div class="caixa">
                    <h1>Agendamento</h1>
                    @if(Auth::guard('profissional'))
                        <span style="display: inline-flex; margin-left: -8%;">
                            <a style="margin: auto; width: auto; height: auto;" class="bt-acao-adm-editar" href="{{ route('agendamento.marcar_concluida', $agendamento->id) }}">Marcar como concluida</a>
                            <a style="margin: auto; width: auto; height: auto;" class="bt-acao-adm-editar" href="{{ route('profissional.criar_paciente', $agendamento->id) }}">Cadastrar paciente</a>
                            <a style="margin: auto; width: auto; height: auto; margin-right: -20%;" class="bt-acao-adm-editar" href="{{ route('agendamento.editar', $agendamento->id) }}">Editar</a>
                        </span>
                    @endif
                    <br>
                    <br>
                    <div id="conteudo_agendamento">

                        <table style="margin: auto;">
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Nome:</td>
                                <td class="agendamento_td">{{ $agendamento->nome }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">CPF:</td>
                                <td class="agendamento_td">{{ $agendamento->cpf }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Data de Nascimento:</td>
                                <td class="agendamento_td">{{ $agendamento->data_nascimento_paciente }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Telefone:</td>
                                <td class="agendamento_td">{{ $agendamento->telefone }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Email:</td>
                                <td class="agendamento_td">{{ $agendamento->email }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Endereco:</td>
                                <td class="agendamento_td">{{ $agendamento->nome }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Data de Entrada:</td>
                                <td class="agendamento_td">{{ $agendamento->data_entrada }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Data de Saida:</td>
                                <td class="agendamento_td">{{ $agendamento->data_saida }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Local de Atendimento:</td>
                                <td class="agendamento_td">{{ $agendamento->local_de_atendimento }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Recorrencia do agendamento:</td>
                                <td class="agendamento_td">{{ $agendamento->recorrencia_do_agendamento ? "É volta" : "Primeira vez" }}</td>
                            </tr>
                            @if($agendamento->recorrencia_do_agendamento)
                                <tr class="agendamento_tr">
                                    <td class="agendamento_td">Motivo da recorrencia:</td>
                                    <td class="agendamento_td">{{ $agendamento->tipo_da_recorrencia }}</td>
                                </tr>
                            @endif
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Observações:</td>
                                <td class="agendamento_td">{{ $agendamento->observacoes }}</td>
                            </tr>
                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Status:</td>
                                <td class="agendamento_td">{{ $agendamento->status == 1 ? "Pedente" : "Concluido/Cancelado" }}</td>
                            </tr>

                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Médico responsável:</td>
                                <td class="agendamento_td">{{ App\Profissional::find($agendamento->id_profissional)->nome ?? '' }}</td>
                            </tr>

                            <tr class="agendamento_tr">
                                <td class="agendamento_td">Convênio:</td>
                                <td class="agendamento_td">{{ App\Convenios::find($agendamento->id_convenio)->nome_convenio ?? 'Nenhum' }}</td>
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
