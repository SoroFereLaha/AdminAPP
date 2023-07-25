<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emploi du temps etudiant') }}
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
            <table class="border-separate border-spacing-2 border border-slate-500 ...">
                <thead>
                    <tr>
                        <th></th>
                        <th class="border border-slate-600 ...">Heure debut</th>
                        <th class="border border-slate-600 ...">Heure fin</th>
                        <th class="border border-slate-600 ...">Salle</th>
                        <th class="border border-slate-600 ...">Professeur</th>
                        <th class="border border-slate-600 ...">Matiere</th>
                        <th class="border border-slate-600 ...">Information a savoir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-700 ...">Lundi</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 ...">Mardi</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 ...">Mercredi</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 ...">Jeudi</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 ...">Vendredi</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 ...">Samedi</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 ...">Dimanche</td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <input type="time" name="start_time" class="">
                            
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option class="" selected>choisir</option>
                                <option value="">Salle num A</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num B</option>
                                <option value="">Salle num A</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected>choisir</option>
                                <option value="">Professeur 1</option>
                                <option value="">Professeur 2</option>
                                <option value="">Professeur 3</option>
                                <option value="">Professeur 4</option>
                            </select>
                        </td>
                        <td class="border border-slate-700 ...">
                            <select id="" class=" border border-slate-700 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500">
                                <option selected class="">choisir</option>
                                <option value="">informatique</option>
                                <option value="">Patisserie</option>
                                <option value="">Cuisine</option>
                                <option value="">Couture</option>
                                <option value="">Beauté esthétique</option>
                                <option value="">Coiffure homme</option>
                                <option value="">Coiffure femme</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_time" class="w-60">
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 my-5 w-full text-center mr-2 mb-2">Envoyer</button>
        </div>
    </div>
</x-app-layout>
