<?php
namespace App\Http\Controllers\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Profissional;
use App\Paciente;
use App\AnamneseTerapiaOcupacional;
use App\AnamneseFonoaudiologia;
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

        $responsavel_pelo_paciente = $paciente->responsavel;
        $numero_de_irmaos = $paciente->numero_irmaos;
        if ($paciente->pais_sao_casados == 1) {
            $status_relacao_pais = "Casados";
            $se_pais_separados_paciente_vive_com_quem = "Pais casados";
        } else {
            $status_relacao_pais = "Separados/Divorciados";
            $se_pais_separados_paciente_vive_com_quem = $paciente->se_pais_separados_paciente_vive_com_quem;
        }
        $idade_mae = $paciente->idade_mae;
        $idade_pai = $paciente->idade_pai;

        if (isset($entrada['letras_ou_fonemas_trocados-adicional'])) {
            $entrada['letras_ou_fonemas_trocados'] .= ', ' . $entrada['letras_ou_fonemas_trocados-adicional'];
        }
        if (isset($entrada['dificuldades_na_fala-adicional'])) {
            $entrada['dificuldades_na_fala'] .= ', ' . $entrada['dificuldades_na_fala-adicional'];
        }
        if (isset($entrada['dificuldades_na_visao-adicional'])) {
            $entrada['dificuldades_na_visao'] .= ', ' . $entrada['dificuldades_na_visao-adicional'];
        }
        if (isset($entrada['dificuldades_na_locomocao-adicional'])) {
            $entrada['dificuldades_na_locomocao'] .= ', ' . $entrada['dificuldades_na_locomocao-adicional'];
        }
        if (isset($entrada['tem_resistencia_ao_toque-adicional'])) {
            $entrada['tem_resistencia_ao_toque'] .= ', ' . $entrada['tem_resistencia_ao_toque-adicional'];
        }
        if (isset($entrada['adapta_se_facilmente_ao_meio-adicional'])) {
            $entrada['adapta_se_facilmente_ao_meio'] .= ', ' . $entrada['adapta_se_facilmente_ao_meio-adicional'];
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
        $anamnese_fono->responsavel_pelo_paciente = $responsavel_pelo_paciente;
        $anamnese_fono->numero_irmaos = $numero_irmaos;
        $anamnese_fono->status_relacao_pais = $status_relacao_pais;
        $anamnese_fono->se_pais_separados_paciente_vive_com_quem = $se_pais_separados_paciente_vive_com_quem;
        $anamnese_fono->idade_mae = $idade_mae;
        $anamnese_fono->idade_pai = $idade_pai;


        if (isset($entrada['foi_necessario_utilizar_algum_recurso'])) {
            $anamnese_fono->foi_necessario_utilizar_algum_recurso = "Nenhum";
        } else{
            $grupos = $entrada['foi_necessario_utilizar_algum_recurso'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->foi_necessario_utilizar_algum_recurso =  $str_grupo;
        }

        if (isset($entrada['mae_apresentou_algum_problema_durante_gravidez'])) {
            $anamnese_fono->mae_apresentou_algum_problema_durante_gravidez = "Nenhum";
        } else{
            $grupos = $entrada['mae_apresentou_algum_problema_durante_gravidez'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->mae_apresentou_algum_problema_durante_gravidez =  $str_grupo;
        }

        if (isset($entrada['companheiros_da_crianca_nas_brincadeiras'])) {
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras = "Nenhum";
        } else{
            $grupos = $entrada['companheiros_da_crianca_nas_brincadeiras'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras =  $str_grupo;
        }

        if (isset($entrada['distracoes_preferidas'])) {
            $anamnese_fono->distracoes_preferidas = "Nenhuma";
        } else{
            $distracoes = $entrada['distracoes_preferidas'];
            $str_dist = "";
            foreach($distracoes as $dist) {
                $str_dist .= $dist . ",";
            }
            $anamnese_fono->distracoes_preferidas = $str_dist;
            if (isset($entrada['distracoes_preferidas-adicional'])) {
                $anamnese_fono->distracoes_preferidas .= ', ' . $entrada['distracoes_preferidas-adicional'];
            }
        }

        if (isset($entrada['atitudes_sociais_predominantes'])) {
            $anamnese_fono->atitudes_sociais_predominantes = "Nenhum";
        } else{
            $grupos = $entrada['atitudes_sociais_predominantes'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->atitudes_sociais_predominantes =  $str_grupo;
        }

        if (isset($entrada['comportamento_emocional'])) {
            $anamnese_fono->comportamento_emocional = "Nenhum";
        } else{
            $grupos = $entrada['comportamento_emocional'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->comportamento_emocional =  $str_grupo;
        }

        if (isset($entrada['comportamento_sono'])) {
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
        return view('profissional/anamnese/fonoaudiologia/ver', [
            'id_paciente' => $paciente->id,
            'anamnese' => $anamnese_fono,
        ]);

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

        $anamnese_fono = AnamneseFonoaudiologia::find($entrada['id']);
        $paciente_id = $entrada['id_paciente'];
        $paciente = Paciente::find($paciente_id);

        if(!$anamnese_fono) {
            return view('erro', ['msg_erro' => "Anamnese inexistente..."]);
        }

        $responsavel_pelo_paciente = $paciente->responsavel;
        $numero_de_irmaos = $paciente->numero_irmaos;
        if ($paciente->pais_sao_casados == 1) {
            $status_relacao_pais = "Casados";
            $se_pais_separados_paciente_vive_com_quem = "Pais casados";
        } else {
            $status_relacao_pais = "Separados/Divorciados";
            $se_pais_separados_paciente_vive_com_quem = $paciente->se_pais_separados_paciente_vive_com_quem;
        }
        $idade_mae = $paciente->idade_mae;
        $idade_pai = $paciente->idade_pai;

        if (isset($entrada['letras_ou_fonemas_trocados-adicional'])) {
            $entrada['letras_ou_fonemas_trocados'] .= ', ' . $entrada['letras_ou_fonemas_trocados-adicional'];
        }
        if (isset($entrada['dificuldades_na_fala-adicional'])) {
            $entrada['dificuldades_na_fala'] .= ', ' . $entrada['dificuldades_na_fala-adicional'];
        }
        if (isset($entrada['dificuldades_na_visao-adicional'])) {
            $entrada['dificuldades_na_visao'] .= ', ' . $entrada['dificuldades_na_visao-adicional'];
        }
        if (isset($entrada['dificuldades_na_locomocao-adicional'])) {
            $entrada['dificuldades_na_locomocao'] .= ', ' . $entrada['dificuldades_na_locomocao-adicional'];
        }
        if (isset($entrada['tem_resistencia_ao_toque-adicional'])) {
            $entrada['tem_resistencia_ao_toque'] .= ', ' . $entrada['tem_resistencia_ao_toque-adicional'];
        }
        if (isset($entrada['adapta_se_facilmente_ao_meio-adicional'])) {
            $entrada['adapta_se_facilmente_ao_meio'] .= ', ' . $entrada['adapta_se_facilmente_ao_meio-adicional'];
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

        $anamnese_fono->fill($entrada);
        $anamnese_fono->responsavel_pelo_paciente = $responsavel_pelo_paciente;
        $anamnese_fono->numero_irmaos = $numero_irmaos;
        $anamnese_fono->status_relacao_pais = $status_relacao_pais;
        $anamnese_fono->se_pais_separados_paciente_vive_com_quem = $se_pais_separados_paciente_vive_com_quem;
        $anamnese_fono->idade_mae = $idade_mae;
        $anamnese_fono->idade_pai = $idade_pai;


        if (isset($entrada['foi_necessario_utilizar_algum_recurso'])) {
            $anamnese_fono->foi_necessario_utilizar_algum_recurso = "Nenhum";
        } else{
            $grupos = $entrada['foi_necessario_utilizar_algum_recurso'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->foi_necessario_utilizar_algum_recurso =  $str_grupo;
        }

        if (isset($entrada['mae_apresentou_algum_problema_durante_gravidez'])) {
            $anamnese_fono->mae_apresentou_algum_problema_durante_gravidez = "Nenhum";
        } else{
            $grupos = $entrada['mae_apresentou_algum_problema_durante_gravidez'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->mae_apresentou_algum_problema_durante_gravidez =  $str_grupo;
        }

        if (isset($entrada['companheiros_da_crianca_nas_brincadeiras'])) {
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras = "Nenhum";
        } else{
            $grupos = $entrada['companheiros_da_crianca_nas_brincadeiras'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->companheiros_da_crianca_nas_brincadeiras =  $str_grupo;
        }

        if (isset($entrada['distracoes_preferidas'])) {
            $anamnese_fono->distracoes_preferidas = "Nenhuma";
        } else{
            $distracoes = $entrada['distracoes_preferidas'];
            $str_dist = "";
            foreach($distracoes as $dist) {
                $str_dist .= $dist . ",";
            }
            $anamnese_fono->distracoes_preferidas = $str_dist;
            if (isset($entrada['distracoes_preferidas-adicional'])) {
                $anamnese_fono->distracoes_preferidas .= ', ' . $entrada['distracoes_preferidas-adicional'];
            }
        }

        if (isset($entrada['atitudes_sociais_predominantes'])) {
            $anamnese_fono->atitudes_sociais_predominantes = "Nenhum";
        } else{
            $grupos = $entrada['atitudes_sociais_predominantes'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->atitudes_sociais_predominantes =  $str_grupo;
        }

        if (isset($entrada['comportamento_emocional'])) {
            $anamnese_fono->comportamento_emocional = "Nenhum";
        } else{
            $grupos = $entrada['comportamento_emocional'];
            $str_grupo = "";
            foreach($grupos as $grupo) {
                $str_grupo .= $grupo . ",";
            }
            $anamnese_fono->comportamento_emocional =  $str_grupo;
        }

        if (isset($entrada['comportamento_sono'])) {
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
        return view('profissional/anamnese/fonoaudiologia/ver', [
            'id_paciente' => $paciente->id,
            'anamnese' => $anamnese_fono,
        ]);

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


        if (isset($entrada['gestacao-adicional'])) {
            $entrada['gestacao'] .= ', ' . $entrada['gestacao-adicional'];
        }
        if (isset($entrada['parto-adicional'])) {
            $entrada['parto'] .= ', ' . $entrada['parto-adicional'];
        }
        if (isset($entrada['amamentacao_natural-adicional'])) {
            $entrada['amamentacao_natural'] .= ', ' . $entrada['amamentacao_natural-adicional'];
        }
        if (isset($entrada['dificuldade_ou_atraso_no_controle_do_esfincter-adicional'])) {
            $entrada['dificuldade_ou_atraso_no_controle_do_esfincter'] .= ', ' . $entrada['dificuldade_ou_atraso_no_controle_do_esfincter-adicional'];
        }
        if (isset($entrada['desenvolvimento_motor_no_tempo_certo-adicional'])) {
            $entrada['desenvolvimento_motor_no_tempo_certo'] .= ', ' . $entrada['desenvolvimento_motor_no_tempo_certo-adicional'];
        }
        if (isset($entrada['dificuldade_na_fala-adicional'])) {
            $entrada['dificuldade_na_fala'] .= ', ' . $entrada['dificuldade_na_fala-adicional'];
        }
        if (isset($entrada['dificuldade_na_visao-adicional'])) {
            $entrada['dificuldade_na_visao'] .= ', ' . $entrada['dificuldade_na_visao-adicional'];
        }
        if (isset($entrada['dificuldade_na_locomocao-adicional'])) {
            $entrada['dificuldade_na_locomocao'] .= ', ' . $entrada['dificuldade_na_locomocao-adicional'];
        }
        if (isset($entrada['toma_banho_sozinho-adicional'])) {
            $entrada['toma_banho_sozinho'] .= ', ' . $entrada['toma_banho_sozinho-adicional'];
        }
        if (isset($entrada['escova_os_dentes_sozinho-adicional'])) {
            $entrada['escova_os_dentes_sozinho'] .= ', ' . $entrada['escova_os_dentes_sozinho-adicional'];
        }
        if (isset($entrada['usa_o_banheiro_sozinho-adicional'])) {
            $entrada['usa_o_banheiro_sozinho'] .= ', ' . $entrada['usa_o_banheiro_sozinho-adicional'];
        }
        if (isset($entrada['necessita_auxilio_para_se_vestir_ou_despir-adicional'])) {
            $entrada['necessita_auxilio_para_se_vestir_ou_despir'] .= ', ' . $entrada['necessita_auxilio_para_se_vestir_ou_despir-adicional'];
        }
        if (isset($entrada['atende_intervencoes_quando_esta_desobedecendo-adicional'])) {
            $entrada['atende_intervencoes_quando_esta_desobedecendo'] .= ', ' . $entrada['atende_intervencoes_quando_esta_desobedecendo-adicional'];
        }
        if (isset($entrada['chora_facil-adicional'])) {
            $entrada['chora_facil'] .= ', ' . $entrada['chora_facil-adicional'];
        }
        if (isset($entrada['recusa_auxílio-adicional'])) {
            $entrada['recusa_auxílio'] .= ', ' . $entrada['recusa_auxílio-adicional'];
        }
        if (isset($entrada['resistencia_ao_toque-adicional'])) {
            $entrada['resistencia_ao_toque'] .= ', ' . $entrada['resistencia_ao_toque-adicional'];
        }
        if (isset($entrada['ja_estudou_antes_em_outra_escola-adicional'])) {
            $entrada['ja_estudou_antes_em_outra_escola'] .= ', ' . $entrada['ja_estudou_antes_em_outra_escola-adicional'];
        }
        if (isset($entrada['ja_repetiu_alguma_serie-adicional'])) {
            $entrada['ja_repetiu_alguma_serie'] .= ', ' . $entrada['ja_repetiu_alguma_serie-adicional'];
        }
        if (isset($entrada['possui_acompanhante_terapeutico_em_sala-adicional'])) {
            $entrada['possui_acompanhante_terapeutico_em_sala'] .= ', ' . $entrada['possui_acompanhante_terapeutico_em_sala-adicional'];
        }
        if (isset($entrada['recebe_orientacao_aos_deveres_em_casa-adicional'])) {
            $entrada['recebe_orientacao_aos_deveres_em_casa'] .= ', ' . $entrada['recebe_orientacao_aos_deveres_em_casa-adicional'];
        }
        if (isset($entrada['faz_amigos_com_facilidade-adicional'])) {
            $entrada['faz_amigos_com_facilidade'] .= ', ' . $entrada['faz_amigos_com_facilidade-adicional'];
        }
        if (isset($entrada['adaptase_facilmente_ao_meio-adicional'])) {
            $entrada['adaptase_facilmente_ao_meio'] .= ', ' . $entrada['adaptase_facilmente_ao_meio-adicional'];
        }
        if (isset($entrada['ja_estudou_antes_em_outra_escola-adicional'])) {
            $entrada['ja_estudou_antes_em_outra_escola'] .= ', ' . $entrada['ja_estudou_antes_em_outra_escola-adicional'];
        }
        if (isset($entrada['ja_repetiu_alguma_serie-adicional'])) {
            $entrada['ja_repetiu_alguma_serie'] .= ', ' . $entrada['ja_repetiu_alguma_serie-adicional'];
        }
        if (isset($entrada['divide_quarto_com_alguem-adicional'])) {
            $entrada['divide_quarto_com_alguem'] .= ', ' . $entrada['divide_quarto_com_alguem-adicional'];
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

        if (!isset($entrada['distracoes_preferidas'])) {
            $anamnese_to->distracoes_preferidas = "Nenhuma";
        } else{
            $distracoes = $entrada['distracoes_preferidas'];
            $str_dist = "";
            foreach($distracoes as $dist) {
                $str_dist .= $dist . ",";
            }
            $anamnese_to->distracoes_preferidas = $str_dist;
            if (isset($entrada['distracoes_preferidas-adicional'])) {
                $anamnese_to->distracoes_preferidas .= ', ' . $entrada['distracoes_preferidas-adicional'];
            }
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
        return view('profissional/anamnese/terapia_ocupacional/editar', [
            'anamnese' => $anamnese,
            'paciente' => $paciente,
        ]);
    }



    public function salvarEditarTerapiaOcupacional(Request $request) {
        $entrada = $request->all();

        $anamnese_to = AnamneseTerapiaOcupacional::find($entrada['id']);
        $paciente_id = $entrada['id_paciente'];

        if(!$anamnese_to) {
            return view('erro', ['msg_erro' => "Profissional inexistente..."]);
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


        if (isset($entrada['gestacao-adicional'])) {
            $entrada['gestacao'] .= ', ' . $entrada['gestacao-adicional'];
        }
        if (isset($entrada['parto-adicional'])) {
            $entrada['parto'] .= ', ' . $entrada['parto-adicional'];
        }
        if (isset($entrada['amamentacao_natural-adicional'])) {
            $entrada['amamentacao_natural'] .= ', ' . $entrada['amamentacao_natural-adicional'];
        }
        if (isset($entrada['dificuldade_ou_atraso_no_controle_do_esfincter-adicional'])) {
            $entrada['dificuldade_ou_atraso_no_controle_do_esfincter'] .= ', ' . $entrada['dificuldade_ou_atraso_no_controle_do_esfincter-adicional'];
        }
        if (isset($entrada['desenvolvimento_motor_no_tempo_certo-adicional'])) {
            $entrada['desenvolvimento_motor_no_tempo_certo'] .= ', ' . $entrada['desenvolvimento_motor_no_tempo_certo-adicional'];
        }
        if (isset($entrada['dificuldade_na_fala-adicional'])) {
            $entrada['dificuldade_na_fala'] .= ', ' . $entrada['dificuldade_na_fala-adicional'];
        }
        if (isset($entrada['dificuldade_na_visao-adicional'])) {
            $entrada['dificuldade_na_visao'] .= ', ' . $entrada['dificuldade_na_visao-adicional'];
        }
        if (isset($entrada['dificuldade_na_locomocao-adicional'])) {
            $entrada['dificuldade_na_locomocao'] .= ', ' . $entrada['dificuldade_na_locomocao-adicional'];
        }
        if (isset($entrada['toma_banho_sozinho-adicional'])) {
            $entrada['toma_banho_sozinho'] .= ', ' . $entrada['toma_banho_sozinho-adicional'];
        }
        if (isset($entrada['escova_os_dentes_sozinho-adicional'])) {
            $entrada['escova_os_dentes_sozinho'] .= ', ' . $entrada['escova_os_dentes_sozinho-adicional'];
        }
        if (isset($entrada['usa_o_banheiro_sozinho-adicional'])) {
            $entrada['usa_o_banheiro_sozinho'] .= ', ' . $entrada['usa_o_banheiro_sozinho-adicional'];
        }
        if (isset($entrada['necessita_auxilio_para_se_vestir_ou_despir-adicional'])) {
            $entrada['necessita_auxilio_para_se_vestir_ou_despir'] .= ', ' . $entrada['necessita_auxilio_para_se_vestir_ou_despir-adicional'];
        }
        if (isset($entrada['atende_intervencoes_quando_esta_desobedecendo-adicional'])) {
            $entrada['atende_intervencoes_quando_esta_desobedecendo'] .= ', ' . $entrada['atende_intervencoes_quando_esta_desobedecendo-adicional'];
        }
        if (isset($entrada['chora_facil-adicional'])) {
            $entrada['chora_facil'] .= ', ' . $entrada['chora_facil-adicional'];
        }
        if (isset($entrada['recusa_auxílio-adicional'])) {
            $entrada['recusa_auxílio'] .= ', ' . $entrada['recusa_auxílio-adicional'];
        }
        if (isset($entrada['resistencia_ao_toque-adicional'])) {
            $entrada['resistencia_ao_toque'] .= ', ' . $entrada['resistencia_ao_toque-adicional'];
        }
        if (isset($entrada['ja_estudou_antes_em_outra_escola-adicional'])) {
            $entrada['ja_estudou_antes_em_outra_escola'] .= ', ' . $entrada['ja_estudou_antes_em_outra_escola-adicional'];
        }
        if (isset($entrada['ja_repetiu_alguma_serie-adicional'])) {
            $entrada['ja_repetiu_alguma_serie'] .= ', ' . $entrada['ja_repetiu_alguma_serie-adicional'];
        }
        if (isset($entrada['possui_acompanhante_terapeutico_em_sala-adicional'])) {
            $entrada['possui_acompanhante_terapeutico_em_sala'] .= ', ' . $entrada['possui_acompanhante_terapeutico_em_sala-adicional'];
        }
        if (isset($entrada['recebe_orientacao_aos_deveres_em_casa-adicional'])) {
            $entrada['recebe_orientacao_aos_deveres_em_casa'] .= ', ' . $entrada['recebe_orientacao_aos_deveres_em_casa-adicional'];
        }
        if (isset($entrada['faz_amigos_com_facilidade-adicional'])) {
            $entrada['faz_amigos_com_facilidade'] .= ', ' . $entrada['faz_amigos_com_facilidade-adicional'];
        }
        if (isset($entrada['adaptase_facilmente_ao_meio-adicional'])) {
            $entrada['adaptase_facilmente_ao_meio'] .= ', ' . $entrada['adaptase_facilmente_ao_meio-adicional'];
        }
        if (isset($entrada['ja_estudou_antes_em_outra_escola-adicional'])) {
            $entrada['ja_estudou_antes_em_outra_escola'] .= ', ' . $entrada['ja_estudou_antes_em_outra_escola-adicional'];
        }
        if (isset($entrada['ja_repetiu_alguma_serie-adicional'])) {
            $entrada['ja_repetiu_alguma_serie'] .= ', ' . $entrada['ja_repetiu_alguma_serie-adicional'];
        }
        if (isset($entrada['divide_quarto_com_alguem-adicional'])) {
            $entrada['divide_quarto_com_alguem'] .= ', ' . $entrada['divide_quarto_com_alguem-adicional'];
        }


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

        if (!isset($entrada['distracoes_preferidas'])) {
            $anamnese_to->distracoes_preferidas = "Nenhuma";
        } else{
            $distracoes = $entrada['distracoes_preferidas'];
            $str_dist = "";
            foreach($distracoes as $dist) {
                $str_dist .= $dist . ",";
            }
            $anamnese_to->distracoes_preferidas = $str_dist;
            if (isset($entrada['distracoes_preferidas-adicional'])) {
                $anamnese_to->distracoes_preferidas .= ', ' . $entrada['distracoes_preferidas-adicional'];
            }
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
        return redirect()->route('profissional.anamnese.terapia_ocupacional.ver', $paciente_id);
    }
}
