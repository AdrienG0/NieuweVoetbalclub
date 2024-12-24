@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Categorieën Beheer</h1>

    <!-- Knop om een nieuwe categorie toe te voegen -->
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">
        Nieuwe Categorie Toevoegen
    </a>

    <!-- Tabel met categorieën -->
    <table class="min-w-full bg-white border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="border px-4 py-2 text-left">Naam</th>
                <th class="border px-4 py-2 text-left">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-yellow-500 hover:underline">Bewerken</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?')">
                                Verwijderen
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
