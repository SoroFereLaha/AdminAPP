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
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Editer
                                                    </button>
                                                </a>
                                                @endcan
                                                @can('delete-users')
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('admin.users.destroy', $user->id) }}">
                                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                            Supprimer
                                                        </button>
                                                    </a>
                                                </form>
                                                @endcan
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














