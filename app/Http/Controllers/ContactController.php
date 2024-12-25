<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function index()
    {
        return view('contact.index');
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Stuur de email naar de admin
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to('admin@example.com') // Verander naar het admin emailadres
                 ->subject('Nieuw Contactformulier')
                 ->from($request->email, $request->name);
        });

        return redirect()->route('contact.create')->with('success', 'Uw bericht is succesvol verzonden!');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        \Mail::to('admin@voetbalclub.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('success', 'Uw bericht is succesvol verzonden!');
    }
}
