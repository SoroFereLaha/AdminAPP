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
                <div class="w-2/5 mx-auto mt-4 p-4 bg-white shadow-md rounded-md">
                    <form id="profForm">
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
                            <a href="{{ route('admin.users.secretariats.inscriptions') }}">
                                <button type="button" id="retourButton" class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Retour</button>
                            </a>
                        </div>
                    </form>
                </div>



            </div>

        </div>

        <!-- ... Scripte de recuperation ... -->

        <script>
            const apiUrl = 'http://127.0.0.1:8000/api/prof/create';

            document.querySelector('#profForm').addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(event.target);
                const data = {
                    nom: formData.get('nom'),
                    prenom: formData.get('prenom'),
                    age: parseInt(formData.get('age')),
                    email: formData.get('email'),
                    class: parseInt(formData.get('class')),
                    matiere_id: parseInt(formData.get('matiere_id')),
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
                        showAlert('Nouveau professeur ajouté avec succès!', 'success');
                        // Vous pouvez également mettre à jour la liste des professeurs ici en effectuant une nouvelle requête GET vers l'API pour récupérer les données mises à jour.
                    } else {
                        showAlert('Une erreur est survenue lors de l\'ajout du professeur.', 'error');
                    }
                } catch (error) {
                    console.error('Erreur lors de la requête vers l\'API:', error);
                    showAlert("l'ID de la matière n'existe pas", 'error');
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
                const formElement = document.querySelector('#profForm');
                formElement.parentElement.insertBefore(alertElement, formElement);

                // Supprimer l'alerte après 3 secondes (3000 millisecondes)
                setTimeout(() => {
                    alertElement.remove();
                }, 5000);
            }
        </script>




    </x-app-layout>

</body>

</html>