<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


function getProtectedMember($class_object,$protected_member) {
     $array = (array)$class_object;      //Object typecast into (associative) array
     $prefix = chr(0).'*'.chr(0);           //Prefix which is prefixed to protected member
     return $array[$prefix.$protected_member];
}

class AnamneseGigantePsicopedaNeuroPsicomoto extends Model
{

    protected $table = 'anamnese__gigante__psicopeda__neuro__psicomotos';

    public static function salvar($std_class_anamnese) {

        $id_tp = $std_class_anamnese->id_tp;

        $pt1 = \App\AnamneseGigantePsicopedaNeuroPsicomotoPt1::where('id_tp', $id_tp)->first();
        $pt2 = \App\AnamneseGigantePsicopedaNeuroPsicomotoPt2::where('id_tp', $id_tp)->first();
        $pt3 = \App\AnamneseGigantePsicopedaNeuroPsicomotoPt3::where('id_tp', $id_tp)->first();

        $tabela_pt1 = app(\App\AnamneseGigantePsicopedaNeuroPsicomotoPt1::class)->getTable();
        $tabela_pt2 = app(\App\AnamneseGigantePsicopedaNeuroPsicomotoPt2::class)->getTable();
        $tabela_pt3 = app(\App\AnamneseGigantePsicopedaNeuroPsicomotoPt3::class)->getTable();


        // Qualquer classe php pode ser usada como um array associativo
        // Um atributo/método é um indice do array
        // $obj->atributo quer dizer a mesma coisa que ((array) $obj)[atributo]
        // Então:
        // Estrutura do array: ["nomeA" => valorA, "nomeB" => valorB, ...]
        // $chave = Nome da coluna (nomeA, nomeB, ...)
        // $valor = Valor da chave no array (valorA, valorB, ...)
        foreach($std_class_anamnese as $chave => $valor) {

            if(Schema::hasColumn($tabela_pt1, $chave)) {
                $pt1->$chave = $valor;
            } elseif(Schema::hasColumn($tabela_pt2, $chave)) {
                $pt2->$chave = $valor;
            } elseif(Schema::hasColumn($tabela_pt3, $chave)) {
                $pt3->$chave = $valor;
            }
        }

        $pt1->save();
        $pt2->save();
        $pt3->save();

    }

    public static function pegarPorIdPaciente($id_paciente) {

        // Pego a parte 1 da anamnese que tem o id_paciente e id_tp
        $pt1 = \App\AnamneseGigantePsicopedaNeuroPsicomotoPt1::where('id_paciente', $id_paciente)->first();

        // Verifica se tem aquela anamnese
        if(!$pt1) {
            return false;
        }

        // Se foi, vou pegar a tabela index
        $id_tp = $pt1->id_tp;

        // O id_tp = id de todas as tabelas, já que são criadas todas ao mesmo tempo
        // Ai pq ter o id_tp e o id? Clareza, eles são o mesmo numero com nomes convenientes
        // Pegar as partes 2 e 3, já que já tem a 1, sendo a parte 1 que tem o id do paciente
        $pt2 = \App\AnamneseGigantePsicopedaNeuroPsicomotoPt2::where('id_tp', $id_tp)->first();
        $pt3 = \App\AnamneseGigantePsicopedaNeuroPsicomotoPt3::where('id_tp', $id_tp)->first();

        // Pega os atributos de todas as partes
        $atributos_pt1 = getProtectedMember( (object) ((array)$pt1), "attributes");
        $atributos_pt2 = getProtectedMember( (object) ((array)$pt2), "attributes");
        $atributos_pt3 = getProtectedMember( (object) ((array)$pt3), "attributes");

        // Transforma os 3 arrays de atributos em 1 array, dando merge neles, e transforma de volta num objeto std
        $pt1_pt2_pt3 = (object) array_merge(array_merge($atributos_pt1, $atributos_pt2), $atributos_pt3);

        /* Cria um objeto de classe anonima que pode ter chamada de metodo normal
         * que pode ser chamado como $obj->metodo();
         * A função __get e __set garante que todos os objetos da anamnese são acessiveis
         * como se essa classe anonima fosse a classe de anamnese.
         * Em resumo, agora a classe anamnese tem o metodo save() que pode ser chamando
         * padrão.
         */
        $anamnese_proxy = new class($pt1_pt2_pt3) {
            private $anamnese_original;
            private $id_tp;

            public function __construct($orig) {
                $this->anamnese_original = $orig;
                $this->id_tp = $orig->id_tp;
            }

            public function __get($name) {
                return ($this->anamnese_original->$name);
            }

            public function __set($name, $value) {
                $this->anamnese_original->$name = $value;
            }

            public function __call($name, $arguments) {
                $anamnese = \App\AnamneseGigantePsicopedaNeuroPsicomoto::where('id_tp', $this->id_tp)->first();
                return $anamnese->$name($arguments);
            }

            public function get_pt1() {
                return \App\AnamneseGigantePsicopedaNeuroPsicomotoPt1::where('id_tp', $this->id_tp)->first();
            }
            public function get_pt2() {
                return \App\AnamneseGigantePsicopedaNeuroPsicomotoPt2::where('id_tp', $this->id_tp)->first();
            }
            public function get_pt3() {
                return \App\AnamneseGigantePsicopedaNeuroPsicomotoPt3::where('id_tp', $this->id_tp)->first();
            }

            public function save() {
                return \App\AnamneseGigantePsicopedaNeuroPsicomoto::salvar($this->anamnese_original);
            }
        };

        return $anamnese_proxy;

    }
}
