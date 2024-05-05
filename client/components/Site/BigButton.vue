<template>
  <button class="big-button">
    <slot />
  </button>
</template>

<style lang="scss" scoped>
.big-button {
  display: flex;
  background: var(--orange);
  border: 3px var(--pine) solid;
  color: var(--white);
  font-size: var(--text-md);
  padding: .5em .75em;
  border-radius: 10em;
  transition: .25s ease;
  box-shadow: 0 0 0 0 var(--pine);
  align-items: center;
  gap: var(--spacer-2);

  &:hover {
    box-shadow: .25rem .25rem 0 0 var(--pine);
  }

  &:active {
    translate: .25rem .25rem;
    box-shadow: 0 0 0 0 var(--pine);
  }
}
</style>