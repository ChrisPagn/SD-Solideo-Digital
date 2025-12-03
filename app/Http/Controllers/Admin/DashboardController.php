<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'blog_posts' => BlogPost::count(),
            'testimonials' => Testimonial::count(),
            'contacts' => Contact::count(),
            'appointments' => Appointment::count(),
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentAppointments = Appointment::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentAppointments'));
    }
}
