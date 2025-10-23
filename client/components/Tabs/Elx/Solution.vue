<script setup>
const content = {
  val: [
    {
      title: 'Construcció de Vivienda Pública',
      number: 1,
      icon: '',
      text: 'A Compromís apostem per la construcció de 2.000 noves vivendes públiques a Elx per oferir solucions assequibles, millorar l\'accés a l’habitatge i competir amb el parc de vivenda privat a preus més competitius, fomentant la baixada del preu de la vivenda de qualsevol tipologia.'
    },
    {
      title: 'Reforma Legal',
      number: 2,
      icon: '',
      text: 'Promovem canvis significatius a la Llei d\'Ús Social de l’Habitatge, a la Llei d’Ordenació del Territori i Urbanisme i a les ordenances municipals per revertir a mínims la implantació d’apartaments d’ús turístics als barris i pedanies del municipi i als edificis d’ús residencials. La vivenda per a les persones, no per als especuladors.'
    },
    {
      title: 'Ciutat Tensionada',
      number: 3,
      icon: '',
      text: 'Proposem la declaració d’Elx com a ciutat tensionada pel preu del lloguer per regular el mercat, limitar els preus del lloguer i protegir els inquilins de preus abusius fruit de l’especulació.'
    },
    {
      title: 'Tanca el teu edifici als apartaments turístics',
      number: 4,
      icon: '',
      text: 'T’ajudem a canviar els estatus de la teua comunitat de veïns per prohibir la implantació de pisos d’ús turístic al teu edifici. Si vols saber com fer-ho, <a href="/docs/MANUAL_VAL.pdf" download>descarrega’t el nostre manual</a>.'
    }
  ],
  cas: [
    {
      title: 'Construcción de Vivienda Pública',
      number: 1,
      icon: '',
      text: 'En Compromís apostamos por la construcción de 2.000 nuevas viviendas públicas en Elx para ofrecer soluciones asequibles, mejorar el acceso a la vivienda y competir con el parque de vivienda privado a precios más competitivos, fomentando la bajada del precio de la vivienda de cualquier tipología.'
    },
    {
      title: 'Reforma legal',
      number: 2,
      icon: '',
      text: 'Promovemos cambios significativos en la Ley de Uso Social de la Vivienda, en la Ley de Ordenación del Territorio y Urbanismo y en las ordenanzas municipales para revertir a mínimos la implantación de apartamentos de uso turísticos en los barrios y pedanías del municipio y en los edificios de uso residenciales. La vivienda para las personas, no para los especuladores.'
    },
    {
      title: 'Ciudad tensionada',
      number: 3,
      icon: '',
      text: 'Proponemos la declaración de Elx como ciudad tensionada por el precio del alquiler para regular el mercado, limitar los precios del alquiler y proteger a los inquilinos de precios abusivos fruto de la especulación.'
    },
    {
      title: 'Cierra tu edificio a los apartamentos turísticos',
      number: 4,
      icon: '',
      text: 'Te ayudamos a cambiar los estatutos de tu comunidad de vecinos para prohibir la implantación de pisos turísticos en tu edificio. Si quieres saber como hacerlo, <a href="/docs/MANUAL_CAS.pdf" download>descárgate nuestro manual<a>.'
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