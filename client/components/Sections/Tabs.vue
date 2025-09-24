<script setup>
import { useModal } from 'vue-final-modal'
const { t } = useI18n()

const cities = useState('cities')
const city = useState('city')

const tabs = computed(() => {
  const baseTabs = [
    { id: 'problema', label: t('tabs.problem'), content: resolveComponent('TabsProblem') },
    { id: 'causes', label: t('tabs.causes'), content: resolveComponent('TabsCauses') },
    { id: 'solucio', label: t('tabs.solution'), content: resolveComponent('TabsSolution') },
  ]

  if (city.value.id === 1) {
    baseTabs.unshift({ id: 'sign', label: t('tabs.sign'), content: resolveComponent('TabsSign') })
  }

  return baseTabs
})

const { open, close } = useModal({
  component: resolveComponent('ModalsForm'),
  attrs: {
    city: city.value,
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
          <SiteBigButton @click="open" class="button" flat data-umami-event="cta_add_to_map">
            <Icon name="fluent-emoji-flat:warning" />
            {{ $t('tabs.cta') }} 
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

.button {
  font-size: 1.1rem;
}

@include media('<md') {
  .stripes {
    margin-top: -140px;
    --stripes-height: 170px;
    --stripes-width: 50px;
  }

  .container.padded {
    padding: 0;
  }
}
</style>