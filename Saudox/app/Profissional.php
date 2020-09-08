<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profissional extends Authenticatable {
    use Notifiable;

    const Trabalhando = "Trabalhando";
    const Demitido = "Demitido";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'password',
        'nome',
        'cpf',
        'rg',
        'numero_conselho',
        'telefone_1',
        'telefone_2',
        'email',
        'nacionalidade',
        'descricao_de_conhecimento_e_experiencia',
        'estado_civil',

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


    public static $regras_validacao = [
        'login' => 'required|max:255',
        'password' => 'required|max:255|min:6',
        'nome' => 'required|max:255',
        'cpf' => 'required|numeric',
        'rg' => 'required|numeric',
        'numero_conselho' => 'nullable|numeric',
        'telefone_1' => 'required',
        'telefone_2' => 'nullable',
        'email' => 'required|email',
        'nacionalidade' => 'required|min:2',
        'descricao_de_conhecimento_e_experiencia' => 'required',
        'profissoes' => 'required',
        'estado_civil' => 'required',
    ];


	// Coleta todos os agendamentos daquele profissional na ordem
	// 		crescente referente ao tempo de entrada do paciente
	public function agendamentos() {
		return $this->hasMany('App\Agendamentos', 'id_profissional')->orderBy('data_entrada');
	}


    // Retorna um vetor de string com todas as profissões daquele profissional
    public function getProfissoes() {
        // Faz o split e já transforma em array cada profissão
        // As profissões são separadas por ';'
        return preg_split('/;/', $this->profissao);
    }


    public function ehAdmin() {
        return in_array('admin', $this->getProfissoes());
    }


}
