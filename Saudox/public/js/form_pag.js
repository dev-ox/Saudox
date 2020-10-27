//Pega o div que é o container dos pontos/links de cada pagina
let div_count_pags = document.getElementById("pontos_pags");

//Pega um array dos divs que serão paginas
let paginas = document.getElementsByClassName("pag_form");

//Indice da pagina que está sendo mostrada
let idx = 0;


//Função que preenche o container dos pontos com o mesmo numero de paginas
function setar_pontos() {
    for(let pagina of paginas) {
        div_count_pags.innerHTML += "<a onclick='pular_pra_pag(this)' class='ponto_pag_link'><li class='ponto_pag ponto_inativo'>&#11044;</li></a>";

        //Aproveita o mesmo loop pra remover a classe de pagina ativa, já que essa função é chamada na primeira vez, ou toda vez que muda de pagina
        pagina.classList.remove("pag_form_ativa");
    }
}


//Preenche os pontos/links das paginas, já tendo as lista de paginas
setar_pontos();

//Pega um array com todos pontos/links pras paginas
let pontos = document.getElementsByClassName("ponto_pag");


//Função que não deixa o indice da paginas apontar para uma pagina que não existe
function check_idx() {
    if(idx < 0) { idx = 0; }
    if(idx >= paginas.length) { idx = paginas.length - 1; }
}


//Função que remove todos os pontos/links para paginas, e coloca eles denovo
//mas pq? consistencia, é normal o navegador bugar e ficar 2 links(pontos) ativos ao mesmo tempo
//ai isso garante ser exibido melhor, ou causa um problema maior que mostra que a pagina precisa de um f5
function limpar_pags_form() {

    //apaga todos os pontos
    div_count_pags.innerHTML = "";

    //cria eles de novo
    setar_pontos();

    //setar os pontos dnv pq todos foram deletados
    pontos = document.getElementsByClassName("ponto_pag");

}


function setar_pag_correta() {
    //mudar a cor do ponto adicionando a classe
    pontos.item(idx).classList.add("ponto_ativo");

    //exibir a pagina (até aqui não tem pagina nenhuma sendo mostrada pq removeu a classe na funcao setar_pontos())
    paginas.item(idx).classList.add("pag_form_ativa");
}


//Funcao que processa a pagina que vao ser exibida independente se clicou pra proxima pagina ou pra anterior
function processar_pag() {

    //verifica se foi pra uma pagina valida
    check_idx();

    //remove os pontos, esconde todas as paginas e coloca os pontos denovo
    limpar_pags_form();

    //exibe a pagina correta e muda a cor do ponto da pagina atual
    setar_pag_correta();

    //mudou de pagina, então da um scroll pro topo da pagina
    $("html, body").animate({ scrollTop: 0 }, "fast");
}


//Pra essas duas seguintes acho que não precisa

function form_ante_pag() {
    idx--;
    processar_pag();
}

function form_prox_pag() {
    idx++;
    processar_pag();
}



//Clicou em um ponto/link de pagina
//O parametro da função em o proprio ponto
function pular_pra_pag(link) {

    //pagina alvo
    let idx_t = 0;

    //verificar todos os pontos buscando o que veio no parametro
    for(let pontos_links of div_count_pags.children) {
        if(pontos_links === link) {
            //achou o alvo

            //o indice da pagina que vai ser exibida (como os pontos são atualizador o tempo todo, sempre está ordenado na mesma ordem das paginas)
            idx = idx_t;

            //processamento de mudança de pagina
            processar_pag();

            //não tem mais o que fazer nada nessa função
            return;
        } else {
            //proximo ponto (procurando o alvo)
            idx_t++;
        }
    }

}




//praticamente o main (exibe a pagina indicada por idx, nesse caso a primeira (0))
setar_pag_correta();
