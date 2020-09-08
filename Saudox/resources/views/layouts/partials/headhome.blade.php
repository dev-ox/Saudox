<style>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap');

.welcome{
  margin-top: 100px;
  margin-left: 10px;
  width: 98.8%;
  height: 100px;
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  color: white;
  background-color: 424242;
}

.welcome-adm{
  margin-top: 100px;
  margin-left: 10px;
  width: 98.8%;
  height: 100px;
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  color: white;
  background-color: 424242;
}

h1 {
  text-align: center;
}

#txt {
  margin-top: 38px;
  margin-left: 90.6%;
  width: 9.2%;
  text-align: center;
  padding-top: 100px;
  height: 150px;
  border-style: solid;
  border-color: #FFCC33;
  color: white;
  background-color: #424242;
  font-size: 2.5vw;

}

.empresa{
  width: 15%;
  height: auto;
  margin-left: 2%;
  margin-top: -635px;
  border-radius: 50%;
}

.btn-adm{
  display: block;
  width: 160px;
  height: 40px;
  background: #1C2934;
  padding: 20px;
  color: white;
  font-size: 22px;
  text-decoration: none;
  text-align: center;
  border-color: green;
  border-style: solid;
}


.adm-bt{
  margin-top: -745px;
  margin-left: 45px;
}


.welcome-phone{
  text-align: center;
  border-style: solid;
  border-color: #FFCC33;
  color: white;
  background-color: #424242;
  margin-top: 80px;
  margin-left: 10px;
  max-width: 96%;
  font-size: 12px;
}


.adm-bt-phone{
  margin-left: 2%;
  margin-right: 5px;
  padding-bottom: 20px;
}

.btn-perfil-phone{
  display: block;
  width: 96%;
  height: auto;
  background: #1C2934;
  padding: 5px;
  color: white;
  font-size: 11px;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  margin-bottom: 10px;
}




</style>

<script type="text/javascript">
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// adicione um zero na frente de números<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout('startTime()',500);
}
function checkTime(i)
{
if (i<10)
{
i="0" + i;
}
return i;
}
</script>
