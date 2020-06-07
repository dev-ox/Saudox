<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        return $this->hasMany('App\Evolucao_judo', 'id_paciente');
    }

    public function evolucao_psicologicas() {
        return $this->hasMany('App\Evolucao_psicologica', 'id_paciente');
    }

    public function evolucao_terapia_ocupacionals() {
        return $this->hasMany('App\Evolucao_terapia_ocupacional', 'id_paciente');
    }



}


