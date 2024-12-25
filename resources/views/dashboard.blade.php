@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            You're logged in!

            <div class="mt-4">
                <a href="{{ route('news.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Ga naar Laatste Nieuwtjes
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('faqs.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    FAQ Beheer
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('contact.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Contactpagina
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
