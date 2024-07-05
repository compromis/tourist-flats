<script setup>
import { MapboxMap, MapboxMarker, MapboxNavigationControl } from '@studiometa/vue-mapbox-gl'
import 'mapbox-gl/dist/mapbox-gl.css'

const props = defineProps({
  city: { type: Object, required: true }
})

const config = useRuntimeConfig()
const markers = ref([])
const { data: initialMarkers } = useFetch(config.public.reportsApiBase + '/reports/' + props.city.id) 
markers.value = initialMarkers.value

watch(() => props.city, async (newCity) => {
  const newMarkers = await $fetch(config.public.reportsApiBase + '/reports/' + newCity.id)
  markers.value = newMarkers
})
</script>

<template>
  <MapboxMap
    :access-token="config.public.mapboxApiKey"
    mapStyle="mapbox://styles/compromis/clsx099ve009801o34wf72krc"
    :center="city.map.mapCenter"
    class="mapbox"
    :zoom="10"
    :min-zoom="7"
    :scroll-zoom="false"
    :language="$i18n.locale === 'val' ? 'ca' : 'es'"
    :maxBounds="city.map.mapBounds"
  >
    <template v-for="marker in markers" :key="marker.id">
      <MapboxMarker
        v-if="marker.coordinates"
        :lngLat="marker.coordinates.split(',')"
        popup
      >
        <IconsMapTourist :class="['map-icon', marker.type]" />

        <template v-slot:popup>
          <div class="popup">
            <div :class="['popup-type', `type-${marker.type}`]">
              {{ $t(`form.types.${marker.type}`) }}
            </div>
            <div class="popup-address">
              {{ marker.address_street }}
            </div>
          </div>
        </template>
      </MapboxMarker>
    </template>
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

    &-address {
      opacity: .75;
      font-size: .85rem;
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