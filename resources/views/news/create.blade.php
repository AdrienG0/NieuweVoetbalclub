@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-4">Nieuw Nieuwsitem</h1>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titel:</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
            <textarea name="content" id="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required></textarea>
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Afbeelding:</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>
        <div>
            <label for="publication_date" class="block text-sm font-medium text-gray-700">Publicatiedatum:</label>
            <input type="date" name="publication_date" id="publication_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Opslaan</button>
        </div>

        <div class="mb-4">
            <a href="{{ route('news.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Terug naar Nieuws
            </a>
        </div>

    </form>
</div>
@endsection
