<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profissional extends Authenticatable {
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



    // Retorna um vetor de string com todas as profissões daquele profissional
    public function getProfissoes() {
        // Faz o split e já transforma em array cada profissão
        // As profissões são separadas por ';'
        return preg_split('/;/', $this->profissao);
    }


    public function eh_admin() {
        return in_array('admin', $this->getProfissoes());
    }


}
