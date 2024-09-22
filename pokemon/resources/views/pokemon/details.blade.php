<x-app-layout>
    <style>
        .icon{
            box-shadow: 0 0 20px black;
            border-radius: 100%;
            height: 80px;
            width: 80px;
            margin: auto;
            transition: 200ms all;
        }

        .icon img{
            height: 60%;
            width: 60%;
        }
    </style>
    <div id="main-content">
        <div class="flex justify-center items-center flex-col bg-green-100 w-full">
            <h1 style="font-size:2rem; font-family: 'Pokemon Solid', sans-serif;" class="text-black mb-4">#0{{$pokemon->id}} - {{$pokemon->nome}}</h1>
            <img style="height: 15rem; width: 15rem;" class="block fill-current mb-4" src="{{$pokemon->sprite}}" alt="">
            <div class="flex items-center justify-center mb-2">
                @php
                    $tipos = explode(',', $tipos_pokemon->tipos);
                @endphp
                @foreach($tipos as $tipo)
                    <span class="bg-gray-100 text-black-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full m-2 uppercase">{{$tipo}}</span>
                @endforeach
            </div>
        </div>
    </div>
    <div id="stats" class="shadow-2xl w-full pb-10">
        <h1 style="font-size:2rem; font-family: 'Pokemon Solid', sans-serif;" class="text-black ml-4 pt-4">Estatísticas</h1>
        <div id="list">
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">HP:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{$pokemon->hp}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->hp}} / 150) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">ATK:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{$pokemon->ataque}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->ataque}} / 150) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">DEF:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{$pokemon->defesa}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->defesa}} / 150) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">ATK Especial:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{$pokemon->ataque_especial}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->ataque_especial}} / 150) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">DEF Especial:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{$pokemon->defesa_especial}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->defesa_especial}} / 150) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Velocidade:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{$pokemon->velocidade}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->velocidade}} / 150) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Total:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">{{{$pokemon->total}}}</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc(({{$pokemon->total}} / 1000) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        {{-- <div>
            <div class="flex justify-center flex-col items-center">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl mb-2 mt-2">Fraco Contra</span>
                <div class="flex flex-row"> 
                    <div>
                        <img class="icon bg-[#92BC2C]" src="{{asset('/img/bug.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex justify-center flex-col items-center pb-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl mb-2 mt-2">Forte Contra</span>
                <div class="flex flex-row">
                    <div class="mx-1">
                        <img class="icon bg-gray-600" src="{{asset('/img/dark.svg')}}" alt="">
                    </div>
                    <div class="mx-1">
                        <img class="icon bg-blue-500" src="{{asset('/img/fairy.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</x-app-layout>