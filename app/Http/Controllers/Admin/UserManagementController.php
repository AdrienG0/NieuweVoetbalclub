<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    // Lijst van alle gebruikers
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Update de rol van een gebruiker
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Gebruikersrol bijgewerkt!');
    }

    // Formulier om een gebruiker toe te voegen
    public function create()
    {
        return view('admin.users.create');
    }

    // Opslaan van een nieuwe gebruiker
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Nieuwe gebruiker toegevoegd!');
    }

    // Verwijder een gebruiker
    public function destroy(User $user)
    {
        // Zorg ervoor dat een admin zijn eigen account niet verwijdert
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Je kunt je eigen account niet verwijderen.');
        }

        // Verwijder de gebruiker
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'De gebruiker is succesvol verwijderd.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Zoek naar gebruikers op naam of e-mail
        $users = User::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->get();

        return view('admin.users.search-results', compact('users', 'query'));
    }
}
