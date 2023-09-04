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
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="groupes">Groupes de la matière :</label>
                            <div id="groupesContainer">
                                <!-- Les champs de groupes seront ajoutés ici par JavaScript -->
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
            const groupesDropdown = document.querySelector('#groupesDropdown');

            let data = [];

            async function fetchMatieres() {
                try {
                    const response = await fetch(matiereApiUrl);
                    const responseData = await response.json();

                    if (Array.isArray(responseData.data)) {

                        data = responseData.data;
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

            function updateGroupes() {
                groupesContainer.innerHTML = ''; // Effacer les champs existants

                selectedMatieres.forEach(async matiereId => {
                    try {
                        const response = await fetch(`http://127.0.0.1:8000/api/matiere/${matiereId}/groupes`);
                        const {
                            data
                        } = await response.json();

                        if (Array.isArray(data)) {
                            const matiereNom = matieresDropdown.querySelector(`option[value="${matiereId}"]`).textContent;
                            const label = document.createElement('label');
                            label.textContent = `Groupes de la matière '${matiereNom}':`;
                            groupesContainer.appendChild(label);

                            const select = document.createElement('select');
                            select.name = `groupes[${matiereId}]`;
                            select.classList.add('border', 'border-gray-300', 'rounded-md', 'px-3', 'py-2', 'w-full', 'focus:outline-none', 'focus:ring', 'focus:border-blue-300');

                            data.forEach(groupe => {
                                const option = document.createElement('option');
                                option.value = groupe.id;
                                option.textContent = groupe.nom_group;
                                select.appendChild(option);
                            });

                            groupesContainer.appendChild(select);
                        }
                    } catch (error) {
                        console.error('Erreur lors de la récupération des groupes associés à la matière:', error);
                    }
                });
            }




            let selectedMatieres = [];
            matieresDropdown.addEventListener('change', () => {
                selectedMatieres = Array.from(matieresDropdown.selectedOptions, option => option.value);
                updateGroupes(); // Appel à la fonction pour mettre à jour les groupes en fonction de toutes les matières sélectionnées
            });




            document.querySelector('#studentForm').addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(event.target);
                const matieres = selectedMatieres.map(Number);

                for (const matiereId of matieres) {
                    const matiere = data.find(matiere => matiere.id === matiereId);
                    if (!matiere) {
                        console.error(`Matière avec ID ${matiereId} non trouvée dans les données.`);
                        continue;
                    }

                    const groupeId = formData.get(`groupes[${matiereId}]`);
                    const groupeNom = groupesContainer.querySelector(`select[name="groupes[${matiereId}]"] option[value="${groupeId}"]`).textContent;

                    const etudiantData = {
                        nom: formData.get('nom'),
                        prenom: formData.get('prenom'),
                        age: parseInt(formData.get('age')),
                        genre: formData.get('genre'),
                        matieres: [matiereId], // Utiliser l'ID de la matière
                        groups: `${matiere.nom}: ${groupeNom}`, // Utiliser la chaîne formatée pour les groupes
                    };

                    console.log('Données à envoyer à l\'API :', etudiantData);

                    try {
                        // Envoi des données à l'API pour ajouter l'étudiant
                        const response = await fetch(apiUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(etudiantData),
                        });

                        if (response.ok) {
                            showAlert('Étudiant ajouté avec succès.', 'success');
                            const responseData = await response.json(); // Récupérer la réponse de l'API
                            console.log('Réponse de l\'API :', responseData);
                        } else {
                            showAlert('Une erreur est survenue lors de l\'ajout de l\'étudiant.', 'error');
                        }
                    } catch (error) {
                        console.error('Erreur lors de l\'ajout de l\'étudiant:', error);
                        showAlert('Une erreur est survenue lors de l\'ajout de l\'étudiant.', 'error');
                    }
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
        </script>


    </x-app-layout>

</body>

</html>