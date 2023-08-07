<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-12 flex">
        @can('edit-users')
        <div class="sidebar-container w-1/5">
            <x-sidebar>
            </x-sidebar>
        </div>
        @endcan
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 w-4/5">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Formulaire pour télécharger la photo -->
                    <form action="{{ route('profile.upload.photo') }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <input type="file" name="photo" id="photoInput" class="">
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voir photo de profil</button>
                            <button @click="toggleModal = true" id="changePhotoButton" class="ml-4 bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier photo de profil</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    <!-- Script pour déclencher l'explorateur de fichiers lors du clic sur le bouton "Modifier photo de profil" -->
    <script>
        document.getElementById('changePhotoButton').addEventListener('click', function() {
            document.getElementById('photoInput').click();
        });
    </script>  
</x-app-layout>
