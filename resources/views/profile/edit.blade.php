<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiel aanpassen') }}
        </h2>
    <!-- Terug naar Dashboard knop -->
    <div class="p-6 mb-4">
                    <a href="{{ route('dashboard') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Terug naar Dashboard
                    </a>
                </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success">
                        Profiel succesvol bijgewerkt!
                    </div>
                @endif


                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Gebruikersnaam</label>
                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Geboortedatum</label>
                        <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="about_me" class="block text-sm font-medium text-gray-700">Over mij</label>
                        <textarea name="about_me" id="about_me" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('about_me', $user->about_me) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profielfoto</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full">
                    </div>

                    <div class="flex justify-end">
                    <button type="submit" class="btn-save">Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
