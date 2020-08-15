<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Paciente extends Authenticatable {
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function evolucaoFonoaudiologias() {
        return $this->hasMany('App\EvolucaoFonoaudiologia', 'id_paciente');
    }

    public function evolucaoJudos() {
        return $this->hasMany('App\EvolucaoJudo', 'id_paciente');
    }

    public function evolucaoPsicologicas() {
        return $this->hasMany('App\EvolucaoPsicologica', 'id_paciente');
    }

    public function evolucaoTerapiaOcupacionals() {
        return $this->hasMany('App\EvolucaoTerapiaOcupacional', 'id_paciente');
    }


    public function anamneseTerapiaOcupacionals() {
        return $this->hasOne('App\AnamneseTerapiaOcupacional', 'id_paciente');
    }

    public function anamneseFonoaudiologias() {
        return $this->hasOne('App\AnamneseFonoaudiologia', 'id_paciente');
    }

    /*
     * Essa função de anamneseGigantePsicopedaNeuroPsicomotos só pode ser chamada usando () no final
     * Se for chamada sem () vai dar erro
     * Certo: $user->anamneseGigantePsicopedaNeuroPsicomotos();
     * Errado: $user->anamneseGigantePsicopedaNeuroPsicomotos;
     */
    public function anamneseGigantePsicopedaNeuroPsicomotos() {
        return \App\AnamneseGigantePsicopedaNeuroPsicomoto::pegarPorIdPaciente($this->id);
    }

    public function avaliacaoFono() {
        return $this->hasOne('App\AvaliacaoFonoaudiologia', 'id_paciente');
    }

    public function avaliacaoJudo() {
        return $this->hasOne('App\AvaliacaoJudo', 'id_paciente');
    }

    public function avaliacaoNeuro() {
        return $this->hasOne('App\AvaliacaoNeuropsicologica', 'id_paciente');
    }

    public function avaliacaoTerapiaOcupacional() {
        return $this->hasOne('App\AvaliacaoTerapiaOcupacional', 'id_paciente');
    }


}
