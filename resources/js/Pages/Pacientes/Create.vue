<template>
    <Head title="Paciente" />

    <AuthenticatedLayout>
        <template #header>
            Crear Paciente
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div>
                    <form @submit.prevent="submit">
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-black">Nombres:</label>
                                <input type="text" v-model="form.nombre"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="John" required>
                            </div>
                            <div>
                                <label for="apellido" class="block mb-2 text-sm font-medium text-black">Apellido</label>
                                <input type="text" v-model="form.apellido"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Perez" required>
                            </div>
                            <div>
                                <label for="cedula" class="block mb-2 text-sm font-medium text-black">Cedula</label>
                                <input type="text" v-model="form.cedula"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="29125521" required maxlength="8">
                            </div>
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-black">Telefono</label>
                                <input type="text" v-model="form.telefono"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="04145024456" required maxlength="11">
                            </div>

                        </div>
                        <div class="w-100">
                            <button type="submit"
                                class="block m-0 m-auto w-full  border border-green-500 bg-green-500 text-white rounded-md py-2 px-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">Registrar
                                Paciente</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    nombre: '',
    apellido: '',
    cedula: '',
    telenofo: ''
})

function submit() {
    router.post('/paciente', form)
}

</script>
