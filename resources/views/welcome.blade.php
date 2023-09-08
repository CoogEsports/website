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

<body class="antialiased">
    @include('layouts.nav-menu', ['position' => 'fixed'])
    <div class="relative isolate overflow-hidden" style="background-image: url(https://assets.website-files.com/60358955e12a8a2413b99edc/6035aa3bd811e11ae79d2a4d_bg-home-hero-esports-template.jpg)">
        <div class="mx-auto max-w-7xl px-6 pb-24 pt-10 sm:pb-32 lg:px-8 lg:py-40">
            <div class="mx-auto max-w-3xl lg:mx-0 lg:pt-8" style="margin-bottom:207px;">
                <h1 class="text-white font-bold display-6 text-7xl mb-2 tracking-wider uppercase font-chakra">Premier Gaming and Collegiate Esports Team</h1>
                <p class="text-white text-2xl mb-10">Houston's top Esports program representing the <br>University of Houston and the greater Houston area.</p>
                <x-primary-button>Buy Merch</x-primary-button>
            </div>
            <div class="pt-12 flex justify-items-center items-center justify-between" style="border-top: 1.5px solid rgba(255, 191, 207, 0.17);">
                <div class="mr-10 tracking-widest uppercase text-white font-bold text-xl font-chakra">
                    Sponsored by
                </div>
                <div class="grid grid-flow-col gap-16 align-items-center justify-between">
                    <img src="https://i.ibb.co/kqFfg3M/Daco-380627.png" style="opacity: 1;width:150px;">
                    <img src="https://i.ibb.co/80zVshW/msi-5-logo-black-and-white.png" style="opacity: 1;width:150px;">
                </div>
            </div>
        </div>
    </div>
</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector("header");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 1) {
            header.classList.remove("bg-transparent");
            header.classList.add("bg-black");
        } else {
            header.classList.remove("bg-black");
            header.classList.add("bg-transparent");
        }
    });
});    
</script>

</html>