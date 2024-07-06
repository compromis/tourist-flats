<script setup>
const city = useState('city')
const { t } = useI18n()
const ctaText = ref(encodeURIComponent(t('share.text', { city: city.value.name })))
const whatsappText = ref(encodeURIComponent(t('share.whatsapp_text', { city: city.value.name, slug: city.value.slug })))
const shareableUrl = ref(encodeURIComponent(t('share.url', { slug: city.value.slug })))
const hashtag = 'QueNoTeTiren'

const urls = computed(() => ({
  whatsapp: `https://api.whatsapp.com/send/?text=${whatsappText.value}`,
  telegram: `https://t.me/share/url?url=${shareableUrl.value}&text=${ctaText.value}`,
  tweet: `https://twitter.com/intent/tweet/?text=${ctaText.value}&url=${shareableUrl.value}&hashtags=${hashtag}`,
  facebook: `https://www.facebook.com/sharer/sharer.php?u=${shareableUrl.value}`,
}))
</script>

<template>
  <section class="share">
    <div class="stripes" />
    <div class="container padded">
      <div class="share-header">
        <h2 class="font-headline">
          {{ $t('share.header') }}
        </h2>
        <p>
          {{ $t('share.intro', { city: city.name }) }}
        </p>
      </div>
      <div class="share-buttons">
        <SiteButton size="lg" :href="urls.whatsapp" target="_blank" focus="black" data-umami-event="cta_share_whatsapp">
          <Icon name="fa6-brands:whatsapp" />
          WhatsApp
        </SiteButton>
        <SiteButton size="lg" :href="urls.telegram" target="_blank" focus="black" data-umami-event="cta_share_telegram">
          <Icon name="fa6-brands:telegram" />
          Telegram
        </SiteButton>
        <SiteButton size="lg" :href="urls.tweet" target="_blank" focus="black" data-umami-event="cta_share_twitter">
          <Icon name="fa6-brands:x-twitter" />
          Tweet
        </SiteButton>
        <SiteButton size="lg" :href="urls.facebook" target="_blank" focus="black" data-umami-event="cta_share_facebook">
          <Icon name="fa6-brands:facebook" />
          Facebook
        </SiteButton>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.share {
  &-header {
    margin: 0 auto;
    margin-bottom: var(--spacer-8);

    h2 {
      font-size: var(--text-3xl);
      margin-top: var(--spacer-8);
    }

    p {
      font-size: var(--text-md);
      font-weight: 500;
      margin-top: 0;
    }
  }

  &-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: var(--site-padding);
  }

  .stripes {
    margin-top: -125px;
  }
}

@include media('<md') {
  .share {
    &-buttons {
      justify-content: center;

      .button {
        width: 100%;
      }
    }

    .stripes {
      --stripes-width: 50px;
      margin-top: -180px;
    }
  }
}
</style>