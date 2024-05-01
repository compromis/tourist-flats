<script setup>
const address = ref('')
const url = 'https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/vias/records?select=codtipovia%2Cnomoficial&where=nomoficial%20like%20%22tamarindes%22%20or%20nomcortotraduc%20like%20%22tamarindes%22%20or%20traducnooficial%20like%20%22tamarindes%22&limit=20'
</script>

<template>
  <div>
    <input type="text" v-model="address" />
  </div>
</template>