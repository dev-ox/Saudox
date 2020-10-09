//<li style="color: black;">&#11044;</li>
let div_count_pags = document.getElementById("pontos_pags");
let paginas = document.getElementsByClassName("pag_form");
let idx = 0;


function setar_pontos() {
    for(let pagina of paginas) {
        div_count_pags.innerHTML += "<a onclick='pular_pra_pag(this)' class='ponto_pag_link'><li class='ponto_pag ponto_inativo'>&#11044;</li></a>";
        pagina.classList.remove("pag_form_ativa");
    }
}


setar_pontos();
let pontos = document.getElementsByClassName("ponto_pag");

function check_idx() {
    if(idx < 0) { idx = 0; }
    if(idx >= paginas.length) { idx = paginas.length - 1; }
}

function limpar_pags_form() {

    div_count_pags.innerHTML = "";
    setar_pontos();
    //setar os pontos dnv pq todos foram deletados
    pontos = document.getElementsByClassName("ponto_pag");

}


function setar_pag_correta() {
    pontos[idx].classList.add("ponto_ativo");
    paginas[idx].classList.add("pag_form_ativa");
}



function processar_pag() {
    check_idx();
    limpar_pags_form();
    setar_pag_correta();
    $("html, body").animate({ scrollTop: 0 }, "fast");
}


function form_ante_pag() {
    idx--;
    processar_pag();
}

function form_prox_pag() {
    idx++;
    processar_pag();
}



function pular_pra_pag(link) {

    let idx_t = 0;

    for(let pontos_links of div_count_pags.children) {
        if(pontos_links === link) {
            idx = idx_t;
            processar_pag();
            return;
        } else {

            idx_t++;
        }
    }

}




//praticamente o main
setar_pag_correta();
