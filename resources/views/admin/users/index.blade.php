<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listes des utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                        <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($users as $user)
                                    
                                        <tr class="border-b dark:border-neutral-500">
                                            <th class="whitespace-nowrap px-6 py-4 font-medium">{{$user->id}}</th>
                                            <td class="whitespace-nowrap px-6 py-4">{{$user->name}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$user->email}}</td>
                                            <!--il n'a pas de role dans la table users c'est plutot dans la table roles or la varibale roles n'est pas defini dans le controller il me faut cree un RolesController comme pour le UsersController-->
                                            <td class="whitespace-nowrap px-6 py-4">{{$user->role}}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Editer
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.users.destroy', $user->id) }}">
                                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                        Supprimer
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>

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
</x-app-layout>
