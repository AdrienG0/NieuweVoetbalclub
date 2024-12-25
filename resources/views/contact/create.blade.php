@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Contacteer Ons</h1>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Bericht</label>
            <textarea name="message" id="message" rows="4" class="mt-1 block w-full" required></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Verstuur
        </button>

        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">
                Terug naar Dashboard
            </a>
        </div>
    </form>
</div>
@endsection
