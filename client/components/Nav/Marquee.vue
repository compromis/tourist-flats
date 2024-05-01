<script setup>

</script>

<template>
  <ClientOnly>
    <Vue3Marquee :duration="60">
      <div class="marquee font-display">Que no te tiren</div>
    </Vue3Marquee>
  </ClientOnly>
</template>

<style lang="scss" scoped>
.marquee {
  position: relative;
  font-size: var(--header-height);
  color: var(--pine);
  line-height: 1;
  margin-top: -.24em;
  z-index: -1;
  overflow: clip;
}
</style>