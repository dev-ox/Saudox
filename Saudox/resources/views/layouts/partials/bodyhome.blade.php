<style>
@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');
body {
  background-color: #ffffff;
  color:#000000;
  font-family: 'Oswald', sans-serif;
  margin:0;
  padding:0;
  overflow:auto;
}

h3{
  position: center;

}

.desktop{
  margin-left: -8px;
}

.prox{
  width: 89%;
  height: 250px; /* Valor da Altura */
  margin-top: 5px;
  margin-left: 10px;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
}

.btn-paciente{
  display: block;
  width: 160px;
  height: 12%;
  background: #1C2934;
  padding: 5px;
  color: white;
  margin-left: 26%;
  margin-top: -1%;
  font-size: 20px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
}

.infosprox-nome{
  font-size: 23px;
  margin-left: 25.8%;
}

.infosprox-hora{
  font-size: 23px;
  margin-left: 40.7%;
  margin-top: -58px;
}

.infosprox-saida{
  font-size: 23px;
  margin-left: 61.8%;
  margin-top: -57px;
}

.infosprox-local{
  font-size: 23px;
  margin-left: 81.5%;
  margin-top: -57px;
}

.clien{
  text-align: center;
  font-size: 23px;
}

.tdclien{
  margin-left: 25.8%;
}

.tdclien-hora{
  margin-left: 40.7%;
  margin-top: -43px;
}

.tdclien-datasaida{
  margin-left: 61.8%;
  margin-top: -45px;
}

.tdclien-local{
  margin-left: 81.5%;
  margin-top: -45px;
}

.agenda{
  margin-left: 10px;
  width: 98.8%;
  height: 380px;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
  margin-top: 5px;

}

.corsim{
  background-color: gray;
  color: white;
  font-size: 18px;
  text-align: center;
  width: 20%;
  max-width: 20%;
}

.agnd{
  text-align: center;
  padding-top: 20px;

}

.ag{
  color: white;
}

.tag{
  text-align: center;
}

