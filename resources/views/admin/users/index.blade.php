<link rel="stylesheet" href="{{ asset('css/voir.css') }}">
<x-app-layout>

        <x-slot name="header">
            @can('edit-users')
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __(' Listes des utilisateurs ') }}
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
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 w-4/5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium ">
                                        <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Nom</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th scope="col" class="px-6 py-4">Rôle</th>
                                        <!--seul l'admin peut delete-user donc lui seul verra ca-->
                                        @can('delete-users')
                                        <th scope="col" class="px-6 py-4">Action</th>
                                        @endcan
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($users as $user)
                                    
                                        <tr class="border-b dark:border-neutral-500">
                                            <th class="whitespace-nowrap px-6 py-4 font-medium">{{$user->id}}</th>
                                            <td class="whitespace-nowrap px-6 py-4">{{$user->name}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$user->email}}</td>
                                            <!--il n'a pas de role dans la table users c'est plutot dans la table roles or la varibale roles n'est pas defini dans le controller il me faut cree un RolesController comme pour le UsersController-->
                                            <td class="whitespace-nowrap px-6 py-4">    
                                                @foreach ($user->roles as $role)
                                                    <div>{{ $role->name }}</div>
                                                @endforeach
                                                {{-- ou : {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} --}}
                                            </td>
                                            <td>
                                                @can('edit-users')
                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                    <button class=" text-white font-bold py-2 px-1 rounded hover:bg-gray-400">
                                                        <i class="fa-solid fa-pen-to-square" style="color: #131fcd;" ></i>
                                                    </button>
                                                </a>
                                                @endcan
                                                @can('delete-users')

                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="display: inline">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                                <button class="text-white font-bold py-2 px-1 rounded hover:bg-gray-400"
                                                onclick="showDeleteConfirmation('{{ $user->id }}')">
                                                    <i class="fa-solid fa-trash-can" style="color: #cd1313;"></i>
                                                </button>

                                                <button class=" text-white font-bold py-2 px-1 rounded hover:bg-gray-400"
                                                onclick="showModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}')">
                                                    <i class="fa-sharp fa-solid fa-eye" style="color: #096c15;"></i>
                                                </button>
                                                @endcan
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div id="myModal-{{ $user->id }}" class="modal">
                                            <div class="modal-content bg-white p-4 rounded-lg shadow-md w-1/3 mx-auto mt-20">
                                                <span class="close float-right text-gray-500 cursor-pointer" onclick="closeModal('{{ $user->id }}')">&times;</span>
                                                <p class="text-center mb-4">Informations de l'utilisateur :</p>
                                                <div class="flex justify-center">
                                                    <div class="block h-40 w-40 mt-7 border-10 bg-[#424549] rounded-full fill-current text-gray-800">
                                                        <img class="w-full h-full rounded-full" src="{{ asset($user->photo_path) }}" width="auto" height="auto" alt="Large avatar">
                                                    </div>
                                                </div>
                                                <div class="flex justify-center">
                                                    <p><strong>ID :</strong> <span id="userId-{{ $user->id }}"></span></p>
                                                </div>
                                                <div class="flex justify-center">
                                                    <p><strong>Nom :</strong> <span id="userName-{{ $user->id }}"></span></p>
                                                </div>
                                                <div class="flex justify-center">
                                                    <p><strong>Email :</strong> <span id="userEmail-{{ $user->id }}"></span></p>
                                                </div>
                                                <div class="flex justify-center">
                                                    <button onclick="closeModal('{{ $user->id }}')" class="bg-gray-300 hover:bg-gray-400 text-gray-700 ml-2 px-4 py-2 rounded">
                                                        OK
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Modal pour confirmer la suppression d'un utilisateur -->
                                    <div id="deleteConfirmationModal-{{ $user->id }}" class="modal">
                                        <div class="modal-content bg-white p-4 rounded-lg shadow-md w-1/3 mx-auto mt-20">
                                            <span class="close float-right text-gray-500 cursor-pointer" onclick="cancelModal({{ $user->id }})">&times;</span>
                                            <p class="text-center mb-4">Êtes-vous sûr de vouloir supprimer ?</p>
                                            <div class="flex justify-center">
                                                <form id="deleteForm-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="confirmDelete({{ $user->id }})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                                        Confirmer Suppression
                                                    </button>
                                                </form>
                                                <button onclick="cancelModal({{ $user->id }})" class="bg-gray-300 hover:bg-gray-400 text-gray-700 ml-2 px-4 py-2 rounded">
                                                    Annuler
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <script>

                                        function showDeleteConfirmation(userId) {
                                            var modal = document.getElementById("deleteConfirmationModal-" + userId);
                                            modal.style.display = "block";
                                        }
                                    
                                        function cancelModal(userId) {
                                            var modal = document.getElementById("deleteConfirmationModal-" + userId);
                                            modal.style.display = "none";
                                        }
                                    
                                        function confirmDelete(userId) {
                                            //var deleteForm = document.getElementById("deleteForm");
                                            //deleteForm.submit(); // Soumet le formulaire de suppression
                                            cancelModal(userId);
                                        }
                                        
                                    </script> 
                                    @endforeach

                                
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(id, name, email) {
            const userIdElement = document.getElementById('userId-' + id);
            const userNameElement = document.getElementById('userName-' + id);
            const userEmailElement = document.getElementById('userEmail-' + id);

            userIdElement.textContent = id;
            userNameElement.textContent = name;
            userEmailElement.textContent = email;

            var modal = document.getElementById("myModal-" + id);
            modal.style.display = "block";
        }

        // Fonction pour cacher la modal
        function closeModal(id) {
            var modal = document.getElementById("myModal-" + id);
            modal.style.display = "none";
        }
    </script>    
</x-app-layout>
