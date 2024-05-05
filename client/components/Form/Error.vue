<template>
  <div class="error" aria-live="assertive">
    <Icon name="lucide:triangle-alert" />
    <slot />
  </div>
</template>

<style lang="scss" scoped>
.error {
  display: flex;
  gap: var(--spacer-2);
  align-items: center;
  background: rgba($orange, .15);
  color: darken($orange, 20%);
  padding: .75em;
  border-radius: .5rem;
  font-weight: 900;
}
</style>