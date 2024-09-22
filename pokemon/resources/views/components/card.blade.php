<div class="max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow transform transition-transform duration-300 hover:scale-105 hover:shadow-lg m-4 {{$pokemon->data ? 'crosshatch' : ''}}">
    <div class="w-full flex justify-between">
        <a href="{{route("pokemon.show", $pokemon->id)}}">
            <h2 style="font-size:2rem; font-family: 'Pokemon Solid', sans-serif;" class="text-black">{{$pokemon->nome}}</h2>
        </a>
        <h3 class="text-gray-400 text-xl font-medium">#{{$pokemon->id}}</h3>
    </div>
    <div class="flex flex-row justify-between">
        <div class="flex flex-col items-center justify-center">
            @php
                $tipos = explode(',', $tipos);
            @endphp
            @foreach($tipos as $tipo)
                <span class="bg-gray-100 text-black-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full m-2 uppercase">{{$tipo}}</span>
            @endforeach
            
        </div>
        <div class="relative w-60 h-60">
            <img class="absolute inset-0 h-full w-full" src="{{asset('/img/pokeball_fg.png')}}" alt="">
            <img class="absolute inset-0 h-40 w-40 m-auto" src="{{$pokemon->sprite}}" alt="">
        </div>
    </div>
</div>
