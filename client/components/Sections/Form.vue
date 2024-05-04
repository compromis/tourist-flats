<script setup>
const { $api } = useNuxtApp()

const errors = ref(null)
const loading = ref(false)
const submitted = ref(false)

const form = reactive({
  type: 'tourist_flat',
  checked: false,
  address: '',
  consent: false,
  email: '',
  comments: '',
  picture: null
})

async function submit() {
  loading.value = true
  let formData = new FormData();
  formData.append('type', form.type)
  formData.append('email', form.email)
  formData.append('comments', form.comments)
  formData.append('picture', form.picture)
  
  try {
    await $api.submitReport(formData)
    submitted.value = true
  } catch(e) {
    errors.value = e
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <div class="card">
    <form @submit.prevent="submit">
      <pre>
        {{ form }}
      </pre>
      <hr />
      Errors:
      <pre>
        {{ errors }}
      </pre>
      Submitted: 
      {{ submitted }}
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
        <input type="checkbox" value="checked" required v-model="form.checked" />
        He comprovat que...
      </label>

      <div v-if="form.checked">
        <UIField
          label="E-mail"
          name="email"
          type="email"
          v-model="form.email"
        />
        <UIPicture
          label="Foto"
          v-model="form.picture"
        />
        <UIField
          label="Vols deixar algun comentari?"
          name="comemnts"
          type="textarea"
          v-model="form.comments"
        />
        <label>
          <input type="checkbox" value="checked" v-model="form.consent" required />
          Accepte politica privacitat
        </label>
        <button type="submit">
          Enviar
        </button>
      </div>
    </form>
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