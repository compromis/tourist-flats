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
  },
  errorMessages: {
    type: Array,
    default: null
  },
})

const emit = defineEmits(['update:modelValue'])

const dropZoneRef = ref()
const fileBrowser = ref()

function onDrop(files) {
  emit('update:modelValue', files[0])
}

function selectFile(e) {
  emit('update:modelValue', e.target.files[0])
}

function clear() {
  emit('update:modelValue', null)
}

const { isOverDropZone } = useDropZone(dropZoneRef, {
  onDrop,
  dataTypes: ['image/jpeg', 'image/png']
})

const preview = computed(() => {
  return URL.createObjectURL(props.modelValue)
})
</script>

<template>
  <div class="form-picture">
    <div class="form-picture-label-wrapper">
      <label :for="name" class="form-picture-label">
        {{ label }}
        <span>{{ $t('form.optional') }}</span>
      </label>
      <button
        v-if="modelValue"
        type="button"
        @click="clear"
        :aria-label="$t('assist.clear_picture')"
        class="clear-button"
      >
        <Icon name="lucide:x" />
        {{ $t('form.clear_picture') }}
      </button>
    </div>
    <button
      type="button"
      ref="dropZoneRef"
      :class="['form-picture-dropzone', { dropping: isOverDropZone }]"
      @click="fileBrowser.click()"
      :aria-describedby="errorMessages ? `error-${name}` : null"
    >
      <div v-if="!modelValue || isOverDropZone" class="form-picture-dropzone-helper">
        <Icon name="lucide:camera" class="icon" />
        {{ $t('form.picture_drag') }}
      </div>
      <div v-else class="form-picture-dropzone-helper">
        <img :src="preview" alt="Previsualització" />
      </div>
    </button>
    <input
      class="visually-hidden"
      ref="fileBrowser"
      :id="name"
      :name="name"
      type="file"
      accept="image/png, image/jpeg"
      @change="selectFile"
      tabindex="-1"
      :aria-invalid="errorMessages ? 'true' : null"
      :aria-describedby="errorMessages ? `error-${name}` : null"
    />
  </div>
  <FormError :id="`error-${name}`" v-if="errorMessages">
    <ul>
      <li v-for="(message, e) in errorMessages" :key="e">
        {{ message }}
      </li>
    </ul>
  </FormError>
</template>

<style lang="scss" scoped>
.form-picture {
  display: flex;
  flex-direction: column;
  gap: var(--spacer-2);
  position: relative;

  &-label {
    display: flex;
    font-weight: 900;

    span {
      margin-inline-start: auto;
      font-weight: 500;
      font-size: var(--text-sm);
    }
  }

  &-dropzone {
    display: flex;
    height: 150px;
    border: 2px var(--pine) dashed;
    padding: var(--spacer-4);
    border-radius: .5rem;
    cursor: pointer;
    background: transparent;
    appearance: none;
    font-weight: 500;
    color: var(--pine);

    &:hover,
    &.dropping {
      background: var(--transpine);
    }

    &:focus {
      outline: 2px var(--orange) solid;
      outline-offset: 3px;
    }

    &-helper {
      display: flex;
      flex-grow: 1;
      height: 100%;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: var(--spacer-2);

      img {
        height: 100%;
        border-radius: .5rem;
      }

      .icon {
        font-size: 2rem;
      }
    }
  }

  .clear-button {
    position: absolute;
    top: 2.5rem;
    right: 1rem;
    display: flex;
    gap: var(--spacer-2);
    align-items: center;
    color: var(--pine);
    background: var(--transpine);
    padding: .25em;
    border-radius: .5rem;

    &:hover {
      background-color: rgba($orange, .15);
      color: darken($orange, 15%);
    }
  }
}
</style>