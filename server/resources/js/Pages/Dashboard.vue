<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ReportsTable from '../Components/ReportsTable.vue';

defineProps({ reports: Array });
</script>

<template>
    <Head title="Administrador" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Denúncies</h2>
                <a href="/admin/reports/export" download class="underline text-orange-500">CSV</a>
            </div>
        </template>

        <div class="p-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ReportsTable :reports="reports" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
