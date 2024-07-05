<script setup>
import { useModal } from 'vue-final-modal'
const config = useRuntimeConfig()

const props = defineProps({
  city: { type: Number, default: 1 }
})

const { data: cities } = await useFetch(config.public.reportsApiBase + '/cities')
const defaultCity = computed(() => {
  return cities.value.filter(city => city.id === props.city)[0]
})
const currentCity = ref(defaultCity.value)

const { open, close, patchOptions } = useModal({
  component: resolveComponent('ModalsForm'),
  attrs: {
    city: currentCity.value,
    onConfirm() {
      close()
    },
  },
})

watch(currentCity, (newCity) => {
  patchOptions({
    attrs: {
      city: newCity
    }
  })
})
</script>

<template>
  <section class="map">
    <div class="container padded">
      <div class="map-header">
        <h2 class="font-headline">
          {{ $t('map.header') }}
        </h2>
        <p>{{ $t('map.p1') }}</p>
        <p>{{ $t('map.p2') }}</p>
      </div>
      <div class="map-cities">
        <ul>
          <li v-for="city in cities" :key="city.id">
            <a :href="`/${city.slug}`" @click.prevent="currentCity = city">
              {{ city.name }}
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="map-container" v-if="currentCity">
      <ElementsMap :city="currentCity" />
      <div class="container button-container padded">
        <SiteBigButton @click="open" data-umami-event="cta_add_to_map">
          <Icon name="lucide:plus" />
          {{ $t('map.cta') }}
          <Icon name="fluent-emoji-flat:warning" />
        </SiteBigButton>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.map {
  &-header {
    max-width: 850px;
    margin: 0 auto;

    h2 {
      font-size: var(--text-3xl);
    }

    p {
      font-size: var(--text-md);
      font-weight: 500;
    }
  }

  &-container {
    padding: var(--site-padding);
  }
}

.button-container {
  display: flex;
  justify-content: flex-end;
  position: relative;
  margin-top: -6rem;
  z-index: 100;
  max-width: 850px;
}

@include media('<md') {
  .button-container {
    margin-top: 0;
    justify-content: center;
    padding-left: 0;
    padding-right: 0;

    .big-button {
      width: 100%;
      justify-content: center;
    }
  }
}
</style>