<script setup>
defineProps({
  name: { type: String, required: true },
  value: { type: String, required: true },
  required: { type: Boolean, default: false },
})

const checked = defineModel()
</script>

<template>
  <div class="form-checkbox">
    <label class="form-checkbox-label">
      <input
        :name="name"
        type="checkbox"
        :value="value"
        v-model="checked"
        :required="required"
        class="visually-hidden"
      />
      <div class="control">
        <Icon name="lucide:check" class="check" />
      </div>
      <div class="form-checkbox-label-text">
        <slot />
      </div>
    </label>
  </div>
</template>

<style lang="scss" scoped>
.form-checkbox {
  &-label {
    display: flex;
    gap: var(--spacer-2);
    align-items: center;
  }

  .control {
    height: 1.75em;
    width: 1.75em;
    border: 2px var(--pine) solid;
    border-radius: .5rem;
    display: grid;
    place-items: center;
    flex-shrink: 0;

    .check {
      display: none;
    }
  }

  &:focus-within .control {
    outline: 2px var(--orange) solid;
    outline-offset: 3px;
  }

  &:has(input:checked) .control {
    .check {
      display: block;

      :deep(path) {
        stroke-width: 3px;
      }
    }
  }
}
</style>