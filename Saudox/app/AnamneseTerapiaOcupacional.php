<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamneseTerapiaOcupacional extends Model
{
      protected $table = 'anamnese__terapia__ocupacionals';
      
      /**
       * The attributes that should be cast.
       *
       * @var array
       */
      protected $casts = [
          'id_pode_ver' => 'array',
          'id_pode_editar' => 'array',
      ];


      /* TODO: Lembrar disso quando for criar/editar */
      /* Pra setar o acesso:
       * $arr é um array com os ids dos pacientes que podem ver;
       * $anamnese->id_pode_ver["paciente"] = json_encode($arr);
       * Pra verificar o acesso:
       * $arr = json_decode($anamnese->id_pode_ver["paciente"]);
       * E mesma coisa pra id_pode_editar.
       */
}
