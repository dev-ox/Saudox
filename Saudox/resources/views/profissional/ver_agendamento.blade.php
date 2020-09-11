@include('layouts.layoutperfil')
@include('layouts.form_css')



<style>
.caixa {
    border: 2px solid #FFCC33;
    width: 85%;
    margin: auto;
    color: white;
    background: #424242;
    text-align: center;
}

.caixa a {
    text-decoration: none;
    color: white;
}

#conteudo_agendamento {
    text-align: left;
    width: 80%;
    margin: auto;
}

.agendamento_td {
    color: white;
    margin-bottom: 2px;
    padding: 10px;
}

.agendamento_tr {
    border: 1px solid black;
}


</style>

<div class="desktop">
    <div class="espacador_mesma_altura_top_nav"></div>
    <div style="text-align: center;">


        <div class="caixa">
            <h1>Agendamento</h1>
            <a style="margin: auto; height: auto;" class="bt-acao-adm-editar" href="{{ route('profissional.agendamento.marcar_concluida', $agendamento->id) }}">Marcar como concluida</a>
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

                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Pega a altura do topnav e coloca como a altura do espaçador, pra o topnav não ficar em cima do resto da pagina.
    document.getElementsByClassName("espacador_mesma_altura_top_nav")[0].style.height = document.getElementsByClassName("topnav")[0].getBoundingClientRect().height * 1.5;

// Desabilida o scroll do mouse nos input de tipo number
document.addEventListener("wheel", function(event){
    if(document.activeElement.type === "number" &&
        document.activeElement.classList.contains("noscroll"))
    {
        document.activeElement.blur();
    }
});

</script>
