<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="h-screen w-2/3 flex justify-center items-center cp-1">
            <div class="w-2/3">
                <lottie-player src="https://lottie.host/f2551097-e729-442b-b3b0-9cb2c88ffb5c/nv1wRi3eGU.json"
                    background="#C4DFDF" speed="1" loop autoplay mode="normal"></lottie-player>
            </div>
        </div>

        <div class="w-1/3 px-6 py-4 bg-white h-screen flex justify-center items-center">
            <div class=" w-[90%] px-5">
                <p class="font-extrabold text-3xl text-center my-3">Jasawebsite.<span class="text-yellow-600">biz</span>
                </p>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</html>
