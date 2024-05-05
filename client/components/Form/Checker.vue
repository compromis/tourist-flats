<script setup>
defineProps({
  type: { type: String, default: 'tourist_flat' }
})

const checked = defineModel()
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
  <label>
    <input
      type="checkbox"
      name="checked"
      value="checked"
      required
      v-model="checked"
    />
    He comprovat que...
  </label>
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