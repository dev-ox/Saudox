<h1>Página de visualização de perfil de paciente</h1>

{{$paciente->nome_paciente}}


<a href="{{ route('profissional.agendamento', $paciente->id) }}">Agendar pra esse paciente</a>
