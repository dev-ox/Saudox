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


@if(Auth::guard('paciente')->check())
	<a href="/logout">Deslogar</a>
@endif
