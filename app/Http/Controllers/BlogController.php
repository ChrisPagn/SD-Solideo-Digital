<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('user')->published()->latest('published_at')->paginate(9);
        $featuredPost = BlogPost::with('user')->published()->latest('published_at')->first();

        return view('blog.index', compact('posts', 'featuredPost'));
    }

    public function show($slug)
    {
        $post = BlogPost::with('user')->published()->where('slug', $slug)->firstOrFail();

        // Increment view counter
        $post->incrementViews();

        // Get related posts from same category
        $relatedPosts = BlogPost::with('user')
            ->published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        // If not enough related posts in same category, fill with other posts
        if ($relatedPosts->count() < 3) {
            $additionalPosts = BlogPost::with('user')
                ->published()
                ->where('id', '!=', $post->id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedPosts->count())
                ->get();

            $relatedPosts = $relatedPosts->concat($additionalPosts);
        }

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
