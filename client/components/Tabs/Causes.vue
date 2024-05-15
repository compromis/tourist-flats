<script setup>
const content = {
  val: [
    {
      title: 'Falta de vivenda pública ',
      icon: '',
      text: 'València disposa d’un dels parcs de vivenda pública més reduïts d’Espanya, les vora 900 vivendes públiques noves impulsades en l’etapa del govern de Joan Ribó són clarament insuficients davant la greu crisi d’habitatge que patim.'
    },
    {
      title: 'Apartaments turístics ',
      icon: '',
      text: 'La proliferació d’apartaments turístics a València ha reduït l’oferta de vivenda per als residents locals, elevant els preus del lloguer. La competència amb el sector turístic fa que trobar vivenda assequible siga cada volta més difícil.'
    },
    {
      title: 'Especulació urbanística',
      icon: '',
      text: 'L’especulació urbanística i immobiliària a València impulsa els preus del lloguer, dificultant l’accés a la vivenda per als residents locals. L’interés dels inversos eleva els costos, generant una crisi d’habitatge a la ciutat.'
    },
    {
      title: 'Grans tenedors i fons voltor',
      icon: '',
      text: 'A València, la presencia de grans tenedors de vivenda i dels fons voltor ha generat un impacte significatiu en el mercat de lloguer. El seu punt de vista centrat en obtindre beneficis ha portat a un augment desproporcionat dels preus, cosa que dificulta més i més que els residents accedisquen a vivendes assequibles, exacerbant la crisi d’habitatge.'
    }
  ]
}
</script>

<template>
  <div>
    <h3 class="visually-hidden">Les causes</h3>
    <ElementsAccordion id="causes" :content="content[$i18n.locale]" />
  </div>
</template>