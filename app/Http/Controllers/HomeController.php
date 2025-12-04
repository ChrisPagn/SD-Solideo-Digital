<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BlogPost;
use App\Services\CacheService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Use cache for services and testimonials
        $services = CacheService::getActiveServices(6);
        $featuredProjects = Project::active()->featured()->latest()->take(6)->get();
        $testimonials = CacheService::getFeaturedTestimonials(3);
        $latestPosts = BlogPost::with('user')->published()->latest('published_at')->take(3)->get();

        return view('home', compact('services', 'featuredProjects', 'testimonials', 'latestPosts'));
    }

    public function about()
    {
        return view('about');
    }
}
