<script setup>
defineProps({
  type: { type: String, default: 'tourist_flat' }
})

const checked = defineModel()

const checkbox = ref()
function check() {
  checked.value = true
  checkbox.value.$refs.input.focus()
}
</script>

<template>
  <Transition name="curtain">
    <div class="form-checker" v-if="!checked">
      <div class="form-checker-card">
        <div class="stripes" />
        <div class="form-checker-card-content">
          <FormCheckerFlats v-if="type === 'tourist_flat'" />
          <FormCheckerWorks v-else />
        </div>
      </div>
    </div>
  </Transition>
  <FormCheckbox
    value="true"
    v-model="checked"
    name="checked"
    required
    ref="checkbox"
  >
    {{ $t(`form.checker.${type}`) }}
  </FormCheckbox>
  <Transition name="curtain">
    <FormButton type="button" v-if="!checked" @click="check">
      {{ $t('form.checker.button') }}
    </FormButton>
  </Transition>
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