<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::active()->latest();

        // Filter by rating
        if ($request->has('rating') && $request->rating) {
            $query->where('rating', $request->rating);
        }

        // Filter by project type
        if ($request->has('project_type') && $request->project_type) {
            $query->where('project_type', $request->project_type);
        }

        $testimonials = $query->paginate(12);

        // Get unique project types for filter
        $projectTypes = Testimonial::active()
            ->whereNotNull('project_type')
            ->distinct()
            ->pluck('project_type')
            ->filter()
            ->sort()
            ->values();

        return view('testimonials.index', compact('testimonials', 'projectTypes'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        // Rate limiting: max 1 testimonial per hour per IP
        $key = 'testimonial-submit:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);

            return back()->withErrors([
                'rate_limit' => "Vous avez déjà soumis un témoignage récemment. Veuillez patienter {$minutes} minute(s) avant de soumettre un nouveau témoignage."
            ])->withInput();
        }

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial' => 'required|string|min:20|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'project_type' => 'nullable|string|max:255',
        ], [
            'client_name.required' => 'Veuillez indiquer votre nom.',
            'testimonial.required' => 'Veuillez rédiger votre témoignage.',
            'testimonial.min' => 'Le témoignage doit contenir au moins 20 caractères.',
            'testimonial.max' => 'Le témoignage ne peut pas dépasser 1000 caractères.',
            'rating.required' => 'Veuillez attribuer une note.',
            'rating.min' => 'La note minimum est 1 étoile.',
            'rating.max' => 'La note maximum est 5 étoiles.',
        ]);

        // Create testimonial as inactive (pending validation)
        Testimonial::create([
            'client_name' => $validated['client_name'],
            'client_position' => $validated['client_position'] ?? null,
            'client_company' => $validated['client_company'] ?? null,
            'testimonial' => $validated['testimonial'],
            'rating' => $validated['rating'],
            'project_type' => $validated['project_type'] ?? null,
            'is_active' => false, // Pending admin validation
            'is_featured' => false,
        ]);

        // Apply rate limit
        RateLimiter::hit($key, 3600); // 1 hour = 3600 seconds

        return redirect()->route('testimonials')->with('success', 'Merci pour votre témoignage ! Il sera publié après validation par notre équipe.');
    }
}
