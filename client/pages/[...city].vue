<script setup>
const route = useRoute()
const config = useRuntimeConfig()
const { data: citiesList } = await useFetch(config.public.reportsApiBase + '/cities')
const cities = useState('cities', () => citiesList.value)
const city = useState('city', () => {
  const current = cities.value.filter(city => city.slug === route.params.city[0])
  return current.length > 0 ? current[0] : cities.value[0]
})

const { t } = useI18n()

const title = t('meta.title')
const description = t('meta.description', { city: city.value.name })
const ogImage = t('meta.image')
const keywords = t('meta.keywords')
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
    <SectionsTabs />
    <SectionsMap />
    <SectionsShare />
  </main>
</template>
