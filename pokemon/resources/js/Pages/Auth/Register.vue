<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    nome: '',
    username: '',
    data_nascimento: '',
    senha: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        // onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="nome" value="Nome" />

                <TextInput
                    id="nome"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    v-model="form.nome"
                />

                <!-- <InputError class="mt-2" :message="form.errors.nome" /> -->
            </div>

            <div class="mt-4">
                <InputLabel for="username" value="Username" />

                <TextInput
                    id="username"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    v-model="form.username"
                />

                <!-- <InputError class="mt-2" :message="form.errors.username" /> -->
            </div>

            <div class="mt-4">
                <InputLabel for="data_nascimento" value="Data de Nascimento" />

                <TextInput
                    id="data_nascimento"
                    type="date"
                    class="mt-1 block w-full"
                    required
                    v-model="form.data_nascimento"
                />

                <!-- <InputError class="mt-2" :message="form.errors.date" /> -->
            </div>

            <div class="mt-4">
                <InputLabel for="senha" value="Senha" />

                <TextInput
                    id="senha"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    v-model="form.senha"
                />

                <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Já registrado?
                </Link>

                <PrimaryButton class="ml-4 bg-[#c32a08] hover:bg-[#e93a13] focus:bg-[#e93a13] active:bg-[#c32a08]" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrar-se
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