.table-wrapper{
  height: 250px;
  max-width: 130%;
  margin: 0px auto 0px auto;
  margin-left: 0.5%;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.search-label-agenda{
  font-size:2.2vw;
  transition: all 0.5s ease-in-out;
  float: left;
  margin-left: -45%;
  margin-top: -1%;

}

.search-agenda{
  border:0;
  border-bottom:1px solid white;
  background:transparent;
  width:55%;
  padding:8px 0 5px 0;
  font-size:16px;
  color: white;
  margin-left: -20%;
  margin-bottom: 5px;
}


.search-agenda-home{
  margin-top: 20px;
  margin-left: 47%;
  margin-bottom: 5px;
}

.bt-search-agenda{
  display: block;
  width: 100px;
  height: 20px;
  background: #1C2934;
  padding: 5px;
  padding-top: 5px;
  padding-bottom: 15px;
  color: white;
  font-size: 18px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  margin-top: -50px;
  margin-left: 44%;
}


.search-label-agenda-phone{
font-size: 2.3vw;

}

.search-agenda-phone{
  border-bottom:1px solid white;
  width:45%;
  height: 3%;
  padding:8px 0 5px 0;
  font-size:11px;
  color: black;
  margin-bottom: 5px;
}


.search-agenda-home-phone{
  margin-top: -10px;
  margin-left: -15%;
  margin-bottom: 5px;
  font-size: 12px;
}

.bt-search-agenda-phone{
  display: block;
  width: 12.8%;
  height: 20px;
  background: #1C2934;
  padding: 5px;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
  font-size: 12px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  margin-top: -42px;
  margin-left: 82.5%;
}

th{
  border: solid;
  border-color: #FFCC33;
  padding: 4px;
  font-size: 20px;
}


.prox-phone{
  margin-top: 5px;
  margin-left: 10px;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
  max-width: 96%;

}

.clien-phone{
  text-align: center;
}

.infosprox-phone {
  margin: 10px;
}

.info-phone-prox{
  text-align: left;
  margin-left: 10px;
}

.tdclien-phone{
  text-align: center;
  margin-top: -20px;
  margin-right: 10px;
  font-size: 10px;
}

.btn-paciente-phone{
  display: block;
  width: 100px;
  height: 40px;
  background: #1C2934;
  padding-top: 20px;
  color: white;
  font-size: 14px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  float: right;
  margin-right: 10px;
  margin-top: -100px;

}


.agenda-phone{
  text-align: center;
  margin-left: 10px;
  max-width: 96%;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
  margin-top: 5px;
}

.table-phone{
  margin-left: 5px;
  font-size: 8px;
}

.tag-phone{
  font-size: 8px;
}

.corsim-phone{
  background-color: gray;
  color: white;
  text-align: center;
}

.table-wrapper-phone{
  height: 200px;
  max-width: 96%;
  margin: 0px auto 0px auto;
  overflow: auto;
}


.profissionais-adm{
  margin-top: 10px;
  margin-left: 10px;
  width: 49%;
  height: 600px;
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  background-color: 424242;
  color: white;
}

.pacientes-adm{
  margin-top: -605px;
  margin-left: 50.5%;
  width: 49%;
  height: 600px;
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  background-color: 424242;
  color: white;
}

.corsim-adm{
  background-color: gray;
  color: white;
  font-size: 18px;
  text-align: center;
  max-width: 80%;
  width: 80%;
}

.list-adm{
  margin: 100px;
}

.tag-adm{
  width: 200px;
  color: white;
  border: solid;
  border-color: #FFCC33;
  padding: 4px;
  font-size: 20px;
}


.bt-acao-adm-editar{
  display: block;
  width: 80px;
  height: 30px;
  background: #1C2934;
  padding: 5px;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
  font-size: 18px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;

}

.bt-acao-adm-remover{
  display: block;
  width: 80px;
  height: 30px;
  background: #1C2934;
  padding: 5px;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
  font-size: 20px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
}

.table-wrapper-adm{
  height: 400px;
  width: 80%;
  margin: 0px auto 0px auto;
  margin-left: 10%;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.table-wrapper::-webkit-scrollbar {
  display: none;
}

.table-wrapper-adm::-webkit-scrollbar {
  display: none;
}

.bt-new-adm {
  display: block;
  width: 20%;
  height: 50px;
  background: #1C2934;
  padding: 5px;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
  font-size: 1.2vw;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  margin-left: -10%;
  margin-top: 40px;
}


.search-part{
  margin-top: -6%;
}

.search-label{
  font-size:16px;
  transition: all 0.5s ease-in-out;
  float: left;
  margin-left: 16%;
  margin-top: 1%;

}

.search{
  border:0;
  border-bottom:1px solid white;
  background:transparent;
  width: 25%;
  padding:8px 0 5px 0;
  font-size:16px;
  color: white;
  margin-left: -35%;
  margin-bottom: 5px;
}


.adm-page{
  margin-top: -37px;
  margin-left: 20%;
  margin-bottom: 5px;
}

.bt-search{
  display: block;
  width: 50px;
  height: 20px;
  background: #1C2934;
  padding: 5px;
  padding-top: 5px;
  padding-bottom: 15px;
  color: white;
  font-size: 18px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  margin-top: -50px;
  margin-left: 70%;
}

.profissionais-adm-phone{
  margin-top: 5px;
  margin-left: 10px;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
  max-width: 96%;
  height: 60%;
  text-align: center;
}

.bt-new-adm-phone{
  display: block;
  width: 65px;
  height: 40px;
  background: #1C2934;
  padding: 5px;
  color: white;
  font-size: 12px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  margin-left: 5%;
  margin-bottom: 15px;
}

.adm-page-phone{
  margin-top: -43px;
  margin-left: 5%;
  margin-bottom: 5px;
  font-size: 12px;
}

.search-phone{
  border-bottom:1px solid white;
  width:45%;
  height: 4%;
  padding:8px 0 5px 0;
  font-size:11px;
  color: black;
  margin-bottom: 5px;
}

.search-label-phone{
  font-size: 2.3vw;
}

.bt-search-phone{
  display: block;
  width: 30px;
  height: 20px;
  background: #1C2934;
  padding: 5px;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
  font-size: 12px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
  margin-top: -42px;
  margin-left: 85.2%;
}

.table-wrapper-adm-phone{
  height: 60%;
  width: 90%;
  max-width: 90%;
  margin: 0px auto 0px auto;
  margin-left: 5%;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.pacientes-adm-phone{
  margin-top: 5px;
  margin-left: 10px;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
  max-width: 96%;
  height: 60%;
  text-align: center;
}

.table-wrapper-phone::-webkit-scrollbar {
  display: none;
}

.table-wrapper-adm-phone::-webkit-scrollbar {
  display: none;
}

.perfil-prof{
  width: 1215px;
  height: 600px; /* Valor da Altura */
  margin-top: 100px;
  margin-left: 200px;
  color: white;
  background-color: #424242;
  border-style: solid;
  border-color: #FFCC33;
}

.pessoal{
  text-align: center;
  color: white;
  margin-left: -100px;
}

.marker-label{
  margin-left: 100px;
  color: #FFCC33;
}

.lbinfo-static{
  margin-left: 100px;
  font-size: 20px;
}

.lbinfo-static-extra{
  font-size: 20px;
  margin-left: 160px;
}

.lbinfo-ntstatic{
    font-size: 20px;
    margin-left: 10px;
}


.profissoes-table{
  color: white;
  font-size: 20px;
  margin-left: 100px;
}

.profissoes-table-wrapper{
  height: 100px;
  width: 350px;
  max-width: 400px;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.profissoes-table-wrapper::-webkit-scrollbar {
  display: none;
}

.descricao{
  height: 100px;
  width: 600px;
  margin-left: 500px;
  margin-top: -160px;
}

.descricao-wrapper{
  max-width: 500px;
  max-height: 150px;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.descricao-wrapper::-webkit-scrollbar {
  display: none;
}

.marker-label-phone{
  color: #FFCC33;
}

.perfil-prof-phone{
  margin-top: 80px;
  margin-left: 7px;
  color: white;
  background-color: 424242;
  border-style: solid;
  border-color: #FFCC33;
  max-width: 96%;
  height: 135%;
}

.info-pessoal-phone{
  margin-left: 5px;
}

.info-pessoal-phone-prof{
  margin-left: 20px;
}

.lbinfo-static-phone{
  margin-top: -10px;
  font-size: 10px;
}

.lbinfo-ntstatic-phone{
  margin-top: -10px;
  font-size: 10px;
}

.incomplete-phone{
  margin-top: 40px;
}

.complete-phone{
  margin-left: 40%;
  margin-top: -164px;
}

.contato-phone{
  margin-left: 20px;
}

.complete-phone-contato{
  margin-left: 40%;
  margin-top: -75px;
}

.profissoes-phone{
  margin-left: 20px;

}

.profissoes-table-phone{
  color: white;
  font-size: 12px;

}

.profissoes-table-wrapper-phone{
  height: 10%;
  width: 50%;
  max-width: 50%;
  margin-top: -3%;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.profissoes-table-wrapper-phone::-webkit-scrollbar {
  display: none;
}

.tbcell-profissoes-phone{
  font-weight: 200px;
}

.center-phone{
  margin-left: 10%;
}

.descricao-phone{
  margin-left: 20px;
}

.descricao-wrapper-phone{
  max-width: 80%;
  max-height: 150px;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.descricao-wrapper-phone::-webkit-scrollbar {
  display: none;
}

.hidden{
    display: none;
}

#crianca_sabe_se_adotivo{
    display: none;
}

#reacao_quando_descobriu_se_adotivo{
    display: none;
}

#vive_com_quem_caso_pais_divorciados{
 display: none;
}

#reacao_sobre_a_relacao_pais_caso_divorciados {
  display: none;
}

.command_hidden_extra:checked ~ #reacao_quando_descobriu_se_adotivo{
    display: block;
}

.command_hidden:checked ~ .hidden,
.command_hidden:checked ~ #vive_com_quem_caso_pais_divorciados,
.command_hidden:checked ~ #reacao_sobre_a_relacao_pais_caso_divorciados{
  display: block;
}

</style>
