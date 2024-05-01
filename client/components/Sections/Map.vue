<template>
  <section class="map">
    <div class="container padded">
      <div class="map-header">
        <h2 class="font-headline">Denunciem il·legalitats</h2>
        <p>Has vist algun pis turístic o obra il·legal? Compromís denunciem per tu, gestionant el registre de la denuncia i guardant el teu anonimat.</p>
        <p>Et mantindrem informat/da de com avança el procés de denuncia en cada moment per correu electrònic.</p>
      </div>
      <ElementsMap />
    </div>
  </section>
</template>

<style lang="scss" scoped>
.map {
  &-header {
    max-width: 850px;
    margin: 0 auto;

    h2 {
      font-size: var(--text-3xl);
    }

    p {
      font-size: var(--text-md);
      font-weight: 500;
    }
  }
}
</style>