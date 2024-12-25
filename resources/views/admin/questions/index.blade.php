@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-6">Ingediende Vragen</h1>

    <!-- Controleer of er vragen zijn -->
    @if($questions->isEmpty())
        <p class="text-gray-500">Er zijn nog geen vragen ingediend.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-200 text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-200 px-4 py-2 w-1/2">Vraag</th>
                    <th class="border border-gray-200 px-4 py-2 w-1/4">Ingediend door</th>
                    <th class="border border-gray-200 px-4 py-2 w-1/4">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2">{{ $question->question }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $question->user->name }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">
                            <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
