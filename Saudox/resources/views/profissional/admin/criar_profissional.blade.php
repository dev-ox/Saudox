@include('layouts.layoutperfil')
@include('layouts.form_css')


<script>
    // Permitir apenas numeros nos campos com essa função
    function validar_apenas_numeros(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

<div class="desktop">
    <div class="espacador_mesma_altura_top_nav"></div>
    <div style="text-align: center;">
        <div class = "caixa_form">
            <h4>Cadastrar um profissional</h4>


            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="padding: 0px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('profissional.admin.cadastro.salvar') }}">
                <!-- CROSS Site Request Forgery Protection -->
                @csrf

                <input value="{{ old('login') }}" placeholder="Login" type="text"  name="login" id="login">
                <input value="{{ old('password') }}" placeholder="Senha" type="password"  name="password" id="password">
                <input value="{{ old('nome') }}" placeholder="Nome Completo" type="text" name="nome" id="nome">
                <input value="{{ old('cpf') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="CPF (apenas números)" type="number"  name="cpf" id="cpf">
                <input value="{{ old('rg') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="RG (apenas números)" type="number"  name="rg" id="rg">
                <input value="{{ old('numero_conselho') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número do CRM (apenas números)" type="number"  name="numero_conselho" id="numero_conselho">
                <input value="{{ old('telefone_1') }}" placeholder="Telefone" type="text" name="telefone_1" id="telefone_1">
                <input value="{{ old('telefone_2') }}" placeholder="Segundo Telefone (opcional)" type="text" name="telefone_2" id="telefone_2">
                <input value="{{ old('email') }}" placeholder="E-Mail" type="text" name="email" id="email">
                <input value="{{ old('nacionalidade') }}" placeholder="Nacionalidade" type="text" name="nacionalidade" id="nacionalidade">
                <input value="{{ old('descricao_de_conhecimento_e_experiencia') }}" placeholder="Descrição do conhecimento e experiência" type="text" name="descricao_de_conhecimento_e_experiencia" id="descricao_de_conhecimento_e_experiencia">

                <hr class="hr_form">
                <h3>Endereço</h3>
                <input value="{{ old('estado') }}" placeholder="Estado" type="text" name="estado" id="estado">
                <input value="{{ old('cidade') }}" placeholder="Cidade" type="text" name="cidade" id="cidade">
                <input value="{{ old('bairro') }}" placeholder="Bairro" type="text" name="bairro" id="bairro">
                <input value="{{ old('nome_rua') }}" placeholder="Rua" type="text" name="nome_rua" id="nome_rua">
                <input value="{{ old('numero_casa') }}" class="noscroll" onkeypress='validar_apenas_numeros(event)' placeholder="Número" type="number" name="numero_casa" id="numero_casa">
                <input value="{{ old('descricao') }}" placeholder="Descrição" type="text" name="descricao" id="descricao">
                <input value="{{ old('ponto_referencia') }}" placeholder="Ponto de referência" type="text" name="ponto_referencia" id="ponto_referencia">

                <hr class="hr_form">
                <h3>Profissão</h3>
                <div class="checkbox_container">
                    <input type="checkbox" id="admin" name="profissoes[]" value="admin">
                    <label>Administrador</label><br>
                    <input type="checkbox" id="fonoaudiologo" name="profissoes[]" value="fonoaudiologo">
                    <label>Fonoaudiólogo</label><br>
                    <input type="checkbox" id="terapeuta_ocupacional" name="profissoes[]" value="terapeuta_ocupacional">
                    <label>Terapeuta Ocupacional</label><br>
                    <input type="checkbox" id="neuropsicologo" name="profissoes[]" value="neuropsicologo">
                    <label>Neuropsicólogo</label><br>
                    <input type="checkbox" id="psicologo" name="profissoes[]" value="psicologo">
                    <label>Psicologo</label><br>
                    <input type="checkbox" id="psicopedagogo" name="profissoes[]" value="psicopedagogo">
                    <label>Psicopedagogo</label><br>
                </div>

                <hr class="hr_form">
                <h3>Estado Civil</h3>
                <label for="solteiro">Solteiro</label>
                <input value="solteiro" type="radio" name="estado_civil" id="estado_civil">
                <br>
                <label for="casado">Casado</label>
                <input value="casado" type="radio" name="estado_civil" id="estado_civil">

                <input type="submit" value="Cadastrar">

            </form>
        </div>
    </div>
</div>

<script>
    // Pega a altura do topnav e coloca como a altura do espaçador, pra o topnav não ficar em cima do resto da pagina.
    document.getElementsByClassName("espacador_mesma_altura_top_nav")[0].style.height = document.getElementsByClassName("topnav")[0].getBoundingClientRect().height * 1.5;

    // Desabilida o scroll do mouse nos input de tipo number
    document.addEventListener("wheel", function(event){
        if(document.activeElement.type === "number" &&
            document.activeElement.classList.contains("noscroll"))
        {
            document.activeElement.blur();
        }
    });

</script>
