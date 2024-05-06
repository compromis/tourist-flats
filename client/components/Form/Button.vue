<template>
  <button class="form-button">
    <slot />
  </button>
</template>

<style lang="scss" scoped>
.form-button {
  display: flex;
  gap: var(--spacer-2);
  align-items: center;
  justify-content: center;
  appearance: none;
  background: var(--orange);
  padding: .5em;
  border-radius: 10rem;
  box-shadow: .25rem .25rem 0 0 var(--border-color);
  border: 3px var(--border-color) solid;
  color: var(--white);
  font-size: var(--text-md);
  transition: .25s ease;

  &:hover {
    box-shadow: .5rem .5rem 0 0 var(--border-color);
  }

  &:active {
    translate: .25rem .25rem;
    box-shadow: 0 0 0 0 var(--border-color);
  }
}
</style>
