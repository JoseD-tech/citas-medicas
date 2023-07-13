<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            Panel General
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                Bienvenido al Sistema de Citas
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
</script>
