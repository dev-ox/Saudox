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
        'login',
        'password',
        'nome_paciente',
        'cpf',
        'sexo',
        'naturalidade',
        'data_nascimento',
        'responsavel',
        'numero_irmaos',
        'lista_irmaos',
        'nome_pai',
        'nome_mae',
        'telefone_pai',
        'telefone_mae',
        'email_pai',
        'email_mae',
        'idade_pai',
        'idade_mae',
        'pais_sao_casados',
        'pais_sao_divorciados',
        'reacao_sobre_a_relacao_pais_caso_divorciados',
        'vive_com_quem_caso_pais_divorciados',
        'tipo_filho_biologico_adotivo',
        'crianca_sabe_se_adotivo',
        'reacao_quando_descobriu_se_adotivo',
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

    public static $regras_validacao = [
        'login' => 'required|max:255',
        'password' => 'required|max:255|min:6',
        'nome_paciente' => 'required|max:255',
        'cpf' => 'required|numeric',
        'sexo' => 'required',
        'naturalidade' => 'required|min:2',
        'data_nascimento' => 'required',
        'responsavel' => 'required|min:3|max:15',
        'numero_irmaos' => 'required|numeric',
        'lista_irmaos' => 'max:255',
        'nome_pai' => 'required|min:2|max:50',
        'nome_mae' => 'required|min:2|max:50',
        'telefone_pai' => 'required',
        'telefone_mae' => 'required',
        'email_pai' => 'required|email',
        'email_mae' => 'required|email',
        'idade_pai' => 'required|numeric|gt:0',
        'idade_mae' => 'required|numeric|gt:0',
        'pais_sao_casados' => 'required',
        'pais_sao_divorciados' => 'required',
        'reacao_sobre_a_relacao_pais_caso_divorciados' => 'nullable',
        'vive_com_quem_caso_pais_divorciados' => 'nullable|max:255',
        'tipo_filho_biologico_adotivo' => 'required',
        'crianca_sabe_se_adotivo' => 'nullable',
        'reacao_quando_descobriu_se_adotivo' => 'nullable',
    ];

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
