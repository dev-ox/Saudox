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

    public function evolucao_foneaudiologias() {
        return $this->hasMany('App\Evolucao_foneaudiologia', 'id_paciente');
    }

    public function evolucao_judos() {
        return $this->hasMany('App\EvolucaoJudo', 'id_paciente');
    }

    public function evolucao_psicologicas() {
        return $this->hasMany('App\EvolucaoPsicologica', 'id_paciente');
    }

    public function evolucao_terapia_ocupacionals() {
        return $this->hasMany('App\EvolucaoTerapiaOcupacional', 'id_paciente');
    }


    public function anamnese__terapia__ocupacionals() {
        return $this->hasOne('App\AnamneseTerapiaOcupacional', 'id_paciente');
    }

    public function anamnese_fonoaudiologias() {
        return $this->hasOne('App\AnamneseFonoaudiologia', 'id_paciente');
    }

    /*
     * Essa função de anamnese__psicopeda__neuro__psicomotos só pode ser chamada usando () no final
     * Se for chamada sem () vai dar erro
     * Certo: $user->anamnese__psicopeda__neuro__psicomotos();
     * Errado: $user->anamnese__psicopeda__neuro__psicomotos;
     */
    public function anamnese__psicopeda__neuro__psicomotos() {
        return \App\AnamneseGigantePsicopedaNeuroPsicomoto::pegar_por_id_paciente($this->id);
    }

    public function avaliacao_fono() {
        return $this->hasOne('App\AvaliacaoFonoaudiologia', 'id_paciente');
    }

    public function avaliacao_judo() {
        return $this->hasOne('App\AvaliacaoJudo', 'id_paciente');
    }

    public function avaliacao_neuro() {
        return $this->hasOne('App\AvaliacaoNeuropsicologica', 'id_paciente');
    }

    public function avaliacao_terapia_ocupacional() {
        return $this->hasOne('App\AvaliacaoTerapiaOcupacional', 'id_paciente');
    }


}
