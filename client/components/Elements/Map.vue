<script setup>
import { MapboxMap, MapboxCluster, MapboxPopup, MapboxImage, MapboxNavigationControl } from '@studiometa/vue-mapbox-gl'
import 'mapbox-gl/dist/mapbox-gl.css'

const props = defineProps({
  city: { type: Object, required: true }
})

const config = useRuntimeConfig()

const isOpen = ref(false)
const position = ref([0, 0])
const content = ref()

async function openPopup({ geometry, properties }) {
  await nextTick()
  position.value = [...geometry.coordinates]
  isOpen.value = true

  /**
   * Mapbox GL convert's properties values to JSON, so we need to parse them
   * to retreive any complex data structure such as arrays and objects.
   */
  content.value = Object.fromEntries(
    Object.entries(properties).map(([key, value]) => {
      try {
        return [key, JSON.parse(value)];
      } catch (err) {
        // Silence is golden.
      }

      return [key, value]
    })
  )
}
</script>

<template>
  <MapboxMap
    :access-token="config.public.mapboxApiKey"
    mapStyle="mapbox://styles/compromis/clsx099ve009801o34wf72krc"
    :center="city.map.mapCenter"
    class="mapbox"
    :zoom="12"
    :min-zoom="7"
    :scroll-zoom="false"
    :language="$i18n.locale === 'val' ? 'ca' : 'es'"
    :maxBounds="city.map.mapBounds"
  >
    <MapboxPopup
      v-if="isOpen"
      :key="position.join('-')"
      :lng-lat="position"
      anchor="bottom"
      @mb-close="() => (isOpen = false)">
      <div class="popup">
        <div :class="['popup-type', `type-${content.type}`]">
          {{ $t(`form.types.${content.type}`) }}
        </div>
        <div class="popup-address">
          {{ content.address_street }}
        </div>
        <span v-if="content.count > 1" class="popup-count">{{ `x${content.count}` }}</span>
      </div>
    </MapboxPopup>
    <MapboxImage
      id="illegal_works"
      src="/images/icons/illegal_works.png">
      <MapboxCluster
        :data="`${config.public.reportsApiBase}/reports/${city.id}/illegal_works/geojson`"
        @mb-feature-click="openPopup"
        unclustered-point-layer-type="symbol"
        :unclustered-point-layout="{
          'icon-image': 'illegal_works',
          'icon-size': .65,
        }"
        :unclustered-point-paint="null"
        :clustersPaint="{
          'circle-color': '#ffce07',
          'circle-radius': 40,
          'circle-stroke-color': '#005c43',
          'circle-stroke-width': 3,
          'text-color': '#005c43'
        }"
      />
    </MapboxImage>
    <MapboxImage
      id="tourist_flat"
      src="/images/icons/tourist_flat.png">
      <MapboxCluster
        :data="`${config.public.reportsApiBase}/reports/${city.id}/tourist_flat/geojson`"
        @mb-feature-click="openPopup"
        unclustered-point-layer-type="symbol"
        :unclustered-point-layout="{
          'icon-image': 'tourist_flat',
          'icon-size': .65,
        }"
        :unclustered-point-paint="null"
        :clusterMinPoints="4"
        :clustersPaint="{
          'circle-color': '#f26728',
          'circle-radius': 40,
          'circle-stroke-color': '#005c43',
          'circle-stroke-width': 3,
          'text-color': '#005c43'
        }"
      />
    </MapboxImage>
    <MapboxNavigationControl position="bottom-right" />
  </MapboxMap>
</template>

<style lang="scss">
.mapbox {
  height: 75vh;
  min-height: 400px;
  border-radius: 1rem;

  a,
  a:hover {
    color: var(--pine);
  }

  .map-icon {
    width: 2rem;
    height: 2rem;
    color: var(--orange);
    cursor: pointer;
    transition: transform .25s ease;

    &:hover {
      transform: scale(1.25);
    }

    &.illegal_works {
      color: var(--yellow);
    }
  }

  .custom-marker {
    padding: 1em;
    background-color: var(--white);
    border-radius: 5px;
    color: var(--black);
  }

  .popup {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    color: var(--black);
    font-size: 1rem;
    font-family: var(--font-base);

    &-address {
      opacity: .75;
      font-size: .85rem;
    }

    &-count {
      font-size: 2.5rem;
    }

    &-picture {
      img {
        width: 100%;
      }
    }

    &-comments {
      white-space: pre-wrap;
      overflow: hidden;
    }

    &-type {
      background: var(--orange);
      color: var(--white);
      padding: var(--spacer-1) var(--spacer-2);
      border-radius: .25rem;
      font-weight: bold;
      padding-right: 3rem;

      &.type-illegal_works {
        background: var(--yellow);
      color: var(--pine);
      }
    }
  }
}

.mapboxgl-popup-close-button {
  padding: .8rem 1.2rem;
  font-size: 1rem;
}
</style>