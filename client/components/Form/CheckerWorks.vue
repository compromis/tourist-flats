<template>
  <div v-if="$i18n.locale === 'val'">
    <h3>Com identificar obres il·legals d’apartaments turístics</h3>
    <ol>
      <li>⁠A la porta de l’immoble en obres no figura cap permís municipal d’obres.</li>
      <li>⁠Les runes es carreguen en furgonetes particulars i no hi ha contenidor al carrer.</li>
      <li>⁠Treballen fora de l’horari permés (entre les 22:00h i les 8:00h).</li>
      <li>⁠⁠Les obres envaeixen zones comunes de l’edifici sense haver-ho aprovat en Junta de Veïns.</li>
      <li>Sorgeixen estructures emergents sense que hi haja visible cap plànol de l’obra.</li>
    </ol>

    <p>Només comunicarem obres en baixos comercials o primeros pisos d’edificis residencials, on es tinga la sospita i proves de que s’estan realitzant de forma irregular, per habilitar-se apartaments turístics.</p>
  </div>
  <div v-else>
    <h3>Como identificar obras ilegales de apartamentos turísticos</h3>
    <ol>
      <li>En la puerta del inmueble en obras no figura permiso municipal de obras.</li>
      <li>Los escombros se cargan en furgonetas particulares y no hay contenedor en la calle.</li>
      <li>Trabajan fuera del horario permitido (entre las 22:00h y las 8:00h)</li>
      <li>Las obras invaden zonas comunes del edificio sin haberlo aprobado en Junta de Vecinos.</li>
      <li>Surgen estructuras emergentes sin que haya visible ningún plano de obra.</li>
    </ol>

    <p>Solo comunicaremos obras en bajos comerciales o primeros pisos de edificios residenciales, en los que se tenga la sospecha y pruebas de que se están realizando de forma irregular, para habilitar apartamentos turísticos.</p>
  </div>
</template>