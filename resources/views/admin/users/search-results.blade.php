@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Zoekresultaten</h1>

    <p class="mb-4 text-lg">
        Resultaten voor: <span class="font-semibold text-gray-700">{{ $query }}</span>
    </p>

    @if($users->isEmpty())
        <p class="text-gray-500">Geen gebruikers gevonden.</p>
    @else
        <div class="space-y-4">
            @foreach($users as $user)
                <div class="border border-gray-200 p-4 rounded shadow-sm">
                    <p class="text-lg font-semibold">Naam: {{ $user->name }}</p>
                    <p class="text-gray-700">E-mail: {{ $user->email }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
