@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

        <!-- Zoekbalk -->
        <div class="flex items-center mb-4 space-x-4">
            <form action="{{ route('users.search') }}" method="GET" class="flex items-center w-full">
                <input
                    type="text"
                    name="query"
                    class="border rounded-l px-4 py-2 w-full"
                    placeholder="Zoek naar een gebruiker..."
                    required
                />
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">
                    Zoek
                </button>
            </form>
        </div>
        
            You're logged in!

            <div class="mt-4">
                <a href="{{ route('news.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Laatste Nieuwtjes
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('faqs.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    FAQ-Pagina
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('contact.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Contactpagina
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('profile.show', auth()->user()) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mijn Profiel
                </a>
            </div>


            @can('isAdmin')
            <div class="mt-4">
                <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Gebruikersbeheer
                </a>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
