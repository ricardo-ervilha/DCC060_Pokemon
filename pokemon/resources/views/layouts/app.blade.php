<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
            border: 1px solid #000; /* Destaca o item ao passar o mouse */
        }

        .crosshatch {
            background-image: linear-gradient(
                45deg, 
                rgba(0,0,0,0.5) 25%, 
                transparent 25%, 
                transparent 50%, 
                rgba(0,0,0,0.5) 50%, 
                rgba(0,0,0,0.5) 75%, 
                transparent 75%, 
                transparent
                );
            }
    </style>
</head>
<body class="font-sans antialiased relative">
    
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

</body>
</html>
