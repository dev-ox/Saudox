<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profissional extends Authenticatable {
    use Notifiable;

    const Trabalhando = "Trabalhando";
    const Demitido = "Demitido";


    const Adm = "Administrador";
    const Recepcionista = "Recepcionista";
    const Fonoaudiologo = "Fonoaudiólogo";
    const TerapeutaOcupacional = "Terapeuta Ocupacional";
    const Neuropsicologo = "Neuropsicólogo";
    const Psicologo = "Psicólogo";
    const Psicopedagogo = "Psicopedagogo";


    const TodasProfissoes = [
        self::Adm,
        self::Recepcionista,
        self::Fonoaudiologo,
        self::TerapeutaOcupacional,
        self::Neuropsicologo,
        self::Psicologo,
        self::Psicopedagogo,
    ];

    const ProfissoesQuePodemCriarPacientes = [
        self::Adm,
        self::Fonoaudiologo,
        self::TerapeutaOcupacional,
        self::Neuropsicologo,
        self::Psicologo,
        self::Psicopedagogo,
    ];

    const ProfissoesQuePodemCriarAnamneses = [
        self::Adm,
        self::Fonoaudiologo,
        self::TerapeutaOcupacional,
        self::Neuropsicologo,
        self::Psicopedagogo,
    ];

    const ProfissoesQuePodemCriarAvaliacoes = [
        self::Adm,
        self::Fonoaudiologo,
        self::TerapeutaOcupacional,
        self::Neuropsicologo,
    ];

    const ProfissoesQuePodemCriarEvolucoes = [
        self::Adm,
        self::Fonoaudiologo,
        self::TerapeutaOcupacional,
        self::Neuropsicologo,
        self::Psicologo,
        self::Psicopedagogo,
    ];

    const ProfissoesQuePodemCriarAgendamentos = [
        self::Adm,
        self::Recepcionista,
    ];


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
        'aviso',
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


    public static $regras_validacao_criar = [
        'login' => 'required|max:255|unique:profissionals,login',
        'password' => 'required|max:255|min:6',
        'nome' => 'required|max:255',
        'cpf' => 'required|numeric|unique:profissionals,cpf',
        'rg' => 'required|numeric|unique:profissionals,rg',
        'numero_conselho' => 'nullable|numeric',
        'telefone_1' => 'required|numeric',
        'telefone_2' => 'nullable|numeric',
        'email' => 'required|email',
        'nacionalidade' => 'required|min:2|not_regex:/\\d/',
        'profissoes' => 'required',
        'estado_civil' => 'required',
        'aviso' => 'nullable',
    ];

    public static $regras_validacao_editar_com_senha = [
        'login' => 'required|max:255|unique:profissionals,login',
        'password' => 'required|max:255|min:6',
        'nome' => 'required|max:255',
        'cpf' => 'required|numeric|unique:profissionals,cpf',
        'rg' => 'required|numeric|unique:profissionals,rg',
        'numero_conselho' => 'nullable|numeric',
        'telefone_1' => 'required|numeric',
        'telefone_2' => 'nullable|numeric',
        'email' => 'required|email',
        'nacionalidade' => 'required|min:2|not_regex:/\\d/',
        'profissoes' => 'required',
        'estado_civil' => 'required',
        'aviso' => 'nullable',
    ];

    public static $regras_validacao_editar_sem_senha = [
        'login' => 'required|max:255|unique:profissionals,login',
        'nome' => 'required|max:255',
        'cpf' => 'required|numeric|unique:profissionals,cpf',
        'rg' => 'required|numeric|unique:profissionals,rg',
        'numero_conselho' => 'nullable|numeric',
        'telefone_1' => 'required|numeric',
        'telefone_2' => 'nullable|numeric',
        'email' => 'required|email',
        'nacionalidade' => 'required|min:2|not_regex:/\\d/',
        'profissoes' => 'required',
        'estado_civil' => 'required',
        'aviso' => 'nullable',
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

    // Fora do padrao porque isso não é um metodo, é um atributo
    public function endereco() {
        // Esse model tem um endereco de chave primaria id que é referenciado pelo id_endereco deste model
        return $this->hasOne('\App\Endereco', 'id', 'id_endereco');
    }


    public function ehAdmin() {
        return $this->temProfissao(self::Adm);
    }



    public function podeCriarPaciente() {
        foreach($this->getProfissoes() as $profissao) {
            if(in_array($profissao, Profissional::ProfissoesQuePodemCriarPacientes)) {
                return true;
            }
        }
        return false;
    }



    public function podeCriarAnamnese() {
        foreach($this->getProfissoes() as $profissao) {
            if(in_array($profissao, Profissional::ProfissoesQuePodemCriarAnamneses)) {
                return true;
            }
        }
        return false;
    }


    public function podeCriarAvaliacao() {
        foreach($this->getProfissoes() as $profissao) {
            if(in_array($profissao, Profissional::ProfissoesQuePodemCriarAvaliacoes)) {
                return true;
            }
        }
        return false;
    }


    public function podeCriarEvolucao() {
        foreach($this->getProfissoes() as $profissao) {
            if(in_array($profissao, Profissional::ProfissoesQuePodemCriarEvolucoes)) {
                return true;
            }
        }
        return false;
    }


    public function podeCriarAgendamento() {
        foreach($this->getProfissoes() as $profissao) {
            if(in_array($profissao, Profissional::ProfissoesQuePodemCriarAgendamentos)) {
                return true;
            }
        }
        return false;
    }


    public function temProfissao($profissao) {
        return in_array($profissao, $this->getProfissoes());
    }


}
