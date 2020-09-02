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
  width: 1360px;
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
  height: 40px;
  background: #1C2934;
  padding: 5px;
  color: white;
  margin-left: 350px;
  margin-top: -10px;
  font-size: 20px;
  text-decoration: none;
  text-align: center;
  border-color: #FFCC33;
  border-style: solid;
}

.infosprox{
  margin: -200px;
  font-size: 23px;
  margin-left: 350px;
}

.clien{
  text-align: center;
  margin-left: 150px;
  font-size: 23px;
}

.tdclien{
  margin-left: 350px;
}

.tdclien-hora{
  margin-left: 555px;
  margin-top: -43px;
}

.tdclien-datasaida{
  margin-left: 838px;
  margin-top: -45px;
}

.tdclien-local{
  margin-left: 1107px;
  margin-top: -45px;
}

.agenda{
  margin-left: 10px;
  width: 1515px;
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
  width: 300px;
  max-width: 300px;
}

.corsim:before {
  content: '';
  top: 0;
  left: 0;
  right: 50%;
  bottom: 0;
  background: red;
}

.agnd{
  text-align: center;
  padding-top: 20px;

}

.ag{
  margin-left: 200px;
  color: white;
}

.tag{
  text-align: center;
}

.table-wrapper{
  height: 250px;
  width: 1700px;
  margin: 0px auto 0px auto;
  overflow: auto;
  margin-left: -190px;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.search-label-agenda{
	font-size:30px;
	transition: all 0.5s ease-in-out;
  margin-left:0px;;
  float: left;
  margin-left: -370px;
  margin-top: -10px;

}

.search-agenda{
  border:0;
  border-bottom:1px solid white;
  background:transparent;
  width:70%;
  padding:8px 0 5px 0;
  font-size:16px;
  color: white;
  margin-left: -190px;
  margin-bottom: 5px;
}


.search-agenda-home{
  margin-top: 20px;
  margin-left: 700px;
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
  margin-left: 407px;
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
  width: 750px;
  height: 600px;
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  background-color: 424242;
  color: white;
}

.pacientes-adm{
  margin-top: -605px;
  margin-left: 775px;
  width: 750px;
  height: 600px;
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  background-color: 424242;
  color: white;
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
  width: 500px;
  max-width: 500px;
  margin: 0px auto 0px auto;
  margin-left: 125px;
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
  width: 150px;
  height: 50px;
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
  margin-left: 127px;
  margin-bottom: 5px;
}

.search-label{
	font-size:16px;
	transition: all 0.5s ease-in-out;
  float: left;
  margin-left: 150px;

}

.search{
  border:0;
  border-bottom:1px solid white;
  background:transparent;
  width:130px;
  padding:8px 0 5px 0;
  font-size:16px;
  color: white;
  margin-left: -190px;
  margin-bottom: 5px;
}


.adm-page{
  margin-top: -37px;
  margin-left: 150px;
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
  margin-left: 407px;
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



</style>
