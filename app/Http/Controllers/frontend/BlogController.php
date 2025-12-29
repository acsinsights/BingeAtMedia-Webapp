<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\PageMeta;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blogs with search functionality
     */
    public function index(Request $request)
    {
        $query = Blog::published()->orderBy('created_at', 'desc');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $blogs = $query->paginate(6);
        $pageMeta = PageMeta::where('route_name', 'frontend.blog')->first();

        return view('frontend.blogs.index', compact('blogs', 'pageMeta'));
    }

    /**
     * Display the specified blog post
     */
    public function show($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        // Get recent posts (excluding current blog)
        $recentBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('frontend.blogs.show', compact('blog', 'recentBlogs'));
    }
}
