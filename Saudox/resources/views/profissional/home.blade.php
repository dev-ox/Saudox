<h1>Home de: {{$profissional->nome}}</h1>

<h3>
<?php
    echo("Profissões: ");
    foreach($profissoes as $p){
        echo($p."\n");
    }
?>
</h3>


<h3>Agenda:</h3>
@if (count($agenda) > 0)
    <table><thead>
      <tr>
         <th>Paciente</th>
         <th>Hora Entrada</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($agenda as $ag)
        <tr>
            <td>
                {{$ag->nome}}
            </td>
            <td>
                {{$ag->data_entrada}}
            </td>
        </tr>
    @endforeach
    </tbody></table>
@else
    <p>Você não possui nenhum agendamento</p>
@endif


@if(Auth::guard('profissional')->check())
    <a href="/profissional/logout">Deslogar</a>
@endif
