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
      title: 'Aumento del precio de la vivienda en València',
      icon: '',
      text: 'En València, los precios de la vivienda se han disparado en los últimos dos años auspiciados por la especulación urbanística y los apartamentos turísticos, reduciendo la oferta para los/as valencianos/as. La gentrificación y la falta de medidas políticas por parte de los gobiernos de Catalá y Mazón aumentan los desahucios, afectando a jóvenes y familias de ingresos medios y bajos. #QueNoTeTiren'
    },
    {
      title: 'Expulsión de los Barrios y substitución de vecinos/as por turistas',
      icon: '',
      text: 'El hecho de que la mayoría de vivienda disponible se destine al alquilar turístico ha reducido la oferta de los pisos de alquiler de larga duración, provocando un aumento de precios exponencial nunca visto en nuestra ciudad. Actualmente, los precios del alquiler de larga duración en València están al nivel de los de París. Todo esto está provocando la expulsión masiva de vecinos y vecinas de nuestros barrios, que están dejando de ser barrios para convertirse en almacenes de turistas. #QueNoTeTiren'
    },
    {
      title: 'Problema para la juventud',
      icon: '',
      text: 'El País Valencià es uno de los paises de Europa donde las personas jóvenes más tarde se emancipan de casa de sus padres (a partir de los 30 años), por encima incluso de la media española. Al problema del paro juvenil se suma la incapacidad de encontrar una vivienda, obligando a jóvenes y familias a compartir habitaciones en condiciones de precariedad. #QueNoTeTiren'
    },
    {
      title: 'Problema para las familias',
      icon: '',
      text: 'El aumento del precio de la vivienda junto al de otros bienes y servicios de primera necesidad debido a la inflación hace que muchas familias, incluso con dos y tres sueldos, no sean capaces de llegar a final de mes. El aumento de precio de hipotecas y alquileres está colocando nuevamente a muchas familias en situación de desahucio y expulsión #QueNoTeTiren'
    },
    {
      title: 'Problema ara la gente mayor',
      icon: '',
      text: 'Las personas mayores están especialmente desprotegidas ante la especulación con la vivienda y las actuaciones de muchos fondos de inversión para quedarse con edificios de renta antigua donde viven personas de la tercera edad. #QueNoTeTiren'
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