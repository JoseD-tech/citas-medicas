<template>
    <Head title="Citas" />

    <AuthenticatedLayout>
        <template #header>
            Gestion de citas
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="bg-white rounded-md w-full">
                    <div class=" flex items-center justify-between pb-6">

                        <div class="flex bg-gray-50 items-center p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id=""
                                placeholder="search...">
                        </div>
                        <div class="lg:ml-40 ml-10 space-x-4">
                            <button @click="mostrarModal"
                                class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Nueva
                                Cita</button>


                        </div>

                    </div>
                    <div>
                        <div v-if="props.citas.length > 0" class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
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
                                                Fecha de Cita
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="cita in props.citas" :key="cita.id">
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ cita.paciente_cita.nombre }} {{ cita.paciente_cita.apellido }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{ cita.doctor }}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ cita.fecha_cita }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <template v-if="cita.estado_id == 1">
                                                    <span
                                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                        <span aria-hidden
                                                            class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                        <span class="relative">En Espera</span>
                                                    </span>
                                                </template>
                                                <template v-if="cita.estado_id == 2">
                                                    <span
                                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                        <span aria-hidden
                                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                        <span class="relative">Atentedido</span>
                                                    </span>
                                                </template>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm space-x-2">
                                                <button @click="mostrarCita(cita.id)"
                                                    class="bg-yellow-600 px-2 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">Ver
                                                    Cita</button>

                                                <button v-if="cita.estado_id === 2" @click="mostrarReporte(cita.id)"
                                                    class="bg-red-600 px-2 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">Reporte</button>
                                            </td>



                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p v-else>No Hay Citas Registradas</p>
                    </div>
                </div>
            </div>
        </div>

        <Modal :show="modalCreate">
            <div role="alert">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-2xl">Registrar Cita
                    </h1>
                    <div>
                        <label class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Paciente</label>
                        <select v-model="form.paciente"
                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            <option :value="paciente.id" v-for="paciente in props.pacientes" :key="paciente.id">
                                {{ paciente.nombre }} {{ paciente.apellido }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Doctor</label>
                        <select v-model="form.doctor"
                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">

                            <option :value="doctor.name" v-for="doctor in props.doctores" :key="doctor.id">{{
                                doctor.name }}
                            </option>

                        </select>
                    </div>
                    <div>
                        <label for="descripcion"
                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Descripcion</label>
                        <textarea v-model="form.descripcion" required
                            class="mt-2 h-24 w-full border rounded-xl overflow-hidden resize-none focus:border-blue-500 ring-1 ring-transparent focus:ring-blue-500 focus:outline-none text-black p-2 transition ease-in-out duration-300"
                            placeholder="Ingresa una descripcion tal como sintomas o motivo de la visita"></textarea>
                    </div>
                    <div>
                        <label for="fecha" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Fecha De
                            Cita</label>
                        <div class="relative mb-5 mt-2">
                            <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                    <line x1="16" y1="3" x2="16" y2="7" />
                                    <line x1="8" y1="3" x2="8" y2="7" />
                                    <line x1="4" y1="11" x2="20" y2="11" />
                                    <rect x="8" y="15" width="2" height="2" />
                                </svg>
                            </div>
                            <input id="fecha" v-model="form.fecha" type="datetime-local"
                                class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                placeholder="MM/YY" required />
                        </div>
                    </div>

                    <div class="flex items-center justify-start w-full">
                        <button @click="guardarCita"
                            class="focus:outline-none focus:ring-2 focus:ring-green-2 focus:ring-green-700 transition duration-150 ease-in-out hover:bg-green-600 bg-green-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                        <button
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                            @click="mostrarModal">Cancel</button>
                    </div>
                    <button
                        class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                        @click="mostrarModal" aria-label="close modal" role="button">
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

        <Modal :show="verCita">
            <div role="alert">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-2xl">
                        Registro De Cita
                    </h1>
                    <div>
                        <h3 class="text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Estado</h3>
                        <template v-if="citaSeleccionada.estado_id === 1">
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative">En Espera</span>
                            </span>
                        </template>
                        <template v-else>
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Atentedido</span>
                            </span>
                        </template>
                    </div>
                    <div>
                        <h3 class="text-gray-800 font-bold leading-tight tracking-normal text-xl mt-4">
                            Paciente</h3>
                        <p>Nombre y Apellido: {{ citaSeleccionada.paciente_cita.nombre }} {{
                            citaSeleccionada.paciente_cita.apellido }}</p>
                        <p>Cedula: {{ citaSeleccionada.paciente_cita.cedula }}</p>
                        <p>Telefono: {{ citaSeleccionada.paciente_cita.telefono }}</p>
                        <p>Sintomas: {{ citaSeleccionada.decripcion }}</p>
                    </div>
                    <div>
                        <h3 class="mt-4 text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Doctor</h3>
                        <p>Nombre Del Doctor: {{ citaSeleccionada.doctor }}</p>
                    </div>
                    <div>
                        <h3 class="mt-4 text-gray-800 font-bold leading-tight tracking-normal text-xl">
                            Fecha De La Cita</h3>
                        <p>Fecha de la Cita: {{ citaSeleccionada.fecha_cita }}</p>
                    </div>


                    <div class="mt-6 flex items-center justify-start w-full">

                        <button
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm w-full"
                            @click="mostrarCita">Cancel</button>
                    </div>
                    <button
                        class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                        @click="mostrarCita" aria-label="close modal" role="button">
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

        <Modal :show="verReporte">
            <div role="alert">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-2xl">
                        Reporte De Cita
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
                        <p>Nombre y Apellido: {{ citaReporte.historia_paciente.nombre }} {{
                            citaReporte.historia_paciente.apellido }}</p>
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
                            Fecha De La Cita</h3>
                        <p>Fecha de la Cita: {{ Date(citaReporte.historia_paciente.created_at) }}</p>
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
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
import { reactive, ref } from 'vue';

const props = defineProps({
    doctores: Object,
    pacientes: Object,
    citas: Object,
    historial: Object
})

let modalCreate = ref(false)
let verCita = ref(false)
let verReporte = ref(false)
let citaReporte = ref(null)
let citaSeleccionada = ref(null)


const form = reactive({
    paciente: null,
    doctor: null,
    descripcion: null,
    fecha: null
})

const mostrarReporte = (id) => {
    citaReporte.value = props.historial.find((historial) => historial.id === id);
    verReporte.value = !verReporte.value
}

const mostrarCita = (id) => {
    citaSeleccionada.value = props.citas.find((cita) => cita.id === id);
    verCita.value = !verCita.value
}

const mostrarModal = () => {
    modalCreate.value = !modalCreate.value
}

const guardarCita = () => {
    router.post(`/citas`, form)
    mostrarModal()
}

const exportData = () => {
    window.open('/citas/export', '_blank')
}


</script>
