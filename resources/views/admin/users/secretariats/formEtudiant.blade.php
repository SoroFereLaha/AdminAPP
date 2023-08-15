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



            <div class="big-container flex flex-col   w-4/5 ">
                <div class="flex items-center justify-center">
                    <p class="text-blue-900 text-2xl font-extrabold">
                        TABLEAU DE BORDS > <span class="text-indigo-400">Service secretariat</span>
                    </p>
                </div>

                <div class="w-2/5 mx-auto mt-4 p-4 bg-white shadow-md rounded-md">
                    <form id="studentForm">
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
                            <label class="block text-gray-700 font-bold mb-2" for="matieres">Matieres :</label>
                            <div class="relative inline-block w-full">
                                <select id="matieresDropdown" name="matieres[]" class="border border-gray-300 rounded-md px-3 py-2 w-full bg-white focus:outline-none focus:ring focus:border-blue-300" multiple>
                                    <!-- Options de matières seront ajoutées ici -->
                                </select>
                            </div>
                        </div>


                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Envoyer</button>
                            <a href="{{ route('admin.users.secretariats.inscriptions') }}">
                                <button type="button" id="retourButton" class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Retour</button>
                            </a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <!-- ... Reste du code ... -->

        <script>
            const apiUrl = 'http://127.0.0.1:8000/api/etudiant/create';

            const matiereApiUrl = 'http://127.0.0.1:8000/api/matiere';
            const matieresDropdown = document.querySelector('#matieresDropdown');

            async function fetchMatieres() {
                try {
                    const response = await fetch(matiereApiUrl);
                    const {
                        data
                    } = await response.json();

                    if (Array.isArray(data)) {
                        // Créer les options pour le dropdown
                        matieresDropdown.innerHTML = '';
                        data.forEach(matiere => {
                            const option = document.createElement('option');
                            option.value = matiere.id;
                            option.textContent = matiere.nom;
                            matieresDropdown.appendChild(option);
                        });
                    } else {
                        console.error('La propriété "data" de la réponse de l\'API ne contient pas de tableau de matières.');
                    }
                } catch (error) {
                    console.error('Erreur lors de la récupération des matières:', error);
                }
            }

            fetchMatieres();


            document.querySelector('#studentForm').addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(event.target);
                const selectedMatieres = formData.getAll('matieres[]');
                const data = {
                    nom: formData.get('nom'),
                    prenom: formData.get('prenom'),
                    age: parseInt(formData.get('age')),
                    genre: formData.get('genre'),
                    matieres: selectedMatieres.map(Number),
                };

                // Vérifier si tous les champs sont remplis
                if (Object.values(data).some(value => value === '' || value === null)) {
                    showAlert('Veuillez remplir tous les champs du formulaire.', 'error');
                    return;
                }

                try {
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data),
                    });

                    if (response.ok) {
                        showAlert('Nouvel étudiant ajouté avec succès!', 'success');
                        // Vous pouvez également mettre à jour la liste des étudiants ici en effectuant une nouvelle requête GET vers l'API pour récupérer les données mises à jour.
                    } else {
                        showAlert('Une erreur est survenue lors de l\'ajout de l\'étudiant.', 'error');
                    }
                } catch (error) {
                    console.error('Erreur lors de la requête vers l\'API:', error);
                    showAlert("l'Id du prof n'existe pas", 'error');
                }
            });

            function showAlert(message, type) {
                const alertElement = document.createElement('div');
                alertElement.textContent = message;
                alertElement.classList.add('text-white', 'text-sm', 'px-4', 'py-2', 'rounded', 'mb-4');
                if (type === 'success') {
                    alertElement.classList.add('bg-green-500');
                } else if (type === 'error') {
                    alertElement.classList.add('bg-red-500');
                }

                // Ajouter l'alerte avant le formulaire
                const formElement = document.querySelector('#studentForm');
                formElement.parentElement.insertBefore(alertElement, formElement);

                // Supprimer l'alerte après 3 secondes (3000 millisecondes)
                setTimeout(() => {
                    alertElement.remove();
                }, 5000);
            }

            // ... Reste du code ...
        </script>


    </x-app-layout>

</body>

</html>