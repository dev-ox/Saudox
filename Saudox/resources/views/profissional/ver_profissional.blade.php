@include('layouts.layoutperfil')
<meta content="width=device-width, initial-scale=1" name="viewport" />



<div class="desktop">
  <div class="perfil-prof">
    <h1 class="pessoal"> Perfil de {{$profissional->nome}} </h1>
    <div class="info-pessoal prof">
      <h3 class="marker-label"> Informações Pessoais: </h3>
        <label class="lbinfo-static"> Nome: </label>
        <label class="lbinfo-ntstatic">  {{$profissional->nome}} </label>
        <label class="lbinfo-static"> CPF: </label>
        <label class="lbinfo-ntstatic">  {{$profissional->cpf}} </label>
        <label class="lbinfo-static"> RG: </label>
        <label class="lbinfo-ntstatic">  {{$profissional->rg}} </label>
        <label class="lbinfo-static"> Status: </label>
        <label class="lbinfo-ntstatic"> @if($profissional->status == 1)
                                                    Ativo
                                        @else
                                                   Inativo
                                        @endif
        </label>
        <div class="extras">
        <label class="lbinfo-static"> Estado Civil: </label>
        <label class="lbinfo-ntstatic">  {{$profissional->estado_civil}} </label>
        <label class="lbinfo-static-extra"> Nacionalidade: </label>
        <label class="lbinfo-ntstatic">  {{$profissional->nacionalidade}} </label>
        @if($profissional->numero_conselho)
        <label class="lbinfo-static"> Numero Conselho: </label>
        <label class="lbinfo-ntstatic">  {{$profissional->numero_conselho}} </label>
        @endif
      </div>

    </div>

    <div class="Contato">
      <h3 class="marker-label"> Contato: </h3>
      <label class="lbinfo-static"> Email: </label>
      <label class="lbinfo-ntstatic">  {{$profissional->email}} </label>
      <label class="lbinfo-static"> Telefone 1: </label>
      <label class="lbinfo-ntstatic">  {{$profissional->telefone_1}} </label>
      @if($profissional->telefone_2)
      <label class="lbinfo-static"> Telefone 2: </label>
      <label class="lbinfo-ntstatic">  {{$profissional->telefone_2}} </label>
      @endif
    </div>

    <div class="profissoes">
    <h3 class="marker-label"> Profissões: </h3>
    <div class="profissoes-table-wrapper">
      <table class="profissoes-table">
         <tbody>
            @foreach($profissoes as $pr)
             <tr>
              <td>{{$pr}}</td>
             </tr>
            @endforeach
        </tbody>
      </table>
  </div>
</div>

    <div class="descricao">
      <h3 class="marker-label"> Conhecimento e Experiencia: </h3>
      <div class="descricao-wrapper">
      {{$profissional->descricao_de_conhecimento_e_experiencia}}
    </div>
    </div>

  </div>
</div>


<div class="celular">
  <div class="perfil-prof-phone">


  <div class="info-pessoal-phone">
    <h1 class="pessoal-phone"> Perfil de {{$profissional->nome}} </h1>
    <div class="info-pessoal-phone-prof">
      <h4 class="marker-label-phone"> Informações Pessoais: </h4>
        <div class="center-phone">
      <div class="incomplete-phone">
        <h5 class="lbinfo-static-phone"> Nome: </54>
        <h5 class="lbinfo-static-phone"> CPF: </h5>
        <h5 class="lbinfo-static-phone"> RG: </h5>
        <h5 class="lbinfo-static-phone"> Status: </h5>
        <h5 class="lbinfo-static-phone"> Estado Civil: </h5>
        <h5 class="lbinfo-static-phone"> Nacionalidade: </h5>
        @if($profissional->numero_conselho)
        <h5 class="lbinfo-static-phone"> Numero Conselho: </h5>
        @else
        <h5 class="lbinfo-static-phone"> <wbr> </h5>
        @endif
      </div>

        <div class="complete-phone">
          <h5 class="lbinfo-ntstatic-phone">  {{$profissional->nome}} </h5>
          <h5 class="lbinfo-ntstatic-phone">  {{$profissional->cpf}} </h5>
          <h5 class="lbinfo-ntstatic-phone">  {{$profissional->rg}} </h5>
          <h5 class="lbinfo-ntstatic-phone"> @if($profissional->status == 1)
                                                      Ativo
                                          @else
                                                     Inativo
                                          @endif
          </h5>
          <h5 class="lbinfo-ntstatic-phone">  {{$profissional->estado_civil}} </h5>
          <h5 class="lbinfo-ntstatic-phone">  {{$profissional->nacionalidade}} </h5>
          @if($profissional->numero_conselho)
          <h5 class="lbinfo-ntstatic-phone">  {{$profissional->numero_conselho}} </h5>
          @endif
        </div>

  </div>
</div>
</div>

  <div class="contato-phone">
    <h4 class="marker-label-phone"> Contato: </h4>
    <div class="center-phone">
    <div class="incomplete-phone">
      <h5 class="lbinfo-static-phone"> Email: </h5>
      <h5 class="lbinfo-static-phone"> Telefone 1: </h5>
      @if($profissional->telefone_2)
      <h5 class="lbinfo-static-phone"> Telefone 2: </h5>
      @else
      <h5 class="lbinfo-static-phone"> <wbr> </h5>
      @endif
    </div>

    <div class="complete-phone-contato">
      <h5 class="lbinfo-ntstatic-phone">  {{$profissional->email}} </h5l>
      <h5 class="lbinfo-ntstatic-phone">  {{$profissional->telefone_1}} </h5>
      @if($profissional->telefone_2)
      <h5 class="lbinfo-ntstatic-phone">  {{$profissional->telefone_2}} </h5>
      @endif
    </div>
  </div>
  </div>

  <div class="profissoes-phone">
    <h4 class="marker-label-phone"> Profissões: </h4>
    <div class="center-phone">
    <div class="profissoes-table-wrapper-phone">
      <table class="profissoes-table-phone">
         <tbody>
            @foreach($profissoes as $pr)
             <tr>
              <td class="tbcell-profissoes-phone"><b> {{$pr}} </b></td>
             </tr>
            @endforeach
        </tbody>
      </table>
  </div>
</div>
  </div>

  <div class="descricao-phone">
  <h4 class="marker-label-phone"> Conhecimento e Experiencia: </h4>
  <div class="center-phone">
  <div class="descricao-wrapper-phone">
      {{$profissional->descricao_de_conhecimento_e_experiencia}}
  </div>
  </div>
</div>
</div>
</div>
