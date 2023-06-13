<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le compte de ') }} <strong> {{$user->name}}</strong>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf    
                        @method('PATCH')
                        @foreach ($roles as $role)

                            <div class="flex items-center mb-4">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}" id="{{$role->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600" @foreach($user->roles as $userRole) @if($userRole->id === $role->id) checked @endif @endforeach>
                                <label for="{{$role->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$role->name}}</label>
                            </div>

                        @endforeach
                        <button type="submit" class="bg-blue-500 p-1 rounded-md ">Modifier les rôles</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>