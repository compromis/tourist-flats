<script setup>
defineProps({
  type: { type: String, default: 'tourist_flat' }
})

const checked = defineModel()

const checkerSentences = {
  tourist_flat: 'He comprovat que el pis turístic que vull denunciar no es troba al llistat de pisos turístics amb permís',
  illegal_works: 'He comprovat que la obra il·legal que vull denunciar no compleix amb els requisits exposats.'
}
</script>

<template>
  <Transition name="curtain">
    <div class="form-checker" v-if="!checked">
      <div class="form-checker-card">
        <div class="stripes" />
        <div class="form-checker-card-content">
          Comprova...
        </div>
      </div>
    </div>
  </Transition>
  <FormCheckbox
    value="true"
    v-model="checked"
    name="checked"
    required
  >
    {{ checkerSentences[type] }}
  </FormCheckbox>
</template>

<style lang="scss">
.form-checker {
  &-card {
    overflow: clip;
    border-radius: 1rem;
    border: 2px var(--pine) solid;

    &-content {
      padding: var(--spacer-6);
    }
  }

  .stripes {
    --stripes-width: 20px;
    --stripes-height: 30px;
    --stripes-color-1: var(--white);
    border-bottom: 2px var(--pine) solid;
  }
}
</style>