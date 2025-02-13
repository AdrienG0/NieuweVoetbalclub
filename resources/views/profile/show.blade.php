@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Profiel Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex items-center justify-center bg-gray-100 py-6">
            <!-- Profiel Foto -->
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" class="rounded-full w-32 h-32 object-cover">
            @else
                <div class="bg-gray-400 rounded-full w-32 h-32 flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>

        <div class="px-6 py-4">
            <h1 class="text-3xl font-semibold text-gray-800 mb-2">Profiel van {{ $user->name }}</h1>
            <p class="text-gray-600 mb-2"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="text-gray-600 mb-2"><strong>Geboortedatum:</strong> {{ $user->birthdate ?? 'Niet opgegeven' }}</p>
            <p class="text-gray-600 mb-4"><strong>Over mij:</strong> {{ $user->about_me ?? 'Geen informatie' }}</p>
            
            <!-- Button om naar profielbewerking te gaan -->
            <div class="mt-4">
                <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                    Profiel Bewerken
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
