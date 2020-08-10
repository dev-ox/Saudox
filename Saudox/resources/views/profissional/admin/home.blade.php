<h1>
    Essa é a tela do Admin!
</h1>

<h3>Profissionais:</h3>
<?php
foreach($profissionais as $pro){
    echo("<a href=\"".route('profissional.ver', ['id' => $pro->id])."\">".$pro->nome."</a><br>");
}
?>

<h3>Pacientes:</h3>
<?php
foreach($pacientes as $pac){
    echo($pac->nome_paciente."<br>");
}
?>


