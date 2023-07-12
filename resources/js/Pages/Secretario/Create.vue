<template>
    <Head title="Secretaria" />

    <AuthenticatedLayout>
        <template #header>
            Crear Secretaria
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-center">
                    <form @submit.prevent="submit">
                        <div class="grid w-80 grid-rows-4 gap-1">
                            <p class="font-semibold text-gray-700">Nombre De La Secretaria:</p>
                            <input type="text" class="h-10 w-full rounded border p-2 text-sm mb-2" v-model="form.secretaria"
                                placeholder="Nombre" />
                            <button type="submit"
                                class="border border-green-500 bg-green-500 text-white rounded-md py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">Registrar Secretaria</button>
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
    secretaria: null
})

function submit() {
    router.post('/secretario', form)
}

</script>
