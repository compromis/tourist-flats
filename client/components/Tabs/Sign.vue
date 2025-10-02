<script setup>
useHead({
  script: [
    {
      src: 'https://server.fillout.com/embed/v1/',
      async: true,
      defer: true,
    },
  ],
})
</script>

<template>
  <div class="text" v-if="$i18n.locale === 'val'">
    <a href="https://chat.whatsapp.com/B6XfMYMET8K673ms9iU9lV" class="banner">
      <Icon name="fa6-brands:whatsapp" /> Uneix-te al grup de WhatsApp Recuperem València
    </a>
    <p>Compromís posem en marxa una recollida de signatures per a que València siga declarada zona tensionada i es limiten els preus de lloguer dels pisos.</p>
    <p>El lloguer no para de pujar. Ens estan expulsant de València. Esta ciutat és ta casa, que no te tiren!</p>
    <a href="/docs/SignaPeticióQueNoTeTiren.pdf" target="_blank">Més informació sobre el que proposem</a>
  </div>
  <div v-else class="text">
    <a href="https://chat.whatsapp.com/B6XfMYMET8K673ms9iU9lV" class="banner">
      <Icon name="fa6-brands:whatsapp" /> Únete al grupo de WhatsApp Recuperem València
    </a>
    <p>Compromís ponemos en marcha una recogida de firmas para que València sea declarada zona tensionada y se limiten los precios del alquiler de los pisos.</p>
    <p>El alquiler no para de subir. Nos están expulsando de València. Esta ciudad es tu casa, ¡que no te echen!</p>
    <a href="/docs/SignaPeticióQueNoTeTirenCAS.pdf" target="_blank"> Más información sobre lo que proponemos</a>
  </div>
  <div style="width:100%;height:500px;" data-fillout-id="x6AKrCm17Kus" data-fillout-embed-type="standard" data-fillout-inherit-parameters data-fillout-dynamic-resize></div>
</template>

<style lang="scss" scoped>
.text {
  font-size: var(--text-base);
  max-width: calc(600px + var(--spacer-4));
  margin-inline: auto;
  margin-block-start: 2rem;
  padding: 0 var(--spacer-4);

  a {
    font-weight: 900;
  }
}

.banner {
  display: flex;
  font-size: var(--text-base);
  font-weight: 900;
  background: var(--yellow);
  color: var(--pine);
  text-decoration: none;
  padding: .5em 1em;
  border-radius: .5rem;
  margin-block-start: 1rem;
  align-items: center;
  gap: .25rem;

  &:hover {
    background: var(--pine);
    color: var(--white);
  }
}
</style>