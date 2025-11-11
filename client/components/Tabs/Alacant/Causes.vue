<script setup>
const content = {
  val: [
    {
      title: 'Falta de vivenda pública',
      icon: '',
      text: 'Alacant disposa d\'un dels parcs d\'habitatge públic més reduïts d\'Espanya, les prop de 800 habitatges públics són clarament insuficients davant la greu crisi residencial que sofrim. El govern de Barcala ha promés la construcció de 6.000 habitatges, però, en quins termes? Obra nova a partir de 200.000 euros? Alacant necessita habitatge públic assequible i no continuar engreixant les butxaques de les promotores. #QueNoTeTiren'
    },
    {
      title: 'Apartaments turístics ',
      icon: '',
      text: 'La proliferació d’apartaments turístics a Alacant ha reduït l’oferta de vivenda per als residents locals, elevant els preus del lloguer. La competència amb el sector turístic fa que trobar vivenda assequible siga cada volta més difícil. Alacant té el rècord del País Valencià en pisos turístics, per damunt de València i rècord en apartaments turístics il·legals. Si Compromís governem a partir del 2027 no hi haurà més llicències per als apartaments turístics. Les cases per a viure i els hotels per als turistes. #QueNoTeTiren'
    },
    {
      title: 'Especulació urbanística',
      icon: '',
      text: 'L’especulació urbanística i immobiliària a Alacant incrementa els preus del lloguer, dificultant l’accés a la vivenda per als residents locals. L’interés dels inversos eleva els costos, generant una crisi d’habitatge a la ciutat. #QueNoTeTiren'
    },
    {
      title: 'Grans tenedors i fons voltor',
      icon: '',
      text: 'A Alacant, la presència de grans tenedors de vivenda i dels fons voltor ha generat un impacte significatiu en el mercat de lloguer. El seu punt de vista centrat a obtindre beneficis ha portat a un augment desproporcionat dels preus, cosa que dificulta més i més que els residents accedisquen a vivendes assequibles, exacerbant la crisi d’habitatge. #QueNoTeTiren'
    }
  ],
  cas: [
    {
      title: 'Falta de vivienda pública',
      icon: '',
      text: 'Alicante dispone de uno de los parques de vivienda pública más reducidos de España, las cerca de 800 viviendas públicas son claramente insuficientes frente a la grave crisis residencial que sufrimos. El gobierno de Barcala ha prometido la construcción de 6.000 viviendas, pero ¿en qué términos? ¿Obra nueva a partir de 200.000 euros? Alicante necesita vivienda pública asequible y no seguir engordando los bolsillos de las promotoras. #QueNoTeTiren.'
    },
    {
      title: 'Apartamentos turísticos',
      icon: '',
      text: 'La proliferación de apartamentos turísticos en Alicante ha reducido su oferta de vivienda para los residentes locales, elevando los precios del alquiler. La competencia con el sector turístico hace que encontrar vivienda asequible sea cada vez más difícil. Alicante tiene el récord de la Comunidad Valenciana en pisos turísticos, por encima de Valencia y récord en apartamentos turísticos ilegales. Si Compromís gobernamos a partir de 2027, no habrá más licencias para los apartamentos turísticos. Las casas para vivir y los hoteles para turistas. #QueNoTeTiren'
    },
    {
      title: 'Especulación urbanística',
      icon: '',
      text: 'La especulación urbanística e inmobiliaria en Alicante incrementa los precios de alquiler, dificultando el acceso a la vivienda para los residentes locales. El interés de los inversores eleva los costes, generando una crisis de vivienda en la ciudad. #QueNoTeTiren'
    },
    {
      title: 'Grandes tenedores y fondos buitre',
      icon: '',
      text: 'En Alicante, la presencia de grandes tenedores de vivienda y de los fondos buitre ha generado un impacto significativo en el mercado de alquiler. Su punto de vista centrado en obtener beneficios ha llevado a un aumento desproporcionado de los precios, lo que dificulta más y más que los residentes accedan a viviendas asequibles, exacerbando la crisis de vivienda. #QueNoTeTiren'
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