<h1>Aloooo deve ser paciente</h1>
<h2>Paciente:
<?php
if(Auth::guard('paciente')->check() == 1) {
    echo("Sou Paciente");
} else {
    echo("Não sou Paciente");
}
?>
</h2>
<h2>Profissional:
<?php
if(Auth::guard('profissional')->check() == 1) {
    echo("Sou Profissional");
} else {
    echo("Não sou Profissional");
}
?>
</h2>

<?php

    $paciente = \App\Paciente::find(Auth::id());


    // Se não tiver a avaliação vai ser nulo
    $ava_fono = $paciente->avaliacao_fono;
    $ava_judo = $paciente->avaliacao_judo;
    $ava_neur = $paciente->avaliacao_neuro;
    $ava_tocp = $paciente->avaliacao_terapia_ocupacional;

    if($ava_fono) {
        echo "<a href='/paciente/avaliacao/fonoaudiologia/ver'>Avaliação Fonoaudiologica</a><br>";
    }

    if($ava_judo) {
        echo "<a href='/paciente/avaliacao/judo/ver'>Avaliação Judo</a><br>";
    }

    if($ava_neur) {
        echo "<a href='/paciente/avaliacao/neuropsicologia/ver'>Avaliação Neuropsicologica</a><br>";
    }

    if($ava_tocp) {
        echo "<a href='/paciente/avaliacao/terapia_ocupacional/ver'>Avaliação Terapia Ocupacional</a><br>";
    }

?>

<a href="/paciente/evolucao">Evolução</a><br>
<a href="/paciente/anamnese">Anamnese</a><br>

@if(Auth::guard('paciente')->check())
    <a href="/logout">Deslogar</a>
@endif
