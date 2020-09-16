<h1>Busca</h1>

<form action="{{route('profissional.buscar')}}" method="get">
    <input type="hidden" id="buscou" name="buscou" value="true">

    <label for="tipo_user">Paciente</label>
    <input type="radio" id="tipo_user" name="tipo_user" value="paciente" checked>
    <label for="tipo_user">Profissional</label>
    <input type="radio" id="tipo_user" name="tipo_user" value="profissional">
    <br>
    <label for="tipo_busca">Nome</label>
    <input type="radio" id="tipo_busca" name="tipo_busca" value="nome" checked>
    <label for="tipo_busca">CPF</label>
    <input type="radio" id="tipo_busca" name="tipo_busca" value="cpf">
    <br>
    <label for="info">Informe o que deseja buscar:</label><br>
    <input type="text" id="info" name="info"><br>

    <input type="submit" value="Submit">
</form>

@if($buscou)
    <h3>Você buscou por {{$tipo_user}}, com {{$tipo_busca}} similar a {{$info}}</h3>
    @if($tipo_user == 'paciente')
        @if(count($pacientes) > 0)
            @foreach ($pacientes as $pac)
                {{$pac->nome_paciente}}
                <br>
            @endforeach
        @else
            <h4>Nenhum paciente encontrado!</h4>
        @endif
    @else
        @if (count($profissionais) > 0)
            @foreach ($profissionais as $prof)
                {{$prof->nome}}
                <br>
            @endforeach
        @else
            <h4>Nenhum profissional encontrado!</h4>
        @endif
    @endif
@endif
