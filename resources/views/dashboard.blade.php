<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12 flex">
        @can('edit-users')
        <div class="sidbar-container w-1/5">
            <x-sidebar>
            </x-sidebar>
        </div>
        @endcan

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-4/5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Coucou {{Auth::user()->name}} {{ __("vous êtes connecté!") }}
                </div>
            </div>

            <div class="my-6">
                <!-- Emploi du temps des professeurs -->
                @can('isProfesseur')
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(isset($teacherTimetables) && count($teacherTimetables) > 0)
                        <h1 class="text-2xl font-bold mb-4">Emploi du temps des professeurs</h1>
                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 px-4 py-2">Jour</th>
                                    <th class="border border-gray-400 px-4 py-2">Heure début</th>
                                    <th class="border border-gray-400 px-4 py-2">Heure fin</th>
                                    <th class="border border-gray-400 px-4 py-2">salle</th>
                                    <th class="border border-gray-400 px-4 py-2">matiere</th>
                                    <!-- Ajoutez les autres colonnes du tableau ici -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teacherTimetables as $teacherTimetable)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $teacherTimetable->jour }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $teacherTimetable->heure_debut }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $teacherTimetable->heure_fin }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $teacherTimetable->salle }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $teacherTimetable->matiere }}</td>
                                        <!-- Ajoutez les autres colonnes du tableau ici -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Aucun emploi du temps trouvé pour les professeurs.</p>
                    @endif
                </div>
                @endcan
            </div>

            <div class="my-6">
                <!-- Emploi du temps des étudiants -->
                @can('isEtudiant')
                    
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(isset($studentTimetables) && count($studentTimetables) > 0)
                        <h1 class="text-2xl font-bold mb-4">Emploi du temps des étudiants</h1>
                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 px-4 py-2">Jour</th>
                                    <th class="border border-gray-400 px-4 py-2">Heure début</th>
                                    <th class="border border-gray-400 px-4 py-2">Heure fin</th>
                                    <th class="border border-gray-400 px-4 py-2">Salle</th>
                                    <th class="border border-gray-400 px-4 py-2">Matiere</th>
                                    <th class="border border-gray-400 px-4 py-2">Information</th>
                                    <!-- Ajoutez les autres colonnes du tableau ici -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentTimetables as $studentTimetable)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->jour }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->heure_debut }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->heure_fin }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->salle }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->matiere }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $studentTimetable->information }}</td>
                                        <!-- Ajoutez les autres colonnes du tableau ici -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Aucun emploi du temps trouvé pour les étudiants.</p>
                    @endif
                </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
