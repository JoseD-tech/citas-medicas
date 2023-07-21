<template>
    <Head title="Panel General" />

    <AuthenticatedLayout>
        <template #header>
            Panel General
        </template>

        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">{{ props.citas }} Citas</h2>
                    <p class="mt-2 text-sm text-gray-500">Citas Medicas Registradas</p>
                </div>
            </div>

            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">{{ props.pacientes }} Pacientes</h2>
                    <p class="mt-2 text-sm text-gray-500">Pacientes Registrados</p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">{{ props.doctores }} Doctores</h2>
                    <p class="mt-2 text-sm text-gray-500">Doctores Inscritos</p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">{{ props.secretario }} Secretarias</h2>
                    <p class="mt-2 text-sm text-gray-500">Secretarias Registradas</p>
                </div>
            </div>
        </div>

        <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div v-if="props.citas > 0" class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <h3 class="text-xl uppercase ml-4 py-4">Citas Atendidas</h3>
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nombre y Apellido
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Doctor
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Fecha de Atencion
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cita in props.historial" :key="cita.id">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ cita.historia_paciente.nombre }} {{ cita.historia_paciente.apellido }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ cita.doctor }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ Date(cita.fecha_cita) }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm space-x-2">
                                    <button @click="mostrarReporte(cita.id)"
                                        class="bg-red-600 px-2 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">Reporte</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <p v-else>No Hay Citas Registradas</p>
        </div>


        <Modal :show="verReporte">
            <div role="alert">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-2xl">
                        Atencion De Cita
                    </h1>
                    <div>
                        <h3 class="text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Estado</h3>
                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Atentedido</span>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-gray-800 font-bold leading-tight tracking-normal text-xl mt-4">
                            Paciente</h3>
                        <p>Nombre y Apellido: {{ citaReporte.historia_paciente.nombre }} {{ citaReporte.historia_paciente.nombre }}</p>
                        <p>Cedula: {{ citaReporte.historia_paciente.cedula }}</p>
                        <p>Telefono: {{ citaReporte.historia_paciente.telefono }}</p>
                        <p>Sintomas: {{ citaReporte.descripcion }}</p>
                    </div>
                    <div>
                        <h3 class="mt-4 text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Doctor</h3>
                        <p>Nombre Del Doctor: {{ citaReporte.doctor }}</p>
                    </div>
                    <div>
                        <h3 class="mt-4 text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Fecha De Atencion</h3>
                        <p>Fecha de atencion: {{ Date(citaReporte.created_at) }}</p>
                    </div>

                    <div>
                        <h3 class="mt-4 text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Resultado De La Cita</h3>
                        <p>Resultado: {{ citaReporte.resultado }}</p>
                    </div>

                    <div class="mt-6 flex items-center justify-start w-full">

                        <button
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm w-full"
                            @click="mostrarReporte">Cancel</button>
                    </div>
                    <button
                        class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                        @click="mostrarReporte" aria-label="close modal" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>

                </div>
            </div>

        </Modal>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import Modal from '@/Components/Modal.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    citas: Number,
    pacientes: Number,
    doctores: Number,
    secretario: Number,
    historial: Object
})

let verReporte = ref(false)
let citaReporte = ref(null)

const mostrarReporte = (id) => {
    citaReporte.value = props.historial.find((historial) => historial.id === id);
    console.log(citaReporte.value);
    verReporte.value = !verReporte.value
}

</script>
