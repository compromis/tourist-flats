<template>
  <button class="big-button">
    <slot />
  </button>
</template>

<style lang="scss" scoped>
.big-button {
  --raise: .25em;
  display: flex;
  background: var(--orange);
  border: 3px var(--pine) solid;
  color: var(--white);
  font-size: var(--text-md);
  padding: .5em .75em;
  border-radius: 10em;
  transition: .25s ease;
  box-shadow: var(--raise) var(--raise) 0 0 var(--pine);
  align-items: center;
  gap: var(--spacer-2);

  &:hover {
    --raise: .5em;
    translate: -.15em -.15em;
  }

  &:active {
    --raise: .25em;
    translate: 0;
  }
}
</style>