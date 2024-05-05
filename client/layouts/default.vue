<script setup>
import { ModalsContainer } from 'vue-final-modal'
</script>

<template>
  <div class="layout">
    <SiteNav />
    <slot />
    <SiteFooter />
    <ModalsContainer />
  </div>
</template>
