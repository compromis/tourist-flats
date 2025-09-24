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
  <div class="text">
    <p>Compromís posem en marxa una recollida de signatures per a que València siga declarada zona tensionada i es limiten els preus de lloguer dels pisos.</p>
    <p>El lloguer no para de pujar. Ens estan expulsant de València. Esta ciutat és ta casa, que no te tiren!</p>
    <a href="/docs/SignaPeticióQueNoTeTiren.pdf" target="_blank">Més informació sobre el que proposem</a>
  </div>
  <div style="width:100%;height:500px;" data-fillout-id="x6AKrCm17Kus" data-fillout-embed-type="standard" data-fillout-inherit-parameters data-fillout-dynamic-resize></div>
</template>

<style lang="scss" scoped>
.text {
  font-size: var(--text-base);
  max-width: 600px;
  margin-inline: auto;
  margin-block-start: 2rem;

  a {
    font-weight: 900;
  }
}
</style>