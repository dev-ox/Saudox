<style>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap');

.welcome{
  margin-top: 100px;
  margin-left: 10px;
  width: 1515px;
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
  margin-left: 1370px;
  width: 140px;
  text-align: center;
  padding-top: 100px;
  height: 150px;
  border-style: solid;
  border-color: #FFCC33;
  color: white;
  background-color: 424242;

}

.empresa{
  width:200px;
  height: 200px;
  margin-left: 50px;
  margin-top: -425px;
  border-radius: 50%;
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
