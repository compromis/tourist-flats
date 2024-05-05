<script setup>
const { $gsap } = useNuxtApp()

const sentence = 'Que no te tiren'

onMounted(() => {
  setTimeout(() => {
  $gsap.to('.marquee .letter', {
    y: 0,
    ease: "power4.out",
    stagger: {
        each: .75,
        ease: 'circ.in',
    },
    duration: 0.75
  })
}, 200)
})
</script>

<template>
  <ClientOnly>
    <Vue3Marquee :duration="60">
      <div class="marquee font-display">
        <span v-for="(word, w) in sentence.split(' ')" :key="w" class="word">
          <span v-for="(letter, l) in word" :letter="l" class="letter">
            {{ letter }}
          </span>
        </span>
      </div>
    </Vue3Marquee>
  </ClientOnly>
</template>

<style lang="scss" scoped>
.marquee {
  display: flex;
  position: relative;
  font-size: var(--header-height);
  color: var(--pine);
  line-height: 1;
  margin-top: -.24em;
  z-index: -1;
  overflow: clip;
  margin-right: .25em;

  .word {
    display: flex;
    margin-right: .1em;
  }

  .letter {
    transform: translateY(100%);
  }
}
</style>