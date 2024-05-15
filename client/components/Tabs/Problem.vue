<script setup>
const content = {
  val: [
    {
      title: 'Augment del preu vivenda a València',
      icon: 'lucide:line-chart',
      text: 'A València, els preus de la vivenda s’han disparat en els últims dos anys afavorits per l’especulació urbanística i els apartaments turístics, reduint l’oferta per als valencians/nes.  La gentrificació i la manca de mesures polítiques per part dels governs de Catalá i  Mazón augmenten els desnonaments, afectant a joves i famílies d’ingressos mitjans i baixos. #QueNoTeTire'
    },
    {
      title: 'Expulsió dels barris i substitució de veïnat per turistes',
      icon: 'lucide:camera',
      text: 'El fet que la majoria de vivenda disponible es destine al lloguer turístic ha reduït l’oferta dels pisos de lloguer de llarga estada, provocant un augment de preus exponencial mai vist a la nostra ciutat. Actualment, els preus de lloguer de llarga estada a València estan al nivell dels de París. Tot açò està provocant l’expulsió massiva de veïns i veïnes als nostres barris, que estan deixant de ser barris per convertir-se en magatzems de turistes. #QueNoTeTiren'
    },
    {
      title: 'Problema per a la joventut',
      icon: '',
      text: 'El País Valencià és un dels països d’Europa on les persones joves més tard s’emancipen de casa dels seus pares (a partir dels 30 anys), per damunt inclús de la mitjana espanyola. Al problema de l’atur juvenil s’hi suma la incapacitat de trobar una vivenda, obligant a joves i famílies a compartir habitacions en condicions de precarietat. #QueNoTeTiren'
    },
    {
      title: 'Problema per a les famílies',
      icon: '',
      text: 'L’augment del preu de la vivenda junt al d’altres bens i serveis de primera necessitat degut a la inflació fa que moltes famílies, inclús amb dos i tres sous, no siguen capaços d’arribar a final de mes. L’augment de preu d’hipoteques i lloguers està col·locant de nou a moltes famílies en situació de desnonament i expulsió #QueNoTeTiren'
    },
    {
      title: 'Problema per a la gent gran',
      icon: '',
      text: 'Les persones majors estan especialment desprotegides davant l’especulació amb la vivenda i les actuacions de molts fons d’inversió per quedar-se amb edificis de renda antiga on viuen persones de la tercera edat. #QueNoTeTiren'
    }
  ],
  cas: [
    {
      title: '',
      icon: '',
      text: ''
    }
  ]
}
</script>

<template>
  <div>
    <h3 class="visually-hidden">El problema</h3>
    <ElementsAccordion id="problema" :content="content[$i18n.locale]" />
  </div>
</template>