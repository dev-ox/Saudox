<h1> listagem das evolucao </h1>


<!-- TODO: listar os href pros lugares certos de cada evolucao -->

<div>
Tem-se {{ sizeof(Auth::user()->evolucaoFonoaudiologias) }} evoluções fono
<a href="/paciente/evolucao/fonoaudiologia">Evolução fono</a>
</div>


<div>
Tem-se {{ sizeof(Auth::user()->evolucao_judos) }} evoluções judo
<a href="/paciente/evolucao/judo">Evolução judo</a>
</div>


<div>
Tem-se {{ sizeof(Auth::user()->evolucao_psicologicas) }} evoluções psicologica
<a href="/paciente/evolucao/psicologica">Evolução psicologica</a>
</div>


<div>
Tem-se {{ sizeof(Auth::user()->evolucao_terapia_ocupacionals) }} evoluções terapia_ocupacional
<a href="/paciente/evolucao/terapia_ocupacional">Evolução terapia_ocupacional</a>
</div>


