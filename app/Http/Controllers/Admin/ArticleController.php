<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'               => 'required|string|max:255',
            'category'            => 'required|in:remote,scholarship,platforms,career',
            'excerpt'             => 'required|string|max:500',
            'body'                => 'required|string',
            'featured_image_url'  => 'nullable|url',
            'reading_time_minutes'=> 'required|integer|min:1|max:60',
            'is_published'        => 'boolean',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        Article::create($data);

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article saved.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title'               => 'required|string|max:255',
            'category'            => 'required|in:remote,scholarship,platforms,career',
            'excerpt'             => 'required|string|max:500',
            'body'                => 'required|string',
            'featured_image_url'  => 'nullable|url',
            'reading_time_minutes'=> 'required|integer|min:1|max:60',
            'is_published'        => 'boolean',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($article->title !== $data['title']) {
            $data['slug'] = Article::uniqueSlug($data['title'], $article->id);
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article updated.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article deleted.');
    }
}