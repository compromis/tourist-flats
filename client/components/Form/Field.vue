<script setup>
const props = defineProps({
  label: {
    type: String,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'text'
  },
  placeholder: {
    type: String,
    default: ''
  },
  required: {
    type: Boolean,
    default: false
  },
  errors: {
    type: Array,
    default: null
  },
  help: {
    type: String,
    default: ''
  }
})

const modelValue = defineModel()
</script>

<template>
  <div class="form-field">
    <label :for="name">
      {{ label }}
      <span v-if="!required">
      Opcional
      </span>
    </label>
    <input
      v-if="type != 'textarea'"
      :type="type"
      :name="name"
      :id="name"
      :placeholder="placeholder"
      :required="required"
      v-bind="$attrs"
      v-model="modelValue"
      :aria-describedby="help ? `form-help-${name}` : false"
    />
    <textarea
      v-else
      :type="type"
      :name="name"
      :id="name"
      :placeholder="placeholder"
      :required="required"
      v-bind="$attrs"
      v-model="modelValue"
      :aria-describedby="help ? `form-help-${name}` : false"
    />
    <div v-if="help" class="form-field-help" :id="`form-help-${name}`">
      {{ help }}
    </div>
  </div>
</template>

<style lang="scss" scoped>
.form-field {
  display: flex;
  flex-direction: column;
  gap: var(--spacer-2);

  label {
    font-weight: 900;
    display: flex;

    span {
      margin-inline-start: auto;
      font-weight: 500;
    }
  }

  input,
  textarea {
    appearance: none;
    width: 100%;
    border: 2px var(--pine) solid;
    padding: var(--spacer-3) var(--spacer-4);
    font-size: 1.1rem;
    border-radius: .5rem;
    font-family: inherit;
    color: var(--pine);
    font-weight: 500;
  }

  textarea {
    height: 6em;
  }

  &-help {
    font-size: var(--text-sm);
  }
}
</style>