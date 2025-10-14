<script setup>
const content = {
  val: [
    {
      title: 'Falta de vivenda pública',
      icon: '',
      text: 'Castelló compta amb un dels parcs de vivenda pública més reduïts del País Valencià. En els darrers anys, pràcticament no s’han impulsat noves promocions de vivenda assequible. Les iniciatives públiques són insuficients davant la creixent demanda i la pressió del mercat privat.'
    },
    {
      title: 'Apartaments turístics ',
      icon: '',
      text: 'La proliferació d’apartaments turístics a Castelló —especialment al centre i al Grau— ha reduït encara més l’oferta d’habitatges per a residents locals. Aquesta competència deslleial amb el lloguer tradicional fa pujar els preus i dificulta trobar vivenda assequible per a les famílies de la ciutat.'
    },
    {
      title: 'Especulació urbanística',
      icon: '',
      text: 'Els interessos especulatius i la falta de planificació urbana estan impulsant els preus del sòl i del lloguer a Castelló. L’aposta pel turisme ràpid i pel benefici immediat està creant una crisi d’habitatge que deixa fora a moltes persones que volen viure i treballar a la ciutat.'
    },
    {
      title: 'Grans tenedors i fons voltor',
      icon: '',
      text: 'A Castelló, els grans tenedors i els fons d’inversió controlen cada vegada més vivendes. Busquen rendibilitat ràpida a costa dels llogaters, provocant pujades de preus i desnonaments. Aquesta dinàmica està expulsant el veïnat i trencant el teixit social dels barris.'
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