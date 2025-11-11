<script setup>
const content = {
  val: [
    {
      title: 'Construcció de Vivienda Pública',
      number: 1,
      icon: '',
      text: 'A Compromís apostem per treure a la llum 20.000 vivendes buides i donar solucions assequibles, millorar l\'accés a l’habitatge i competir amb el parc de vivenda privat a preus més competitius, fomentant la baixada del preu de la vivenda de qualsevol tipologia. #QueNoTeTiren'
    },
    {
      title: 'Reforma Legal',
      number: 2,
      icon: '',
      text: 'Promovem canvis significatius a la Llei d\'Ús Social de l’Habitatge, a la Llei d’Ordenació del Territori i Urbanisme i a les ordenances municipals per revertir a mínims la implantació d’apartaments d’ús turístics als barris de la ciutat i als edificis d’ús residencials. La vivenda per a les persones, no per als especuladors. #QueNoTeTiren'
    },
    {
      title: 'Ciutat Tensionada',
      number: 3,
      icon: '',
      text: 'Proposem la declaració d’Alacant com a ciutat tensionada pel preu del lloguer per regular el mercat, limitar els preus del lloguer i protegir els inquilins de preus abusius fruit de l’especulació. La qual cosa neguen tant l\'alcalde Luis Barcala com el president Carlos Mazón. #QueNoTeTiren.'
    },
    {
      title: 'Tanca el teu edifici als apartaments turístics',
      number: 4,
      icon: '',
      text: 'T’ajudem a canviar els estatus de la teua comunitat de veïns per prohibir la implantació de pisos d’ús turístic al teu edifici. Si vols saber com fer-ho, descarrega’t el nostre manual. #QueNoTeTiren'
    }
  ],
  cas: [
    {
      title: 'Construcción de Vivienda Pública',
      number: 1,
      icon: '',
      text: 'En Compromís apostamos por sacar a la luz 20.000 viviendas vacías y dar soluciones asequibles, mejorar el acceso a la vivienda y competir con el parque de vivienda privado a precios más competitivos, fomentando la bajada del precio de la vivienda de cualquier tipología. #QueNoTeTiren'
    },
    {
      title: 'Reforma legal',
      number: 2,
      icon: '',
      text: 'Promovemos cambios significativos en la Ley de Uso Social de la Vivienda, en la Ley de Ordenación del Territorio y Urbanismo y en las ordenanzas municipales para revertir a mínimos la implantación de apartamentos de uso turístico en los barrios de la ciudad y en los edificios de uso residenciales. La vivienda es para las personas, no para los especuladores. #QueNoTeTiren'
    },
    {
      title: 'Ciudad tensionada',
      number: 3,
      icon: '',
      text: 'Proponemos la declaración de Alicante como ciudad tensionada por el precio del alquiler para regular el mercado, limitar los precios del alquiler y proteger a los inquilinos de precios abusivos fruto de la especulación. Lo que niegan tanto el alcalde Luis Barcala como el presidente Carlos Mazón. #QueNoTeTiren'
    },
    {
      title: 'Cierra tu edificio a los apartamentos turísticos',
      number: 4,
      icon: '',
      text: 'Te ayudamos a cambiar los estatutos de tu comunidad de vecinos para prohibir la implantación de pisos de uso turístico en tu edificio. Si quieres saber cómo hacerlo, descárgate nuestro manual. #QueNoTeTiren'
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