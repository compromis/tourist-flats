<script setup>
const content = {
  val: [
    {
      title: 'Augment del preu vivenda',
      icon: 'lucide:line-chart',
      text: 'A Castelló de la Plana, el preu del lloguer ha pujat de manera alarmant en els darrers anys, fins al punt de registrar una de les majors pujades interanuals del lloguer de tot l’Estat, amb increments que superen el 25 % en 2025. Aquesta escalada ha convertit Castelló en una ciutat on cada vegada és més difícil accedir a un habitatge digne. Els lloguers al centre, al Grau i a zones properes a la Universitat Jaume I són pràcticament inassumibles per a gran part de la població. L’especulació urbanística, la falta de vivenda pública i la proliferació d’apartaments turístics redueixen encara més l’oferta de lloguer de llarga durada. Tot això passa mentre el govern de Begoña Carrasco i de Mazón continua sense actuar, deixant que el mercat i els grans propietaris marquen el preu del dret a viure a la ciutat. #QueNoTeTiren'
    },
    {
      title: 'Expulsió dels barris i substitució de veïnat per turistes',
      icon: 'lucide:camera',
      text: 'Les conseqüències d’aquest increment descontrolat del lloguer ja són visibles a tota la ciutat. Famílies que vivien al centre o a barris com Rafalafena, el Raval Universitari o el Grau s’han vist obligades a marxar. L’augment dels preus i la reducció del parc d’habitatge disponible estan provocant un desplaçament del veïnat de tota la vida, que veu com el seu barri es buida i es transforma per donar cabuda a pisos turístics o lloguers de curta durada destinats a visitants. Els estudiants de la Universitat Jaume I també pateixen aquesta situació: cada vegada és més difícil trobar una habitació assequible prop del campus, i molts acaben compartint pisos massificats o residint fora de Castelló per poder estudiar.Aquesta realitat no sols afecta l’accés a la vivenda, sinó també el teixit social i la vida de barri, posant en risc el model de ciutat acollidora i equilibrada que Castelló sempre havia representat. #QueNoTeTiren'
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
      title: 'Aumento del precio de la vivienda',
      icon: '',
      text: 'En València, los precios de la vivienda se han disparado en los últimos dos años auspiciados por la especulación urbanística y los apartamentos turísticos, reduciendo la oferta para los/as valencianos/as. La gentrificación y la falta de medidas políticas por parte de los gobiernos de Catalá y Mazón aumentan los desahucios, afectando a jóvenes y familias de ingresos medios y bajos. #QueNoTeTiren'
    },
    {
      title: 'Expulsión de los Barrios y sustitución de vecinos/as por turistas',
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