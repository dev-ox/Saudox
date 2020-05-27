<h1>Aloooo tu é profissional</h1>
<h2>Paciente?
<?php
	Auth::guard('paciente')->check()
?>
</h2>
<h2>Profissional:?
<?php
	Auth::guard('profissional')->check()
?>
</h2>
