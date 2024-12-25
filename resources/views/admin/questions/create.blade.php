@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Stel een Vraag</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <textarea name="question" class="w-full p-2 border rounded" placeholder="Typ je vraag hier..." required></textarea>
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Vraag Indienen
        </button>
    </form>
</div>
@endsection
