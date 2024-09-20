<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;
const treinador = usePage().props.treinador;
const form = useForm({
    nome: treinador.nome,
    data_nascimento: user.data_nascimento,
    frase_especial: treinador.frase_especial,
    foto: '',
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Informações de Perfil</h2>

            <p class="mt-1 text-sm text-gray-600">
                Atualize suas informações de perfil.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6" enctype="multipart/form-data">
            <div>
                <InputLabel for="nome" value="Nome" />

                <TextInput
                    id="nome"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nome"
                 
                    autofocus
                />

                <!-- <InputError class="mt-2" :message="form.errors.nome" /> -->
            </div>

            <div>
                <InputLabel for="data_nascimento" value="Data de Nascimento" />

                <TextInput
                    id="data_nascimento"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.data_nascimento"
                    
                />

                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>

            <div>
                <InputLabel for="frase_especial" value="Frase Especial" />

                <TextInput
                    id="frase_especial"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.frase_especial"
                  
                />

                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>

            <div>
                <InputLabel for="foto" value="Foto" />

                <TextInput
                    id="foto"
                    type="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    v-model="form.foto"
                    
                />

                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton class="bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300" :disabled="form.processing">Atualizar</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
