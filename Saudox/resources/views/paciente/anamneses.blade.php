<h1> listagem das anamnese </h1>

<div>
Id_tp = {{ Auth::user()->anamnese__psicopeda__neuro__psicomotos()->id_tp }} da anamneses psicopedagogica/neurologica/psicopedagogica
<a href="/paciente/anamnese/psicopedagogia">AnamneseGigantePsicopedaNeuroPsicomotofono</a>
</div>

<div>
Tem-se {{ sizeof(Auth::user()->anamnese_fonoaudiologias) }} anamneses fonoaudiologicas
<a href="/paciente/anamnese/fonoaudiologia">AnamneseFonoaudiologia</a>
</div>

<div>
Tem-se {{ sizeof(Auth::user()->anamnese__terapia__ocupacionals) }} anamneses terapia_ocupacional
<a href="/paciente/anamnese/terapia_ocupacional">anamnese__terapia__ocupacionals</a>
</div>
