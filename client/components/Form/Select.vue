<script setup>
defineProps({
  name: { type: String, required: true },
  options: { type: Array, required: true },
  required: { type: Boolean, default: false },
})

const selected = defineModel()
</script>

<template>
  <div>
    <select :id="name" :required="required" v-model="selected">
      <option v-for="option in options" :key="option.id" :value="option.value">
        {{ option.label }}
      </option>
    </select>
  </div>
</template>