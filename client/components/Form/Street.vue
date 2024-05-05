<script setup>
import Autocomplete from '@trevoreyre/autocomplete-vue'
import '@trevoreyre/autocomplete-vue/dist/style.css'

async function search (input) {
  if (input.length < 1) { return [] }

  const escapedInput = encodeURIComponent(input)
  const url = `https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/vias/records?select=codtipovia%2Cnomoficial&where=nomoficial%20like%20%22${escapedInput}%22%20or%20nomcortotraduc%20like%20%22${escapedInput}%22%20or%20traducnooficial%20like%20%22${escapedInput}%22&limit=20`
  const streets = await $fetch(url)

  return streets.results
}

function getResultValue (item) {
  return `${item.codtipovia} ${item.nomoficial}`
}
</script>

<template>
  <Autocomplete
    :search="search"
    placeholder="Search for a country"
    aria-label="Search for a country"
    :get-result-value="getResultValue"
    :debounce-time="500"
  >
  <template #result="{ result, props }">
      <li
        v-bind="props"
        class="autocomplete-result wiki-result"
      >
        <div class="wiki-title">
          {{ result.codtipovia }} {{ result.nomoficial }}
        </div>
      </li>
    </template>
  </Autocomplete>
</template>