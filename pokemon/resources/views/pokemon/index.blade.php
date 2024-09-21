<x-app-layout>
    <div class="flex justify-center mt-2">
        <img class="block h-40 w-auto fill-current" src="{{asset('/img/pokedex.png')}}" alt="">
    </div>
    <div id="main-content">
        <div id="cards" class="mt-4 mb-4 ml-24 mr-24 grid grid-cols-3">
            @foreach([1,2,3,4,5] as $item)
                <x-card>
                </x-card>
            @endforeach
        </div>
    </div>
    
</x-app-layout>