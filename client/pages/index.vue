<script setup>
const title = 'Que no te tiren - Compromis'
const description = 'Descripcio'
const ogImage = '/'
const keywords = 'alquiler'
const themeColor = '#148E6C'
const twitterSite = '@compromis'

useServerSeoMeta({
  title,
  ogTitle: title,
  description,
  ogDescription: description,
  ogImage,
  twitterCard: 'summary_large_image',
  keywords,
  ogSiteName: title,
  themeColor,
  twitterSite,
  ogType: 'website',
  ogLocale: 'ca'
})
useHead({ title })
</script>

<template>
  <main class="main-site">
    <SectionsRentChart />
  </main>
</template>
