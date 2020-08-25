 @include('layouts.layoutperfil')

<head>
  <div class="welcome">
    <h1>Bem vindo! {{$profissional->nome}} </h1>
    <body onload="startTime()">
      <h1 id="txt"></h1>
    </body>
  </div>
</head>

<body>
  <div class="container">
    <div class="prox">
      <h3> Próximo Cliente: </h3>

      <td>
      <?php
      print($agenda[0]->nome);
      ?>
      </td>
      <td>
      <?php
      print($agenda[0]->data_entrada)
      ?>
      </td>

    </div>
  </div>
</body>


<!--
<h3>
<?php
    echo("Profissões: ");
    foreach($profissoes as $p){
        echo($p."\n");
    }
?>
</h3>
-->

<div class="agenda">
<h3 class="agnd">Agenda:</h3>
@if (count($agenda) > 0)
    <table class="ag table"><thead>
      <tr class="ag  table-row">
         <th>Paciente</th>
         <th>Hora Entrada</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($agenda as $ag)
        <tr class="corsim">
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
</div>
