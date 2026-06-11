<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $query = Opportunity::active()->latest();

        if ($request->filled('type') && $request->type !== 'all') {
            $query->byType($request->type);
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('source_name', 'like', "%{$search}%");
            });
        }

        if ($request->sort === 'deadline') {
            $query->orderByRaw('ISNULL(deadline), deadline ASC');
        }

        $opportunities = $query->paginate(12)->withQueryString();
        $total         = Opportunity::active()->count();
        $urgentCount   = Opportunity::active()->where('is_urgent', true)->count();

        return view('opportunities.index', compact('opportunities', 'total', 'urgentCount'));
    }

    public function show(string $slug)
    {
        $opportunity = Opportunity::where('slug', $slug)->firstOrFail();

        $related = Opportunity::active()
            ->where('id', '!=', $opportunity->id)
            ->where('type', $opportunity->type)
            ->limit(3)
            ->get();

        return view('opportunities.show', compact('opportunity', 'related'));
    }
}