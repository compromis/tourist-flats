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

  const tabsByCity = {
    1: [
      { id: 'sign', label: t('tabs.sign'), content: resolveComponent('TabsSign'), bold: true },
      ...baseTabs
    ],
    2: [
      { id: 'problema', label: t('tabs.problem'), content: resolveComponent('TabsAlacantProblem') },
      { id: 'causes', label: t('tabs.causes'), content: resolveComponent('TabsAlacantCauses') },
      { id: 'solucio', label: t('tabs.solution'), content: resolveComponent('TabsAlacantSolution') }
    ],
    3: [
      { id: 'problema', label: t('tabs.problem'), content: resolveComponent('TabsCastelloProblem') },
      { id: 'causes', label: t('tabs.causes'), content: resolveComponent('TabsCastelloCauses') },
      { id: 'solucio', label: t('tabs.solution'), content: resolveComponent('TabsCastelloSolution') }
    ],
    4: [
      { id: 'problema', label: t('tabs.problem'), content: resolveComponent('TabsElxProblem') },
      { id: 'causes', label: t('tabs.causes'), content: resolveComponent('TabsElxCauses') },
      { id: 'solucio', label: t('tabs.solution'), content: resolveComponent('TabsElxSolution') }
    ],
  }

  return tabsByCity[city.value.id] || baseTabs
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
    <div v-if="city.id === 1" class="doc">
      <a href="/docs/APT_PRESSUMPTAMENT_TANCANTS.pdf" target="_blank" data-umami-event="cta_download_report">
        <Icon name="ri:file-3-line" /> Descarrega els 1.000 apartaments turístics que Catalá diu "haver tancat"
      </a>
    </div>
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

.doc {
  text-align: center;
  padding: 1rem;

  a {
    color: var(--color-white);
    font-weight: 900;
    font-size: 1.35rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    
    &:hover { text-decoration: underline; }
  }
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