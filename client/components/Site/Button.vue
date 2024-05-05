<script setup>
const props = defineProps({
  href: {
    type: String,
    default: null
  },

  variant: {
    type: String,
    default: 'primary'
  },

  size: {
    type: String,
    default: 'md'
  },

  focus: {
    type: String,
    default: 'yellow'
  },

  block: {
    type: Boolean,
    default: false
  }
})

const component = computed(() => {
  return props.href ? 'a' : 'button'
})
</script>

<template>
  <Component
    :is="component"
    :href="href"
    :class="[`button button-${variant} button-${size} focus-${focus}`, { block }]"
  >
    <slot />
  </Component>
</template>

<style lang="scss" scoped>
.button {
  --raise: .25em;
  display: flex;
  align-items: center;
  background: var(--white);
  color: var(--pine);
  padding: var(--button-padding, var(--spacer-3) var(--spacer-4));
  font-size: var(--button-text-size, var(--text-base));
  box-shadow: var(--raise) var(--raise) 0 0 var(--pine);
  transition: all .25s ease;
  gap: .75em;
  text-decoration: none;
  font-weight: bold;

  &:hover {
    --raise: .5em;
    translate: -.15em -.15em;
  }

  &:active {
    --raise: .25em;
    translate: 0;
  }

  &-lg {
    --button-text-size: var(--text-md);
    --button-padding: var(--spacer-4) var(--spacer-8);
    --focus-weight: 4px;
  }

  &.block {
    width: 100%;
  }
}
</style>