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


                <div class="container mx-auto p-4">
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="relative text-gray-600">
                            <input type="search" name="search" placeholder="Rechercher un etudint..." class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
                            <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="motion-safe:hover:scale-110 hover:text-blue-500 w-6 h-6">
                                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

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

            </div>

            <!-- HTML du formulaire modal -->
            <div id="myModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-10 rounded shadow-lg">
                    <span class="close absolute top-0 right-0 mt-4 mr-4 text-gray-600 cursor-pointer" onclick="closeModal()">&times;</span>
                    <form id="absenceForm">
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 font-bold mb-2">Date :</label>
                            <input type="date" id="date" name="date" class="border border-gray-300 rounded-md px-5 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
                            <input type="text" id="description" name="description" maxlength="50" class="border border-gray-300 rounded-md px-5 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <div class="mb-4">
                            <label for="etudiant_id" class="block text-gray-700 font-bold mb-2"></label>
                            <input type="hidden" id="etudiant_id" name="etudiant_id" class="border border-gray-300 rounded-md px-5 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="mb-4">
                            <label for="error-message" class="block text-red-500 font-bold mb-2"></label>
                            <div id="error-message" class="text-red-500 font-bold"></div>
                        </div>

                        <div class="flex justify-center space-x-4">
                            <button type="button" onclick="submitForm()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer">Soumettre</button>
                            <button type="button" onclick="closeModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 cursor-pointer">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>



            <!-- les alertes-->
            <div id="success-alert" class="hidden fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-green-500 text-white text-sm px-4 py-2 rounded animate-fade-in">
                    <strong class="font-bold">Succès !</strong>
                    <span id="success-message"></span>
                </div>
            </div>

            <div id="error-alert" class="hidden fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-red-500 text-white text-sm px-4 py-2 rounded animate-fade-in">
                    <strong class="font-bold">Erreur ! date requise</strong>
                    <span id="error-message"></span>
                </div>
            </div>



            <div id="studentDetails" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 overflow-x-auto">
                <div class="bg-white p-4 shadow-md rounded-lg mx-auto max-w-xl relative">
                    <span class="close absolute top-0 right-0 mt-4 mr-4 text-gray-600 cursor-pointer" onclick=" toggleStudentDetails()">&times;</span>
                    <div class="flex flex-col items-center justify-between mb-4 pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-blue-500">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>

                        <h1 id="studentName" class="text-2xl text-center font-bold text-indigo-600"></h1>

                    </div>

                    <!-- Affichage des absences de l'étudiant -->
                    <h2 class="text-xl font-semibold text-gray-800 text-center my-2">Absences</h2>
                    <table class="mx-auto border-collapse border w-60 h-20 overflow-x-auto">
                        <thead class="">
                            <tr>
                                <th class="bg-blue-300 ...">Date</th>
                                <th class="bg-blue-300 ...">Description</th>
                                <th class="bg-blue-300 ...">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody id="studentAbsences">
                            <!-- Les lignes d'absences seront insérées ici dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>






            <script>
                const apiUrlEtudiant = 'http://127.0.0.1:8000/api/etudiant';
                let data = []; // Ajoutez cette ligne pour définir la variable data globalement.

                function nombreDabsencesPourCetEtudiant(studentId) {
                    const etudiant = data.find(item => item.id === studentId);
                    if (etudiant && etudiant.absences) {
                        return etudiant.absences.length;
                    } else {
                        return 0;
                    }
                }

                function listEtudiants() {
                    fetch(apiUrlEtudiant)
                        .then(response => response.json())
                        .then(result => {
                            data = result.data; // Mettez à jour la variable data avec les données récupérées.
                            displayEtudiantsData(data);
                            console.log(data);

                        })
                        .catch(error => {
                            console.error('Erreur lors de la récupération des données des étudiants:', error);
                        });
                }


                const searchBar = document.querySelector('input[name="search"]');
                searchBar.addEventListener('input', filterEtudiants);

                function filterEtudiants() {
                    const searchTerm = searchBar.value.toLowerCase();
                    const filteredData = data.filter(item =>
                        item.nom.toLowerCase().includes(searchTerm) || // Vérifie le nom
                        item.prenom.toLowerCase().includes(searchTerm) // Vérifie le prénom
                    );
                    displayEtudiantsData(filteredData);
                }


                function displayEtudiantsData(data) {
                    // Ajouter les en-têtes spécifiques aux étudiants
                    const tableHeader = document.querySelector('#tableHeader');
                    tableHeader.innerHTML = `
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Matières</th>
                                                <th>Groupes</th>
                                                <th>Absences</th>
                                            `;

                    const tableBody = document.querySelector('#dataTable tbody');
                    tableBody.innerHTML = ''; // Réinitialiser le contenu du tableau

                    data.forEach(item => {
                        let matieres = item.matieres.map(matiere => matiere.nom).join(', ');
                        const row = document.createElement('tr');
                        row.classList.add('bg-white', 'h-10');
                        row.innerHTML = `
                                            <td class="text-center border">${item.id}</td>
                                            <td class="text-center border">${item.nom}</td>
                                            <td class="text-center border">${item.prenom}</td>
                                            <td class="text-center border">${matieres}</td>
                                            <td class="text-center border">${item.groups }</td>
                                            <td class="text-center border">
                                    <div class="flex items-center justify-center">
                                        <svg class="text-green-500 w-6 h-6 " onclick="openModalWithStudentId(${item.id})" 
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            style="cursor: pointer;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <svg class="text-blue-500 mx-5 w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            onclick="toggleStudentDetails(${item.id})"
                                            style="cursor: pointer;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>

                                       <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-500 dark:text-red-300 absence-count" data-etudiant-id="${item.id}">${nombreDabsencesPourCetEtudiant(item.id)}</span>

                                    </div>
                                </td>

                                        `;
                        tableBody.appendChild(row);
                    });

                }
                listEtudiants();





                // Fonction pour supprimer une absence par ID
                function deleteAbsence(absenceId) {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch(`http://127.0.0.1:8000/api/absence/${absenceId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json',
                            }
                        })

                        .then(response => {
                            if (!response.ok) {
                                throw new Error('La suppression des absence a échoué.');
                            }
                        })
                        .catch(error => {
                            toggleStudentDetails(1)
                            console.error('Erreur lors de la suppression du professeur :', error);
                            // Gérer l'erreur si nécessaire
                        });
                }



                function toggleStudentDetails(studentId) {
                    const studentDetails = document.getElementById('studentDetails');
                    const studentAbsencesTable = document.getElementById('studentAbsences');

                    if (studentDetails.classList.contains('hidden')) {
                        // Mettez à jour le nom et le prénom de l'étudiant dans les détails de l'étudiant
                        const etudiant = data.find(item => item.id === studentId);
                        if (etudiant) {
                            const studentName = document.getElementById('studentName');
                            studentName.textContent = `${etudiant.nom} ${etudiant.prenom}`;
                        }
                        // Effectuez une requête GET pour récupérer les absences de l'étudiant
                        fetch(`http://127.0.0.1:8000/api/absence/${studentId}`)
                            .then(response => response.json())
                            .then(result => {
                                // Vérifiez si la réponse de l'API contient des données d'absence
                                if (result.data && result.data.length > 0) {
                                    // Remplissez le tableau studentAbsences avec les données récupérées
                                    studentAbsencesTable.innerHTML = ''; // Réinitialisez le contenu du tableau
                                    result.data.forEach(absence => {
                                        const row = document.createElement('tr');
                                        row.innerHTML = `
                            <td class="bg-blue-100 text-center border overflow-ellipsis...">
                                <span style="white-space: nowrap;">${absence.date}</span>
                            </td>
                            <td class="bg-blue-100 text-center border overflow-ellipsis...">
                                <span style="white-space: nowrap;">
                                    ${absence.description !== null ? absence.description : 'vide'}
                                </span>
                            </td>

                            <td class="bg-blue-100 text-center border overflow-ellipsis...">
                                <div class="flex justify-center items-center">
                                   <svg class="text-red-500 w-5 h-5 delete-student"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            onclick="deleteAbsence(${absence.id})"
                                            style="cursor: pointer;">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                </div>
                            </td>
                        `;
                                        studentAbsencesTable.appendChild(row);
                                    });


                                } else {
                                    // Si l'étudiant n'a pas d'absences, affichez un message vide
                                    studentAbsencesTable.innerHTML = '<tr><td colspan="2"><span style="white-space: nowrap;">Aucune absence enregistrée.</span></td></tr>';

                                }

                                // Affichez les détails de l'étudiant
                                studentDetails.classList.remove('hidden');
                            })
                            .catch(error => {
                                console.error('Erreur lors de la récupération des absences de l\'étudiant:', error);
                                // Affichez un message d'erreur si la récupération des absences échoue
                                studentAbsencesTable.innerHTML = '<tr><td colspan="2">Erreur lors de la récupération des absences.</td></tr>';
                            });
                    } else {
                        // Sinon, masquez-les
                        studentDetails.classList.add('hidden');
                    }
                }





                function openModalWithStudentId(studentId) {
                    const modal = document.getElementById('myModal');
                    const etudiantIdInput = document.getElementById('etudiant_id');

                    // Remplissez le champ etudiant_id avec l'ID de l'étudiant
                    etudiantIdInput.value = studentId;

                    modal.style.display = 'block';
                }


                // Fonction pour fermer le formulaire modal
                function closeModal() {
                    const modal = document.getElementById('myModal');
                    modal.style.display = 'none';
                }

                function hideAlert(alertId) {
                    const alert = document.getElementById(alertId);
                    alert.classList.add('hidden');
                }

                // Masquer automatiquement les alertes après 3 secondes
                setTimeout(() => {
                    hideAlert('success-alert');
                    hideAlert('error-alert');
                }, 3000);


                function showSuccessAlert(message) {
                    const successAlert = document.getElementById('success-alert');
                    const successMessage = document.getElementById('success-message');
                    successMessage.textContent = message;
                    successAlert.classList.remove('hidden');

                    // Masquer automatiquement l'alerte après 3 secondes
                    setTimeout(() => {
                        hideAlert('success-alert');
                    }, 3000);
                }

                function showErrorAlert(message) {
                    const errorMessageElement = document.getElementById('error-message');
                    errorMessageElement.textContent = message;

                    // Affichez l'alerte d'erreur
                    const errorAlert = document.getElementById('error-alert');
                    errorAlert.classList.remove('hidden');

                    // Masquez automatiquement l'alerte après 3 secondes
                    setTimeout(() => {
                        hideAlert('error-alert');
                        errorMessageElement.textContent = ''; // Effacez le message d'erreur
                    }, 3000);
                }


                function submitForm() {
                    const date = document.getElementById('date').value;
                    const description = document.getElementById('description').value;
                    const etudiantId = document.getElementById('etudiant_id').value;

                    // Créez un objet représentant les données du formulaire
                    const formData = {
                        date: date,
                        description: description,
                        etudiant_id: etudiantId
                    };

                    // Effectuez une requête POST pour envoyer les données au serveur
                    fetch('http://127.0.0.1:8000/api/absence/create', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(formData),
                        })
                        .then(response => response.json())
                        .then(result => {
                            // Vous pouvez gérer la réponse du serveur ici
                            console.log(result);
                            listEtudiants();

                            if (result.status_code === 200) {
                                // En cas de succès, afficher une alerte de succès
                                showSuccessAlert('Absence enregistrée avec succès.');
                                closeModal(); // Fermez le formulaire modal après l'envoi des données
                            } else {
                                // En cas d'erreur, afficher une alerte d'erreur avec le message d'erreur du serveur
                                showErrorAlert('');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur lors de l\'envoi des données:', error);
                            showErrorAlert('Une erreur s\'est produite lors de l\'envoi des données.');
                        });
                }
            </script>

    </x-app-layout>

</body>

</html>