<script setup>
const content = {
  val: [
    {
      title: 'Augment del preu vivenda',
      icon: 'lucide:line-chart',
      text: 'A Alacant, els preus de la vivenda s’han disparat un 70% els últims 5 anys, més del 10% en l’últim any i el preu de compra un 13%. L’especulació urbanística i la turistificació, situa Alacant en el rècord de no poder adquirir cases per a viure i en rècord de no fer res per pal·liar este problema per part de les administracions públiques.'
    },
    {
      title: 'Expulsió dels barris i substitució de veïnat per turistes',
      icon: 'lucide:camera',
      text: 'L’alcalde Luis Barcala y el president Carlos Mazón no volen declarar la ciutat tensionada per a poder regular els preus ni tampoc fan res amb la proliferació dels apartaments turístics, rècord en esta ciutat i també d’apartaments turístics il·legals. A més, Alacant s’ha convertit en una de les ciutats amb més segones vivendes que sols s’usen en vacances (82.000 el 27% de les totals). Una xifra a la qual s\'hauria de sumar les que són propietat d’entitats bancàries o fons voltor. #QueNoTeTiren'
    },
    {
      title: 'Problema per a la joventut',
      icon: '',
      text: 'El País Valencià és un dels països d’Europa on les persones joves més tard s’emancipen de casa dels seus pares (a partir dels 30 anys), per damunt inclús de la mitjana espanyola. Al problema de l’atur juvenil s’hi suma la incapacitat de trobar una vivenda, obligant joves i famílies a compartir habitacions en condicions de precarietat. #QueNoTeTiren'
    },
    {
      title: 'Problema per a les famílies',
      icon: '',
      text: 'L’augment del preu de la vivenda al costat del d’altres béns i serveis de primera necessitat a causa de la inflació fa que moltes famílies, inclús amb dos i tres sous, no siguen capaços d’arribar a final de mes. L’augment de preu d’hipoteques i lloguers està col·locant de nou a moltes famílies en situació de desnonament i expulsió. A Alacant 5.552 famílies estan en llista d’espera per accedir a una vivenda pública, un 23% més que fa un any i mig. #QueNoTeTiren'
    },
    {
      title: 'Problema per a la gent gran',
      icon: '',
      text: 'Les persones majors estan especialment desprotegides davant l’especulació amb la vivenda i les actuacions de molts fons d’inversió per quedar-se amb edificis de renda antiga on viuen persones de la tercera edat. #QueNoTeTiren'
    }
  ],
  cas: [
    {
      title: 'Aumento del precio de la vivienda',
      icon: '',
      text: 'En Alicante, los precios de la vivienda se dispararon un 70% en los últimos 5 años, más del 10% en el último año y el precio de compra un 13%. La especulación urbanística y la turistificación, sitúa a Alicante en el récord de no poder adquirir casas para vivir y en récord de no hacer nada por paliar este problema por parte de las administraciones públicas. #QueNoTeTiren'
    },
    {
      title: 'Expulsión de los Barrios y sustitución de vecinos/as por turistas',
      icon: '',
      text: 'El alcalde Luis Barcala y el presidente Carlos Mazón no quieren declarar a la ciudad tensionada para poder regular los precios ni tampoco hacen nada con la proliferación de los apartamentos turísticos, récord en esta ciudad y también de apartamentos turísticos ilegales. Además, Alicante se ha convertido en una de las ciudades con más segundas viviendas que sólo se usan en vacaciones (82.000 el 27% de las totales). Una cifra a la que debería sumarse las que son propiedad de entidades bancarias o fondos buitre. #QueNoTeTiren'
    },
    {
      title: 'Problema para la juventud',
      icon: '',
      text: 'El País Valencià es uno de los países de Europa donde las personas jóvenes más tarde se emancipan de casa de sus padres (a partir de los 30 años), por encima incluso de la media española. Al problema del paro juvenil se suma la incapacidad de encontrar una vivienda, obligando a jóvenes y familias a compartir habitaciones en condiciones de precariedad. #QueNoTeTiren'
    },
    {
      title: 'Problema para las familias',
      icon: '',
      text: 'El aumento del precio de la vivienda junto al de otros bienes y servicios de primera necesidad debido a la inflación hace que muchas familias, incluso con dos y tres sueldos, no sean capaces de llegar a fin de mes. El aumento de precio de hipotecas y alquileres está colocando de nuevo a muchas familias en situación de desahucio y expulsión. En Alicante, 5.552 familias están en lista de espera para acceder a una vivienda pública, un 23% más que hace año y medio. #QueNoTeTiren'
    },
    {
      title: 'Problema ara la gente mayor',
      icon: '',
      text: 'Las personas mayores están especialmente desprotegidas ante la especulación con la vivienda y las actuaciones de muchos fondos de inversión para quedarse con edificios de renta antigua en los que viven personas de la tercera edad. #QueNoTeTiren'
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