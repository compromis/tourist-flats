<script setup>
const ctaText = encodeURIComponent('Text')
const whatsappText = encodeURIComponent('Text')
const shareableUrl = encodeURIComponent('https://quenotetiren.com')
const hashtag = 'QueNoTeTiren'

const urls = {
  whatsapp: `https://api.whatsapp.com/send/?text=${whatsappText}`,
  telegram: `https://t.me/share/url?url=${shareableUrl}&text=${ctaText}`,
  tweet: `https://twitter.com/intent/tweet/?text=${ctaText}&url=${shareableUrl}&hashtags=${hashtag}`,
  facebook: `https://www.facebook.com/sharer/sharer.php?u=${shareableUrl}`,
}
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
          {{ $t('share.intro') }}
        </p>
      </div>
      <div class="share-buttons">
        <SiteButton size="lg" :href="urls.whatsapp" target="_blank" focus="black" class="plausible-event-name=clicked_cta plausible-event-social_channel=whatsapp">
          <Icon name="fa6-brands:whatsapp" />
          WhatsApp
        </SiteButton>
        <SiteButton size="lg" :href="urls.telegram" target="_blank" focus="black" class="plausible-event-name=clicked_cta plausible-event-social_channel=telegram">
          <Icon name="fa6-brands:telegram" />
          Telegram
        </SiteButton>
        <SiteButton size="lg" :href="urls.tweet" target="_blank" focus="black" class="plausible-event-name=clicked_cta plausible-event-social_channel=twitter">
          <Icon name="fa6-brands:x-twitter" />
          Tweet
        </SiteButton>
        <SiteButton size="lg" :href="urls.facebook" target="_blank" focus="black" class="plausible-event-name=clicked_cta plausible-event-social_channel=facebook">
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
    }

    p {
      font-size: var(--text-md);
      font-weight: 500;
      margin-top: 0;
    }
  }

  &-buttons {
    display: flex;
    gap: var(--site-padding);
  }

  .stripes {
    margin-top: -125px;
  }
}
</style>