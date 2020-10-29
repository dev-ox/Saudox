function atualizar_questionario() {

    //pega o container de onde fica o questionario
    let container_blocos_questionarios_ativo = document.getElementById("container_blocos_questionarios_ativo");

    //pra cada elemento que pode existir, remova ele
    Array.from(container_blocos_questionarios_ativo.children).forEach(
        (x) => x.remove()
    );

    let valor_seletor_questionario = document.getElementById("seletor_questionario").value;
    let div_questionario_selecionado = document.getElementById(valor_seletor_questionario).outerHTML;
    container_blocos_questionarios_ativo.innerHTML = div_questionario_selecionado;

}

document.getElementById("seletor_questionario").onchange = atualizar_questionario;
document.getElementById("seletor_questionario").value = "nenhum_bloco";
atualizar_questionario();
