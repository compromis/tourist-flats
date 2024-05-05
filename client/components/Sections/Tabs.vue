<script setup>
import { useModal } from 'vue-final-modal'

const { t } = useI18n()

const tabs = [
  { id: 'problema', label: t('tabs.problem'), content: 'Content 1' },
  { id: 'causes', label: t('tabs.causes'), content: 'Content 2' },
  { id: 'solucio', label: t('tabs.solution'), content: 'Content 3' },
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
      >
        <template #button>
          <SiteBigButton @click="open">
            <Icon name="lucide:arrow-up-right" />
            {{ $t('tabs.cta') }} 
            <Icon name="fluent-emoji-flat:warning" />
          </SiteBigButton>
        </template>
      </ElementsTabs>
    </div>
    <div class="stripes" />
  </section>
</template>

<style lang="scss" scoped>
.stripes {
  margin-top: -100px;
  --stripes-height: 150px;
}
</style>