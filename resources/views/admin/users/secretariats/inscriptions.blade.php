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
                <div class="h-full px-3 py-10 pb-4 overflow-y-auto bg-white dark:bg-[#424549]">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{route('profile.edit')}}" class="flex items-center p-2 text-black-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                                    <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Notifications</span>
                                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                                    <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Message</span>
                                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.users.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Utilisateurs</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Administration</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Finance et comptabilité</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.secretariats.secretariat') }}" class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Secrétariat</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Administration générale</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">
                                        Deconnexion
                                    </span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- </aside> -->
            </div>


            <!--les diferent liste existant-->

            <div class="big-container flex flex-col   w-4/5 ">
                <div class="flex items-center justify-center">
                    <p class="text-blue-900 text-2xl font-extrabold">
                        TABLEAU DE BORDS > <span class="text-indigo-400">Service secretariat</span>
                    </p>

                </div>




                <div class="flex items-center my-10">

                    <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-blue-100 w-80 h-50 mx-3">
                        <div class="haut my-5 flex">

                            <span class="font-black mx-20 flex ">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>

                                <span class="text-2xl my-1 mx-2">Etudiants</span>
                            </span>

                        </div>

                        <div class="w-80 flex justify-between">

                            <button onclick="listEtudiants()" class="text-white font-bold bg-blue-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Lister</button>
                            <a href="{{ route('admin.users.secretariats.formEtudiant') }}">
                                <button class="font-bold bg-green-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Ajouter</button>
                            </a>
                        </div>

                        <div class="w-80 h-2/5 flex items-center justify-center">
                            <span id="nombreEtudiants" class="text-4xl font-black text-blue-900 pt-4"></span>
                            <p class="mx-2 text-xl text-blue-400 italic pt-6">Etudiant</p>
                        </div>

                    </div>



                    <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-indigo-100 w-80 h-50 mx-2">
                        <div class="haut my-5 flex ">

                            <span class="font-black mx-20 flex ">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>

                                <span class="text-2xl my-1 mx-2">Professeurs</span>
                            </span>


                        </div>

                        <div class="w-80 flex justify-between">

                            <button onclick="listProfs()" class="text-white font-bold bg-blue-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Lister</button>
                            <a href="{{ route('admin.users.secretariats.formProf') }}">
                                <button class="font-bold bg-green-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Ajouter</button>
                            </a>

                        </div>

                        <div class="w-80 h-2/5 flex items-center justify-center">
                            <span id="nombreProfesseurs" class="text-4xl font-black text-blue-900 pt-4"></span>
                            <p class="mx-2 text-xl text-blue-400 italic pt-6">Professeurs</p>
                        </div>
                    </div>



                    <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-violet-100 w-80 h-50 mx-3">
                        <div class="haut my-5 flex ">

                            <span class="font-black mx-20 flex ">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>

                                <span class="text-2xl my-1 mx-2">Matières</span>
                            </span>


                        </div>

                        <div class="w-80 flex justify-between">

                            <button onclick="listMatieres()" class="text-white font-bold bg-blue-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Lister</button>
                            <a href="{{ route('admin.users.secretariats.formMatière') }}">
                                <button class="font-bold bg-green-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Ajouter</button>
                            </a>
                        </div>

                        <div class="w-80 h-2/5 flex items-center justify-center">
                            <span id="nombreMatieres" class="text-4xl font-black text-blue-900 pt-4"></span>
                            <p class="mx-2 text-xl text-blue-400 italic pt-6">Matières</p>
                        </div>
                    </div>

                </div>
                <!--les diferent liste existant-->


                <!-- tableau qui affiche les Api -->

                <div id="tableContainer" class="mx-20 justify-center big-container flex flex-col  w-4/5 ">

                    <table id="dataTable" class="border-collapse border border">
                        <thead>
                            <tr class="bg-blue-300 h-10 border" id="tableHeader">

                            </tr>

                        </thead>
                        <tbody id="table-body">

                        </tbody>
                    </table>
                </div>

                <!-- tableau qui affiche les Api_etudiant  -->

                <!-- Boîte de dialogue personnalisée pour la suppression des étudiants -->
                <div id="confirmationModalEtudiant" class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="modal-content bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Voulez-vous vraiment supprimer cet étudiant ?</p>
                        <div class="modal-buttons flex justify-center">
                            <button id="confirmBtnEtudiant" class="btn-confirm bg-green-500 text-white px-4 py-2 rounded mr-2">OK</button>
                            <button id="cancelBtnEtudiant" class="btn-cancel bg-red-500 text-white px-4 py-2 rounded">Annuler</button>
                        </div>
                    </div>
                </div>

                <!-- Boîte de dialogue personnalisée pour la suppression des professeurs -->
                <div id="confirmationModalProf" class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="modal-content bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Voulez-vous vraiment supprimer ce professeur ?</p>
                        <div class="modal-buttons flex justify-center">
                            <button id="confirmBtnProf" class="btn-confirm bg-green-500 text-white px-4 py-2 rounded mr-2">OK</button>
                            <button id="cancelBtnProf" class="btn-cancel bg-red-500 text-white px-4 py-2 rounded">Annuler</button>
                        </div>
                    </div>
                </div>

                <!-- Boîte de dialogue personnalisée pour la suppression des matières -->
                <div id="confirmationModalMatiere" class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="modal-content bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Voulez-vous vraiment supprimer cette matière ?</p>
                        <div class="modal-buttons flex justify-center">
                            <button id="confirmBtnMatiere" class="btn-confirm bg-green-500 text-white px-4 py-2 rounded mr-2">OK</button>
                            <button id="cancelBtnMatiere" class="btn-cancel bg-red-500 text-white px-4 py-2 rounded">Annuler</button>
                        </div>
                    </div>
                </div>


                <!-- Ajoutez un élément de superposition modale -->

                <div id="updateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="w-2/5 bg-white p-4 rounded shadow-lg">
                        <!-- Votre formulaire de mise à jour ici -->
                        <form id="studentForm" onsubmit="updateEtudiant(); return false;">
                            <input type="hidden" id="etudiantId" name="etudiantId" value="">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="prenom">Prénom :</label>
                                <input type="text" id="prenom" name="prenom" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="age">Âge :</label>
                                <input type="number" id="age" name="age" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="genre">Genre :</label>
                                <select id="genre" name="genre" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="prof_id">ID Professeur :</label>
                                <input type="number" id="prof_id" name="prof_id" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Envoyer</button>
                                <button type="button" id="retourButton" class="ml-4 bg-red-500  text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300" onclick="closeUpdateForm()">Retour</button>

                            </div>
                        </form>
                    </div>
                </div>

                <!-- Formulaire de mise à jour du professeur -->
                <div id="updateModal2" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="w-2/5 bg-white p-4 rounded shadow-lg">
                        <form id="profForm" onsubmit="updateProfesseur(); return false;">
                            <input type="hidden" id="prof_id" name="prof_id" value="">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="prof_nom">Nom :</label>
                                <input type="text" id="prof_nom" name="prof_nom" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="prof_prenom">Prénom :</label>
                                <input type="text" id="prof_prenom" name="prof_prenom" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="prof_age">Âge :</label>
                                <input type="number" id="prof_age" name="prof_age" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="email">Email :</label>
                                <input type="email" id="email" name="email" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="class">Classe :</label>
                                <input type="number" id="class" name="class" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="matiere_id">ID Matière :</label>
                                <input type="number" id="matiere_id" name="matiere_id" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>

                            <div class="flex justify-center">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Envoyer</button>
                                <button type="button" id="retourButton" class="ml-4 bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300" onclick="closeUpdateForm2()">Retour</button>

                            </div>
                        </form>
                    </div>
                </div>


                <!-- Formulaire de mise à jour de la matière -->
                <div id="updateMatiereModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="w-2/5 bg-white p-4 rounded shadow-lg">
                        <form id="matiereForm" onsubmit="updateMatiere(); return false;">
                            <input type="hidden" id="matiere_id" name="matiere_id" value="">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="nom_matiere">Nom :</label>
                                <input type="text" id="nom_matiere" name="nom" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="description">Description :</label>
                                <input type="text" id="description" name="description" value="" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="prof_id_matiere">ID Professeur :</label>
                                <input type="number" id="prof_id_matiere" name="prof_id" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                            </div>

                            <div class="flex justify-center">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Envoyer</button>
                                <button type="button" id="retourButton" class="ml-4 bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300" onclick="closeUpdateMatiereForm()">Retour</button>
                            </div>
                        </form>
                    </div>
                </div>




                <script>
                    const apiUrlEtudiant = 'http://127.0.0.1:8000/api/etudiant';
                    const apiUrlProf = 'http://127.0.0.1:8000/api/prof';
                    const apiUrlMatiere = 'http://127.0.0.1:8000/api/matiere';

                    function getCsrfToken() {
                        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    }

                    // Définir la variable csrfToken en utilisant la valeur du jeton CSRF récupérée
                    const csrfToken = getCsrfToken();


                    function listEtudiants() {
                        fetch(apiUrlEtudiant)
                            .then(response => response.json())
                            .then(data => {
                                displayEtudiantsData(data.data);
                                console.log(data.data);

                                const nombreEtudiantsElement = document.getElementById('nombreEtudiants');
                                nombreEtudiantsElement.textContent = data.data.length;
                            })
                            .catch(error => {
                                console.error('Erreur lors de la récupération des données des étudiants:', error);

                            });
                    }

                    function listProfs() {
                        fetch(apiUrlProf)
                            .then(response => response.json())
                            .then(data => {
                                displayProfsData(data.data);

                                const nombreProfesseursElement = document.getElementById('nombreProfesseurs');
                                nombreProfesseursElement.textContent = data.data.length;
                            })
                            .catch(error => {
                                console.error('Erreur lors de la récupération des données des professeurs:', error);
                            });
                    }

                    function listMatieres() {
                        fetch(apiUrlMatiere)
                            .then(response => response.json())
                            .then(data => {
                                displayMatieresData(data.data);
                                console.log(data.data)
                                const nombreMatieresElement = document.getElementById('nombreMatieres');
                                nombreMatieresElement.textContent = data.data.length;
                            })
                            .catch(error => {
                                console.error('Erreur lors de la récupération des données des matières:', error);
                            });
                    }

                    function displayEtudiantsData(data) {
                        // Ajouter les en-têtes spécifiques aux étudiants
                        const tableHeader = document.querySelector('#tableHeader');
                        tableHeader.innerHTML = `
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Âge</th>
                                                <th>Genre</th>
                                                <th>Matières</th>
                                                <th>Options</th>
                                            `;

                        const tableBody = document.querySelector('#dataTable tbody');
                        tableBody.innerHTML = ''; // Réinitialiser le contenu du tableau

                        data.forEach(item => {
                            const row = document.createElement('tr');
                            row.classList.add('bg-white', 'h-10');
                            row.innerHTML = `
                                            <td class="text-center border">${item.id}</td>
                                            <td class="text-center border">${item.nom}</td>
                                            <td class="text-center border">${item.prenom}</td>
                                            <td class="text-center border">${item.age ? item.age : ''}</td>
                                            <td class="text-center border">${item.genre }</td>
                                            <td class="text-center border">
                                                            <ul>
                                                                ${item.matieres.map(matiere => `<li>${matiere.nom}</li>`).join('')}
                                                            </ul>
                                                        </td>
                                            <td class="text-center border flex items-center justify-center pt-2">
                                            
                                           <svg class="text-green-500 w-6 h-6"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                                style="cursor: pointer;"
                                                onclick="openUpdateForm(${item.id}, '${item.nom}', '${item.prenom}', ${item.age ? item.age : ''}, '${item.genre}', ${item.prof_id});">
                                                <path stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                           
                                            <svg class="text-red-500 w-6 h-6 mx-10 delete-student" 
                                                data-id="${item.id}" 
                                                xmlns="http://www.w3.org/2000/svg" 
                                                fill="none" 
                                                viewBox="0 0 24 24" 
                                                stroke-width="1.5" 
                                                stroke="currentColor" 
                                                class="w-6 h-6"
                                                style="cursor: pointer;">
                                                <path stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            </td>
                                        `;
                            tableBody.appendChild(row);
                        });
                    }

                    function openUpdateForm(id, nom, prenom, age, genre, prof_id) {
                        // Remplir le formulaire avec les données de l'étudiant sélectionné
                        document.getElementById('nom').value = nom;
                        document.getElementById('prenom').value = prenom;
                        document.getElementById('age').value = age;
                        document.getElementById('genre').value = genre;
                        document.getElementById('prof_id').value = prof_id;

                        // Afficher la superposition modale
                        const updateModal = document.getElementById('updateModal');
                        updateModal.classList.remove('hidden');

                        // Changer le libellé du bouton "Retour" en "Fermer"
                        const retourButton = document.getElementById('retourButton');
                        retourButton.textContent = 'Fermer';

                        // Définir l'ID de l'étudiant dans le formulaire pour l'utiliser lors de la mise à jour
                        document.getElementById('etudiantId').value = id;
                    }

                    function updateEtudiant(id) {
                        // Votre code pour afficher le formulaire de mise à jour ici
                        listEtudiants();
                    }


                    document.addEventListener('DOMContentLoaded', function() {


                        const form = document.getElementById('studentForm');
                        form.addEventListener('submit', function(event) {
                            event.preventDefault(); // Empêcher la soumission du formulaire par défaut

                            // Récupérer l'ID de l'étudiant à partir du champ masqué
                            const etudiantId = document.getElementById('etudiantId').value;

                            // Obtenir l'URL de l'API update
                            const apiUrlUpdate = `http://127.0.0.1:8000/api/etudiant/edit/${etudiantId}`;

                            // Récupérer les valeurs des autres champs du formulaire
                            const nom = document.getElementById('nom').value;
                            const prenom = document.getElementById('prenom').value;
                            const age = document.getElementById('age').value;
                            const genre = document.getElementById('genre').value;
                            const prof_id = document.getElementById('prof_id').value;

                            // Construire l'objet de données à envoyer à l'API
                            const data = {
                                nom: nom,
                                prenom: prenom,
                                age: age,
                                genre: genre,
                                prof_id: prof_id
                            };

                            // Envoyer la requête PUT à l'API
                            fetch(apiUrlUpdate, {
                                    method: 'PUT',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify(data)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    closeUpdateForm();
                                })
                                .catch(error => {
                                    console.error('Erreur lors de la mise à jour de l\'étudiant:', error);
                                });
                        });
                    });




                    function closeUpdateForm() {
                        // Masquer la superposition modale
                        const updateModal = document.getElementById('updateModal');
                        updateModal.classList.add('hidden');

                        // Rétablir le libellé du bouton "Retour"
                        const retourButton = document.getElementById('retourButton');
                        retourButton.textContent = 'Retour';
                    }




                    function displayProfsData(data) {
                        // Ajouter les en-têtes spécifiques aux professeurs
                        const tableHeader = document.querySelector('#tableHeader');
                        tableHeader.innerHTML = `
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Âge</th>
                                                <th>Email</th>
                                                <th>Classe</th>
                                                <th>Matière ID</th>
                                                <th>Options</th>
                                            `;

                        const tableBody = document.querySelector('#dataTable tbody');
                        tableBody.innerHTML = ''; // Réinitialiser le contenu du tableau

                        data.forEach(item => {
                            const row = document.createElement('tr');
                            row.classList.add('bg-white', 'h-10')
                            row.innerHTML = `
                                            <td class="text-center border">${item.id}</td>
                                            <td class="text-center border">${item.nom}</td>
                                            <td class="text-center border">${item.prenom}</td>
                                            <td class="text-center border">${item.age ? item.age : ''}</td>
                                            <td class="text-center border">${item.email ? item.email : ''}</td>
                                            <td class="text-center border">${item.class ? item.class : ''}</td>
                                            <td class="text-center border">${item.matiere_id ? item.matiere_id : ''}</td>
                                            <td class="text-center border flex items-center justify-center pt-2">
                                           <svg class="text-green-500 w-6 h-6"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                                style="cursor: pointer;"
                                                onclick="openUpdateForm2(${item.id}, '${item.nom}', '${item.prenom}', ${item.age ? item.age : ''}, '${item.genre}','${item.email}', ${item.class}, ${item.matiere_id});">
                                                <path stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>


                                            <svg class="text-red-500 w-6 h-6 mx-10 delete-professor"
                                                data-id="${item.id}"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                                style="cursor: pointer;"
                                            >
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                />
                                            </svg>

                                            </td>
                                        `;
                            tableBody.appendChild(row);
                        });
                    }

                    // Fonction pour afficher le formulaire de mise à jour du professeur avec les données existantes
                    function openUpdateForm2(id, nom, prenom, age, genre, email, classe, matiere_id) {
                        // Remplir le formulaire avec les données du professeur sélectionné
                        document.getElementById('prof_id').value = id; // Remplacez 'prof_id' par 'id'
                        document.getElementById('prof_nom').value = nom;
                        document.getElementById('prof_prenom').value = prenom;
                        document.getElementById('prof_age').value = age ? age : ''; // Vérifiez si l'âge est défini
                        document.getElementById('genre').value = genre;
                        document.getElementById('email').value = email;
                        document.getElementById('class').value = classe;
                        document.getElementById('matiere_id').value = matiere_id;

                        // Afficher la superposition modale pour le formulaire de mise à jour des professeurs
                        const updateModal2 = document.getElementById('updateModal2');
                        updateModal2.classList.remove('hidden');

                        // Changer le libellé du bouton "Retour" en "Fermer"
                        const retourButton = document.getElementById('retourButton');
                        retourButton.textContent = 'Fermer';

                    }


                    // Fonction pour envoyer les données de mise à jour du professeur à l'API
                    function updateProfesseur() {
                        // Récupérer l'ID du professeur à partir du champ masqué
                        const prof_id = document.getElementById('prof_id').value;

                        // Obtenir l'URL de l'API update pour le professeur
                        const apiUrlUpdateProf = `http://127.0.0.1:8000/api/prof/edit/${prof_id}`;

                        // Récupérer les valeurs des autres champs du formulaire
                        const nom = document.getElementById('prof_nom').value;
                        const prenom = document.getElementById('prof_prenom').value;
                        const age = document.getElementById('prof_age').value;
                        const email = document.getElementById('email').value;
                        const classe = document.getElementById('class').value;
                        const matiere_id = document.getElementById('matiere_id').value;

                        // Construire l'objet de données à envoyer à l'API
                        const data = {
                            nom: nom,
                            prenom: prenom,
                            age: age,
                            email: email,
                            class: classe,
                            matiere_id: matiere_id
                        };

                        // Envoyer la requête PUT à l'API
                        fetch(apiUrlUpdateProf, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(data => {

                                // Fermer le formulaire de mise à jour après la mise à jour réussie
                                closeUpdateForm2();
                            })
                            .catch(error => {
                                console.error('Erreur lors de la mise à jour du professeur:', error);
                            });
                    }

                    function closeUpdateForm2() {
                        const updateModal2 = document.getElementById('updateModal2');
                        updateModal2.classList.add('hidden');
                        listProfs();
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        // ...

                        const profForm = document.getElementById('profForm');
                        profForm.addEventListener('submit', function(event) {
                            event.preventDefault(); // Empêcher la soumission du formulaire par défaut
                            updateProfesseur();
                        });

                        // ...
                    });






                    function displayMatieresData(data) {
                        // Ajouter les en-têtes spécifiques aux matières
                        const tableHeader = document.querySelector('#tableHeader');
                        tableHeader.innerHTML = `
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prof_ID</th>
                <th>Options</th>

                `;

                        const tableBody = document.querySelector('#dataTable tbody');
                        tableBody.innerHTML = ''; // Réinitialiser le contenu du tableau

                        data.forEach(item => {
                            const row = document.createElement('tr');
                            row.classList.add('bg-white', 'h-10')
                            row.innerHTML = `
                <td class="text-center border">${item.id}</td>
                <td class="text-center border">${item.nom}</td>
                <td class="text-center border">${item.description}</td>
                <td class="text-center border">${item.prof.nom}</td>
                <td class="text-center border flex items-center justify-center pt-2">
                   <svg class="text-green-500 w-6 h-6 cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    onclick="openUpdateMatiereForm(${item.id}, '${item.nom}', '${item.description}', ${item.prof_id});">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>



                    <svg class="text-red-500 w-6 h-6 mx-10 delete-matiere" data-id="${item.id}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="cursor: pointer;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>

                </td>
                `;
                            tableBody.appendChild(row);
                        });
                    }

                    // Fonction pour afficher le formulaire de mise à jour de la matière avec les données existantes
                    function openUpdateMatiereForm(id, nom, description, prof_id) {
                        // Remplir le formulaire avec les données de la matière sélectionnée
                        document.getElementById('matiere_id').value = id;
                        document.getElementById('nom_matiere').value = nom;
                        document.getElementById('description').value = description;
                        document.getElementById('prof_id_matiere').value = prof_id;

                        // Afficher la superposition modale pour le formulaire de mise à jour de la matière
                        const updateMatiereModal = document.getElementById('updateMatiereModal');
                        updateMatiereModal.classList.remove('hidden');

                        // Changer le libellé du bouton "Retour" en "Fermer"
                        const retourButton = document.getElementById('retourButton');
                        retourButton.textContent = 'Fermer';
                    }

                    // Fonction pour envoyer les données de mise à jour de la matière à l'API
                    function updateMatiere() {
                        // Récupérer l'ID de la matière à partir du champ masqué
                        const matiere_id = document.getElementById('matiere_id').value;

                        // Obtenir l'URL de l'API update pour la matière
                        const apiUrlUpdateMatiere = `http://127.0.0.1:8000/api/matiere/edit/${matiere_id}`;

                        // Récupérer les valeurs des autres champs du formulaire
                        const nom = document.getElementById('nom_matiere').value;
                        const description = document.getElementById('description').value;
                        const prof_id = document.getElementById('prof_id_matiere').value;

                        // Construire l'objet de données à envoyer à l'API
                        const data = {
                            nom: nom,
                            description: description,
                            prof_id: prof_id
                        };

                        // Envoyer la requête PUT à l'API
                        fetch(apiUrlUpdateMatiere, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(data => {

                                // Fermer le formulaire de mise à jour après la mise à jour réussie
                                closeUpdateMatiereForm();
                            })
                            .catch(error => {
                                console.error('Erreur lors de la mise à jour de la matière:', error);
                            });
                    }

                    function closeUpdateMatiereForm() {
                        const updateMatiereModal = document.getElementById('updateMatiereModal');
                        updateMatiereModal.classList.add('hidden');
                        listMatieres(); // Charger la liste des matières après la mise à jour réussie
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        // ...

                        const matiereForm = document.getElementById('matiereForm');
                        matiereForm.addEventListener('submit', function(event) {
                            event.preventDefault(); // Empêcher la soumission du formulaire par défaut
                            updateMatiere();
                        });

                        // ...
                    });


                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains('delete-student')) {
                            // Gérer l'action de suppression d'un étudiant
                            const studentId = event.target.dataset.id;

                            const confirmationModalEtudiant = document.getElementById('confirmationModalEtudiant');
                            confirmationModalEtudiant.classList.remove('hidden');

                            const confirmBtnEtudiant = document.getElementById('confirmBtnEtudiant');
                            confirmBtnEtudiant.addEventListener('click', function() {
                                // Appel à l'API de suppression d'étudiant
                                fetch(`http://127.0.0.1:8000/api/etudiant/${studentId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken, // Assurez-vous de définir cette variable en récupérant le jeton CSRF de la balise meta comme indiqué précédemment
                                            'Content-Type': 'application/json',
                                        },
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('La suppression de l\'étudiant a échoué.');
                                        }
                                        // Mettre à jour la liste des étudiants après la suppression réussie
                                        listEtudiants();
                                        confirmationModalEtudiant.classList.add('hidden');
                                    })
                                    .catch(error => {
                                        console.error('Erreur lors de la suppression de l\'étudiant :', error);
                                        // Gérer l'erreur si nécessaire
                                    });
                            });

                            const cancelBtnEtudiant = document.getElementById('cancelBtnEtudiant');
                            cancelBtnEtudiant.addEventListener('click', function() {
                                confirmationModalEtudiant.classList.add('hidden');
                            });
                        } else if (event.target.classList.contains('delete-matiere')) {
                            // Gérer l'action de suppression d'une matière
                            const matiereId = event.target.dataset.id;

                            const confirmationModalMatiere = document.getElementById('confirmationModalMatiere');
                            confirmationModalMatiere.classList.remove('hidden');

                            const confirmBtnMatiere = document.getElementById('confirmBtnMatiere');
                            confirmBtnMatiere.addEventListener('click', function() {
                                // Appel à l'API de suppression de matière
                                fetch(`http://127.0.0.1:8000/api/matiere/${matiereId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken, // Assurez-vous de définir cette variable en récupérant le jeton CSRF de la balise meta comme indiqué précédemment
                                            'Content-Type': 'application/json',
                                        },
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('La suppression de la matière a échoué.');
                                        }
                                        // Mettre à jour la liste des matières après la suppression réussie
                                        listMatieres();
                                        confirmationModalMatiere.classList.add('hidden');
                                    })
                                    .catch(error => {
                                        console.error('Erreur lors de la suppression de la matière :', error);
                                        // Gérer l'erreur si nécessaire
                                    });
                            });

                            const cancelBtnMatiere = document.getElementById('cancelBtnMatiere');
                            cancelBtnMatiere.addEventListener('click', function() {
                                confirmationModalMatiere.classList.add('hidden');
                            });
                        } else if (event.target.classList.contains('delete-professor')) {
                            // Gérer l'action de suppression d'un professeur
                            const professorId = event.target.dataset.id;

                            const confirmationModalProf = document.getElementById('confirmationModalProf');
                            confirmationModalProf.classList.remove('hidden');

                            const confirmBtnProf = document.getElementById('confirmBtnProf');
                            confirmBtnProf.addEventListener('click', function() {
                                // Appel à l'API de suppression de professeur
                                fetch(`http://127.0.0.1:8000/api/prof/${professorId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken, // Assurez-vous de définir cette variable en récupérant le jeton CSRF de la balise meta comme indiqué précédemment
                                            'Content-Type': 'application/json',
                                        },
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('La suppression du professeur a échoué.');
                                        }
                                        // Mettre à jour la liste des professeurs après la suppression réussie
                                        listProfs();
                                        confirmationModalProf.classList.add('hidden');
                                    })
                                    .catch(error => {
                                        console.error('Erreur lors de la suppression du professeur :', error);
                                        // Gérer l'erreur si nécessaire
                                    });
                            });

                            const cancelBtnProf = document.getElementById('cancelBtnProf');
                            cancelBtnProf.addEventListener('click', function() {
                                confirmationModalProf.classList.add('hidden');
                            });
                        }
                    });
                </script>


                <!-- tableau qui affiche les Api_professeurs  -->






    </x-app-layout>

</body>

</html>