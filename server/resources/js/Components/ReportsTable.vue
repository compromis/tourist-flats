<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({ reports: Array })

function updateState(id, event) {
  const form = useForm({
    confirmed: event.target.value == '1' ? 'public' : 'hidden'
  })
  form.post(`/admin/reports/${id}/update`, {
    preserveScroll: true
  })
}

function updateObservations(id, event) {
  const form = useForm({
    observations: event.target.value
  })
  form.post(`/admin/reports/${id}/update`, {
    preserveScroll: true
  })
}

function updateComments(id, event) {
  const form = useForm({
    comments: event.target.value
  })
  form.post(`/admin/reports/${id}/update`, {
    preserveScroll: true
  })
}

function formatDate(date) {
  return new Date(date).toLocaleDateString('es-ES')
}

function coords(coordinates) {
  const coords = coordinates.split(',')
  return coords.reverse().join(',')
}
</script>

<template>
  <table class="w-full">
    <thead>
      <tr class="[&>th]:p-3 [&>th]:text-left [&>th]:bg-slate-200">
        <th width="50">ID</th>
        <th width="100">Data</th>
        <th width="100">Estat</th>
        <th width="30%">Observacions</th>
        <th width="200">E-mail</th>
        <th width="30%">Adreça</th>
        <th width="50">Foto</th>
        <th width="50%">Comentari</th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="report in reports"
        class="[&>td]:border-b [&>td]:p-3 dark:[&>td]:border-gray-800"
      >
        <td>{{ report.id }}</td>
        <td>{{ formatDate(report.created_at) }}</td>
        <td>
          <select
            @change="updateState(report.id, $event)"
            :class="[
              {
                'bg-green-200' : report.confirmed, 
                'bg-red-200': !report.confirmed
              }
            ]"
          >
            <option value="0" :selected="!report.confirmed">No públic</option>
            <option value="1" :selected="report.confirmed">Públic</option>
          </select>
        </td>
        <td>
          <textarea
              class="observation-textarea bg-transparent border w-full h-[7rem] p-1"
              @blur="updateObservations(report.id, $event)"
              :value="report.observations"
          ></textarea>
        </td>
        <td>
            <div class="w-[14rem] break-all">{{report.email}}</div>
        </td>
        <td>
            <a
                class="text-orange-500 underline"
                target="_blank"
                :href="`https://www.google.com/maps/@${coords(report.coordinates)},19z`"
            >
              {{report.address_street}}, {{report.address_number}} - {{report.address_box}}
            </a>
        </td>
        <td>
            <a
                class="text-orange-500 underline"
                target="_blank"
                :href="`https://housing-reports.s3.eu-west-3.amazonaws.com/pictures/${report.picture}`">
                Foto
            </a>
        </td>
        <td>
          <textarea
              class="observation-textarea bg-transparent border w-full p-1 h-[7rem]"
              @blur="updateComments(report.id, $event)"
              :value="report.comments"
          />
        </td>
      </tr>
    </tbody>
  </table>
</template>