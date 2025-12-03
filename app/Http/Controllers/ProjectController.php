<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::active();

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->paginate(12);
        $categories = Project::active()->distinct('category')->pluck('category');

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show($slug)
    {
        $project = Project::active()->where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::active()
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
