<script setup>
import { useModal } from 'vue-final-modal'
const config = useRuntimeConfig()
const { locale } = useI18n()
const cities = useState('cities')
const currentCity = useState('city')

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

function setCurrentCity (city) {
  currentCity.value = city
  const pre = locale.value === 'cas' ? '/cas/' : '/'
  window.history.replaceState({}, '', `${pre}${city.slug}`)
}
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

        <div v-if="config.public.multicity" class="map-cities">
          <ul class="list-reset" aria-label="Ciutat">
            <li v-for="city in cities" :key="city.id">
              <a
                :href="`/${city.slug}`"
                @click.prevent="setCurrentCity(city)"
                :class="{ active: currentCity.id === city.id }"
                :aria-pressed="currentCity.id === city.id ? 'true' : 'false'"
              >
                {{ city.name }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="map-container">
      <ElementsMap />
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

  &-cities {
    margin-top: var(--spacer-8);

    ul {
      display: flex;
      list-style: none;
      gap: .5em;
    }

    a {
      border: 3px var(--pine) solid;
      font-size: var(--text-md);
      border-radius: 4em;
      padding: .25em .75em;
      text-decoration: none;
      background: var(--pine);
      color: var(--white);

      &.active {
        background: var(--orange);
      }

      &:hover:not(.active) {
        background: var(--yellow);
        color: var(--pine);
      }
    }
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