<template>
    <Head title="Pacientes" />

    <AuthenticatedLayout>
        <template #header>
            Gestion de Pacientes
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div  class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <div class="flex justify-end item-center py-2">
                    <Link :href="route('paciente.create')"
                        class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                        Crear Paciente
                    </Link>
                </div>

                <table v-if="props.pacientes.length > 0" class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            <th
                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                ID
                            </th>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Nombre y Apellido
                            </th>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Cedula
                            </th>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Telefono
                            </th>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="paciente in pacientes" :key="paciente.id" class="text-gray-700">
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ paciente.id }}</p>
                            </td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ paciente.nombre }}  {{ paciente.apellido }}</p>
                            </td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ paciente.cedula }}</p>
                            </td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ paciente.telefono }}</p>
                            </td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <Link :href="route('paciente.edit', paciente.id)" class="p-1 border border-blue-500 text-blue-500 uppercase rounded-lg outline-none shadow-lg mr-2">Editar</Link>
                                <button @click="eliminarDoctor(paciente.id)" class="p-1 border border-red-500 text-red-500 uppercase rounded-lg outline-none shadow-lg">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p v-else class="text-xl ml-4">No Hay Pacientes Registrados</p>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3'
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'



const props = defineProps({
    pacientes: Object
})

const eliminarDoctor = (id) =>  {
    router.delete(`/paciente/${id}`)
}

</script>
