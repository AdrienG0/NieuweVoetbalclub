@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Gebruikersbeheer</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="border border-gray-200 px-4 py-2">Naam</th>
                <th class="border border-gray-200 px-4 py-2">E-mail</th>
                <th class="border border-gray-200 px-4 py-2">Rol</th>
                <th class="border border-gray-200 px-4 py-2">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border border-gray-200 px-4 py-2">{{ $user->name }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $user->email }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ ucfirst($user->role) }}</td>
                    <td class="border border-gray-200 px-4 py-2">
                        <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" class="inline-block">
                            @csrf
                            <select name="role" class="border rounded px-2 py-1" onchange="this.form.submit()">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Gebruiker</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
