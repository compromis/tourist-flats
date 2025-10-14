<script setup>
const content = {
  val: [
    {
      title: 'Falta de vivenda pública',
      icon: '',
      text: 'Elx necessita disposar augmentar el seu parc de vivenda pública més ample, l’oferta de vivenda assequible és clarament insuficient davant la greu crisi d’habitatge que patim.'
    },
    {
      title: 'Apartaments turístics ',
      icon: '',
      text: 'La proliferació d’apartaments turístics a Elx redueix l’oferta de vivenda per als residents locals, elevant els preus del lloguer. La competència amb el sector turístic fa que trobar vivenda assequible siga cada volta més difícil.'
    },
    {
      title: 'Especulació urbanística',
      icon: '',
      text: 'L’especulació urbanística i immobiliària a Elx impulsa els preus del lloguer, dificultant l’accés a la vivenda per als residents locals. L’interés dels inversors eleva els costos, generant una crisi d’habitatge als barris i pedanies.'
    },
    {
      title: 'Grans tenedors i fons voltor',
      icon: '',
      text: 'A Elx, la presència de grans tenedors de vivenda i dels fons voltor comença a tindre un impacte significatiu en el mercat de lloguer. El seu punt de vista centrat en obtindre beneficis provoca un augment desproporcionat dels preus, cosa que dificulta més i més que els residents accedisquen a vivendes assequibles, exacerbant la crisi d’habitatge.'
    }
  ],
  cas: [
    {
      title: 'Falta de vivienda pública',
      icon: '',
      text: 'València dispone de uno de los parques de vivienda pública más reducidos de España, las cerca de 900 viviendas públicas nuevas impulsadas en la etapa de gobierno de Joan Ribó son claramente insuficientes ante la grave crisis habitacional que sufrimos.'
    },
    {
      title: 'Apartamentos turísticos',
      icon: '',
      text: 'La proliferación de apartamentos turísticos en Valencia ha reducido la oferta de vivienda para los residentes locales, elevando los precios del alquiler. La competencia con el sector turístico hace que encontrar vivienda asequible sea cada vez más difícil.'
    },
    {
      title: 'Especulación urbanística',
      icon: '',
      text: 'La especulación urbanística e inmobiliaria en Valencia impulsa los precios del alquiler, dificultando el acceso a la vivienda para los residentes locales. El interés de inversores eleva los costos, generando una crisis habitacional en la ciudad.'
    },
    {
      title: 'Grandes tenedores y fondos buitre',
      icon: '',
      text: 'En Valencia, la presencia de grandes tenedores de vivienda y fondos buitre ha generado un impacto significativo en el mercado de alquiler. Su enfoque en obtener beneficios ha llevado a un aumento desproporcionado en los precios, lo que dificulta aún más que los residentes accedan a viviendas asequibles, exacerbando la crisis habitacional.'
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