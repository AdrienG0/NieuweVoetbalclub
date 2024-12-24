@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Categorie Bewerken</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PATCH') <!-- PATCH-methode om data bij te werken -->

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Categorie Naam</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Bijwerken
        </button>
    </form>

    <!-- Terug naar de categorieën lijst -->
    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline">
            Terug naar Categorieën
        </a>
    </div>
</div>
@endsection
