<style>

.welcome{
  margin-top: 100px;
  margin-left: 10px;
  background-color: #d3d3d3;
  width: 400px;
  height: 50px;
  text-align: center;
}

#txt {
  margin-top: -65px;
  margin-left: 410px;
  background-color: #d3d3d3;
  width: 140px;
  text-align: center;
  height: 50px;

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
