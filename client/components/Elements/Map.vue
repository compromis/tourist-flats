<script setup>
import { MapboxMap, MapboxMarker, MapboxNavigationControl } from '@studiometa/vue-mapbox-gl'
import 'mapbox-gl/dist/mapbox-gl.css'

const config = useRuntimeConfig()

const { data: markers } = useFetch(config.public.reportsApiBase + '/reports') 
</script>

<template>
  <MapboxMap
    :access-token="config.public.mapboxApiKey"
    mapStyle="mapbox://styles/compromis/clsx099ve009801o34wf72krc"
    :center="config.public.mapCenter"
    class="mapbox"
    :zoom="13"
    :min-zoom="11"
    :scroll-zoom="false"
    :language="$i18n.locale === 'val' ? 'ca' : 'es'"
    :maxBounds="config.public.mapBounds"
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
            <p>{{ marker }}</p>
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
    background-color: #fff;
    border-radius: 5px;
    color: black;
  }

  .popup {
    color: black;
  }
}
</style>