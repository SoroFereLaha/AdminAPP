<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emploi du temps etudiant') }}
        </h2>
    </x-slot>

    <div class="pt-12 flex" x-data="{dropDownOpen:false}">
        @can('edit-users')
        <div class="sidbar-container w-1/5">
            <x-sidebar>
            </x-sidebar>
        </div>
        @endcan
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-4/5">

            @if (session('status'))

                <div class="mx-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}.
                </div>

            @endif

            @foreach ($errors->all() as $error)
                
                <div class="mx-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
                
            @endforeach

            <div class="container mx-auto p-4">
                <form action="{{ route('view_timetable') }}" method="POST" class="bg-white shadow-md rounded-lg p-4">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-4">Ajouter emploi du temps etudiant</h2>
                    <div class="grid grid-cols-7 gap-4">
                        <div class="col-span-1">
                        <label for="jour" class="block font-medium">Jour</label>
                        <select id="jour" name="jour" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                            <option value="choisir">Choisir</option>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                            <option value="Vendredi">Vendredi</option>
                            <option value="Samedi">Samedi</option>
                            <option value="Dimanche">Dimanche</option>
                        </select>
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
                            <label for="professeur1" class="block font-medium">Professeur</label>
                            <input type="text" id="professeur1" name="professeur" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-1">
                            <label for="matiere1" class="block font-medium">Matière</label>
                            <input type="text" id="matiere1" name="matiere" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-1">
                            <label for="groupe1" class="block font-medium">Groupe</label>
                            <select id="groupe1" name="groupe" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                                <option value="choisir">Choisir</option>
                                <option value="groupe 1">Groupe 1</option>
                                <option value="groupe 2">Groupe 2</option>
                                <option value="groupe 3">Groupe 3</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="information1" class="block font-medium">Information</label>
                            <input type="text" id="information1" name="information" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>
                    <!-- Répétez les lignes ci-dessus pour les jours 2 à 7 -->
                    </div>
                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Soumettre</button>
                </form>
            </div>

            <button type="submit" class=" ml-4 px-4 py-2 bg-gray-200 text-black font-bold rounded-md hover:bg-white group transition duration-300" @click="dropDownOpen=!dropDownOpen" >Voir emploi du temps
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-blue-500"></span>
            </button>
            
            <div class="container mx-auto p-4" :class="{'hidden':!dropDownOpen,'block':dropDownOpen}">
                @if(isset($studentTimetables) && count($studentTimetables) > 0)


                <h1 class="text-2xl font-bold mb-4">Emploi du temps des 7 derniers jours</h1>
        
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border border-gray-400 px-4 py-2">Jour</th>
                            <th class="border border-gray-400 px-4 py-2">Heure début</th>
                            <th class="border border-gray-400 px-4 py-2">Heure fin</th>
                            <th class="border border-gray-400 px-4 py-2">Salle</th>
                            <th class="border border-gray-400 px-4 py-2">Professeur</th>
                            <th class="border border-gray-400 px-4 py-2">Matière</th>
                            <th class="border border-gray-400 px-4 py-2">Information</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        @foreach ($studentTimetables as $studentTimetable)

                            <tr>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->jour }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->heure_debut }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->heure_fin }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->salle }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->professeur }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->matiere }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->information }}</td>
                            </tr>
                            
                        @endforeach
                        
                    </tbody>
                    @else
                            <p>Aucune emploi du temps trouvée pour les etudiants.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
