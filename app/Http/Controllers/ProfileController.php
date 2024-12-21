<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        return view('profile.show', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Debugging logs om te controleren wat er wordt ontvangen
        Log::info('Ontvangen gegevens voor profielupdate:', [
            'username' => $request->input('username'),
            'birthdate' => $request->input('birthdate'),
            'about_me' => $request->input('about_me'),
        ]);

        // Update velden
        $user->username = $request->input('username');
        $user->birthdate = $request->input('birthdate');
        $user->about_me = $request->input('about_me');

        // Check voor profielfoto upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Sla wijzigingen op
        $user->save();

        // Log succesvolle update
        Log::info('Profiel succesvol bijgewerkt voor gebruiker:', [
            'id' => $user->id,
            'username' => $user->username,
        ]);

        // Redirect met status
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
