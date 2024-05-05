<script setup>
const { $api } = useNuxtApp()

const errors = ref(null)
const loading = ref(false)
const submitted = ref(false)

const types = [
  { value: 'tourist_flat', text: 'Pis turistic' },
  { value: 'illegal_works', text: 'Obra illegal' },
]

const form = reactive({
  type: 'tourist_flat',
  coordinates: null,
  checked: false,
  address_street: '',
  consent: false,
  email: '',
  comments: '',
  picture: null
})

async function submit() {
  loading.value = true
  let formData = new FormData();
  formData.append('type', form.type)
  formData.append('coordinates', form.coordinates)
  formData.append('address_street', form.address_street)
  formData.append('email', form.email)
  formData.append('checked', form.checked)
  formData.append('consent', form.consent)
  if (form.comments) formData.append('comments', form.comments)
  if (form.picture) formData.append('picture', form.picture)
  
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
    <form
      v-if="!submitted"
      @submit.prevent="submit"
      :class="['report-form', 'form-divider', { submitting }]"
    >
      <FormRadioButtons
        label="Què vols denunciar?"
        name="type"
        v-model="form.type"
        :options="types" />

      <FormChecker
        :type="form.type"
        v-model="form.checked"
       />

      <Transition name="curtain">
        <div class="form-divider" v-if="form.checked">
          <FormAddress
            label="Adreça"
            v-model:coordinates="form.coordinates"
            v-model:address="form.address_street"
          />
          <FormPicture
            label="Foto"
            name="picture"
            v-model="form.picture"
          />
          <FormField
            label="Vols deixar algun comentari?"
            name="comemnts"
            type="textarea"
            v-model="form.comments"
            help="El teu comentari es publicarà en el mapa."
          />
          <h3>Informació de contacte</h3>
          <FormField
            label="E-mail"
            name="email"
            type="email"
            v-model="form.email"
            required
            help="La teua denúncia és anònima. Només gastarem el teu e-mail per informar-te de l'estat de la denúncia."
          />
          <label>
            <input type="checkbox" value="checked" v-model="form.consent" required />
            Accepte politica privacitat
          </label>
          <FormButton type="submit">
            Enviar
          </FormButton>
        </div>
      </Transition>
    </form>
    <div v-else>
      Enviat!
    </div>
  </div>
</template>

<style lang="scss" scoped>
  .form-divider {
    display: flex;
    flex-direction: column;
    gap: var(--card-padding, var(--spacer-6));
  }

  .report-form {
    h3 {
      background: var(--transpine);
      padding: var(--spacer-2) var(--spacer-3);
      border-radius: .5rem;
    }
  }
</style>