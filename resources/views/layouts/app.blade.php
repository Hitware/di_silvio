<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="../../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../favicon-16x16.png">
    <link rel="manifest" href="https://tailwindcomponents.com/site.webmanifest">
    <link rel="mask-icon" href="https://tailwindcomponents.com/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <meta property="og:image"
        content="https://tailwindcomponents.com/storage/3891/conversions/temp52362-ogimage.jpg?v=2023-11-06 23:19:24" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="og:image:type" content="image/png" />

    <title>DI SILVIO</title>

    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles

</head>

<body class="bg-gray-200">


    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
            <div
                class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-white-800 dark:bg-gray-800 border-none">

                <b><span class="hidden md:block text-blue-600">DI SILVIO</span></b>
            </div>
            <div class="flex justify-between items-center h-14 bg-white-800 dark:bg-gray-800 header-right">
                <div
                    class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                    <button class="outline-none focus:outline-none">
                        <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <input type="search" name="" id="" placeholder="Buscar"
                        class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
                </div>
                <ul class="flex items-center">

                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    <li>
                        <b>
                            <a href="#" class="flex items-center mr-4 hover:text-blue-100 text-blue-800">
                                Bienvenido, {{ Auth::user()->name }}
                            </a>
                        </b>

                    </li>
                </ul>
            </div>
        </div>
        <!-- ./Header -->

        <!-- Sidebar -->
        <div
            class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-white-900 dark:bg-gray-900 h-full text-blue transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1">

                    @if (Auth::user()->rol==1)
                        @include('menu.admin')
                    @elseif(Auth::user()->rol==2)
                        @include('menu.verificador')
                    @elseif (Auth::user()->rol==5)
                        @include('menu.operador')
                    @endif

                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center mt-5 h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Configuración</div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('profile.show') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-white-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Perfil</span>
                        </a>
                    </li>

                    
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-white-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Cerrar Sesión</span>
                            </a>
                        </form>

                    </li>

                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
    @livewire('wire-elements-modal')
    @stack('scripts')
</body>

<!-- Mirrored from tailwindcomponents.com/component/responsive-admin-template/landing by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Nov 2023 23:20:08 GMT -->

</html>