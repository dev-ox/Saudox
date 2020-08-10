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

<h3>
<?php
    echo("Profissões:");
    foreach($profissoes as $p){
        echo($p."\n");
    }
?>
</h3>


@if(Auth::guard('profissional')->check())
	<a href="/profissional/logout">Deslogar</a>
@endif
