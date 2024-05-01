<script setup>
import { MapboxMap, MapboxMarker } from '@studiometa/vue-mapbox-gl'
import 'mapbox-gl/dist/mapbox-gl.css'
import '@mapbox/mapbox-gl-geocoder/lib/mapbox-gl-geocoder.css'

const config = useRuntimeConfig()

const control = ref()
</script>

<template>
  <MapboxMap
    :access-token="config.public.mapboxApiKey"
    mapStyle="mapbox://styles/compromis/clsx099ve009801o34wf72krc"
    :lngLat="{ lng: 0, lat: 0 }"
    class="map"
  >
    <MapboxMarker :lngLat="[0, 0]" />
  </MapboxMap>
</template>

<style lang="scss">
.map {
  height: 400px;
}
</style>