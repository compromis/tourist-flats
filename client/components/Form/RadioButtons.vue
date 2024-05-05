<script setup>
const props = defineProps({
  label: { type: String, required: true },
  name: { type: String, required: true },
  options: { type: Array, required: true },
  modelValue: { type: String, required: true }
})

const emit = defineEmits(['update:modelValue'])

const value = computed({
  get () {
    return props.modelValue
  },
  set (value) {
    console.log(value)
    emit('update:modelValue', value)
  }
})
</script>

<template>
  <fieldset class="form-radio-buttons">
    <legend class="form-radio-buttons-legend font-headline">
      {{ label }}
    </legend>
    <div class="form-radio-buttons-options">
      <label v-for="option in options" :key="option.value" class="form-radio-buttons-option">
        <input
          type="radio"
          :name="name"
          :value="option.value"
          v-model="value"
          class="visually-hidden"
        />
        {{ option.text }}
      </label>
    </div>
  </fieldset>
</template>

<style lang="scss" scoped>
.form-radio-buttons {
  border: 0;
  padding: 0;

  &-legend {
    font-size: var(--text-xl);
  }

  &-options {
    display: flex;
    gap: var(--site-padding);
    margin-top: var(--spacer-4);
  }

  &-option {
    width: 100%;
    border: 2px var(--pine) solid;
    border-radius: .5rem;
    padding: var(--spacer-4);
    font-weight: 900;
    font-size: var(--text-md);
    cursor: pointer;

    &:focus-within {
      outline: 3px var(--orange) solid;
      outline-offset: 2px;
    }

    &:has(input:checked) {
      background: var(--yellow);
    }

    &:hover {
      background: var(--transpine);
    }
  }
}
</style>