<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    <x-app-layout>

        <x-slot name="header">
            @can('edit-users')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(' Secretariat ') }}
            </h2>
            @endcan
        </x-slot>

        <div class="pt-12  flex">
            <div class="sidebar-container w-1/5">
                <!-- <aside id="logo-sidebar" class=" h-100% bottom-0 left-0 z-40 w-64 h-screen pt-10 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-[#424549] dark:border-gray-700" aria-label="Sidebar"> -->
                <x-sidebar>
                </x-sidebar>
                <!-- </aside> -->
            </div>



            <div class="big-container flex flex-col   w-4/5 ">
                <div class="flex items-center justify-center">
                    <p class="text-blue-900 text-2xl font-extrabold">
                        TABLEAU DE BORDS > <span class="text-indigo-400">Service secretariat</span>
                    </p>

                </div>
                <div class="flex mx-10 my-5">
                    <p class="font-sans italic text-left">Nous vous souhaitons la Bienvenue dans votre espace d'administration. C'est un plaisire de vous avoir ici pour gérer et superviser le service secretariat où vous pouver prendre en main les incription des etudiants, les absances aissi que les payemens 🎉🎊✨.</p>
                </div>


                <div class="flex items-center my-10">
                    <a href="{{ route('admin.users.secretariats.inscriptions') }}">
                        <div class="container  shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-blue-100 w-4/5 h-40 mx-5">
                            <div class="haut my-5 mx-10 flex pt-7 ">

                                <span class="font-black  flex ">
                                    <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                    </svg>
                                    <span class="text-2xl my-1 mx-2">Inscriptions</span>
                                </span>

                            </div>
                            <div class="w-80 h-3/5 flex justify-center">
                                <span class="text-6xl font-black text-blue-900">22</span>
                                <p class="mx-2 text-xl text-blue-400 italic pt-6">Etudiant</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.users.secretariats.inscriptions') }}">
                        <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-indigo-100 w-4/5 h-40 mx-1">
                            <div class="haut my-5 flex mx-10 pt-7 ">

                                <span class="font-black  flex ">
                                    <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                    </svg>
                                    <span class="text-2xl my-1 mx-2">Absences</span>
                                </span>

                            </div>
                            <div class="w-80 h-3/5 flex justify-center">
                                <span class="text-6xl font-black text-blue-900">22</span>
                                <p class="mx-2 pt-6 text-xl text-blue-400 italic ">Etudiant</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.users.secretariats.inscriptions') }}">
                        <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-violet-100 w-4/5 h-40 mx-1">
                            <div class="haut my-5 flex mx-10 pt-7 ">

                                <span class="font-black flex ">
                                    <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                    </svg>
                                    <span class="text-2xl my-1 mx-2">Payements</span>
                                </span>

                            </div>
                            <div class="w-80 h-3/5 flex justify-center">
                                <span class="text-6xl font-black text-blue-900">22</span>
                                <p class="mx-2 pt-6 text-xl text-blue-400 italic ">Etudiant</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

    </x-app-layout>

</body>

</html>