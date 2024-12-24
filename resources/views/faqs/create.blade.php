@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Nieuwe FAQ Toevoegen</h1>

    <form action="{{ route('faqs.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Vraag -->
        <div>
            <label for="question" class="block text-sm font-medium text-gray-700">Vraag</label>
            <input 
                type="text" 
                name="question" 
                id="question" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                placeholder="Typ hier de vraag" 
                required>
        </div>

        <!-- Antwoord -->
        <div>
            <label for="answer" class="block text-sm font-medium text-gray-700">Antwoord</label>
            <textarea 
                name="answer" 
                id="answer" 
                rows="5" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                placeholder="Typ hier het antwoord" 
                required></textarea>
        </div>

        <!-- Categorie -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categorie</label>
            <select 
                name="category_id" 
                id="category_id" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                required>
                <option value="">Selecteer een categorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Opslaan -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-6 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Opslaan
            </button>
        </div>
    </form>
</div>
@endsection
