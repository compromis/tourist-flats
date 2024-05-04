<script setup>
const props = defineProps({
  modelValue: {
    type: Object,
    default: () => null
  }
})

const emit = defineEmits(['update:modelValue'])

const dropZoneRef = ref()

function onDrop(files) {
  // called when files are dropped on zone
  emit('update:modelValue', files[0])
  console.log(files[0])
}

const { isOverDropZone } = useDropZone(dropZoneRef, {
  onDrop,
  dataTypes: ['image/jpeg', 'image/png']
})
</script>

<template>
  <div>
    <div ref="dropZoneRef" class="drop-zone">
      Drop files here
    </div>
  </div>
</template>

<style lang="scss" scoped>
.drop-zone {
  height: 200px;
  border: 2px gray dashed;
}
</style>