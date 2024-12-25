@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Gebruiker toevoegen</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Naam</label>
            <input type="text" id="name" name="name" class="border rounded w-full px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium">E-mail</label>
            <input type="email" id="email" name="email" class="border rounded w-full px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium">Wachtwoord</label>
            <input type="password" id="password" name="password" class="border rounded w-full px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-medium">Bevestig Wachtwoord</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="border rounded w-full px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-medium">Rol</label>
            <select id="role" name="role" class="border rounded w-full px-4 py-2" required>
                <option value="user">Gebruiker</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Opslaan</button>
        </div>
    </form>
</div>
@endsection
