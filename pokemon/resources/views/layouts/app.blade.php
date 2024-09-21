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
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* sombra preta com 50% de opacidade */
            z-index: 50; /* sobrepõe outros elementos */
        }

        #central-image {
            z-index: 60; /* imagem acima do overlay */
            display: flex; /* garante que a imagem possa ser centralizada */
            align-items: center; /* centralização vertical */
            justify-content: center; /* centralização horizontal */
            margin-top: -15rem;
        }

        img {
            max-width: 100%; /* ajusta a largura da imagem */
            height: auto; /* preserva a proporção da imagem */
        }
    </style>
    <body class="font-sans antialiased relative">
        <!-- Overlay -->
        {{-- <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50"></div>
    
        <!-- Centralized Image -->
        <div id="central-image" class="fixed inset-0 flex items-center justify-center z-60 ">
            <img src="{{asset('/img/stroele_realista.jpeg')}}" alt="Imagem Centralizada" class="w-1/3 h-auto">
        </div>
     --}}
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
    
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
    
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
