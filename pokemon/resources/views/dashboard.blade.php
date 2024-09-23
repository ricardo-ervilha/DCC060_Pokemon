<x-app-layout>
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 {{$hidden ? 'hidden' : ''}}"></div>

    <div id="dialogue-container" class="{{$hidden ? 'hidden' : ''}}">
        <img src="{{asset('/img/stroele_realista.jpeg')}}" alt="Imagem Centralizada" style="width: 35rem; border-top-left-radius: 3rem; border-top-right-radius: 3rem; box-shadow: 3px 3px 10px black;">
        <div id="dialogue-box" onclick="showNextDialogue()">
            <div id="character-name">Prof. Victorvalho</div>
            <p id="dialogue-text"></p>
            <img id="next-arrow" src="{{ asset('/img/down_arrow.png') }}" alt="Próximo Diálogo">
        </div>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!--Formulário Secreto-->
    <form id="pokemon-selection-form" action="{{ route('pokemon.initial_pokemons') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="selected_pokemons" id="selected-pokemons-input">
    </form>

    <script>
        const pokemonsSelvagens = @json($pokemons->pluck('nome'));
        const pokemonOptions = pokemonsSelvagens;

        let dialogues = [
            "Bem-vindo ao mundo de PokeDB! Sua jornada começa agora.",
            "Este mundo está repleto de aventuras e desafios.",
            "Você está preparado para explorar e conquistar?",
            "Para iniciar essa aventura é necessário escolher os seus primeiros pokémons.",
            "Selecione a seguir os seus primeiros 5 parceiros..."
        ];
        let dialogueIndex = 0;
        let selectedPokemons = [];
        let typingComplete = false;


        document.addEventListener("DOMContentLoaded", function() {
            typeText(dialogues[dialogueIndex]);
        });

        function typeText(text) {
            const dialogueText = document.getElementById("dialogue-text");
            const nextArrow = document.getElementById("next-arrow");
            let index = 0;
            dialogueText.innerHTML = "";
            nextArrow.style.visibility = 'hidden';

            function type() {
                if (index < text.length) {
                    dialogueText.innerHTML += text.charAt(index);
                    index++;
                    setTimeout(type, 50);
                    typingComplete = false;
                } else {
                    nextArrow.style.visibility = 'visible';
                    nextArrow.classList.add("arrow-bounce");
                    typingComplete = true;
                    document.getElementById("dialogue-box").style.cursor = 'pointer';
                }
            }

            type();
        }

        function showNextDialogue() {
            if (!typingComplete) return;

            dialogueIndex++;
            if (dialogueIndex < dialogues.length) {
                typeText(dialogues[dialogueIndex]);
            } else {
                showPokemonSelection();
            }
        }

        function showPokemonSelection() {
            const dialogueBox = document.getElementById("dialogue-box");
            dialogueBox.innerHTML = `<div id="character-name">Prof. Victorvalho</div>
                                    <div id="pokemon-list"></div>`;
            renderPokemonList();
        }

        function renderPokemonList() {
            const pokemonList = document.getElementById("pokemon-list");
            pokemonList.innerHTML = ""; // Limpa a lista antes de renderizar

            pokemonOptions.forEach(pokemon => {
                const pokemonItem = document.createElement("div");
                pokemonItem.textContent = pokemon;
                pokemonItem.className = "pokemon-item";
                pokemonItem.style.color = selectedPokemons.includes(pokemon) ? 'gray' : 'black'; // Altera a cor se selecionado
                pokemonItem.onclick = () => togglePokemonSelection(pokemonItem, pokemon);
                pokemonList.appendChild(pokemonItem);
            });
        }

        function togglePokemonSelection(item, pokemon) {
            const isSelected = selectedPokemons.includes(pokemon);

            // Atualiza a lista de Pokémon selecionados
            if (isSelected) {
                selectedPokemons.splice(selectedPokemons.indexOf(pokemon), 1);
            } else {
                selectedPokemons.push(pokemon);
            }

            // Re-renderiza a lista de Pokémon
            renderPokemonList();

            // Verifica se 5 pokémons foram selecionados
            if (selectedPokemons.length >= 5) {
                // Esconde o diálogo de seleção
                document.getElementById("dialogue-container").style.display = 'none';

                // Preenche o input escondido com os valores de selectedPokemons
                document.getElementById('selected-pokemons-input').value = JSON.stringify(selectedPokemons);

                // Submete o formulário
                document.getElementById('pokemon-selection-form').submit();
            }
        }
    </script>
</x-app-layout>
