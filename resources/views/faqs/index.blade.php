@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-3xl font-bold mb-6">FAQ Beheer</h1>

        @if(auth()->user() && auth()->user()->is_admin)
            <div class="mb-4 flex gap-4">
                <!-- Knop voor nieuwe vraag toevoegen -->
                <a href="{{ route('faqs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Nieuwe Vraag Toevoegen
                </a>

                <!-- Knop voor nieuwe categorie toevoegen -->
                <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Nieuwe Categorie Toevoegen
                </a>
            </div>
        @endif

        <!-- FAQ Tabel -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Vraag</th>
                    <th class="border border-gray-300 px-4 py-2">Antwoord</th>
                    <th class="border border-gray-300 px-4 py-2">Categorie</th>
                    @if(auth()->user() && auth()->user()->is_admin)
                        <th class="border border-gray-300 px-4 py-2">Acties</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $faq->question }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $faq->answer }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $faq->category->name }}</td>
                        @if(auth()->user() && auth()->user()->is_admin)
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('faqs.edit', $faq->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline ml-2">Verwijderen</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Terug naar Dashboard Knop -->
        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Terug naar Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
