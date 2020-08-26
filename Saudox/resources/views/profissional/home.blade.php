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
      <h3 class="clien"> Próximo Cliente: </h3>
      <label class="infosprox"> Nome: </label>
      <label class="infosprox"> Hora de Entrada: </label>
      <label class="infosprox"> Hora de Saída: </label>
      <label class="infosprox"> Local de atendimento: </label>
      <h4 class="tdclien">
      <?php
      print($agenda[0]->nome);
      ?>
    </h4>

      <h4 class="tdclien-hora">
      <?php
      print($agenda[0]->data_entrada)
      ?>
    </h4>

    <h4 class="tdclien-datasaida">
    <?php
    print($agenda[0]->data_saida)
    ?>
  </h4>

  <h4 class="tdclien-local">
  <?php
    print($agenda[0]->local_de_atendimento)
  ?>
  </h4>
    <div class="btpc">
    @if($prox_paciente)
      <a class="btn-paciente" href=<?php route('paciente.perfil', ['id' => $prox_paciente->id]) ?>> Ver perfil </a>
    @else
      <a class="btn-paciente"  href=<?php route('register') ?>> Registrar Cliente  </a>
    @endif
    </div>

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
<div class="table-wrapper">
    <table class="ag table">
    <thead>
      <tr class="ag  table-row">
         <th class="tag">Paciente:</th>
         <th class="tag">Hora Entrada:</th>
         <th class="tag">Hora Saída:</th>
         <th class="tag">Local do atendimento:</th>
         <th class="tag">Tipo da Recorrência:</th>
         <th class="tag">Recorrência do Agendamento:</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($agenda as $ag)
        <tr>
            <td class="corsim"> {{$ag->nome}} </td>
            <td class="corsim"> {{$ag->data_entrada}} </td>
            <td class="corsim"> {{$ag->data_saida}} </td>
            <td class="corsim"> {{$ag->local_de_atendimento}} </td>
            <td class="corsim"> {{$ag->tipo_da_recorrencia}} </td>
            <td class="corsim"> {{$ag->recorrencia_do_agendamento}} </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
    @else
            <p>Você não possui nenhum agendamento</p>
    @endif
</div>

<div class="logo-image">
      <img class="empresa" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
</div>
