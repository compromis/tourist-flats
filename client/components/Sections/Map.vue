<script setup>
import { useModal } from 'vue-final-modal'

const { open, close } = useModal({
  component: resolveComponent('ModalsForm'),
  attrs: {
    onConfirm() {
      close()
    },
  },
})
</script>

<template>
  <section class="map">
    <div class="container padded">
      <div class="map-header">
        <h2 class="font-headline">
          {{ $t('map.header') }}
        </h2>
        <p>{{ $t('map.p1') }}</p>
        <p>{{ $t('map.p2') }}</p>
      </div>
    </div>
    <div class="map-container">
      <ElementsMap />
      <div class="container button-container padded">
        <SiteBigButton @click="open" data-umami-event="cta_add_to_map">
          <Icon name="lucide:plus" />
          {{ $t('map.cta') }}
          <Icon name="fluent-emoji-flat:warning" />
        </SiteBigButton>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.map {
  &-header {
    max-width: 850px;
    margin: 0 auto;

    h2 {
      font-size: var(--text-3xl);
    }

    p {
      font-size: var(--text-md);
      font-weight: 500;
    }
  }

  &-container {
    padding: var(--site-padding);
  }
}

.button-container {
  display: flex;
  justify-content: flex-end;
  position: relative;
  margin-top: -6rem;
  z-index: 100;
  max-width: 850px;
}

@include media('<md') {
  .button-container {
    margin-top: 0;
    justify-content: center;
    padding-left: 0;
    padding-right: 0;

    .big-button {
      width: 100%;
      justify-content: center;
    }
  }
}
</style>