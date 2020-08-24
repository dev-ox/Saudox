
@include('layouts.layoutperfil')


<body>
  <div class="container">



  </div>
</body>





<h1>Aloooo deve ser profissional</h1>
<h2>Paciente?
<?php
    if(Auth::guard('paciente')->check() == 1) {
        echo("Sou Paciente");
    } else {
        echo("Não sou Paciente");
    }
?>
</h2>
<h2>Profissional:?
<?php
    if(Auth::guard('profissional')->check() == 1) {
        echo("Sou Profissional");
    } else {
        echo("Não sou Profissional");
    }
?>
</h2>

<?php $user = Auth::user(); ?>
<?php echo($user);?>

<h3>
<?php
    echo("Profissões:");
    foreach($profissoes as $p){
        echo($p."\n");
    }
?>
</h3>

@foreach ($pacientes as $paciente)
    <a href="{{ route('profissional.ver_paciente', $paciente->id) }}">Ver paciente {{ $paciente->nome_paciente }}</a><br>
@endforeach


@if(Auth::guard('profissional')->check())
    <a href="/profissional/logout">Deslogar</a>
@endif
