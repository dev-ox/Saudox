<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvolucaoPsicologica extends Model {
    protected $table = 'evolucao_psicologicas';
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id_pode_ver' => 'array',
        'id_pode_editar' => 'array',
    ];


  public $fillable = [
            'id_paciente',
            'id_profissional',
            'texto',
            'data_evolucao',
            'tipo_atendimento',
    ];


    public static $regras_validacao = [
            'id_paciente' => 'required|numeric|exists:pacientes,id',
            'id_profissional' => 'required|numeric|exists:profissionals,id',
            'texto' => 'required',
            'tipo_atendimento' => 'required',
            'dia_evolucao' => 'required',
            'hora_evolucao' => 'required',
    ];

    public static $regras_validacao_editar = [
            'id_paciente' => 'required|numeric|exists:pacientes,id',
            'id_profissional' => 'required|numeric|exists:profissionals,id',
            'id_evolucao' => 'required|numeric|exists:evolucao_psicologicas,id',
            'texto' => 'required',
            'tipo_atendimento' => 'required',
            'dia_evolucao' => 'required',
            'hora_evolucao' => 'required',
    ];



    /* TODO: Lembrar disso quando for criar/editar */
    /* Pra setar o acesso:
     * $arr é um array com os ids dos pacientes que podem ver;
     * $avaliacao->id_pode_ver["paciente"] = json_encode($arr);
     * Pra verificar o acesso:
     * $arr = json_decode($avaliacao->id_pode_ver["paciente"]);
     * E mesma coisa pra id_pode_editar.
     */

    public function paciente() {
        return $this->belongsTo('App\Paciente', 'id_paciente');
    }

    public function profissional() {
        return $this->belongsTo('App\Profissional', 'id_profissional');
    }
}
