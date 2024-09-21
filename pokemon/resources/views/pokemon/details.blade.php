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
            <h1 style="font-size:2rem; font-family: 'Pokemon Solid', sans-serif;" class="text-black">#001 - Bulbasaur</h1>
            <img style="height: 15rem; width: 15rem;" class="block fill-current" src="{{asset('/img/bulbassaur.png')}}" alt="">
            <div class="flex items-center justify-center mb-2">
                <span class="bg-green-300 text-green-800 text-xl font-medium me-2 px-2.5 py-0.5 rounded-full">Grama</span>
                <span class="bg-red-100 text-red-800 text-xl font-medium me-2 px-2.5 py-0.5 rounded-full">Fogo</span>
            </div>
        </div>
    </div>
    <div id="stats" class="rounded-lg shadow-lg w-full ">
        <h1 style="font-size:2rem; font-family: 'Pokemon Solid', sans-serif;" class="text-black ml-4">Estatísticas</h1>
        <div id="list">
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Health Points:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">45</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc((45 / 200) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Attack:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">45</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc((45 / 200) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Defense:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">45</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc((45 / 200) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Speed:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">45</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc((45 / 200) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="flex justify-between m-6">
                <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">Total:</span>
                <div class="flex flex-row items-center gap-4">
                    <span style="font-family: 'Poppins', sans-serif;  font-weight: 500;" class="text-xl">45</span>
                    <div style="width: 80rem;" class="bg-gray-300 mr-8 rounded-full h-4">
                        <div
                          class="bg-red-500 h-4 w-full rounded-full"
                          style="width: calc((45 / 200) * 100%)">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div>
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
            <div class="flex justify-center flex-col items-center mb-4">
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
        </div>
    </div>
</x-app-layout>