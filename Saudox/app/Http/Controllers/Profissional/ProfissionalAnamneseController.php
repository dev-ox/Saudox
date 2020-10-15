<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Profissional;
use App\Paciente;
use App\AnamneseTerapiaOcupacional;
use App\AnamneseFonoaudiologia;
use App\AnamneseGigantePsicopedaNeuroPsicomoto;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt1;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt2;
use App\AnamneseGigantePsicopedaNeuroPsicomotoPt3;
use Illuminate\Support\Facades\Auth;

class ProfissionalAnamneseController extends Controller {


    // FONOAUDIOLOGIA
    public function verFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseFonoaudiologias;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/fonoaudiologia/ver', [
            'anamnese' => $anamnese,
            'paciente' => $paciente,
        ]);
    }

    public function criarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/fonoaudiologia/criar', ['paciente' => $paciente]);
    }


    public function salvarFonoaudiologia(Request $request) {
        $entrada = $request->all();
        $paciente = Paciente::find($entrada['id_paciente']);

        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$entrada['id_paciente']. " inexistente"]);
        }

        $anamnese_t = $paciente->anamneseFonoaudiologias;
        if($anamnese_t){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente já existe"]);
        }

        if ($paciente->pais_sao_casados == 1) {
            $status_relacao_pais = "Casados";
            $se_pais_separados_paciente_vive_com_quem = "Pais casados";
        } else {
            $status_relacao_pais = "Separados/Divorciados";
            $se_pais_separados_paciente_vive_com_quem = $paciente->vive_com_quem_caso_pais_divorciados;
        }

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];

        $validator_fonoaudiologia = Validator::make($entrada, AnamneseFonoaudiologia::$regras_validacao, $messages);
        if ($validator_fonoaudiologia->fails()) {
            return redirect()->back()
                             ->withErrors($validator_fonoaudiologia)
                             ->withInput();
        }

        $anamnese_fono = new AnamneseFonoaudiologia;
        $anamnese_fono->fill($entrada);
        $anamnese_fono->responsavel_pelo_paciente = $paciente->responsavel;
        $anamnese_fono->numero_de_irmaos = $paciente->numero_irmaos;
        $anamnese_fono->status_relacao_pais = $status_relacao_pais;
        $anamnese_fono->se_pais_separados_paciente_vive_com_quem = $se_pais_separados_paciente_vive_com_quem;
        $anamnese_fono->idade_mae = $paciente->idade_mae;
        $anamnese_fono->idade_pai = $paciente->idade_pai;



        if (!isset($entrada['companheiros_da_crianca_nas_brincadeiras'])) {
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras = "Nenhum";
        } else{
            $grupos = $entrada['companheiros_da_crianca_nas_brincadeiras'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras =  $str_grupo;
        }

        if (!isset($entrada['atitudes_sociais_predominantes'])) {
            $anamnese_fono->atitudes_sociais_predominantes = "Nenhum";
        } else{
            $grupos = $entrada['atitudes_sociais_predominantes'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->atitudes_sociais_predominantes =  $str_grupo;
        }

        if (!isset($entrada['comportamento_emocional'])) {
            $anamnese_fono->comportamento_emocional = "Nenhum";
        } else{
            $grupos = $entrada['comportamento_emocional'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->comportamento_emocional =  $str_grupo;
        }

        if (!isset($entrada['comportamento_sono'])) {
            $anamnese_fono->comportamento_sono = "Nenhum";
        } else{
            $grupos = $entrada['comportamento_sono'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->comportamento_sono =  $str_grupo;
        }


        $anamnese_fono->id_paciente = $entrada["id_paciente"];
        $anamnese_fono->id_profissional = Auth::id();
        $anamnese_fono->save();
        return redirect()->route('profissional.anamnese.fonoaudiologia.ver', $paciente->id);

    }

    public function editarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseFonoaudiologias;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/fonoaudiologia/editar', [
            'anamnese' => $anamnese,
            'paciente' => $paciente,
        ]);
    }

    public function salvarEditarFonoaudiologia(Request $request) {
        $entrada = $request->all();
        $paciente = Paciente::find($entrada['id_paciente']);
        if ($paciente->pais_sao_casados == 1) {
            $status_relacao_pais = "Casados";
            $se_pais_separados_paciente_vive_com_quem = "Pais casados";
        } else {
            $status_relacao_pais = "Separados/Divorciados";
            $se_pais_separados_paciente_vive_com_quem = $paciente->vive_com_quem_caso_pais_divorciados;
        }

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];

        $validator_fonoaudiologia = Validator::make($entrada, AnamneseFonoaudiologia::$regras_validacao, $messages);
        if ($validator_fonoaudiologia->fails()) {
            return redirect()->back()
                             ->withErrors($validator_fonoaudiologia)
                             ->withInput();
        }

        $anamnese_fono = $paciente->anamneseFonoaudiologias;
        $anamnese_fono->fill($entrada);
        $anamnese_fono->responsavel_pelo_paciente = $paciente->responsavel;
        $anamnese_fono->numero_de_irmaos = $paciente->numero_irmaos;
        $anamnese_fono->status_relacao_pais = $status_relacao_pais;
        $anamnese_fono->se_pais_separados_paciente_vive_com_quem = $se_pais_separados_paciente_vive_com_quem;
        $anamnese_fono->idade_mae = $paciente->idade_mae;
        $anamnese_fono->idade_pai = $paciente->idade_pai;



        if (!isset($entrada['companheiros_da_crianca_nas_brincadeiras'])) {
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras = "Nenhum";
        } else{
            $grupos = $entrada['companheiros_da_crianca_nas_brincadeiras'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras =  $str_grupo;
        }

        if (!isset($entrada['atitudes_sociais_predominantes'])) {
            $anamnese_fono->atitudes_sociais_predominantes = "Nenhum";
        } else{
            $grupos = $entrada['atitudes_sociais_predominantes'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->atitudes_sociais_predominantes =  $str_grupo;
        }

        if (!isset($entrada['comportamento_emocional'])) {
            $anamnese_fono->comportamento_emocional = "Nenhum";
        } else{
            $grupos = $entrada['comportamento_emocional'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->comportamento_emocional =  $str_grupo;
        }

        if (!isset($entrada['comportamento_sono'])) {
            $anamnese_fono->comportamento_sono = "Nenhum";
        } else{
            $grupos = $entrada['comportamento_sono'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->comportamento_sono =  $str_grupo;
        }

        $anamnese_fono->save();
        return redirect()->route('profissional.anamnese.fonoaudiologia.ver', $paciente->id);

    }


    // PSICOPEDAGOGIA (GIGANTE)
    public function verPsicopedagogia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/psicopedagogia/ver', ['anamnese' => $anamnese]);
    }

    public function criarPsicopedagogia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/psicopedagogia/criar', [
            'paciente' => $paciente,
            'anamnese' => NULL,
        ]);
    }


    public function salvarPsicopedagogia(Request $request) {


        $entrada = $request->all();

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $anamnese_t = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();
        if($anamnese_t){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente já existe"]);
        }


        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];


        if(isset($entrada["conhece_tais_coisas"])) {
            $conhecimentos = "";
            foreach($entrada["conhece_tais_coisas"] as $coisas) {
                $conhecimentos .= $coisas . ", ";
            }

            $conhecimentos = preg_replace("/, $/", "", $conhecimentos);
            $entrada["conhece_tais_coisas"] = $conhecimentos;

        } else {
            $entrada["conhece_tais_coisas"] = "Nada...";
        }

        $validator_anamnese_gigante_1 = Validator::make($entrada, AnamneseGigantePsicopedaNeuroPsicomotoPt1::$regras_validacao, $messages);
        $validator_anamnese_gigante_2 = Validator::make($entrada, AnamneseGigantePsicopedaNeuroPsicomotoPt2::$regras_validacao, $messages);
        $validator_anamnese_gigante_3 = Validator::make($entrada, AnamneseGigantePsicopedaNeuroPsicomotoPt3::$regras_validacao, $messages);

        // Tem que rodar as 3, pra ter todos os erros
        // Se rodasse tudo num ||, aconteceria curto circiuto, e não teria todos os erros
        $validator_check_1 = $validator_anamnese_gigante_1->fails();
        $validator_check_2 = $validator_anamnese_gigante_2->fails();
        $validator_check_3 = $validator_anamnese_gigante_3->fails();

        // Agora sim pode ser avaliado em curto circuito
        $validator_check = $validator_check_1 || $validator_check_2 || $validator_check_3;

        if ($validator_check) {

            $erros1 = $validator_anamnese_gigante_1->errors()->all();
            $erros2 = $validator_anamnese_gigante_2->errors()->all();
            $erros3 = $validator_anamnese_gigante_3->errors()->all();

            $erros = array_merge($erros1, $erros2, $erros3);
            return redirect()->back()
                             ->withErrors($erros)
                             ->withInput();
        }

        $anamneses_arr = AnamneseGigantePsicopedaNeuroPsicomoto::novaAnamnese();

        $anamneses_arr["pt1"]->fill($entrada);
        $anamneses_arr["pt2"]->fill($entrada);
        $anamneses_arr["pt3"]->fill($entrada);

        $anamneses_arr["pt1"]->id_profissional = Auth::id();

        $anamneses_arr["cabeca"]->save();
        $anamneses_arr["pt1"]->id_tp = $anamneses_arr["cabeca"]->id;
        $anamneses_arr["pt1"]->save();
        $anamneses_arr["pt2"]->id_tp = $anamneses_arr["cabeca"]->id;
        $anamneses_arr["pt2"]->save();
        $anamneses_arr["pt3"]->id_tp = $anamneses_arr["cabeca"]->id;
        $anamneses_arr["pt3"]->save();

        return redirect()->route("profissional.ver_paciente", $entrada["id_paciente"]);

    }


    public function editarPsicopedagogia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseGigantePsicopedaNeuroPsicomotos();
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/psicopedagogia/editar', ['anamnese' => $anamnese]);
    }


    // TERAPIA OCUPACIONAL
    public function verTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseTerapiaOcupacionals;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/terapia_ocupacional/ver', [
            'anamnese' => $anamnese,
            'paciente' => $paciente,
        ]);
    }

    public function criarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        $profissionais = Profissional::all();
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/terapia_ocupacional/criar', [
            'paciente' => $paciente,
            'profissionais' => $profissionais,
        ]);
    }

    public function salvarTerapiaOcupacional(Request $request) {
        $entrada = $request->all();

        $paciente = Paciente::find($entrada['id_paciente']);
        if(!$paciente) {
            return redirect()->route('erro', ['msg_erro' => "Paciente inexistente"]);
        }

        $anamnese_t = $paciente->anamneseTerapiaOcupacionals;
        if($anamnese_t){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente já existe"]);
        }

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];

        $validator_terapia_ocupacional = Validator::make($entrada, AnamneseTerapiaOcupacional::$regras_validacao, $messages);
        if ($validator_terapia_ocupacional->fails()) {
            return redirect()->back()
                             ->withErrors($validator_terapia_ocupacional)
                             ->withInput();
        }


        $anamnese_to = new AnamneseTerapiaOcupacional;
        $anamnese_to->fill($entrada);

        if (!isset($entrada['escolha_de_grupo'])) {
            $anamnese_to->escolha_de_grupo = "Nenhum";
        } else{
            $grupos = $entrada['escolha_de_grupo'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_to->escolha_de_grupo =  $str_grupo;
        }

        if (!isset($entrada['quais_linguas_estrangeiras_fala'])) {
            $anamnese_to->quais_linguas_estrangeiras_fala = "Nenhuma";
        }
        if (!isset($entrada['quais_intrumentos_toca'])) {
            $anamnese_to->quais_intrumentos_toca = "Nenhum";
        }
        if (!isset($entrada['quais_esportes_pratica'])) {
            $anamnese_to->quais_esportes_pratica = "Nenhum";
        }
        if (!isset($entrada['outras_atividades_que_pratica'])) {
            $anamnese_to->outras_atividades_que_pratica = "Nenhuma";
        }


        $anamnese_to->id_paciente = $entrada["id_paciente"];
        $anamnese_to->id_profissional = $entrada["id_profissional"];
        $anamnese_to->save();
        return redirect()->route('profissional.anamnese.terapia_ocupacional.ver', $entrada["id_paciente"]);
    }


    public function editarTerapiaOcupacional($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        $anamnese = $paciente->anamneseTerapiaOcupacionals;
        if(!$anamnese){
            return redirect()->route('erro', ['msg_erro' => "Anamnese do paciente " .$id_paciente. " não existe"]);
        }
        return view('profissional/anamnese/terapia_ocupacional/editar', [
            'anamnese' => $anamnese,
            'paciente' => $paciente,
        ]);
    }



    public function salvarEditarTerapiaOcupacional(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'gt' => 'O campo :attribute deve ser maior que 18.',
            'lt' => 'O campo :attribute deve ser menor que 100.',
            'unique' => 'O :attribute já está cadastrado',
        ];

        $validator_terapia_ocupacional = Validator::make($entrada, AnamneseTerapiaOcupacional::$regras_validacao, $messages);
        if ($validator_terapia_ocupacional->fails()) {
            return redirect()->back()
                             ->withErrors($validator_terapia_ocupacional)
                             ->withInput();
        }

        $paciente = Paciente::find($entrada["id_paciente"]);

        if(!$paciente) {
            return redirect()->back()
                             ->withErrors(["paciente" => "Paciente inexistente!"])
                             ->withInput();
        }

        $anamnese_to = $paciente->anamneseTerapiaOcupacionals;
        $anamnese_to->fill($entrada);

        if (!isset($entrada['escolha_de_grupo'])) {
            $anamnese_to->escolha_de_grupo = "Nenhum";
        } else{
            $grupos = $entrada['escolha_de_grupo'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_to->escolha_de_grupo =  $str_grupo;
        }

        if (!isset($entrada['quais_linguas_estrangeiras_fala'])) {
            $anamnese_to->quais_linguas_estrangeiras_fala = "Nenhuma";
        }
        if (!isset($entrada['quais_intrumentos_toca'])) {
            $anamnese_to->quais_intrumentos_toca = "Nenhum";
        }
        if (!isset($entrada['quais_esportes_pratica'])) {
            $anamnese_to->quais_esportes_pratica = "Nenhum";
        }
        if (!isset($entrada['outras_atividades_que_pratica'])) {
            $anamnese_to->outras_atividades_que_pratica = "Nenhuma";
        }

        $anamnese_to->save();
        return redirect()->route('profissional.anamnese.terapia_ocupacional.ver', $entrada["id_paciente"]);
    }
}
