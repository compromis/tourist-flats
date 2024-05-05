<script setup>
import { useModal } from 'vue-final-modal'

const tabs = [
  { id: 'problema', label: 'El problema', content: 'Content 1' },
  { id: 'causes', label: 'Les causes', content: 'Content 2' },
  { id: 'solucio', label: 'La solucio', content: 'Content 3' },
]

const { open, close } = useModal({
  component: resolveComponent('ModalsForm'),
  attrs: {
    onConfirm() {
      close()
    },
  },
})
</script>

<template>
  <section>
    <div class="container padded">
      <ElementsTabs
        :tabs="tabs"
      />
    </div>
    <div class="stripes" />
    <button @click="open">
      Open Modal
    </button>
  </section>
</template>

<style lang="scss" scoped>
.stripes {
  margin-top: -100px;
  --stripes-height: 150px;
}
</style>