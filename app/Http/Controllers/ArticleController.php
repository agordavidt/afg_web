<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::published()->latest('published_at');

        if ($request->filled('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $articles = $query->paginate(12)->withQueryString();
        $featured = Article::published()
            ->latest('published_at')
            ->first();

        return view('articles.index', compact('articles', 'featured'));
    }

    public function show(string $slug)
    {
        $article = Article::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Article::published()
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('articles.show', compact('article', 'related'));
    }
}