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

            <div id="paiementForm" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-10 rounded shadow-lg">
                    <form id="matiereForm">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="date_payement">Date de Paiement :</label>
                            <input type="date" id="date_payement" name="date_payement" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="somme_payee_input">Somme Payée :</label>
                            <div class="flex">
                                <input type="number" id="somme_payee_input" name="somme_payee_input" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                <span class="ml-2 pt-2">Dh</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="reste">Reste :</label>
                            <div class="flex">
                                <input type="number" id="reste" name="reste" min="0" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                <span class="ml-2 pt-2">Dh</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <!-- Ajoutez l'attribut "hidden" pour masquer le champ -->
                            <input type="number" id="etudiant_id" name="etudiant_id" min="1" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" hidden>
                        </div>
                        <div class="flex justify-center space-x-4">
                            <button type="button" onclick="sendPaymentData()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">Envoyer</button>

                            <button type="button" onclick="closePaiementForm()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 cursor-pointer">Retour</button>
                        </div>
                    </form>
                </div>
            </div>


            <div id="studentDetails" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 overflow-x-auto">
                <div class="bg-white p-4 shadow-md rounded-lg mx-auto max-w-3xl relative">
                    <span class="close absolute top-0 right-0 mt-4 mr-4 text-gray-600 cursor-pointer" onclick="closeStudentDetails()">&times;</span>
                    <div class="flex flex-col items-center justify-between mb-4 pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-blue-500">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>

                        <h1 id="studentName" class="text-2xl text-center font-bold text-indigo-600"></h1>

                    </div>

                    <!-- Affichage des absences de l'étudiant -->
                    <h2 class="text-xl font-semibold text-gray-800 text-center my-2">Payments</h2>
                    <table class="mx-auto border-collapse border w-100 h-20 overflow-x-auto">
                        <thead class="">
                            <tr class="">
                                <th class=" bg-blue-300 ...">Date</th>
                                <th class="bg-blue-300 ...">Solder</th>
                                <th class="bg-blue-300 ...">Reste</th>
                                <th class="bg-blue-300 ...">Ajouter</th>
                            </tr>
                        </thead>
                        <tbody id="studentPayements">
                            <!-- Les lignes d'absences seront insérées ici dynamiquement -->
                        </tbody>
                    </table>

                    <!-- Bouton de validation -->
                    <div class="text-center mt-4">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" onclick="validatePayment()">Valider les modifications</button>
                    </div>
                </div>
            </div>



            <script>
                const apiUrlEtudiant = 'http://127.0.0.1:8000/api/etudiant';
                let data = []; // Ajoutez cette ligne pour définir la variable data globalement.
                let prix = {}; // Utilisez un objet pour stocker les données de tous les étudiants
                let paymentData = {};

                function listEtudiants() {
                    fetch(apiUrlEtudiant)
                        .then(response => response.json())
                        .then(result => {
                            data = result.data; // Mettez à jour la variable data avec les données récupérées.
                            displayEtudiantsData(data);
                            console.log(data);

                            // Exemple : Stocker les données de tous les étudiants dans la variable prix


                            data.forEach(etudiant => {
                                const etudiantId = etudiant.id;
                                const matierePrix = parseFloat(etudiant.matieres[0].prix);

                                prix[etudiantId] = matierePrix; // Utilisez l'ID de l'étudiant comme clé
                            });
                            console.log(prix);
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
                                                <th>Coût_Matières</th>
                                                <th>Groupes</th>
                                                <th>Etat de Pyement</th>
                                            `;

                    const tableBody = document.querySelector('#dataTable tbody');
                    tableBody.innerHTML = ''; // Réinitialiser le contenu du tableau

                    data.forEach(item => {

                        let matieres = item.matieres.map(matiere => matiere.nom).join(', ');
                        let prix_m = item.matieres.map(matiere => matiere.prix).join(', ');
                        const row = document.createElement('tr');
                        row.classList.add('bg-white', 'h-10');
                        row.innerHTML = `
                                            <td class="text-center border">${item.id}</td>
                                            <td class="text-center border">${item.nom}</td>
                                            <td class="text-center border">${item.prenom}</td>
                                            <td class="text-center border">${matieres}</td>
                                            <td class="text-center border">${prix_m ? prix_m : '00'} Dh</td>
                                            <td class="text-center border">${item.groups }</td>
                                            <td class="text-center border">
                                    <div class="flex items-center justify-center">
                                        <svg class="text-green-500 w-6 h-6" 
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            style="cursor: pointer;"
                                            onclick="openPaiementForm(${item.id})">
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

                                    </div>
                                </td>

                                        `;
                        tableBody.appendChild(row);
                    });

                }
                listEtudiants();
                console.log(prix);


                function fetchStudentPayments(studentId) {
                    // Remplacez l'URL par l'URL de l'API de paiement avec l'ID de l'étudiant
                    const apiUrlPayments = `http://127.0.0.1:8000/api/payement/${studentId}`;

                    fetch(apiUrlPayments)
                        .then(response => response.json())
                        .then(result => {
                            if (result.status_code === 200) {
                                // Les paiements de l'étudiant ont été récupérés avec succès
                                const studentPayments = result.data;

                                // Sélectionnez la tbody du tableau studentPayements
                                const studentPaymentsTableBody = document.getElementById('studentPayements');

                                // Réinitialisez le contenu du tableau
                                studentPaymentsTableBody.innerHTML = '';

                                // Parcourez les paiements de l'étudiant et ajoutez-les au tableau
                                studentPayments.forEach(payment => {
                                    const row = document.createElement('tr');
                                    row.classList.add('h-10');

                                    const paymentId = payment.id;
                                    // Calculez la somme entre payment.somme_payer et payment.reste
                                    const sommeTotal = parseFloat(payment.somme_payer) + parseFloat(payment.reste);

                                    row.innerHTML = `
                                        <td class="text-center border ">
                                          <span class="whitespace-nowrap text-blue-500">${payment.date_payement}</span>
                                        </td>
                                        <td class="text-center border ">
                                            <span class="whitespace-nowrap text-green-500">${payment.somme_payer} Dh</span>
                                        </td>
                                        <td class="text-center border ">
                                            <span class="whitespace-nowrap text-red-500">${payment.reste} Dh</span>
                                        </td>
                                      <td class="text-center border">
                                        <div class="relative">
                                            <input type="number" id="somme_payer_input_${paymentId}" class="w-20 pl-19"     
                                                data-payment-id="${payment.id}"
                                                style="background-image: url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2215%22%20height%3D%2215%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22currentColor%22%20class%3D%22w-15%20h-15%20absolute%20left-2%2F4%20top-2%2F4%20transform%20-translate-x-2%2F4%20-translate-y-2%2F4%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20d%3D%22M12%203.75a.75.75%200%2001.75.75v6.75h6.75a.75.75%200%2001%200%201.5h-6.75v6.75a.75.75%200%2001-1.5%200v-6.75H4.5a.75.75%200%2001%200-1.5h6.75V4.5a.75.75%200%2001.75-.75z%22%20clip-rule%3D%22evenodd%22%20%2F%3E%3C%2Fsvg%3E');
                                            background-repeat: no-repeat; background-position: left center;">
                                        </div> 
                                      </td>

                                    `;
                                    studentPaymentsTableBody.appendChild(row);

                                    const sommePayeeInput = document.getElementById(`somme_payer_input_${paymentId}`);
                                    sommePayeeInput.addEventListener('input', (event) => {
                                        const newInputValue = parseFloat(event.target.value);
                                        if (!isNaN(newInputValue)) {
                                            // Vérifiez si paymentId existe dans paymentData, sinon, initialisez-le comme un objet vide
                                            if (!paymentData[paymentId]) {
                                                paymentData[paymentId] = {};
                                            }
                                            const sommePayer = parseFloat(payment.somme_payer);
                                            paymentData[paymentId].inputValue = newInputValue + sommePayer;

                                            // Stockez également la somme totale dans paymentData
                                            paymentData[paymentId].sommeTotal = sommeTotal;

                                            const reste_x = sommeTotal - paymentData[paymentId].inputValue;
                                            // Assurez-vous que reste_x est au moins égal à 0
                                            paymentData[paymentId].reste_x = Math.max(0, reste_x);

                                        }
                                    });

                                });

                                // Affichez la div studentDetails (si elle n'est pas déjà affichée)
                                const studentDetails = document.getElementById('studentDetails');
                                studentDetails.classList.remove('hidden');
                            } else {
                                console.error('Erreur lors de la récupération des paiements de l\'étudiant:', result.status_message);
                            }
                        })
                        .catch(error => {
                            console.error('Erreur lors de la requête fetch:', error);
                        });
                }



                function validatePayment() {
                    console.log(paymentData);
                }








                function toggleStudentDetails(studentId) {
                    const studentDetails = document.getElementById('studentDetails');
                    const studentName = document.getElementById('studentName');

                    // Recherchez l'étudiant correspondant dans vos données
                    const etudiant = data.find(item => item.id === studentId);

                    if (etudiant) {
                        // Mettez à jour le nom de l'étudiant
                        studentName.textContent = `${etudiant.nom} ${etudiant.prenom}`;
                        // Vous pouvez également mettre à jour d'autres informations de l'étudiant ici
                    }
                    // Appel de la fonction pour récupérer les paiements de l'étudiant
                    fetchStudentPayments(studentId);
                    // Affichez la div studentDetails
                    studentDetails.classList.remove('hidden');
                }





                function sendPaymentData() {
                    // Récupérez les valeurs des champs du formulaire
                    const datePayement = document.getElementById('date_payement').value;
                    const sommePayer = document.getElementById('somme_payee_input').value;
                    const reste = document.getElementById('reste').value;
                    const etudiantId = document.getElementById('etudiant_id').value;


                    // Créez un objet contenant les données du formulaire
                    const paymentData = {
                        date_payement: datePayement,
                        somme_payer: sommePayer,
                        reste: reste,
                        etudiant_id: etudiantId,
                    };

                    // Vérifier si tous les champs sont remplis
                    if (Object.values(data).some(value => value === '' || value === null)) {
                        showAlert('Veuillez remplir tous les champs du formulaire.', 'error');
                        return;
                    }


                    // Options de la requête fetch
                    const requestOptions = {
                        method: 'POST', // Méthode HTTP POST pour créer une ressource
                        headers: {
                            'Content-Type': 'application/json', // Type de contenu JSON
                        },
                        body: JSON.stringify(paymentData), // Convertit l'objet en JSON
                    };

                    // URL de l'API pour créer un paiement
                    const apiUrlCreatePayment = 'http://127.0.0.1:8000/api/payement/create';

                    // Envoi de la requête fetch pour créer le paiement
                    fetch(apiUrlCreatePayment, requestOptions)
                        .then(response => response.json())
                        .then(data => {
                            console.log('Réponse de l\'API:', data);
                            // Réponse de l'API (peut contenir un message de succès ou d'erreur)
                            if (data.status_code === 200) {

                                console.log('Paiement créé avec succès:', data.message);
                                showAlert('Nouveau payement ajoutée avec succès!', 'success');


                            } else {

                                console.error('Erreur lors de la création du paiement:', data.error);
                                showAlert("Veuillez remplir tous les champs du formulaire. ", 'error')
                            }
                        })
                        .catch(error => {

                            console.error('Erreur lors de la requête fetch:', error);
                        });
                }


                function showAlert(message, type) {
                    // Créer un élément de div pour afficher l'alerte
                    const alertElement = document.createElement('div');
                    alertElement.textContent = message;
                    alertElement.classList.add('text-white', 'text-sm', 'px-4', 'py-2', 'rounded', 'mb-4');

                    // Ajouter des classes de style en fonction du type d'alerte
                    if (type === 'success') {
                        alertElement.classList.add('bg-green-500');
                    } else if (type === 'error') {
                        alertElement.classList.add('bg-red-500');
                    }

                    // Ajouter l'alerte avant le formulaire (ajuster le sélecteur si nécessaire)
                    const formElement = document.querySelector('#matiereForm');
                    formElement.parentElement.insertBefore(alertElement, formElement);

                    // Supprimer l'alerte après un certain délai (5 secondes dans cet exemple)
                    setTimeout(() => {
                        alertElement.remove();
                    }, 5000);
                }



                function openPaiementForm(studentId) {
                    const paiementForm = document.getElementById('paiementForm');
                    if (paiementForm.style.display === 'none') {
                        // Afficher le formulaire
                        paiementForm.style.display = 'block';

                        // Remplir le champ etudiant_id avec l'ID passé en argument
                        const idEtudiantField = document.getElementById('etudiant_id');
                        idEtudiantField.value = studentId;

                        // Récupérer les champs d'entrée
                        const sommePayeeInput = document.getElementById('somme_payee_input');
                        const resteField = document.getElementById('reste');

                        // Vérifier si l'ID de l'étudiant existe dans l'objet prix
                        if (studentId in prix) {
                            // Récupérer le prix associé à l'ID de l'étudiant
                            const prixEtudiant = prix[studentId];

                            // Écouter les changements de la somme payée par l'utilisateur
                            sommePayeeInput.addEventListener('input', () => {
                                // Récupérer la valeur de la somme payée entrée par l'utilisateur
                                const sommePayee = parseFloat(sommePayeeInput.value);

                                // Vérifier si la somme payée est un nombre valide
                                if (!isNaN(sommePayee)) {
                                    // Calculer le reste
                                    const reste = prixEtudiant - sommePayee;
                                    resteField.value = reste >= 0 ? reste : 0; // Assurez-vous que le reste est positif ou zéro
                                } else {
                                    // Si la somme payée n'est pas un nombre valide, laissez le champ reste vide
                                    resteField.value = '';
                                }
                            });
                        } else {
                            // Si l'ID de l'étudiant n'existe pas dans l'objet prix, laissez le champ reste vide
                            resteField.value = '';
                        }
                    } else {
                        paiementForm.style.display = 'none';
                    }
                }


                function closeStudentDetails() {
                    const studentDetails = document.getElementById('studentDetails');
                    studentDetails.classList.add('hidden');
                }


                function closePaiementForm() {
                    const paiementForm = document.getElementById('paiementForm');
                    paiementForm.style.display = 'none';
                }
            </script>

    </x-app-layout>

</body>

</html>