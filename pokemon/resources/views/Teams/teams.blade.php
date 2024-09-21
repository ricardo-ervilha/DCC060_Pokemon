<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD de Times Pokémon</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #f8f8f8;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #000;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        #container {
            border: 2px solid #000;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            width: 400px; /* Tamanho fixo do container */
            max-height: 600px; /* Aumentando a altura máxima */
            overflow-y: auto; /* Rolagem se necessário */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Para separar a lista do botão */
        }

        .pokemon-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 colunas */
            gap: 10px; /* Espaço entre os itens */
            margin-bottom: 20px; /* Espaço entre a lista e o botão */
        }

        .pokemon-item {
            cursor: pointer;
            font-size: 20px;
            padding: 5px 10px; /* Diminuindo a largura do padding */
            border: 2px solid #000;
            background-color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pokemon-item:hover {
            background-color: #ffe600;
            border: 2px solid #ffa500;
        }

        #team-list {
            margin-top: 20px;
            font-size: 18px;
            width: 100%;
        }

        #create-team {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #create-team:hover {
            background-color: #45a049;
        }

        .team {
            margin: 10px 0;
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        .delete-team {
            color: red;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>CRUD de Times Pokémon</h1>
    <div id="container">
        <div id="pokemon-list" class="pokemon-list"></div>
        <h2>Times Criados</h2>
        <div id="team-list"></div>
        <button id="create-team" onclick="createTeam()">Criar Time</button>
    </div>

    <script>
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

        let selectedPokemons = [];
        let teams = [];

        document.addEventListener("DOMContentLoaded", function() {
            renderPokemonList();
            renderTeamList();
        });

        function renderPokemonList() {
            const pokemonList = document.getElementById("pokemon-list");
            pokemonList.innerHTML = ""; // Limpa a lista

            pokemonOptions.forEach(pokemon => {
                const pokemonItem = document.createElement("div");
                pokemonItem.textContent = pokemon;
                pokemonItem.className = "pokemon-item";
                pokemonItem.onclick = () => togglePokemonSelection(pokemonItem, pokemon);
                pokemonList.appendChild(pokemonItem);
            });
        }

        function togglePokemonSelection(item, pokemon) {
            const isSelected = selectedPokemons.includes(pokemon);

            // Atualiza a lista de Pokémon selecionados
            if (isSelected) {
                selectedPokemons.splice(selectedPokemons.indexOf(pokemon), 1);
                item.style.color = 'black'; // Reseta a cor
            } else {
                if (selectedPokemons.length < 3) { // Limite de 3 Pokémon por time
                    selectedPokemons.push(pokemon);
                    item.style.color = 'red'; // Muda a cor para vermelho
                } else {
                    alert("Um time não pode ter mais do que 3 Pokémon!");
                }
            }

            updateTeamList();
        }

        function updateTeamList() {
            const teamList = document.getElementById("team-list");
            teamList.innerHTML = teams.length > 0 ? teams.map((team, index) => `
                <div class="team">
                    Time ${index + 1}: ${team.join(", ")}
                    <span class="delete-team" onclick="deleteTeam(${index})">[Deletar]</span>
                </div>
            `).join("") : "Nenhum time criado.";
        }

        function createTeam() {
            if (selectedPokemons.length < 3) {
                alert("Selecione 3 Pokémons para criar um time!");
                return;
            }

            if (teams.length < 3) {
                teams.push([...selectedPokemons]); // Adiciona uma cópia do time
                selectedPokemons = []; // Reseta a seleção
                updateTeamList();
                renderPokemonList(); // Atualiza a lista de Pokémon
            } else {
                alert("Você pode criar no máximo 3 times!");
            }
        }

        function deleteTeam(index) {
            teams.splice(index, 1); // Remove o time selecionado
            updateTeamList(); // Atualiza a lista de times
        }
    </script>
</body>
</html>
