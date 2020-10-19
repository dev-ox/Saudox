function add_linha_na_tabela(btn_add_da_tabela) {

    //pega o elemento table
    let table = btn_add_da_tabela.parentNode.parentNode.parentNode.parentNode;

    let textareas = Array.from(table.querySelectorAll("textarea"));

    textareas.forEach(textarea => {
        textarea.innerHTML = textarea.value;
    });

    //pega a lista do trs dentro do table
    let trs = Array.from(table.tBodies[0].childNodes).filter(linha => linha.nodeType === 1);

    //o array começa em 0, então o tamanho é o proximo indice
    let prox_idx = trs.length;

    //pega o codigo da linha da tabela
    let tr_modelo = trs[trs.length - 1].outerHTML;

    let str_idx_novo = `[${prox_idx}]`;
    let tr_idx_novo = tr_modelo.replaceAll("[0]", str_idx_novo);

    //remove o que já se tinha escrito dos novos textarea
    tr_idx_novo = (tr_idx_novo.replaceAll(/]\">.*<\/textarea/g, "]\"><\/textarea"));

    //injeta o html novo na tabela
    table.tBodies[0].innerHTML += tr_idx_novo;

}


function remover_linha(a_do_td_da_linha_que_quer_ser_removida) {
    let td = a_do_td_da_linha_que_quer_ser_removida.parentNode;
    let tr = td.parentNode;

    if(tr.parentElement.childElementCount === 1) {
        return;
    }

    tr.remove();
}
