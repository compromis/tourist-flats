<script setup>
const { $gsap } = useNuxtApp()
const title = "Que no te tiren"

onMounted(() => {
  $gsap.to('.nav-title-text .word span', {
    x: 0,
    duration: .5,
    stagger: .25,
  })

  $gsap.to('.nav-title-icon svg', {
    y: 0,
    duration: .5,
    delay: 1
  })
})
</script>

<template>
  <div class="nav-title-icon">
    <IconsExit />
  </div>
  <div class="nav-title-text">
    <span v-for="word in title.split(' ')" :key="word" class="word">
      <span>{{ word }}</span>
    </span>
  </div>
</template>

<style lang="scss" scoped>
.nav-title-text {
  display: flex;
  gap: .1em;

  .word {
    overflow: clip;

    span {
      display: block;
      transform: translateX(-100%);
    }
  }
}

.nav-title-icon {
  overflow: clip;
  height: .8em;
  translate: 0 -.02em;

  svg {
    height: .8em;
    transform: translateY(100%);
  }
}
</style>