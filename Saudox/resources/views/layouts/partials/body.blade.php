
<style>
@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');
body {
 background-color: #ffffff;
	color:#000000;
  font-family: 'Noto Sans', sans-serif;
  margin:0;
  padding:0;
  overflow:auto;
}

.card-header {
  margin-top: 70px; /* Metade da valor da Altura */
  text-align: center;
  font-weight: bold;
  font-size: 24px;
}

.card-body {
  background-color: #fefefe;
  position: relative;
  margin: auto;
  margin-top: 70px; /* Metade da valor da Altura */
  width: 500px;
  height:600px; /* Valor da Altura */
  padding: 20px;
  border-style: solid;
  border-color: #FFCC33;
}

.row-extra {
  margin-left: 20px;
}

.md-8-offset-md-4 {
  left:50%;
  top:50%;
  margin-left:-95px; /* Metade do valor da Largura */
  margin-top:200px; /* Metade da valor da Altura */
  position:absolute;
  width:400px; /* Valor da Largura */
  height:300px; /* Valor da Altura */
}

.btn-primary-register{
  background-color:#1C2934;
  outline: none;
  border: 0;
  color: #fff;
  padding:10px 20px;
  text-transform:uppercase;
  border-radius:2px;
  cursor:pointer;
  margin-top: 50px;
  margin-left: 160px;
  position: relative;
  text-transform:uppercase;
  font-size: 20px;
  display: block;
  font-weight: bold;

}

form{
    margin-top: 100px;
}

.form-group{
  margin: 25px;
  position: sticky;
}

.form-group label{
	font-size:18px;
  pointer-event:none;
	transition: all 0.5s ease-in-out;
}

.form-group input{
  border:0;
  border-bottom:1px solid #555;
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fefefe;
}

.form-group input:focus{
 border:none;
 outline:none;
 border-bottom:1px solid #e74c3c;
}

.form-group input:focus ~ label,
.form-group input:valid ~ label{
	top:-12px;
	font-size:12px;

}

.btn-primary{
	background-color:#1C2934;
	outline: none;
  border: 0;
  color: #fff;
	padding:10px 20px;
	text-transform:uppercase;
	border-radius:2px;
	cursor:pointer;
  margin-top: -100px;
  margin-left: 40px;
  position: relative;
  text-transform:uppercase;
  font-size: 20px;
  display: block;
  font-weight: bold;
}

</style>
