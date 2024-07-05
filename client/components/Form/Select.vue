<script setup>
defineProps({
  name: { type: String, required: true },
  label: { type: String, required: true },
  options: { type: Array, required: true },
  required: { type: Boolean, default: false },
  labelVisuallyHidden: { type: Boolean, default: false },
  noOptionalText: { type: Boolean, default: false },
})

const selected = defineModel()
</script>

<template>
  <div class="form-field">
    <label :for="name" :class="{ 'visually-hidden': labelVisuallyHidden }">
      {{ label }}
      <span v-if="!required && !noOptionalText">
        {{ $t('form.optional') }}
      </span>
    </label>
    <select
      :id="name"
      :required="required"
      v-model="selected"
    >
      <option v-for="option in options" :key="option.id" :value="option.value">
        {{ option.label }}
      </option>
    </select>
    <Icon name="lucide:chevron-down" class="icon" />
  </div>
</template>

<style lang="scss" scoped>
.form-field {
  display: flex;
  flex-direction: column;
  gap: var(--spacer-2);
  position: relative;

  label {
    font-weight: 900;
    display: flex;

    span {
      margin-inline-start: auto;
      font-weight: 500;
      font-size: var(--text-sm);
    }
  }

  select {
    display: block;
    appearance: none;
    width: 100%;
    border: 2px var(--pine) solid;
    padding: var(--spacer-3) var(--spacer-4);
    font-size: 1.1rem;
    border-radius: .5rem;
    font-family: inherit;
    color: var(--pine);
    font-weight: 500;
    line-height: 1;

    &::placeholder {
      color: rgba($pine, .5);
    }
  }

  .icon {
    position: absolute;
    top: 50%;
    translate: -50% 0;
    right: var(--spacer-2);
    pointer-events: none;
    font-size: 1.5rem;
  }
}
</style>