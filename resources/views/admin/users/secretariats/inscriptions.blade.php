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

                    <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-blue-100 w-80 h-50 mx-10">
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
                            <span class="text-4xl font-black text-blue-900 pt-4">22</span>
                            <p class="mx-2 text-xl text-blue-400 italic pt-6">Etudiant</p>
                        </div>
                    </div>



                    <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-indigo-100 w-80 h-50 mx-5">
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
                            <button class="font-bold bg-green-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Ajouter</button>

                        </div>

                        <div class="w-80 h-2/5 flex items-center justify-center">
                            <span class="text-4xl font-black text-blue-900 pt-4">22</span>
                            <p class="mx-2 text-xl text-blue-400 italic pt-6">Professeurs</p>
                        </div>
                    </div>



                    <div class="container shadow-lg  ring ring-blue-400  ring-offset-4 rounded-lg  bg-violet-100 w-80 h-50 mx-5">
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
                            <button class="font-bold bg-green-300 rounded-md mx-10 ring-2 ring-blue-300 h-10 w-20">Ajouter</button>

                        </div>

                        <div class="w-80 h-2/5 flex items-center justify-center">
                            <span class="text-4xl font-black text-blue-900 pt-4">22</span>
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


                <script>
                    const apiUrlEtudiant = 'http://127.0.0.1:8000/api/etudiant';
                    const apiUrlProf = 'http://127.0.0.1:8000/api/prof';
                    const apiUrlMatiere = 'http://127.0.0.1:8000/api/matiere';

                    function listEtudiants() {
                        fetch(apiUrlEtudiant)
                            .then(response => response.json())
                            .then(data => {
                                displayEtudiantsData(data.data);
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
                                                <th>Âge</thclass=>
                                                <th>Genre</th>
                                                <th>Prof_id</th>
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
                                            <td class="text-center border">${item.prof_id}</td>
                                            <td class="text-center border flex items-center justify-center pt-2">
                                            <svg class="text-green-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            <svg class="text-red-500 w-6 h-6 mx-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>

                                            </td>
                                        `;
                            tableBody.appendChild(row);
                        });
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
                                            <svg class="text-green-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            <svg class="text-red-500 w-6 h-6 mx-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>

                                            </td>
                                        `;
                            tableBody.appendChild(row);
                        });
                    }

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
                                            <td class="text-center border">${item.prof_id}</td>
                                            <td class="text-center border flex items-center justify-center pt-2">
                                            <svg class="text-green-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            <svg class="text-red-500 w-6 h-6 mx-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>

                                            </td>
                                        `;
                            tableBody.appendChild(row);
                        });
                    }
                </script>


                <!-- tableau qui affiche les Api_professeurs  -->






    </x-app-layout>

</body>

</html>