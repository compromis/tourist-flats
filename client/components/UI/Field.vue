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
  }
})

const modelValue = defineModel()
</script>

<template>
  <div class="field">
    <label :for="name">
      {{ label }}
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
    />
  </div>
</template>