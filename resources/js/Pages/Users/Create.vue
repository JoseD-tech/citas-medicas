<template>
    <Head title="Usuarios" />

    <AuthenticatedLayout>
        <template #header>
            Crear Usuarios
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div>
                    <form @submit.prevent="submit">
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-black">Nombre y
                                    Apellido</label>
                                <input type="text" v-model="form.nombre"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="John Perez" required>
                            </div>
                            <div>
                                <label for="apellido" class="block mb-2 text-sm font-medium text-black">Correo</label>
                                <input type="text" v-model="form.correo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="correo@gmail.com" required>
                            </div>
                            <div>
                                <label for="cedula" class="block mb-2 text-sm font-medium text-black">Clave</label>
                                <input type="password" v-model="form.clave"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="***********" required maxlength="8">
                            </div>
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-black">Rol</label>
                                <select v-model="form.rol"
                                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                                    <option :value="rol.id" v-for="rol in props.roles" :key="rol.id">
                                        {{ rol.name }}</option>
                                </select>
                            </div>

                        </div>
                        <div class="w-100">
                            <button type="submit"
                                class="block m-0 m-auto w-full  border border-green-500 bg-green-500 text-white rounded-md py-2 px-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">Registrar
                                Cuenta</button>
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

const props = defineProps({
    roles: Object
})

console.log(props.roles);

const form = reactive({
    nombre: '',
    correo: '',
    clave: '',
    rol: ''
})

function submit() {
    router.post('/users', form)
}

</script>
