@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top+nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <br>
                    <h1>Anamnese terapia ocupacional de {{$paciente->nome_paciente}}</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{route('profissional.anamnese.terapia_ocupacional.salvar')}}">

                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf

                        <input value="{{$paciente->id}}" type="hidden"  name="id_paciente" id="id_paciente">
                        <input value="{{Auth::id()}}" type="hidden"  name="id_profissional" id="id_profissional">

                        <hr class="hr_form">
                        <h3>Informações sobre a gestação</h3><br>

                        <label class="required">Gestação:</label><br>
                        <label for="gestacao">Completa</label>
                        <input value="Completa" type="radio" name="gestacao" id="gestacao">
                        <label for="gestacao">Prematura</label>
                        <input value="Prematura" type="radio" name="gestacao" id="gestacao">
                        <label for="gestacao">Pós-matura</label>
                        <input value="Pós-matura" type="radio" name="gestacao" id="gestacao">
                        <input value="{{ old('gestacao') }}" placeholder="Informações adicionais" type="text" name="gestacao-adicional" id="gestacao">

                        <label class="required">Doenças da mãe na gravidez:</label><br>
                        <input value="{{ old('doencas_da_mae_na_gravidez') }}" placeholder="Doenças durante a gravidez" type="text" name="doencas_da_mae_na_gravidez" id="doencas_da_mae_na_gravidez">
                        <label class="required">Inquietações da mãe na gravidez:</label><br>
                        <input value="{{ old('inquietacoes_da_mae_na_gravidez') }}" placeholder="Inquietações durante a gravidez" type="text" name="inquietacoes_da_mae_na_gravidez" id="inquietacoes_da_mae_na_gravidez">

                        <label class="required">Parto:</label><br>
                        <label for="parto">Normal</label>
                        <input value="Normal" type="radio" name="parto" id="parto">
                        <label for="parto">Cesariana</label>
                        <input value="Cesariana" type="radio" name="parto" id="parto">
                        <label for="parto">Induzido</label>
                        <input value="Induzido" type="radio" name="parto" id="parto">
                        <input value="{{ old('parto') }}" placeholder="Informações adicionais" type="text" name="parto-adicional" id="parto">

                        <label class="required">Amamentação:</label><br>
                        <label for="amamentacao_natural">Materna</label>
                        <input value="Materna" type="radio" name="amamentacao_natural" id="amamentacao_natural">
                        <label for="amamentacao_natural">Artificial</label>
                        <input value="Artificial" type="radio" name="amamentacao_natural" id="amamentacao_natural">
                        <input value="{{ old('amamentacao_natural') }}" placeholder="Informações adicionais" type="text" name="amamentacao_natural-adicional" id="amamentacao_natural">


                        <label class="required">Dificuldade ou atraso no controle do esfíncter:</label><br>
                        <label for="dificuldade_ou_atraso_no_controle_do_esfincter">Sim</label>
                        <input value="Sim" type="radio" name="dificuldade_ou_atraso_no_controle_do_esfincter" id="dificuldade_ou_atraso_no_controle_do_esfincter">
                        <label for="dificuldade_ou_atraso_no_controle_do_esfincter">Não</label>
                        <input value="Não" type="radio" name="dificuldade_ou_atraso_no_controle_do_esfincter" id="dificuldade_ou_atraso_no_controle_do_esfincter">
                        <input value="{{ old('dificuldade_ou_atraso_no_controle_do_esfincter') }}" placeholder="(Nenhuma ou quais?)" type="text" name="dificuldade_ou_atraso_no_controle_do_esfincter-adicional" id="dificuldade_ou_atraso_no_controle_do_esfincter">


                        <label class="required">Desenvolvimento motor no tempo certo:</label><br>
                        <label for="desenvolvimento_motor_no_tempo_certo">Sim</label>
                        <input value="Sim" type="radio" name="desenvolvimento_motor_no_tempo_certo" id="desenvolvimento_motor_no_tempo_certo">
                        <label for="desenvolvimento_motor_no_tempo_certo">Não</label>
                        <input value="Não" type="radio" name="desenvolvimento_motor_no_tempo_certo" id="desenvolvimento_motor_no_tempo_certo">
                        <input value="{{ old('desenvolvimento_motor_no_tempo_certo') }}" placeholder="(Sim? Não? Quanto tempo?)" type="text" name="desenvolvimento_motor_no_tempo_certo-adicional" id="desenvolvimento_motor_no_tempo_certo">


                        <label class="required">Perturbações no sono?</label><br>
                        <input value="{{ old('perturbacoes_no_sono') }}" placeholder="(Nenhuma, pesadelos, sonambulismo, agitação, etc.)" type="text" name="perturbacoes_no_sono" id="perturbacoes_no_sono">
                        <label class="required">Hábitos especiais?</label><br>
                        <input value="{{ old('habitos_especiais_ao_dormir') }}" placeholder="(Nenhum, requer a presença de alguém, medos, etc.)" type="text" name="habitos_especiais_ao_dormir" id="habitos_especiais_ao_dormir">
                        <label class="required">Troca letras ou fonemas:</label><br>
                        <input value="{{ old('troca_letras_ou_fonemas') }}" placeholder="(Sim? Não? Quais?)" type="text" name="troca_letras_ou_fonemas" id="troca_letras_ou_fonemas">
                        <hr class="hr_form">


                        <h3>Estado atual da criança</h3><br>
                        <label class="required">Dificuldade na fala:</label><br>
                        <label for="dificuldade_na_fala">Sim</label>
                        <input value="Sim" type="radio" name="dificuldade_na_fala" id="dificuldade_na_fala">
                        <label for="dificuldade_na_fala">Não</label>
                        <input value="Não" type="radio" name="dificuldade_na_fala" id="dificuldade_na_fala">
                        <input value="{{ old('dificuldade_na_fala') }}" placeholder="Quais?" type="text" name="dificuldade_na_fala-adicional" id="dificuldade_na_fala">

                        <label class="required">Dificuldade na visão:</label><br>
                        <label for="dificuldade_na_visao">Sim</label>
                        <input value="Sim" type="radio" name="dificuldade_na_visao" id="dificuldade_na_visao">
                        <label for="dificuldade_na_visao">Não</label>
                        <input value="Não" type="radio" name="dificuldade_na_visao" id="dificuldade_na_visao">
                        <input value="{{ old('dificuldade_na_visao') }}" placeholder="Quais?" type="text" name="dificuldade_na_visao-adicional" id="dificuldade_na_visao-adicional">


                        <label class="required">Dificuldade na locomoção:</label><br>
                        <label for="dificuldade_na_locomocao">Sim</label>
                        <input value="Sim" type="radio" name="dificuldade_na_locomocao" id="dificuldade_na_locomocao">
                        <label for="dificuldade_na_locomocao">Não</label>
                        <input value="Não" type="radio" name="dificuldade_na_locomocao" id="dificuldade_na_locomocao">
                        <input value="{{ old('dificuldade_na_locomocao') }}" placeholder="Quais?" type="text" name="dificuldade_na_locomocao-adicional" id="dificuldade_na_locomocao">

                        <label class="required">Movimentos estereotipados:</label><br>
                        <label for="movimentos_estereotipados">Sim</label>
                        <input value="1" type="radio" name="movimentos_estereotipados" id="movimentos_estereotipados">
                        <label for="movimentos_estereotipados">Não</label>
                        <input value="0" type="radio" name="movimentos_estereotipados" id="movimentos_estereotipados"><br>

                        <label class="required">Ecolalias:</label><br>
                        <label for="ecolalias">Sim</label>
                        <input value="1" type="radio" name="ecolalias" id="ecolalias">
                        <label for="ecolalias">Não</label>
                        <input value="0" type="radio" name="ecolalias" id="ecolalias"><br>



                        <hr class="hr_form">
                        <h3>É dependente em quais nas AVDs (atividades de vida diária)?</h3><br>
                        <label class="required">Toma banho sozinho:</label><br>
                        <label for="toma_banho_sozinho">Sim</label>
                        <input value="Sim" type="radio" name="toma_banho_sozinho" id="toma_banho_sozinho">
                        <label for="toma_banho_sozinho">Não</label>
                        <input value="Não" type="radio" name="toma_banho_sozinho" id="toma_banho_sozinho">
                        <input value="{{ old('toma_banho_sozinho') }}" placeholder="Informações Adicionais" type="text" name="toma_banho_sozinho-adicional" id="toma_banho_sozinho">


                        <label class="required">Escova os dentes sozinho:</label><br>
                        <label for="escova_os_dentes_sozinho">Sim</label>
                        <input value="Sim" type="radio" name="escova_os_dentes_sozinho" id="escova_os_dentes_sozinho">
                        <label for="escova_os_dentes_sozinho">Não</label>
                        <input value="Não" type="radio" name="escova_os_dentes_sozinho" id="escova_os_dentes_sozinho">
                        <input value="{{ old('escova_os_dentes_sozinho') }}" placeholder="Informações Adicionais" type="text" name="escova_os_dentes_sozinho-adicional" id="escova_os_dentes_sozinho">

                        <label class="required">Usa o banheiro sozinho:</label><br>
                        <label for="usa_o_banheiro_sozinho">Sim</label>
                        <input value="Sim" type="radio" name="usa_o_banheiro_sozinho" id="usa_o_banheiro_sozinho">
                        <label for="usa_o_banheiro_sozinho">Não</label>
                        <input value="Não" type="radio" name="usa_o_banheiro_sozinho" id="usa_o_banheiro_sozinho">
                        <input value="{{ old('usa_o_banheiro_sozinho') }}" placeholder="Informações Adicionais" type="text" name="usa_o_banheiro_sozinho-adicional" id="usa_o_banheiro_sozinho">

                        <label class="required">Necessita auxílio para se vestir ou despir:</label><br>
                        <label for="necessita_auxilio_para_se_vestir_ou_despir">Sim</label>
                        <input value="Sim" type="radio" name="necessita_auxilio_para_se_vestir_ou_despir" id="necessita_auxilio_para_se_vestir_ou_despir">
                        <label for="necessita_auxilio_para_se_vestir_ou_despir">Não</label>
                        <input value="Não" type="radio" name="necessita_auxilio_para_se_vestir_ou_despir" id="necessita_auxilio_para_se_vestir_ou_despir">
                        <input value="{{ old('necessita_auxilio_para_se_vestir_ou_despir') }}" placeholder="Informações Adicionais" type="text" name="necessita_auxilio_para_se_vestir_ou_despir-adicional" id="necessita_auxilio_para_se_vestir_ou_despir">

                        <label class="required">Idade da retirada das fraldas:</label><br>
                        <input value="{{ old('idade_da_retirada_das_fraldas') }}" placeholder="Ex:. 8 meses" type="text" name="idade_da_retirada_das_fraldas" id="idade_da_retirada_das_fraldas">


                        <hr class="hr_form">
                        <h3>Tendencias próprias</h3><br>
                        <label class="required">Atende intervenções quando está desobedecendo:</label><br>
                        <label for="atende_intervencoes_quando_esta_desobedecendo">Sim</label>
                        <input value="Sim" type="radio" name="atende_intervencoes_quando_esta_desobedecendo" id="atende_intervencoes_quando_esta_desobedecendo">
                        <label for="atende_intervencoes_quando_esta_desobedecendo">Não</label>
                        <input value="Não" type="radio" name="atende_intervencoes_quando_esta_desobedecendo" id="atende_intervencoes_quando_esta_desobedecendo">
                        <input value="{{ old('atende_intervencoes_quando_esta_desobedecendo') }}" placeholder="Informações Adicionais" type="text" name="atende_intervencoes_quando_esta_desobedecendo-adicional" id="atende_intervencoes_quando_esta_desobedecendo">

                        <label class="required">Chora fácil:</label><br>
                        <label for="chora_facil">Sim</label>
                        <input value="Sim" type="radio" name="chora_facil" id="chora_facil">
                        <label for="chora_facil">Não</label>
                        <input value="Não" type="radio" name="chora_facil" id="chora_facil">
                        <input value="{{ old('chora_facil') }}" placeholder="Informações Adicionais" type="text" name="chora_facil-adicional" id="chora_facil">

                        <label class="required">Recusa auxílio:</label><br>
                        <label for="recusa_auxílio">Sim</label>
                        <input value="Sim" type="radio" name="recusa_auxílio" id="recusa_auxílio">
                        <label for="recusa_auxílio">Não</label>
                        <input value="Não" type="radio" name="recusa_auxílio" id="recusa_auxílio">
                        <input value="{{ old('recusa_auxílio') }}" placeholder="Informações Adicionais" type="text" name="recusa_auxílio-adicional" id="recusa_auxílio">

                        <label class="required">Resistência ao toque:</label><br>
                        <label for="resistencia_ao_toque">Sim</label>
                        <input value="Sim" type="radio" name="resistencia_ao_toque" id="resistencia_ao_toque">
                        <label for="resistencia_ao_toque">Não</label>
                        <input value="Não" type="radio" name="resistencia_ao_toque" id="resistencia_ao_toque">
                        <input value="{{ old('resistencia_ao_toque') }}" placeholder="Informações Adicionais" type="text" name="resistencia_ao_toque-adicional" id="resistencia_ao_toque">

                        <hr class="hr_form">
                        <h3>Escolaridade</h3><br>
                        <label class="required">Criança estuda?</label><br>
                        <label for="crianca_estuda">Sim</label>
                        <input value="1" type="radio" name="crianca_estuda" id="crianca_estuda">
                        <label for="crianca_estuda">Não</label>
                        <input value="0" type="radio" name="crianca_estuda" id="crianca_estuda"><br>
                        <label class="required">Já estudou antes em outra escola?</label><br>
                        <label for="ja_estudou_antes_em_outra_escola">Sim</label>
                        <input value="Sim" type="radio" name="ja_estudou_antes_em_outra_escola" id="ja_estudou_antes_em_outra_escola">
                        <label for="ja_estudou_antes_em_outra_escola">Não</label>
                        <input value="Não" type="radio" name="ja_estudou_antes_em_outra_escola" id="ja_estudou_antes_em_outra_escola"><br>
                        <input value="{{ old('ja_estudou_antes_em_outra_escola') }}" placeholder="Informações Adicionais" type="text" name="ja_estudou_antes_em_outra_escola-adicional" id="ja_estudou_antes_em_outra_escola">
                        <label class="required">Motivo da transferência escolar:</label><br>
                        <input value="{{ old('motivo_transferencia_escola_se_estudou_em_outra_antes') }}" placeholder="Motivo da transferência (Se já estudou em outra)" type="text" name="motivo_transferencia_escola_se_estudou_em_outra_antes" id="motivo_transferencia_escola_se_estudou_em_outra_antes">

                        <label class="required">Já repetiu alguma série?</label><br>
                        <label for="ja_repetiu_alguma_serie">Sim</label>
                        <input value="Sim" type="radio" name="ja_repetiu_alguma_serie" id="ja_repetiu_alguma_serie">
                        <label for="ja_repetiu_alguma_serie">Não</label>
                        <input value="Não" type="radio" name="ja_repetiu_alguma_serie" id="ja_repetiu_alguma_serie">
                        <input value="{{ old('ja_repetiu_alguma_serie') }}" placeholder="Qual?" type="text" name="ja_repetiu_alguma_serie-adicional" id="ja_repetiu_alguma_serie">

                        <label class="required">Possui acompanhante terapêutico em sala?</label><br>
                        <label for="possui_acompanhante_terapeutico_em_sala">Sim</label>
                        <input value="Sim" type="radio" name="possui_acompanhante_terapeutico_em_sala" id="possui_acompanhante_terapeutico_em_sala">
                        <label for="possui_acompanhante_terapeutico_em_sala">Não</label>
                        <input value="Não" type="radio" name="possui_acompanhante_terapeutico_em_sala" id="possui_acompanhante_terapeutico_em_sala">
                        <input value="{{ old('possui_acompanhante_terapeutico_em_sala') }}" placeholder="Informações Adicionais" type="text" name="possui_acompanhante_terapeutico_em_sala-adicional" id="possui_acompanhante_terapeutico_em_sala">

                        <label class="required">Recebe orientação para fazer deveres escolares em casa?</label><br>
                        <label for="recebe_orientacao_aos_deveres_em_casa">Sim</label>
                        <input value="Sim" type="radio" name="recebe_orientacao_aos_deveres_em_casa" id="recebe_orientacao_aos_deveres_em_casa">
                        <label for="recebe_orientacao_aos_deveres_em_casa">Não</label>
                        <input value="Não" type="radio" name="recebe_orientacao_aos_deveres_em_casa" id="recebe_orientacao_aos_deveres_em_casa">
                        <input value="{{ old('recebe_orientacao_aos_deveres_em_casa') }}" placeholder="Informações Adicionais" type="text" name="recebe_orientacao_aos_deveres_em_casa-adicional" id="recebe_orientacao_aos_deveres_em_casa">

                        <label class="required">Quem orienta nos deveres em casa?</label><br>
                        <input value="{{ old('quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres') }}" placeholder="Se é orientado, quem orienta?" type="text" name="quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres" id="quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres">

                        <label class="required">Durante quanto tempo?</label><br>
                        <input value="{{ old('quanto_tempo_executa_os_deveres_em_casa') }}" placeholder="Tempo de orientação" type="text" name="quanto_tempo_executa_os_deveres_em_casa" id="quanto_tempo_executa_os_deveres_em_casa">


                        <hr class="hr_form">
                        <h3>Participa de algumas das atividades abaixo? (Se não participar, deixar vazio)</h3><br>
                        <label>Quais linguas estrangeiras fala?</label><br>
                        <input value="{{ old('quais_linguas_estrangeiras_fala') }}" placeholder="Linguas (separar por vírgula)" type="text" name="quais_linguas_estrangeiras_fala" id="quais_linguas_estrangeiras_fala">
                        <label>Quais esportes prática?</label><br>
                        <input value="{{ old('quais_esportes_pratica') }}" placeholder="Esportes (separar por vírgula) " type="text" name="quais_esportes_pratica" id="quais_esportes_pratica">
                        <label>Quais intrumentos toca?</label><br>
                        <input value="{{ old('quais_intrumentos_toca') }}" placeholder="Instrumentos (separar por vírgula)" type="text" name="quais_intrumentos_toca" id="quais_intrumentos_toca">
                        <label>Outras atividades práticadas:</label><br>
                        <input value="{{ old('outras_atividades_que_pratica') }}" placeholder="Atividades (Separar por vírgula)" type="text" name="outras_atividades_que_pratica" id="outras_atividades_que_pratica">

                        <hr class="hr_form">
                        <h3>Sociabilidade</h3><br>
                        <label class="required">Faz amigos com facilidade?</label><br>
                        <label for="faz_amigos_com_facilidade">Sim</label>
                        <input value="Sim" type="radio" name="faz_amigos_com_facilidade" id="faz_amigos_com_facilidade">
                        <label for="faz_amigos_com_facilidade">Não</label>
                        <input value="Não" type="radio" name="faz_amigos_com_facilidade" id="faz_amigos_com_facilidade">
                        <input value="{{ old('faz_amigos_com_facilidade') }}" placeholder="Informações Adicionais" type="text" name="faz_amigos_com_facilidade-adicional" id="faz_amigos_com_facilidade">

                        <label class="required">Adapta-se facilmente ao meio?</label><br>
                        <label for="adaptase_facilmente_ao_meio">Sim</label>
                        <input value="Sim" type="radio" name="adaptase_facilmente_ao_meio" id="adaptase_facilmente_ao_meio">
                        <label for="adaptase_facilmente_ao_meio">Não</label>
                        <input value="Não" type="radio" name="adaptase_facilmente_ao_meio" id="adaptase_facilmente_ao_meio">
                        <input value="{{ old('adaptase_facilmente_ao_meio') }}" placeholder="Informações Adicionais" type="text" name="adaptase_facilmente_ao_meio-adicional" id="adaptase_facilmente_ao_meio">

                        <label class="required">Companheiros da criança nas brincadeiras:</label><br>
                        <input value="{{ old('companheiros_da_crianca_em_brincadeiras') }}" placeholder="Quem acompanha a criança nas brincadeiras?" type="text" name="companheiros_da_crianca_em_brincadeiras" id="companheiros_da_crianca_em_brincadeiras">

                        <label class="required">Escolha de grupo:</label><br>
                        <label for="escolha_de_grupo">Mesmo Sexo</label>
                        <input value="Mesmo Sexo" type="checkbox" name="escolha_de_grupo[1]" id="escolha_de_grupo">
                        <label for="escolha_de_grupo">Sexo Oposto</label>
                        <input value="Sexo Oposto" type="checkbox" name="escolha_de_grupo[2]" id="escolha_de_grupo">
                        <label for="escolha_de_grupo">Criança da Mesma Idade</label>
                        <input value="Criança da Mesma Idade" type="checkbox" name="escolha_de_grupo[3]" id="escolha_de_grupo"><br>
                        <label for="escolha_de_grupo">Criança Mais Nova</label>
                        <input value="Criança Mais Nova" type="checkbox" name="escolha_de_grupo[4]" id="escolha_de_grupo">
                        <label for="escolha_de_grupo">Criança Mais Velha</label>
                        <input value="Criança Mais Velha" type="checkbox" name="escolha_de_grupo[5]" id="escolha_de_grupo">
                        <label for="escolha_de_grupo">Nenhum</label>
                        <input value="Nenhum" type="checkbox" name="escolha_de_grupo[6]" id="escolha_de_grupo"><br>

                        <label class="required">Distrações preferidas:</label><br>
                        <label for="distracoes_preferidas">Televisão</label>
                        <input value="Televisão" type="checkbox" name="distracoes_preferidas[1]" id="distracoes_preferidas">
                        <label for="distracoes_preferidas">Música</label>
                        <input value="Música" type="checkbox" name="distracoes_preferidas[2]" id="distracoes_preferidas">
                        <label for="distracoes_preferidas">Leitura</label>
                        <input value="Leitura" type="checkbox" name="distracoes_preferidas[3]" id="distracoes_preferidas"><br>
                        <label for="distracoes_preferidas">Celular</label>
                        <input value="Celular" type="checkbox" name="distracoes_preferidas[4]" id="distracoes_preferidas">
                        <label for="distracoes_preferidas">Brinquedos</label>
                        <input value="Brinquedos" type="checkbox" name="distracoes_preferidas[5]" id="distracoes_preferidas">
                        <label for="distracoes_preferidas">Computador</label>
                        <input value="Computador" type="checkbox" name="distracoes_preferidas[6]" id="distracoes_preferidas"><br>
                        <label for="distracoes_preferidas">Nenhuma</label>
                        <input value="Nenhum" type="checkbox" name="distracoes_preferidas[7]" id="distracoes_preferidas"><br><br>
                        <label for="distracoes_preferidas">Outras distrações</label>
                        <input value="{{ old('distracoes_preferidas') }}" placeholder="Outras distrações" type="text" name="distracoes_preferidas-adicional" id="distracoes_preferidas">


                        <hr class="hr_form">
                        <h3>Atitudes sociais predominantes:</h3><br>
                        <label class="required">Obediente:</label>
                        <br>
                        <label for="obediente">Sim</label>
                        <input value="1" type="radio" name="obediente" id="obediente">
                        <label for="obediente">Não</label>
                        <input value="0" type="radio" name="obediente" id="obediente"><br>

                        <label class="required">Dependente:</label>
                        <br>
                        <label for="dependente">Sim</label>
                        <input value="1" type="radio" name="dependente" id="dependente">
                        <label for="dependente">Não</label>
                        <input value="0" type="radio" name="dependente" id="dependente"><br>
                        <input value="{{ old('descricao_se_sim_dependente') }}" placeholder="Informações adicionais: Dependente" type="text" name="descricao_se_sim_dependente" id="descricao_se_sim_dependente"> <br>

                        <label class="required">Independente:</label>
                        <br>
                        <label for="independente">Sim</label>
                        <input value="1" type="radio" name="independente" id="independente">
                        <label for="independente">Não</label>
                        <input value="0" type="radio" name="independente" id="independente"><br>
                        <input value="{{ old('descricao_se_sim_indepedente') }}" placeholder="Informações adicionais: Independente" type="text" name="descricao_se_sim_indepedente" id="descricao_se_sim_indepedente"><br>

                        <label class="required">Comunicativo:</label>
                        <br>
                        <label for="comunicativo">Sim</label>
                        <input value="1" type="radio" name="comunicativo" id="comunicativo">
                        <label for="comunicativo">Não</label>
                        <input value="0" type="radio" name="comunicativo" id="comunicativo"><br>

                        <label class="required">Agressivo:</label>
                        <br>
                        <label for="agressivo">Sim</label>
                        <input value="1" type="radio" name="agressivo" id="agressivo">
                        <label for="agressivo">Não</label>
                        <input value="0" type="radio" name="agressivo" id="agressivo"><br>
                        <input value="{{ old('descricao_se_sim_agressivo') }}" placeholder="Informações adicionais: Agressivo" type="text" name="descricao_se_sim_agressivo" id="descricao_se_sim_agressivo">

                        <label class="required">Cooperativo:</label>
                        <br>
                        <label for="cooperativo">Sim</label>
                        <input value="1" type="radio" name="cooperativo" id="cooperativo">
                        <label for="cooperativo">Não</label>
                        <input value="0" type="radio" name="cooperativo" id="cooperativo"><br>
                        <input value="{{ old('descricao_se_sim_cooperador') }}" placeholder="Informações adicionais: Cooperativo" type="text" name="descricao_se_sim_cooperador" id="descricao_se_sim_cooperador">


                        <hr class="hr_form">
                        <h3>Emocionais</h3><br>
                        <label class="required">Trânquilo</label><br>
                        <label for="tranquilo">Sim</label>
                        <input value="1" type="radio" name="tranquilo" id="tranquilo">
                        <label for="tranquilo">Não</label>
                        <input value="0" type="radio" name="tranquilo" id="tranquilo"><br>

                        <label class="required">Seguro</label><br>
                        <label for="seguro">Sim</label>
                        <input value="1" type="radio" name="seguro" id="seguro">
                        <label for="seguro">Não</label>
                        <input value="0" type="radio" name="seguro" id="seguro"><br>

                        <label class="required">Ansioso</label><br>
                        <label for="ansioso">Sim</label>
                        <input value="1" type="radio" name="ansioso" id="ansioso">
                        <label for="ansioso">Não</label>
                        <input value="0" type="radio" name="ansioso" id="ansioso"><br>

                        <label class="required">Emotivo</label><br>
                        <label for="emotivo">Sim</label>
                        <input value="1" type="radio" name="emotivo" id="emotivo">
                        <label for="emotivo">Não</label>
                        <input value="0" type="radio" name="emotivo" id="emotivo"><br>

                        <label class="required">Alegre</label><br>
                        <label for="alegre">Sim</label>
                        <input value="1" type="radio" name="alegre" id="alegre">
                        <label for="alegre">Não</label>
                        <input value="0" type="radio" name="alegre" id="alegre"><br>

                        <label class="required">Queixoso</label><br>
                        <label for="queixoso">Sim</label>
                        <input value="1" type="radio" name="queixoso" id="queixoso">
                        <label for="queixoso">Não</label>
                        <input value="0" type="radio" name="queixoso" id="queixoso"><br>


                        <hr class="hr_form">
                        <h3>Sono:</h3><br>
                        <label class="required">Insônia</label><br>
                        <label for="insonia">Sim</label>
                        <input value="1" type="radio" name="insonia" id="insonia">
                        <label for="insonia">Não</label>
                        <input value="0" type="radio" name="insonia" id="insonia"><br>

                        <label class="required">Pesadelos</label><br>
                        <label for="pesadelos">Sim</label>
                        <input value="1" type="radio" name="pesadelos" id="pesadelos">
                        <label for="pesadelos">Não</label>
                        <input value="0" type="radio" name="pesadelos" id="pesadelos"><br>

                        <label class="required">Hipersonia</label><br>
                        <label for="hipersonia">Sim</label>
                        <input value="1" type="radio" name="hipersonia" id="hipersonia">
                        <label for="hipersonia">Não</label>
                        <input value="0" type="radio" name="hipersonia" id="hipersonia"><br>

                        <label class="required">Dorme sozinho?</label><br>
                        <label for="dorme_sozinho">Sim</label>
                        <input value="1" type="radio" name="dorme_sozinho" id="dorme_sozinho">
                        <label for="dorme_sozinho">Não</label>
                        <input value="0" type="radio" name="dorme_sozinho" id="dorme_sozinho"><br>

                        <label class="required">Dorme no quarto dos pais?</label><br>
                        <label for="dorme_no_quarto_dos_pais">Sim</label>
                        <input value="1" type="radio" name="dorme_no_quarto_dos_pais" id="dorme_no_quarto_dos_pais">
                        <label for="dorme_no_quarto_dos_pais">Não</label>
                        <input value="0" type="radio" name="dorme_no_quarto_dos_pais" id="dorme_no_quarto_dos_pais"><br>

                        <label class="required">Divide quarto com alguem?</label><br>
                        <label for="divide_quarto_com_alguem">Sim</label>
                        <input value="Sim" type="radio" name="divide_quarto_com_alguem" id="divide_quarto_com_alguem">
                        <label for="divide_quarto_com_alguem">Não</label>
                        <input value="Não" type="radio" name="divide_quarto_com_alguem" id="divide_quarto_com_alguem"><br>
                        <input value="{{ old('divide_quarto_com_alguem') }}" placeholder="Informações Adicionais" type="text" name="divide_quarto_com_alguem-adicional" id="divide_quarto_com_alguem">

                        <hr class="hr_form">
                        <h3 class="required">Medidas disciplinares empregadas pelos pais</h3><br>
                        <input value="{{ old('medidas_disciplinares_empregadas_pelos_pais') }}" placeholder="Medidas disciplinares" type="text" name="medidas_disciplinares_empregadas_pelos_pais" id="medidas_disciplinares_empregadas_pelos_pais">

                        <hr class="hr_form">
                        <h3 class="required">Reação do filho ao ser contráriado</h3> <br>
                        <input value="{{ old('reação_do_filho_ao_ser_contrariado') }}" placeholder="Reação da criança ao ser contráriado" type="text" name="reação_do_filho_ao_ser_contrariado" id="reação_do_filho_ao_ser_contrariado">
                        <label class="required">Atitude dos pais à reação do filho ao ser contráriado:</label><br>
                        <input value="{{ old('atitude_dos_pais_a_reacao_filho_contrareado') }}" placeholder="Atidude dos pais à reação do filho" type="text" name="atitude_dos_pais_a_reacao_filho_contrareado" id="atitude_dos_pais_a_reacao_filho_contrareado">

                        <hr class="hr_form">
                        <h3>Saúde</h3><br>
                        <label class="required">Acompanhamento médico?</label><br>
                        <input value="{{ old('acompanhamento_medico') }}" placeholder="Acompanhamento médico" type="text" name="acompanhamento_medico" id="acompanhamento_medico">

                        <label class="required">Médico responsável:</label><br>
                        <input value="{{ old('qual_medico_responsavel') }}" placeholder="Médico responsável" type="text" name="qual_medico_responsavel" id="qual_medico_responsavel">

                        <label class="required">Diagnostico medico:</label><br>
                        <textarea class="textareas_form" id="diagnostico_medico" name="diagnostico_medico" rows="4" cols="50" style=""></textarea>



                        <input type="submit" value="Cadastrar">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
