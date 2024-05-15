<script setup>
const content = {
  val: [
    {
      title: 'Construcció de Vivienda Pública',
      icon: '',
      text: 'A Compromís apostem per la construcció de 20.000 noves vivendes públiques a València per oferir solucions assequibles, millorar l\'accés a l’habitatge i competir amb el parc de vivenda privat a preus més competitius, fomentant la baixada del preu de la vivenda de qualsevol tipologia.'
    },
    {
      title: 'Reforma Legal',
      icon: '',
      text: 'Promovem canvis significatius a la Llei d\'Ús Social de l\’Habitatge, a la Llei d’Ordenació del Territori i Urbanisme i a les ordenances municipals per revertir a mínims la implantació d’apartaments d’ús turístics als barris de la ciutat i als edificis d’ús residencials. La vivenda per a les persones, no per als especuladors.'
    },
    {
      title: 'Ciutat Tensionada',
      icon: '',
      text: 'Proposem la declaració de València com a ciutat tensionada pel preu del lloguer per regular el mercat, limitar els preus del lloguer i protegir els inquilins de preus abusius fruit de l’especulació.'
    },
    {
      title: 'Tanca el teu edifici als apartaments turístics',
      icon: '',
      text: 'T’ajudem a canviar els estatus de la teua comunitat de veïns per prohibir la implantació de pisos d’ús turístic al teu edifici. Si vols saber com fer-ho, descarrega’t el nostre manual.'
    }
  ]
}
</script>

<template>
  <div>
    <h3 class="visually-hidden">La solució</h3>
    <ElementsAccordion id="solution" :content="content[$i18n.locale]" />
  </div>
</template>