@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">

    <!-- Terug naar Laatste Nieuwtjes knop -->
    <div class="mb-4">
        <a href="{{ route('news.index') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Terug naar Laatste Nieuwtjes
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-6 text-center">Nieuwsitem Bewerken</h1>

    <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Titel -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Titel:</label>
            <input type="text" name="title" id="title" value="{{ $news->title }}" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Content -->
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
            <textarea name="content" id="content" rows="5" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $news->content }}</textarea>
        </div>

        <!-- Afbeelding -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Afbeelding (optioneel):</label>
            <input type="file" name="image" id="image"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @if($news->image_path)
                <small class="text-gray-500">Huidige afbeelding: <a href="{{ asset('storage/' . $news->image_path) }}" target="_blank" class="text-blue-500 hover:underline">Bekijk afbeelding</a></small>
            @endif
        </div>

        <!-- Publicatiedatum -->
        <div class="mb-4">
            <label for="publication_date" class="block text-sm font-medium text-gray-700">Publicatiedatum:</label>
            <input type="date" name="publication_date" id="publication_date" value="{{ $news->publication_date }}"
                required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Opslaan knop -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                Opslaan
            </button>
        </div>
    </form>
</div>
@endsection
