<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Press+Start+2P&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #f8f8f8;
        }

        #dialogue-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 600px;
            z-index: 100;
            text-align: center;
        }

        #dialogue-container img {
            max-width: 100%;
            height: auto;
            margin-bottom: 12px;
        }

        #dialogue-box {
            font-family: "VT323", monospace;
            padding: 20px;
            width: 100%;
            height: 200px;
            background-color: #fff;
            border: 4px solid #fff;
            border-radius: 10px;
            box-shadow: 
                0px 0px 0px 4px #000,
                0px 0px 0px 8px #fff,
                0px 0px 0px 12px #000;
            font-size: 25px;
            line-height: 1.6;
            letter-spacing: 1px;
            overflow: hidden;
            position: relative;
            cursor: default;
        }

        #dialogue-text {
            margin: 0;
            margin-top: 20px;
        }

        #character-name {
            position: absolute;
            top: -5px;
            left: 20px;
            font-family: "VT323", monospace;
            font-size: 25px;
            color: #000;
            background-color: #fff;
            padding: 2px 8px;
            border-radius: 5px;
        }

        #next-arrow {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 24px;
            height: 24px;
            visibility: hidden;
        }

        .arrow-bounce {
            animation: bounce 0.5s infinite alternate;
        }

        @keyframes bounce {
            0% { transform: translateY(0); }
            100% { transform: translateY(-5px); }
        }

        #pokemon-list {
            display: flex; /* Usa flexbox para layout lado a lado */
            flex-wrap: wrap; /* Permite quebra de linha se necessário */
            margin-top: 20px;
            justify-content: center; /* Centraliza os itens */
        }

        .pokemon-item {
            color: black; /* Cor padrão */
            cursor: pointer;
            font-size: 20px;
            margin: 5px 15px; 
            padding: 5px;
            border: 1px solid transparent;
        }

        .pokemon-item:hover {
            border: 1px solid #f00; /* Destaca o item ao passar o mouse */
        }

        .pokemon-item:hover {
            border: 1px solid #000; /* Destaca o item ao passar o mouse */
        }
    </style>
</head>
<body class="font-sans antialiased relative">
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50"></div>

    <div id="dialogue-container">
        <img src="{{asset('/img/stroele_realista.jpeg')}}" alt="Imagem Centralizada">
        <div id="dialogue-box" onclick="showNextDialogue()">
            <div id="character-name">Prof. Victor Valho</div>
            <p id="dialogue-text"></p>
            <img id="next-arrow" src="{{ asset('/img/down_arrow.png') }}" alt="Próximo Diálogo">
        </div>
    </div>

    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
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

        const pokemonOptions = [
            "Pikachu",
            "Charmander",
            "Bulbasaur",
            "Squirtle",
            "Jigglypuff",
            "Meowth",
            "Psyduck",
            "Eevee",
            "Mewtwo",
            "Snorlax"
        ];

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
            dialogueBox.innerHTML = `<div id="character-name">Prof. Victor Valho</div>
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
                pokemonItem.style.color = selectedPokemons.includes(pokemon) ? 'red' : 'black'; // Altera a cor se selecionado
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

            // Verifica se 5 Pokémon foram selecionados
            if (selectedPokemons.length >= 5) {
                document.getElementById("dialogue-container").style.display = 'none';
                alert("Pokémons selecionados: " + selectedPokemons.join(", "));
            }
        }
    </script>
</body>
</html>
