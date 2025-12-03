<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('order')->take(6)->get();
        $featuredProjects = Project::active()->featured()->latest()->take(6)->get();
        $testimonials = Testimonial::active()->featured()->latest()->take(3)->get();
        $latestPosts = BlogPost::published()->latest('published_at')->take(3)->get();

        return view('home', compact('services', 'featuredProjects', 'testimonials', 'latestPosts'));
    }

    public function about()
    {
        return view('about');
    }
}
