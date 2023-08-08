<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-12 flex" x-data="{ showImageModal: false, userPhotoPath: '{{ Auth::user()->photo_path }}' }" x-init="() => {
        showImageModal = false;
        userPhotoPath = '{{ Auth::user()->photo_path }}';
    }">
        @can('edit-users')
        <div class="sidebar-container w-1/5">
            <x-sidebar>
            </x-sidebar>
        </div>
        @endcan

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 w-4/5">


            @if (session('status'))
                <div class="mx-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}.
                </div>
            @endif
            @if (session('erreur'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">INFO!</span>  {{ session('erreur') }} 
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Profile Image') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Voir ou modifier votre image de profil") }}
                    </p>
                    <!-- Formulaire pour télécharger la photo -->
                    <form action="{{ route('profile.upload.photo') }}" method="POST" enctype="multipart/form-data" class="block">
                        @method('PATCH')
                        @csrf
                        
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="large_size">Large file input</label>
                        <input name="photo" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-900" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        <div class="flex justify-start">
                            <button type="button" @click="showImageModal = true" name="action" value="voir" class="bg-blue-800 hover:bg-blue-700 text-white text-xs  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voir photo de profil</button>
                            <button type="submit" name="action" value="modifier" id="changePhotoButton" class="ml-4 bg-gray-800 hover:bg-gray-600 text-white text-xs font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier photo de profil</button>
                        </div>
                    </form>
                </div>
            </div>

            <!--boite modal qui contient la photo-->
            <div x-show="showImageModal" class="fixed z-50 h-screen w-screen inset-0 overflow-auto bg-black bg-opacity-75 flex justify-center items-center">
                <div class="max-w-xl h-full overflow-hidden bg-gray-900 p-4 rounded-lg shadow-lg"> 
                    <img :src="userPhotoPath" alt="Photo de profil" class="max-w-full h-auto">
                    <button @click="showImageModal = false" class="mt-4 px-4 py-2 bg-white hover:bg-gray-300 text-black rounded">Fermer</button>
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

    </script>    
</x-app-layout>
