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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen cp-4 dark:bg-gray-900">
        <div id="main">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @include('layouts.sidebar')
                <div class="ml-[200px]">
                    @if (count($errors) > 0)
                        <div class="alertError bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-3 mt-2"
                            role="alert">
                            @foreach ($errors->all() as $error)
                                <li><span class="block sm:inline">{{ $error }}</span></li>
                            @endforeach
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500 close-btn" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alertSuccess bg-green-200 text-green-800 px-4 py-3 rounded relative mx-3 mt-2">
                            {{ session('success') }}
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500 close-btn2" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @endif
                    <div id="loading" class="loader absolute right-3 top-3" style="display: none"></div>

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/a6c5beee0a.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.tiny.cloud/1/jkhiia9kovq641lwnylmyfhbnd2wio1chdku3lvam2mh8pmk/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#reports',
        plugins: ' anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
            "See docs to implement AI Assistant")),
    });
</script>
<script>
    var sidebarIsOpen = true;

    function toggleNav() {
        var sidebar = document.getElementById("mySidebar");
        var togglebtn = document.getElementById("togglebtn");
        var links = document.querySelectorAll(".text-hidden");
        var right = document.getElementById('arrow-right')
        var left = document.getElementById('arrow-left')

        if (sidebarIsOpen) {
            sidebar.style.width = "50px";
            sidebar.classList.add('gap-3')
            document.getElementById("main").style.marginLeft = "-150px";
            right.style.display = 'block';
            left.style.display = 'none';

            links.forEach(function(link) {
                link.classList.add('hidden');
                console.log(link);
            });
        } else {
            right.style.display = 'none';
            left.style.display = 'block';
            sidebar.style.width = "200px";
            document.getElementById("main").style.marginLeft = "0";
            links.forEach(function(link) {
                // var icon = link.querySelector('i').outerHTML;
                // link.classList.remove('justify-center')
                setTimeout(function() {
                    link.classList.remove('hidden');
                }, 300);
                console.log(link);
            });

        }

        sidebarIsOpen = !sidebarIsOpen;
    }
</script>
<script>
    $(document).ready(function() {
        $('.close-btn').click(function() {
            $(this).closest('.alertError').remove();
        });
    });
    $(document).ready(function() {
        $('.close-btn2').click(function() {
            $(this).closest('.alertSuccess').remove();
        });
    });
</script>

</html>
