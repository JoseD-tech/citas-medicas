<template>
    <Head title="Editar" />

    <AuthenticatedLayout>
        <template #header>
            Editar Doctor
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-center">
                    <form @submit.prevent="update(props.doctor.id)">
                        <div class="grid w-80 grid-rows-4 gap-1">
                            <p class="font-semibold text-gray-700">Nombre Del Doctor:</p>
                            <input type="text" class="h-10 w-full rounded border p-2 text-sm mb-2" v-model="form.doctor"
                                placeholder="Nombre" />
                            <button type="submit"
                                class="border border-green-500 bg-green-500 text-white rounded-md py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">Registrar
                                Doctor</button>
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
    doctor: Object
})

const form = reactive({
    doctor: props.doctor.doctor
})

function update(id) {
    router.put(`/doctor/${id}`, form)
}

</script>
