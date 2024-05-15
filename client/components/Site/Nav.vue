<script setup>
const { locale, locales } = useI18n()
const scrolled = ref(false)

onMounted(() => {
  document.addEventListener('scroll', () => {
    scrolled.value = true
  })
})
</script>

<template>
  <header class="apartment-header">
    <nav :class="['apartment-nav', { scrolled }]">
      <a href="https://compromis.net" :aria-label="$t('assist.logo')" class="logo">
        <SiteLogo />
        <span class="logo-addon">València</span>
      </a>
      <div class="apartment-languages">
        <template v-for="lang in locales" :key="lang.code">
          <SwitchLocalePathLink
            v-if="locale !== lang.code"
            :locale="lang.code"
            :aria-label="$t('assist.language', { lang: lang.name })"
          >
            {{ lang.name }}
          </SwitchLocalePathLink>
        </template>
      </div>
    </nav>
    <div class="apartment-marquee">
      <NavMarquee />
    </div>
    <div class="apartment-title">
      <h1 class="font-headline">
        <NavTitle />
      </h1>
    </div>
  </header>
</template>

<style lang="scss" scoped>
.apartment {
  &-header {
    --header-height: 32rem;
  }

  &-nav {
    position: fixed;
    display: flex;
    align-items: center;
    padding: var(--site-padding);
    justify-content: space-between;
    left: 0;
    top: 0;
    right: 0;
    z-index: 1000;

    .logo {
      display: flex;
      align-items: center;
      color: var(--white);
      gap: var(--spacer-2);
      text-decoration: none;

      svg {
        height: 1.8rem;
      }

      &-addon {
        font-size: 1.25rem;
      }
    }
  }

  &-languages {
    :deep(a) {
      color: var(--white);
      font-size: 1.25rem;
      text-decoration: none;

      &:hover {
        text-decoration: underline;
        text-underline-offset: 4px;
      }
    }
  }

  &-marquee {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    overflow: clip;
    z-index: -1;
  }

  &-title {
    display: flex;
    padding: var(--site-padding);
    height: calc(var(--header-height) - .3em);
    font-size: var(--header-height);
    justify-content: center;
    align-items: flex-end;

    h1 {
      display: flex;
      font-size: var(--text-5xl);
      line-height: 1;
      gap: .15em;
      align-items: flex-start;
    }
  }
}

@include media('<md') {
  .apartment {
    &-header {
      --header-height: 20rem;
    }

    &-nav {
      .logo-addon {
        display: none;
      }

      &.scrolled {
        background: var(--green);
      }
    }

    &-title {
      h1 {
        font-size: 16vw;
      }
    }
  }
}
</style>