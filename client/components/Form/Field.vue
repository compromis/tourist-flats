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
  errorMessages: {
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
      v-if="type !== 'textarea'"
      :type="type"
      :name="name"
      :id="name"
      :placeholder="placeholder"
      :required="required"
      v-bind="$attrs"
      v-model="modelValue"
      :aria-describedby="errorMessages ? `error-${name}` : help ? `form-help-${name}` : false"
      :aria-invalid="errorMessages ? 'true' : null"
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
      :aria-describedby="errorMessages ? `error-${name}` : help ? `form-help-${name}` : false"
      :aria-invalid="errorMessages ? 'true' : null"
    />
    <div v-if="help" class="form-field-help" :id="`form-help-${name}`">
      {{ help }}
    </div>
    <FormError :id="`error-${name}`" v-if="errorMessages">
      <ul>
        <li v-for="(message, e) in errorMessages" :key="e">
          {{ message }}
        </li>
      </ul>
    </FormError>
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
      font-size: var(--text-sm);
    }
  }

  input,
  textarea {
    appearance: none;
    width: 100%;
    border: 2px var(--pine) solid;
    padding: var(--spacer-2) var(--spacer-4);
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

  textarea {
    height: 6em;
    padding: var(--spacer-3) var(--spacer-4);
    line-height: 1.25;
  }

  &-help {
    font-size: var(--text-sm);
  }
}
</style>