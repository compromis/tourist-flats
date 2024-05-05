<template>
  <section class="share">
    <div class="stripes" />
    <div class="container padded">
      <div class="share-header">
        <h2 class="font-headline">Fes difusió</h2>
        <p>Lorem ipsum</p>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.share {
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

  .stripes {
    margin-top: -125px;
  }
}
</style>