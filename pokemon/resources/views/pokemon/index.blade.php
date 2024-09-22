<x-app-layout>
    <div class="flex justify-center mt-2">
        <img class="block h-40 w-auto fill-current" src="{{asset('/img/pokedex.png')}}" alt="">
    </div>
    <div>
        <form method="GET" action="{{route('pokemon.search')}}" class="max-w-md mx-auto">   
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="pokemon_name" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar pokémon pelo nome..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Buscar</button>
            </div>
        </form>
    </div>
    <div id="main-content">
        <div id="cards" class="mt-4 mb-4 ml-24 mr-24 grid grid-cols-3">
            @foreach($pokemons as $index => $pokemon)
                <x-card :pokemon="$pokemon" :tipos="$pokemons_e_tipos[$pokemon->id - 1]->tipos">
                </x-card>
            @endforeach
        </div>
    </div>
    
</x-app-layout>