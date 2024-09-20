<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nome" :value="__('Nome Completo')" />
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Nome de Usuário')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <div class="mt-4">
            <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')" required autocomplete="data_nascimento" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="senha" :value="__('Senha')" />

            <x-text-input id="senha" class="block mt-1 w-full"
                            type="password"
                            name="senha"
                            required autocomplete="new-password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        {{-- <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já cadastrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
