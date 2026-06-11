<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::latest()->paginate(20);
        return view('admin.opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('admin.opportunities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:remote,scholarship,grant,training',
            'summary'     => 'required|string',
            'source_name' => 'required|string|max:255',
            'source_url'  => 'required|url',
            'deadline'    => 'nullable|date',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        Opportunity::create($data);

        return redirect()->route('admin.opportunities.index')
                         ->with('success', 'Opportunity created.');
    }

    public function edit(Opportunity $opportunity)
    {
        return view('admin.opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:remote,scholarship,grant,training',
            'summary'     => 'required|string',
            'source_name' => 'required|string|max:255',
            'source_url'  => 'required|url',
            'deadline'    => 'nullable|date',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        // Re-generate slug if title changed
        if ($opportunity->title !== $data['title']) {
            $data['slug'] = Opportunity::uniqueSlug($data['title'], $opportunity->id);
        }

        $opportunity->update($data);

        return redirect()->route('admin.opportunities.index')
                         ->with('success', 'Opportunity updated.');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();

        return redirect()->route('admin.opportunities.index')
                         ->with('success', 'Opportunity deleted.');
    }
}