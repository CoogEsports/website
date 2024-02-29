<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coog Esports</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-layer-800">
    @include('layouts.nav-menu', ['position' => 'fixed'])
    <x-hero title="Teams" tagline="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et quis odio vestibulum nunc, neque integer purus." />

    <div class="relative isolate overflow-hidden pt-24 sm:pt-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex justify-items-center items-center justify-between ">
                <h1 class="text-white font-bold display-6 text-5xl tracking-wider uppercase font-chakra">Valorant</h1>
                <x-primary-button>Apply for Tryouts</x-primary-button>
            </div>
            <div class="py-20">
                <!-- Blog Posts List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Blog Post 1 -->
                    <div class="mb-4">
                        <img src="https://placekitten.com/400/300" alt="Blog Post Image" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-2xl font-bold text-white tracking-wider uppercase font-chakra">Premiere</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative isolate overflow-hidden py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex justify-items-center items-center justify-between ">
                <h1 class="text-white font-bold display-6 text-5xl tracking-wider uppercase font-chakra">Counter-Strike 2</h1>
                <x-primary-button>Apply for Tryouts</x-primary-button>
            </div>
            <div class="py-20">
                <!-- Blog Posts List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Blog Post 1 -->
                    <div class="mb-4">
                        <img src="https://placekitten.com/400/300" alt="Blog Post Image" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-2xl font-bold text-white tracking-wider uppercase font-chakra">Premiere</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>