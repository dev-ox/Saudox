<h1> listagem das anamnese </h1>

<div>
Id_tp = {{ Auth::user()->anamneseGigantePsicopedaNeuroPsicomotos()->id_tp }} da anamneses psicopedagogica/neurologica/psicopedagogica
<a href="/paciente/anamnese/psicopedagogia">AnamneseGigantePsicopedaNeuroPsicomotofono</a>
</div>

<div>
Tem-se {{ sizeof(Auth::user()->anamneseFonoaudiologias) }} anamneses fonoaudiologicas
<a href="/paciente/anamnese/fonoaudiologia">AnamneseFonoaudiologia</a>
</div>

<div>
Tem-se {{ sizeof(Auth::user()->anamnese__terapia__ocupacionals) }} anamneses terapia_ocupacional
<a href="/paciente/anamnese/terapia_ocupacional">anamnese__terapia__ocupacionals</a>
</div>
