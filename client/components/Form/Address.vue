<script setup>
import { MapboxMap, MapboxMarker, MapboxGeocoder, MapboxNavigationControl } from '@studiometa/vue-mapbox-gl'
import '@mapbox/mapbox-gl-geocoder/lib/mapbox-gl-geocoder.css'

const props = defineProps({
  label: { type: String, required: true },
  address: { type: String, required: true },
  coordinates: { type: String, default: null },
  errorAddress: { type: Boolean, default: false },
  errorNumber: { type: Boolean, default: false }
})

const emit = defineEmits(['update:address', 'update:coordinates'])

const config = useRuntimeConfig()
const mapCenter = ref(config.public.mapCenter)

const value = computed({
  get () {
    return { address: props.address, coordinates: props.coordinates?.split(',') }
  },
  set (value) {
    emit('update:address', value?.result?.text_ca)
    emit('update:coordinates', value?.result?.geometry?.coordinates.join(','))
  }
})

const number = defineModel('number')
const box = defineModel('box')

function setResult (result) {
  value.value = result
  mapCenter.value = result?.result?.geometry?.coordinates
}

function onDragEnd (result) {
  const coordinates = [result.target._lngLat.lng, result.target._lngLat.lat]
  emit('update:coordinates', coordinates.join(','))
}

const { t } = useI18n()
onMounted(() => {
  setTimeout(() => {
    const addressInput = document.querySelector('.mapboxgl-ctrl-geocoder--input')
    addressInput.placeholder = t('form.street_name_placeholder')
  }, 200)
})
</script>

<template>
  <div class="form-address">
    <div class="form-address-label">
      {{ label }}
    </div>
    <MapboxGeocoder
      :access-token="config.public.mapboxApiKey"s
      types="address"
      countries="ES"
      language="ca,es"
      :bbox="config.public.mapBBox"
      @mb-result="setResult"
    />
    <FormError v-if="errorAddress">
      {{ $t('form.errors.address') }}
    </FormError>
    <Transition name="curtain">
      <div v-if="address">
        <MapboxMap
          :access-token="config.public.mapboxApiKey"
          mapStyle="mapbox://styles/compromis/clsx099ve009801o34wf72krc"
          class="address-map"
          :min-zoom="9"
          :center="mapCenter"
          :zoom="15"
          :maxBounds="config.public.mapBounds"
        >
          <MapboxMarker
            draggable
            :lngLat="value.coordinates"
            @mb-dragend="onDragEnd"
          />
          <MapboxNavigationControl position="bottom-right" />
        </MapboxMap>
        <div class="form-address-details">
          <FormField
            :label="$t('form.street_number')"
            name="street_number"
            v-model="number"
            :placeholder="$t('form.street_number_placeholder')"
            :aria-invalid="errorNumber ? 'true' : null"
            :aria-describedby="errorNumber ? 'ErrorNumber' : null"
            required
          />
          <FormField
            :label="$t('form.street_box')"
            name="street_box"
            :placeholder="$t('form.street_box_placeholder')"
            v-model="box"
          />
        </div>
        <FormError v-if="errorNumber" id="ErrorNumber">
          {{ $t('form.errors.street_number') }}
        </FormError>
      </div>
    </Transition>
  </div>
</template>

<style lang="scss">
.form-address {
  display: flex;
  flex-direction: column;
  gap: var(--spacer-2);

  &-label {
    font-weight: 900;
  }

  &-details {
    display: flex;
    gap: var(--site-padding);
    margin-top: var(--spacer-4);

    & > * {
      flex-grow: 1;
    }

    & + .error {
      margin-top: var(--spacer-4);
    }
  }
}
.mapboxgl-ctrl-geocoder {
  width: 100%;
  max-width: unset;
  font-size: 1.1rem;
  box-shadow: none;
}

.mapboxgl-ctrl-geocoder--input {
  border: 2px var(--pine) solid;
  padding: var(--spacer-3) var(--spacer-4);
  padding-left: 2.5rem;
  font-size: 1.1rem;
  border-radius: .5rem;
  font-weight: 500;
  height: auto;
  color: var(--pine);

  &:focus {
    outline: 2px var(--orange) solid;
    color: var(--pine);
  }

  &::placeholder {
    color: rgba($pine, .5);
  }
}

.mapboxgl-ctrl-geocoder--icon {
  top: 14px;
  left: var(--spacer-4);

  path {
    fill: var(--pine);
  }
}

.mapboxgl-ctrl-geocoder .mapboxgl-ctrl-geocoder--pin-right > * {
  top: 13px;
  right: var(--spacer-4);
}

.address-map {
  height: 200px;
  border-radius: .5rem;
}
</style>