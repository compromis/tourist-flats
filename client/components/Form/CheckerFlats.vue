<script setup>
const { $api } = useNuxtApp()
const { pending, data: flats } = await useLazyAsyncData('legal-flats', () => $api.legalFlats())
const streetFilter = ref('')
const filteredFlats = computed(() => {
  if (!streetFilter.value) return flats.value
  const normalizedInput = streetFilter.value.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase()

  return flats.value.filter(flat => {
    const normalizedStreet = flat.address.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase()
    return normalizedStreet.includes(normalizedInput)
  })
})
</script>

<template>
  <div class="checker-flats">
    <p>{{ $t('form.checker.instructions') }}</p>
    <FormField
      v-model="streetFilter"
      :label="$t('form.checker.input_label')"
      name="filter"
      :placeholder="$t('form.checker.input_placeholder')"
      no-optional-text
      label-visually-hidden
      class="checker-flats-input"
    />
    <div v-if="pending" class="checker-flats-list loading">
      <IconsLoading class="icon" />
      {{ $t('global.loading') }}
    </div>
    <div v-else class="checker-flats-list">
      <table>
        <thead class="visually-hidden">
          <tr>
            <th width="100">ID</th>
            <th>{{ $t('form.checker.address') }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="flat in filteredFlats" :key="flat.signature"> 
            <td width="100">{{ flat.signature }}</td>
            <td>{{ flat.address }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.checker-flats {
  &-input {
    :deep(input) {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
  }

  &-list {
    border: 2px var(--pine) solid;
    border-radius: 0 0 .5rem .5rem;
    border-top: 0;
    height: 220px;
    overflow: auto;

    table {
      width: 100%;
      border-spacing: 0;
    }

    td, th {
      border-bottom: 1px var(--transpine) solid;
      text-align: left;
      padding: var(--spacer-2);
    }

    th {
      border-width: 2px;
    }

    tr:hover td {
      background: var(--transpine);
    }
  }
}

.loading {
  padding: var(--site-padding);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--spacer-4);
  font-size: var(--text-md);

  .icon {
    height: 1.5em;
    width: 1.5em;
  }
}
</style>