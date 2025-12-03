<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_type' => 'required|string',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $validated['status'] = 'pending';

        Appointment::create($validated);

        return redirect()->route('appointments.create')
            ->with('success', 'Votre demande de rendez-vous a été envoyée ! Nous vous contacterons pour confirmer.');
    }
}
