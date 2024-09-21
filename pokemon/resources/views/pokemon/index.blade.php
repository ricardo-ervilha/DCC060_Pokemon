<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Exemplo</title>
</head>
<body>
    <h1>Lista de Pokémons</h1>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    HP
                </th>
                <th scope="col" class="px-6 py-3">
                    ATK
                </th>
                <th scope="col" class="px-6 py-3">
                    DEF
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pokemon->nome }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $pokemon->hp }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pokemon->ataque }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pokemon->defesa }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>