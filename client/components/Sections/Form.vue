<script setup>
const props = defineProps({
  city: { type: Object, required: true }
})

const { $api } = useNuxtApp()
const { t } = useI18n()
const config = useRuntimeConfig()

const emit = defineEmits(['close'])

const errors = ref(null)
const submitting = ref(false)
const submitted = ref(false)

const { data: cities } = await useFetch(config.public.reportsApiBase + '/cities')
const types = [
  { value: 'tourist_flat', text: t('form.types.tourist_flat'), icon: 'lucide:bed-double' },
  { value: 'illegal_works', text: t('form.types.illegal_works'), icon: 'uil:hard-hat' },
]

const selectedCity = ref(props.city)
watch(selectedCity, (newCity) => form.city_id = newCity.id)

const form = reactive({
  type: 'tourist_flat',
  city_id: selectedCity.value.id,
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
  formData.append('city_id', form.city_id)
  formData.append('coordinates', form.coordinates)
  formData.append('address_street', form.address_street)
  formData.append('address_number', form.address_number)
  formData.append('address_box', form.address_box)
  formData.append('email', form.email)
  formData.append('checked', form.checked)
  formData.append('consent', form.consent)
  formData.append('comments', form.comments)
  if (form.picture) formData.append('picture', form.picture)
  
  try {
    await $api.submitReport(formData)
    submitted.value = true
  } catch(e) {
    errors.value = e

    if(e.message === 'Server Error') {
      alert('Estem tenint problemes. Torna a intentar-ho després')
    }
  } finally {
    submitting.value = false
  }
}

function reset () {
  submitted.value = false;
  form.coordinates = null,
  form.checked = false,
  form.address_street = '',
  form.address_number = '',
  form.address_box = '',
  form.consent = false,
  form.comments = '',
  form.picture = null
}

function hasError (field) {
  return errors.value && errors.value.errors.hasOwnProperty(field)
}

function errorMessages (field) {
  return errors.value && errors.value.errors.hasOwnProperty(field) && errors.value.errors[field]
}

const options = computed(() => cities.value.map(city => ({ id: city.id, label: city.name, value: city })))
</script>

<template>
  <div class="card">
    <label for="city_id">Ciutat</label>
    <FormSelect
      name="city_id"
      :options="options"
      v-model="selectedCity"
      required
    />
    <form
      v-if="!submitted"
      @submit.prevent="submit"
      :class="['report-form', 'form-divider', { submitting }]"
    >
      <FormRadioButtons
        :label="$t('form.type_label')"
        name="type"
        v-model="form.type"
        :options="types" />

      <FormChecker
        :type="form.type"
        :city="selectedCity"
        v-model="form.checked"
       />

      <Transition name="curtain">
        <div class="form-divider" v-if="form.checked">
          <FormAddress
            :city="selectedCity"
            :label="$t('form.street_name')"
            v-model:coordinates="form.coordinates"
            v-model:address="form.address_street"
            v-model:number="form.address_number"
            v-model:box="form.address_box"
            :error-address="hasError('address_street')"
          />
          <FormPicture
            :label="$t('form.picture')"
            name="picture"
            v-model="form.picture"
            :error-messages="errorMessages('picture')"
          />
          <FormField
            :label="$t('form.comment')"
            name="comemnts"
            type="textarea"
            v-model="form.comments"
            :help="$t('form.comment_help')"
          />
          <h3>{{ $t('form.contact_info') }}</h3>
          <FormField
            :label="$t('form.email')"
            name="email"
            type="email"
            v-model="form.email"
            required
            :placeholder="$t('form.email_placeholder')"
            :help="$t('form.email_help')"
            :error-messages="errorMessages('email')"
          />
          <FormCheckbox
            value="true"
            v-model="form.consent"
            name="consent"
            required
          >
            {{ $t('form.privacy.p1') }}
            <a href="https://compromis.net/avis-legal" target="_blank">{{ $t('global.privacy_policy') }}</a>.
            {{ $t('form.privacy.p2') }}
            <strong>Compromís</strong>
            {{ $t('form.privacy.p3') }}
          </FormCheckbox>
          <FormButton type="submit">
            <IconsLoading v-if="submitting" />
            <Icon name="lucide:file-input" v-else />
            {{ submitting ? $t('form.submitting') : $t('form.submit') }}
          </FormButton>
        </div>
      </Transition>
    </form>
    <div v-else class="form-submitted">
      <Icon name="lucide:file-check" class="main-icon" />
      <h3 class="font-headline">{{ $t('form.submitted.header') }}</h3>
      <p>{{ $t('form.submitted.p1') }}</p>
      <p>{{ $t('form.submitted.p2') }}</p>
      <div class="form-submitted-buttons">
        <button class="button" @click="emit('close')">
          <Icon name="lucide:arrow-down-left" class="icon" />
          {{ $t('form.submitted.button_close') }}
        </button>
        <button class="button" @click="reset">
          <Icon name="lucide:file-plus-2" class="icon" />
          {{ $t('form.submitted.button_reset') }}
        </button>
      </div>
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

    &-buttons {
      display: flex;
      gap: var(--spacer-4);

      & > * {
        flex-grow: 1;
      }
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

  @include media('<md') {
    .form-divider {
      gap: var(--card-padding, var(--spacer-4));
    }
  }
</style>