<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::active()->latest()->limit(6)->get();
        $articles      = Article::published()->latest('published_at')->limit(3)->get();

        return view('home', compact('opportunities', 'articles'));
    }
}