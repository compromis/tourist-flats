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
  <div class="form-picture">
    <div class="form-picture-label">
      {{ label }}
    </div>
    <div ref="dropZoneRef" class="form-picture-dropzone">
      Drop files here
    </div>
  </div>
</template>

<style lang="scss" scoped>
.form-picture {
  display: flex;
  flex-direction: column;
  gap: var(--spacer-2);

  &-label {
    font-weight: 900;
  }

  &-dropzone {
    display: flex;
    height: 150px;
    border: 2px var(--pine) dashed;
    padding: var(--spacer-4);
    border-radius: .5rem;
    align-items: center;
    justify-content: center;
    cursor: pointer;

    &:hover {
      background: var(--transpine);
    }
  }
}
</style>