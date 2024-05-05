<script setup>
const { $api } = useNuxtApp()

const emit = defineEmits(['close'])

const errors = ref(null)
const submitting = ref(false)
const submitted = ref(false)

const types = [
  { value: 'tourist_flat', text: 'Pis turistic', icon: 'lucide:bed-double' },
  { value: 'illegal_works', text: 'Obra il·legal', icon: 'uil:hard-hat' },
]

const form = reactive({
  type: 'tourist_flat',
  coordinates: null,
  checked: false,
  address_street: '',
  address_number: '',
  address_box: '',
  consent: false,
  email: '',
  comments: '',
  picture: null
})

watch(() => form.type, () => form.checked = false)

async function submit() {
  if (submitting.value) return
  submitting.value = true
  let formData = new FormData();
  formData.append('type', form.type)
  formData.append('coordinates', form.coordinates)
  formData.append('address_street', form.address_street)
  formData.append('address_number', form.address_number)
  formData.append('address_box', form.address_box)
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
    submitting.value = false
  }
}

function hasError (field) {
  return errors.value && errors.value.errors.hasOwnProperty(field)
}

function errorMessages (field) {
  return errors.value && errors.value.errors.hasOwnProperty(field) && errors.value.errors[field]
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
            v-model:number="form.address_number"
            v-model:box="form.address_box"
            :error-address="hasError('address_street')"
          />
          <FormPicture
            label="Foto"
            name="picture"
            v-model="form.picture"
            :error-messages="errorMessages('picture')"
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
            label="Correu electrònic"
            name="email"
            type="email"
            v-model="form.email"
            required
            placeholder="Escriu un e-mail on poder contactar-te"
            help="La teua denúncia és anònima. Només gastarem el teu e-mail per informar-te de l'estat de la denúncia."
            :error-messages="errorMessages('email')"
          />
          <FormCheckbox
            value="true"
            v-model="form.consent"
            name="consent"
            required
          >
            He llegit i accepte la <a href="https://compromis.net/avis-legal" target="_blank">politica privacitat</a>. Accepte rebre correus electrònics de <strong>Compromís</strong> amb la finalitat de mantindre'm informa't sobre la meua denúncia.
          </FormCheckbox>
          <FormButton type="submit">
            <IconsLoading v-if="submitting" />
            <Icon name="lucide:file-input" v-else />
            {{ submitting ? 'Enviant...' : 'Enviar denúncia' }}
          </FormButton>
        </div>
      </Transition>
    </form>
    <div v-else class="form-submitted">
      <Icon name="lucide:file-check" class="main-icon" />
      <h3 class="font-headline">Denúncia rebuda</h3>
      <p>Hem rebut la teua denúncia i la tramitarem el més prompte possible</p>
      <p>Et mantindrem informa't del l'estat de la teua denúncia mitjançat el correu que ens has indicat.</p>
      <button class="button" @click="emit('close')">
        <Icon name="lucide:arrow-down-left" class="icon" />
        Torna al mapa
      </button>
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

    &.submitting {
      opacity: .5;
    }
  }

  .form-submitted {
    display: flex;
    flex-direction: column;
    gap: var(--spacer-4);

    h3 {
      font-size: var(--text-xl);
    }

    p {
      margin: 0;
      font-size: var(--text-base);
    }

    .main-icon {
      font-size: 3rem;
    }

    .button {
      .icon {
        font-size: 1.5em;

        :deep(path) {
          stroke-width: 3px;
        }
      }
    }
  }
</style>