<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações de Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Atualize suas informações de perfil") }}
        </p>
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    {{-- {{$it->before_photo ? asset('storage/before/' . $it->before_photo) : asset('img/standard_image.jpg') }} --}}

    
    <img class="mt-3 rounded-full w-96 h-96" src="{{ $treinador->foto ? asset('storage/treinador/' . $treinador->foto) : asset('img/standard_image.jpg') }}" alt="image description">



    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $treinador->nome)" required autofocus autocomplete="nome" />
            {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="data_nascimento" name="data_nascimento" type="date" class="mt-1 block w-full" :value="old('data_nascimento', $player->data_nascimento)" required autofocus autocomplete="data_nascimento" />
            {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <x-input-label for="frase_especial" :value="__('Frase Especial')" />
            <x-text-input id="frase_especial" name="frase_especial" type="text" class="mt-1 block w-full" :value="old('frase_especial', $treinador->frase_especial)" required autofocus autocomplete="nome" />
            {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <x-input-label for="foto" :value="__('Imagem de Perfil')" />
            <x-text-input id="foto" name="foto" type="file" class="mt-1 block w-full" :value="old('foto', $treinador->foto)" required autofocus autocomplete="nome" />
            {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
