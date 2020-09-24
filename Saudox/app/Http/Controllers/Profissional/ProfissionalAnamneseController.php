<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Profissional;
use App\Paciente;
use App\AnamneseTerapiaOcupacional;
use Auth;

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
        return view('profissional/anamnese/fonoaudiologia/ver', ['anamnese' => $anamnese]);
    }

    public function criarFonoaudiologia($id_paciente) {
        $paciente = Paciente::find($id_paciente);
        if(!$paciente){
            return redirect()->route('erro', ['msg_erro' => "Paciente " .$id_paciente. " inexistente"]);
        }
        return view('profissional/anamnese/fonoaudiologia/criar', ['paciente' => $paciente]);
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
        return view('profissional/anamnese/fonoaudiologia/editar', ['anamnese' => $anamnese]);
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
        return view('profissional/anamnese/psicopedagogia/criar', ['paciente' => $paciente]);
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


        if (array_key_exists("gestacao-adicional", $entrada)) {
            $entrada['gestacao'] .= ', ' . $entrada['gestacao-adicional'];
        }
        if (array_key_exists("parto-adicional", $entrada)) {
            $entrada['parto'] .= ', ' . $entrada['parto-adicional'];
        }
        if (array_key_exists("amamentacao_natural-adicional", $entrada)) {
            $entrada['amamentacao_natural'] .= ', ' . $entrada['amamentacao_natural-adicional'];
        }
        if (array_key_exists("dificuldade_ou_atraso_no_controle_do_esfincter-adicional", $entrada)) {
            $entrada['dificuldade_ou_atraso_no_controle_do_esfincter'] .= ', ' . $entrada['dificuldade_ou_atraso_no_controle_do_esfincter-adicional'];
        }
        if (array_key_exists("desenvolvimento_motor_no_tempo_certo-adicional", $entrada)) {
            $entrada['desenvolvimento_motor_no_tempo_certo'] .= ', ' . $entrada['desenvolvimento_motor_no_tempo_certo-adicional'];
        }
        if (array_key_exists("dificuldade_na_fala-adicional", $entrada)) {
            $entrada['dificuldade_na_fala'] .= ', ' . $entrada['dificuldade_na_fala-adicional'];
        }
        if (array_key_exists("dificuldade_na_visao-adicional", $entrada)) {
            $entrada['dificuldade_na_visao'] .= ', ' . $entrada['dificuldade_na_visao-adicional'];
        }
        if (array_key_exists("dificuldade_na_locomocao-adicional", $entrada)) {
            $entrada['dificuldade_na_locomocao'] .= ', ' . $entrada['dificuldade_na_locomocao-adicional'];
        }
        if (array_key_exists("toma_banho_sozinho-adicional", $entrada)) {
            $entrada['toma_banho_sozinho'] .= ', ' . $entrada['toma_banho_sozinho-adicional'];
        }
        if (array_key_exists("escova_os_dentes_sozinho-adicional", $entrada)) {
            $entrada['escova_os_dentes_sozinho'] .= ', ' . $entrada['escova_os_dentes_sozinho-adicional'];
        }
        if (array_key_exists("usa_o_banheiro_sozinho-adicional", $entrada)) {
            $entrada['usa_o_banheiro_sozinho'] .= ', ' . $entrada['usa_o_banheiro_sozinho-adicional'];
        }
        if (array_key_exists("necessita_auxilio_para_se_vestir_ou_despir-adicional", $entrada)) {
            $entrada['necessita_auxilio_para_se_vestir_ou_despir'] .= ', ' . $entrada['necessita_auxilio_para_se_vestir_ou_despir-adicional'];
        }
        if (array_key_exists("atende_intervencoes_quando_esta_desobedecendo-adicional", $entrada)) {
            $entrada['atende_intervencoes_quando_esta_desobedecendo'] .= ', ' . $entrada['atende_intervencoes_quando_esta_desobedecendo-adicional'];
        }
        if (array_key_exists("chora_facil-adicional", $entrada)) {
            $entrada['chora_facil'] .= ', ' . $entrada['chora_facil-adicional'];
        }
        if (array_key_exists("recusa_auxílio-adicional", $entrada)) {
            $entrada['recusa_auxílio'] .= ', ' . $entrada['recusa_auxílio-adicional'];
        }
        if (array_key_exists("resistencia_ao_toque-adicional", $entrada)) {
            $entrada['resistencia_ao_toque'] .= ', ' . $entrada['resistencia_ao_toque-adicional'];
        }
        if (array_key_exists("ja_estudou_antes_em_outra_escola-adicional", $entrada)) {
            $entrada['ja_estudou_antes_em_outra_escola'] .= ', ' . $entrada['ja_estudou_antes_em_outra_escola-adicional'];
        }
        if (array_key_exists("ja_repetiu_alguma_serie-adicional", $entrada)) {
            $entrada['ja_repetiu_alguma_serie'] .= ', ' . $entrada['ja_repetiu_alguma_serie-adicional'];
        }
        if (array_key_exists("possui_acompanhante_terapeutico_em_sala-adicional", $entrada)) {
            $entrada['possui_acompanhante_terapeutico_em_sala'] .= ', ' . $entrada['possui_acompanhante_terapeutico_em_sala-adicional'];
        }
        if (array_key_exists("recebe_orientacao_aos_deveres_em_casa-adicional", $entrada)) {
            $entrada['recebe_orientacao_aos_deveres_em_casa'] .= ', ' . $entrada['recebe_orientacao_aos_deveres_em_casa-adicional'];
        }
        if (array_key_exists("faz_amigos_com_facilidade-adicional", $entrada)) {
            $entrada['faz_amigos_com_facilidade'] .= ', ' . $entrada['faz_amigos_com_facilidade-adicional'];
        }
        if (array_key_exists("adaptase_facilmente_ao_meio-adicional", $entrada)) {
            $entrada['adaptase_facilmente_ao_meio'] .= ', ' . $entrada['adaptase_facilmente_ao_meio-adicional'];
        }
        if (array_key_exists("ja_estudou_antes_em_outra_escola-adicional", $entrada)) {
            $entrada['ja_estudou_antes_em_outra_escola'] .= ', ' . $entrada['ja_estudou_antes_em_outra_escola-adicional'];
        }
        if (array_key_exists("ja_repetiu_alguma_serie-adicional", $entrada)) {
            $entrada['ja_repetiu_alguma_serie'] .= ', ' . $entrada['ja_repetiu_alguma_serie-adicional'];
        }
        if (array_key_exists("divide_quarto_com_alguem-adicional", $entrada)) {
            $entrada['divide_quarto_com_alguem'] .= ', ' . $entrada['divide_quarto_com_alguem-adicional'];
        }


        $anamnese_to = new AnamneseTerapiaOcupacional;
        $anamnese_to->fill($entrada);
        if (array_key_exists("escolha_de_grupo", $entrada)) {
            $anamnese_to->escolha_de_grupo = "Nenhum";
        } else{
            $grupos = $entrada['escolha_de_grupo'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_to->escolha_de_grupo =  $str_grupo;
        }

        if (array_key_exists("distracoes_preferidas", $entrada)) {
            $anamnese_to->distracoes_preferidas = "Nenhuma";
        } else{
            $distracoes = $entrada['distracoes_preferidas'];
            $str_dist = "";
            foreach($distracoes as $dist) {
                $str_dist .= $dist . ",";
            }
            $anamnese_to->distracoes_preferidas = $str_dist;
            if (array_key_exists("distracoes_preferidas-adicional", $entrada)) {
                $anamnese_to->distracoes_preferidas .= ', ' . $entrada['distracoes_preferidas-adicional'];
            }
        }

        if (array_key_exists("quais_linguas_estrangeiras_fala", $entrada)) {
            $anamnese_to->quais_linguas_estrangeiras_fala = "Nenhuma";
        }
        if (array_key_exists("quais_intrumentos_toca", $entrada)) {
            $anamnese_to->quais_intrumentos_toca = "Nenhum";
        }
        if (array_key_exists("quais_esportes_pratica", $entrada)) {
            $anamnese_to->quais_esportes_pratica = "Nenhum";
        }
        if (array_key_exists("outras_atividades_que_pratica", $entrada)) {
            $anamnese_to->outras_atividades_que_pratica = "Nenhuma";
        }


        $anamnese_to->save();
        return view('profissional/anamnese/terapia_ocupacional/ver', [
            'anamnese' => $anamnese_to,
        ]);
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
        return view('profissional/anamnese/terapia_ocupacional/editar', ['anamnese' => $anamnese]);
    }
}
