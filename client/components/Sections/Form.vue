<script setup>
const form = reactive({
  type: 'tourist_flat',
  checked: false,
  address: ''
})
</script>

<template>
  <div class="card">
    <fieldset>
      <legend>Que vols denunciar</legend>
      <label>
        <input type="radio" value="tourist_flat" v-model="form.type" />
        Un apartament turístic
      </label>
      <label>
        <input type="radio" value="illegal_works" v-model="form.type" />
        Una obra il·legal
      </label>
    </fieldset>
    <div>
      Check it's true
    </div>
    <label>
      <input type="checkbox" value="checked" v-model="form.checked" />
      He comprovat que...
    </label>

    <div v-if="form.checked">
      More form
      <ElementsStreetAddress v-model="form.address" />
    </div>
  </div>
</template>

<style lang="scss" scoped>
  .card {
    background-color: var(--white);
    padding: var(--spacer-8);
    border-radius: 1rem;
    border: 3px var(--pine) solid;
    color: var(--pine);
    max-width: 800px;
    margin: 0 auto;
  }
</style>