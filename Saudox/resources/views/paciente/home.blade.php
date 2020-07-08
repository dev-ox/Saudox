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

    /* TODO: Mudar os links de teste para a pagina de exibição de fato depois
     * que fizer a pagina de exibição
     */

    if($ava_fono) {
        echo "<a href='/paciente/avaliacao/fonoaudiologia/teste'>Avaliação Fonoaudiologica</a><br>";
    }

    if($ava_judo) {
        echo "<a href='/paciente/avaliacao/judo/teste'>Avaliação Judo</a><br>";
    }

    if($ava_neur) {
        echo "<a href='/paciente/avaliacao/neuropsicologia/teste'>Avaliação Neuropsicologica</a><br>";
    }

    if($ava_tocp) {
        echo "<a href='/paciente/avaliacao/terapia_ocupacional/teste'>Avaliação Terapia Ocupacional</a><br>";
    }

?>

<a href="/paciente/evolucao">Evolução</a><br>
<a href="/paciente/anamnese">Anamnese</a><br>

@if(Auth::guard('paciente')->check())
    <a href="/logout">Deslogar</a>
@endif
