<x-app-layout>
    <div id="main-content">
        <div id="cards" class="mt-4 mb-4 ml-24 mr-24 grid grid-cols-3">
            @foreach($pokemons as $pokemon)
                <x-card :pokemon="$pokemon" :tipos="$pokemons_e_tipos[$pokemon->id - 1]->tipos">
                </x-card>
            @endforeach
        </div>
    </div>
    
</x-app-layout>