
function confirmDelete(id) {
    document.getElementById('deleteForm-' + id).submit();
}

// Fonction pour afficher la modal
function showModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

// Fonction pour cacher la modal
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// Fonction pour confirmer la suppression
function confirmDelete() {
    // Placez ici le code pour effectuer la suppression de la base de données
    // Après avoir confirmé la suppression, vous pouvez fermer la modal
    closeModal();
}

document.addEventListener('DOMContentLoaded', function () {
    var champ1 = document.getElementById('matiere1');
    var champ2 = document.getElementById('groupe1');

    champ1.addEventListener('change', function () {
        var valeurChamp1 = champ1.value;

        // Supprimer les options actuelles de champ2
        champ2.innerHTML = '';

        // Ajouter de nouvelles options en fonction de la valeur de champ1
        if (valeurChamp1 === 'informatique') {
            champ2.appendChild(createOption('Groupe informatique A', 'Groupe informatique A'));
            champ2.appendChild(createOption('Groupe informatique B', 'Groupe informatique B'));
        } else if (valeurChamp1 === 'Patisserie') {
            champ2.appendChild(createOption('Groupe patisserie x', 'Groupe patisserie  X'));
            champ2.appendChild(createOption('Groupe patisserie Y', 'Groupe patisserie Y'));
        } else if (valeurChamp1 === 'cuisine') {
            champ2.appendChild(createOption('Groupe cuisine X', 'Groupe cuisine X'));
            champ2.appendChild(createOption('Groupe cuisine Y', 'Groupe cuisine Y'));
        } else if (valeurChamp1 === 'couture') {
            champ2.appendChild(createOption('Groupe couture X', 'Groupe couture X'));
            champ2.appendChild(createOption('Groupe couture Y', 'Groupe couture Y'));
        } else if (valeurChamp1 === 'Beauté esthétique') {
            champ2.appendChild(createOption('Groupe beauté esthétique X', 'Groupe beauté esthétique X'));
            champ2.appendChild(createOption('Groupe beauté esthétique Y', 'Groupe beauté esthétique Y'));
        } else if (valeurChamp1 === 'Coiffure homme') {
            champ2.appendChild(createOption('Groupe coiffure homme X', 'Groupe coiffure homme X'));
            champ2.appendChild(createOption('Groupe coiffure homme Y', 'Groupe coiffure homme Y'));
        } else if (valeurChamp1 === 'Coiffure femme') {
            champ2.appendChild(createOption('Groupe coiffure femme X', 'Groupe coiffure femme X'));
            champ2.appendChild(createOption('Groupe coiffure femme Y', 'Groupe coiffure femme Y'));
        } else {
            champ2.appendChild(createOption('choisir', 'Choisir'));
        }
    });

    // Fonction pour créer une option
    function createOption(value, text) {
        var option = document.createElement('option');
        option.value = value;
        option.text = text;
        return option;
    }
});



// Fonction pour effectuer un appel Fetch à une API et renvoyer les données JSON
function fetchAPI(url) {
    return fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error("La requête a échoué.");
            }
            return response.json();
        });
}

const matiere1 = document.getElementById('matiere1');
const professeur1 = document.getElementById('professeur1');

// Liste des URLs des API que vous souhaitez interroger
const apiUrlMatiere = "http://127.0.0.1:8000/api/matiere";
const apiUrlProf = "http://127.0.0.1:8000/api/prof";

// Utiliser la fonction fetchAPI pour récupérer les données de chaque API
const promiseMatiere = fetchAPI(apiUrlMatiere);
const promiseProf = fetchAPI(apiUrlProf);

// Utiliser Promise.all pour attendre que toutes les requêtes soient terminées
Promise.all([promiseMatiere, promiseProf])
    .then(dataArray => {
        // dataArray contient les données renvoyées par les deux API sous forme de tableau
        //console.log(dataArray[0])

        const dataFromMatiereAPI = dataArray[0].data;
        const dataFromProfAPI = dataArray[1].data;

        // Vous pouvez maintenant utiliser les données comme vous le souhaitez

        // Par exemple, afficher les noms de matières dans la liste déroulante "listeMatiere"
        dataFromMatiereAPI.forEach(matiere => {
            const option = document.createElement('option');
            option.value = matiere.nom; // Remplacez par le champ d'ID approprié
            option.textContent = matiere.nom; // Remplacez par le champ du nom de la matière
            matiere1.appendChild(option);
        });

        // Par exemple, afficher les noms de professeurs dans la liste déroulante "listeProf"
        dataFromProfAPI.forEach(prof => {
            const option = document.createElement('option');
            option.value = prof.id; // Remplacez par le champ d'ID approprié
            option.textContent = prof.nom; // Remplacez par le champ du nom du professeur
            professeur1.appendChild(option);
        });

        // Faites ce que vous devez faire avec les données ici
    })
    .catch(error => {
        console.error("Une erreur s'est produite lors de la récupération des données :", error);
    });


