<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Closure;
use Illuminate\Support\Facades\Schema;

function getProtectedMember($class_object,$protected_member) {
     $array = (array)$class_object;      //Object typecast into (associative) array
     $prefix = chr(0).'*'.chr(0);           //Prefix which is prefixed to protected member
     return $array[$prefix.$protected_member];
}

class Anamnese_Psicopeda_Neuro_Psicomoto extends Model
{

    public static function salvar($std_class_anamnese) {

        $id = $std_class_anamnese->id_tp;

        $pt1 = \App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt1::find($id);
        $pt2 = \App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt2::find($id);
        $pt3 = \App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt3::find($id);

        $asdasdas = "";
        foreach($std_class_anamnese as $chave => $valor) {

            if(Schema::hasColumn(app(\App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt1::class)->getTable(), $chave)) {
                $pt1->$chave = $valor;
            } elseif(Schema::hasColumn(app(\App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt2::class)->getTable(), $chave)) {
                $pt2->$chave = $valor;
            } elseif(Schema::hasColumn(app(\App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt3::class)->getTable(), $chave)) {
                $pt3->$chave = $valor;
            }
        }

        $pt1->save();
        $pt2->save();
        $pt3->save();

    }

    public static function pegar_por_paciente($id_paciente) {

        $retorno = [];


        // Pego todas as anamneses
        $anamneses = \App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt1::all();

        // Vou andar por todas elas
        foreach($anamneses as $pt1) {

            // Se a anamnese não for do paciente que foi requisitado, veja o proximo
            if($pt1->id_paciente != $id_paciente) {
                continue;
            }

            // Se foi, vou pegar a tabela index
            $id_tp = $pt1->id_tp;

            // O id_tp = id de todas as tabelas, já que são criadas todas ao mesmo tempo
            // Ai pq ter o id_tp e o id? Clareza, eles são o mesmo numero com nomes convenientes
            // Pegar as partes 2 e 3, já que já tem a 1, sendo a parte 1 que tem o id do paciente
            $pt2 = \App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt2::find($id_tp);
            $pt3 = \App\Anamnese_Gigante_Psicopeda_Neuro_Psicomoto_pt3::find($id_tp);

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

                public function __construct($orig) {
                    $this->anamnese_original = $orig;
                }

                public function __get($name) {
                    return ($this->anamnese_original->$name);
                }

                public function __set($name, $value) {
                    $this->anamnese_original->$name = $value;
                }

                public function save() {
                    return \App\Anamnese_Psicopeda_Neuro_Psicomoto::salvar($this->anamnese_original);
                }
            };

            // Push no array que é retornado
            array_push($retorno, $anamnese_proxy);

        }
        return $retorno;
    }
}
