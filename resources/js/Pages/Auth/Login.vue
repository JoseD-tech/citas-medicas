<template>
    <Head title="Log in" />

    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center"
            style="background-image: url('https://transparenciave.org/wp-content/uploads/2018/06/MBA.jpg');">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            <div class="w-full px-24 z-10">
                <h1 class="text-5xl font-bold text-left tracking-wide">Nunca sera mas facil</h1>
                <p class="text-3xl my-4">Sistema de registro de citas lo cual agiliza el trabajo manual.</p>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
            style="background-color: #161616;">
            <div class="w-full py-6 z-20">
                <h1 class="my-6">
                    <ApplicationLogo/>
                </h1>

                <p class="text-gray-100 text-xl">
                    Ingresa A Tu Cuenta
                </p>
                <form @submit.prevent="submit" class="mt-4 sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                    <div>
                        <TextInput id="email" type="email" class="mt-1 w-full block p-4 text-lg rounded-xl bg-black" v-model="form.email" required autofocus
                            autocomplete="username" placeholder="Correo Electronico" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-3">
                        <TextInput id="password" type="password" class="mt-1 w-full block p-4 text-lg rounded-xl bg-black" placeholder="Contraseña" v-model="form.password" required
                            autocomplete="current-password" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>



                    <div class="mt-6">
                        <PrimaryButton class="w-full py-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Iniciar
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
