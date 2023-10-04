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
                {{ __(' Administration ') }}
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
                        TABLEAU DE BORDS > <span class="text-indigo-400">Service Administration</span>
                    </p>
                </div>


                <div id="messageDiv" class="mx-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 hidden" role="alert">
                    <!-- Le message de succès sera inséré ici -->
                </div>


                <div id="erreurDiv" class="mx-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-3 rounded relative hidden" role="alert">
                    <span class="block sm:inline"></span>
                </div>



                <div class="container mx-auto p-4">
                    <form id="examenForm" class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-2xl font-semibold mb-4">Programmer un Examen</h2>
                        <div class="grid grid-cols-7 gap-4">
                            <div class="col-span-1">
                                <label for="date" class="block font-medium">Date</label>
                                <input type="date" id="date" name="date" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-1">
                                <label for="heure_debut1" class="block font-medium">Heure début</label>
                                <input type="time" id="heure_debut1" name="heure_debut" step="" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-1">
                                <label for="heure_fin1" class="block font-medium">Heure fin</label>
                                <input type="time" id="heure_fin1" name="heure_fin" step="" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-1">
                                <label for="salle1" class="block font-medium">Salle</label>
                                <input type="text" id="salle1" name="salle" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-1">
                                <label for="matiere" class="block font-medium">Matière</label>
                                <select id="matiere" name="matiere" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                                    <option value="" disabled selected>Choisir</option>
                                    <!-- Les options seront générées dynamiquement ici -->
                                </select>
                            </div>

                            <div class="col-span-1">
                                <label for="groupe1" class="block font-medium">Groupe</label>
                                <select id="groupe1" name="groupe" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                                    <option value="" disabled selected>Choisir</option>
                                    <!-- Les options de groupe seront générées dynamiquement ici -->
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="information1" class="block font-medium">Information</label>
                                <input type="text" id="information1" name="information" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            </div>
                        </div>
                        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Soumettre</button>
                    </form>
                </div>

                <button id="toggleExamensBtn" class="ml-4 px-4 py-2 bg-gray-200 text-black font-bold rounded-md hover:bg-white group transition duration-300">
                    Voir les examens Programmer
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-blue-500"></span>
                </button>


                <div id="examensDiv" class="container mx-auto p-2 hidden">
                    <h1 class="text-2xl font-bold mb-4">Les Examents Programmer</h1>
                    <div style="overflow-x: auto;">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 px-4 py-2">Date</th>
                                    <th class="border border-gray-400 px-4 py-2">Heure début</th>
                                    <th class="border border-gray-400 px-4 py-2">Heure fin</th>
                                    <th class="border border-gray-400 px-4 py-2">Salle</th>
                                    <th class="border border-gray-400 px-4 py-2">Matière</th>
                                    <th class="border border-gray-400 px-4 py-2">Groupes</th>
                                    <th class="border border-gray-400 px-4 py-2">Information</th>
                                </tr>
                            </thead>
                            <tbody id="examensTableBody">
                                <!-- Lignes de données examen seront ajoutées ici -->
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination mt-4">
                        <button id="prevPageBtn" disabled class="px-4 py-2 rounded-l-lg bg-blue-500 text-white transition-transform transform hover:bg-blue-700 hover:shadow-md">Précédent</button>
                        <button id="nextPageBtn" class="px-4 py-2 rounded-r-lg bg-blue-500 text-white transition-transform transform hover:bg-blue-700 hover:shadow-md">Suivant</button>
                        <span id="currentPage" class="ml-2 text-gray-600">Page 1</span>
                    </div>

                </div>

                <div id="confirmationDialog" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <p class="text-xl font-semibold mb-4">Voulez-vous vraiment supprimer cet examen ?</p>
                        <div class="flex justify-end">
                            <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white hover:bg-red-600 rounded-md mr-2">Supprimer</button>
                            <button id="cancelDelete" class="px-4 py-2 bg-gray-400 text-white hover:bg-gray-500 rounded-md">Annuler</button>
                        </div>
                    </div>
                </div>

            </div>


        </div>




        </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Effectuez une requête GET vers l'API pour obtenir la liste des matières
                fetch('http://127.0.0.1:8000/api/matiere')
                    .then(response => response.json())
                    .then(data => {
                        const matiereSelect = document.getElementById('matiere');

                        // Parcourez les données et ajoutez chaque matière en tant qu'option
                        data.data.forEach(matiere => {
                            const option = document.createElement('option');
                            option.value = matiere.id; // Utilisez le nom de la matière comme valeur
                            option.textContent = matiere.nom; // Utilisez le nom de la matière comme texte de l'option
                            option.setAttribute('data-matiere-id', matiere.id);
                            matiereSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Erreur lors de la récupération des matières', error));

                // Lorsqu'une nouvelle matière est sélectionnée
                const matiereSelect = document.getElementById('matiere');
                const groupeSelect = document.getElementById('groupe1');

                matiereSelect.addEventListener('change', function() {
                    const selectedMatiereOption = this.options[this.selectedIndex];
                    const selectedMatiereId = selectedMatiereOption.getAttribute('data-matiere-id');

                    // Effectuer une requête AJAX pour obtenir les groupes associés à la matière
                    fetch(`http://127.0.0.1:8000/api/matiere/${selectedMatiereId}/groupes`)
                        .then(response => response.json())
                        .then(data => {
                            // Supprimer toutes les options actuelles du champ "Groupe"
                            groupeSelect.innerHTML = '';

                            // Ajouter les options de groupe récupérées depuis l'API
                            data.data.forEach(groupe => {
                                const option = document.createElement('option');
                                option.value = groupe.nom_group;
                                option.textContent = groupe.nom_group;
                                groupeSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Erreur lors de la récupération des groupes', error));
                });
            });


            document.addEventListener('DOMContentLoaded', function() {
                const examenForm = document.getElementById('examenForm');

                examenForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Empêche le comportement de soumission par défaut du formulaire

                    // Récupérez les valeurs des champs de formulaire
                    const date = document.getElementById('date').value;
                    const heureDebut = document.getElementById('heure_debut1').value;
                    const heureFin = document.getElementById('heure_fin1').value;
                    const salle = document.getElementById('salle1').value;
                    const matiereId = document.getElementById('matiere').value;
                    const groupe = document.getElementById('groupe1').value;
                    const information = document.getElementById('information1').value;

                    // Créez un objet JavaScript contenant les données de l'examen
                    const examenData = {
                        date: date,
                        heure_debut: heureDebut,
                        heure_fin: heureFin,
                        Salle: salle,
                        matiere_id: matiereId,
                        groupe: groupe,
                        info: information
                    };

                    // Effectuez une requête POST vers votre API
                    fetch('http://127.0.0.1:8000/api/examens/create', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(examenData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status_code === 201) {
                                // Traitement pour le succès
                                console.log('Examen ajouté avec succès', data);
                                fetchDataAndDisplay();

                                // Insérez le message de succès dans la div
                                const messageDiv = document.getElementById('messageDiv');
                                messageDiv.textContent = 'Examen ajouté avec succès'; // Remplacez ceci par le contenu du message réel

                                // Supprimez la classe "hidden" pour afficher la div
                                messageDiv.classList.remove('hidden');

                                // Utilisez setTimeout pour masquer la div après 3 secondes
                                setTimeout(() => {
                                    messageDiv.classList.add('hidden');
                                }, 5000); // 3000 millisecondes (3 secondes)
                            } else {
                                // Traitement en cas d'erreur
                                const erreurDiv = document.getElementById('erreurDiv');
                                erreurDiv.textContent = data.status_message;
                                erreurDiv.classList.remove('hidden');

                                setTimeout(() => {
                                    erreurDiv.classList.add('hidden');
                                }, 5000);
                            }
                        })
                        .catch(error => {
                            // Gérez les erreurs ici (par exemple, affichez un message d'erreur)
                            console.error('Erreur lors de l\'ajout de l\'examen', error);
                            consol.log(data);
                        });
                });


                const examensPerPage = 7; // Nombre d'examens par page
                let currentPage = 1; // Page actuelle, commence à 1

                const prevPageBtn = document.getElementById('prevPageBtn');
                const nextPageBtn = document.getElementById('nextPageBtn');
                const currentPageSpan = document.getElementById('currentPage');

                // Fonction pour mettre à jour l'affichage du tableau en fonction de la page actuelle
                function afficherPage(page) {
                    const startIdx = (page - 1) * examensPerPage;
                    const endIdx = startIdx + examensPerPage;
                    const examens = data.data.slice(startIdx, endIdx);

                    const examensTableBody = document.getElementById('examensTableBody');
                    examensTableBody.innerHTML = '';

                    examens.forEach(examen => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                <td class="border border-gray-400 px-4 py-2">${examen.date}</td>
                <td class="border border-gray-400 px-4 py-2">${examen.heure_debut}</td>
                <td class="border border-gray-400 px-4 py-2">${examen.heure_fin}</td>
                <td class="border border-gray-400 px-4 py-2">${examen.Salle}</td>
                <td class="border border-gray-400 px-4 py-2">${examen.nom_matiere}</td>
                <td class="border border-gray-400 px-4 py-2">${examen.groupe}</td>
                <td class="border border-gray-400 px-4 py-2">${examen.info ? examen.info : ''}</td>
                <td class="px-4 py-2" data-examen-id="${examen.id}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  delete-examen-svg cursor-pointer hover:text-red-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </td>


            `;
                        examensTableBody.appendChild(row);
                    });

                    currentPageSpan.textContent = `Page ${page}`;
                }

                // Fonction pour activer/désactiver les boutons "Précédent" et "Suivant" en fonction de la page actuelle
                function updatePaginationButtons() {
                    if (currentPage === 1) {
                        prevPageBtn.disabled = true;
                    } else {
                        prevPageBtn.disabled = false;
                    }

                    if (currentPage * examensPerPage >= data.data.length) {
                        nextPageBtn.disabled = true;
                    } else {
                        nextPageBtn.disabled = false;
                    }
                }

                // Chargement initial des données
                let data;

                function fetchDataAndDisplay() {
                    fetch('http://127.0.0.1:8000/api/examens')
                        .then(response => response.json())
                        .then(dataResponse => {
                            data = dataResponse;
                            afficherPage(currentPage);
                            updatePaginationButtons();
                        })
                        .catch(error => console.error('Erreur lors de la récupération des examens', error));
                }

                // Gestion du clic sur le bouton "Suivant"
                nextPageBtn.addEventListener('click', () => {
                    if (currentPage * examensPerPage < data.data.length) {
                        currentPage++;
                        afficherPage(currentPage);
                        updatePaginationButtons();
                    }
                });

                // Gestion du clic sur le bouton "Précédent"
                prevPageBtn.addEventListener('click', () => {
                    if (currentPage > 1) {
                        currentPage--;
                        afficherPage(currentPage);
                        updatePaginationButtons();
                    }
                });

                // Appelez la fonction pour charger les données au chargement de la page
                fetchDataAndDisplay();

                const examensDiv = document.getElementById('examensDiv');
                const toggleExamensBtn = document.getElementById('toggleExamensBtn');

                // Gestion du clic sur le bouton pour afficher/masquer la div
                toggleExamensBtn.addEventListener('click', function() {
                    if (examensDiv.classList.contains('hidden')) {
                        // Si la div est actuellement masquée, la montrer

                        examensDiv.classList.remove('hidden');
                        fetchDataAndDisplay();
                    } else {
                        // Si la div est actuellement visible, la masquer
                        examensDiv.classList.add('hidden');
                    }
                });


                // Gestion du clic sur la lien SVG pour supprimer l'examen
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('delete-examen-svg')) {
                        event.preventDefault(); // Empêche le comportement de lien par défaut
                        const row = event.target.closest('td');
                        const examenId = row.dataset.examenId; // Récupérez l'ID de l'examen à partir de l'attribut data-examen-id

                        // Afficher la boîte de confirmation
                        const confirmationDialog = document.getElementById('confirmationDialog');
                        confirmationDialog.classList.remove('hidden');

                        // Gestion du clic sur le bouton "Supprimer" dans la boîte de confirmation
                        const confirmDeleteBtn = document.getElementById('confirmDelete');
                        confirmDeleteBtn.addEventListener('click', function() {
                            // Effectuez la requête DELETE vers l'API en utilisant l'ID de l'examen
                            fetch(`http://127.0.0.1:8000/api/examens/${examenId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status_code === 200) {
                                        // Suppression réussie
                                        console.log('Examen supprimé avec succès', data);

                                        // Mettez à jour l'affichage (rechargez les données, etc.)
                                        fetchDataAndDisplay();
                                    } else {
                                        // Gestion des erreurs si la suppression échoue
                                        console.error('Erreur lors de la suppression de l\'examen', data);
                                    }
                                })
                                .catch(error => {
                                    // Gestion des erreurs réseau
                                    console.error('Erreur lors de la suppression de l\'examen', error);
                                });

                            // Masquer la boîte de confirmation
                            confirmationDialog.classList.add('hidden');
                        });

                        // Gestion du clic sur le bouton "Annuler" dans la boîte de confirmation
                        const cancelDeleteBtn = document.getElementById('cancelDelete');
                        cancelDeleteBtn.addEventListener('click', function() {
                            // Masquer la boîte de confirmation
                            confirmationDialog.classList.add('hidden');
                        });
                    }
                });




            });
        </script>




    </x-app-layout>

</body>

</html>