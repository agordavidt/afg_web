@extends('layouts.app')

@section('title', 'Opportunities')
@section('meta_description', 'Remote jobs, scholarships, grants and training open to Nigerians, with clear deadlines.')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <div class="page-hero__breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span>Opportunities</span>
                </div>               
                <h1 class="display-lg reveal">Everything open right now</h1>
            </div>
            <div class="page-hero__right">
                @if ($urgentCount > 0)
                <div class="urgent-bar" role="alert">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $urgentCount }} {{ Str::plural('listing', $urgentCount) }} closing within 48 hours
                </div>
                @endif
                <p class="body-sm" style="max-width:30rem;">
                    Every listing links to where it was posted. We check them before they go live and
                    pull them down once they close.
                </p>
            </div>
        </div>
    </div>
</div>

<form method="GET" action="{{ route('opportunities.index') }}">
<div class="container">
    <div class="board-controls">
        <div class="search-wrap">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" name="q" class="search-input" placeholder="Search opportunities"
                   value="{{ request('q') }}" aria-label="Search opportunities" />
        </div>
        <div class="filter-bar" role="group" aria-label="Filter by type">
            @foreach(['all' => 'All', 'remote' => 'Remote work', 'scholarship' => 'Scholarships', 'grant' => 'Grants', 'training' => 'Training'] as $val => $label)
                <a href="{{ route('opportunities.index', array_merge(request()->except('type','page'), ['type' => $val])) }}"
                   class="filter-btn {{ (request('type','all') === $val) ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>
        <div class="flex-between" style="width:100%; gap:1.6rem; flex-wrap:wrap;">
            <select name="sort" class="board-select" onchange="this.form.submit()" aria-label="Sort opportunities">
                <option value="newest"   {{ request('sort','newest') === 'newest'   ? 'selected' : '' }}>Newest first</option>
                <option value="deadline" {{ request('sort') === 'deadline' ? 'selected' : '' }}>Closing soon first</option>
            </select>
            <span class="board-count">{{ $opportunities->total() }} {{ Str::plural('result', $opportunities->total()) }}</span>
        </div>
    </div>
</div>
</form>

<div class="container">
    <div class="board-list">
        @forelse ($opportunities as $opp)
        <article class="board-item" style="{{ $opp->is_urgent ? 'border-left:2px solid #C0392B; padding-left:1.6rem;' : '' }}">
            <div class="board-item__badges">
                <span class="badge">{{ $opp->type_label }}</span>
                <span class="deadline {{ $opp->is_urgent ? 'deadline--urgent' : '' }}">
                    {{ $opp->deadline_label }}
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">{{ $opp->title }}</h2>
                <p class="board-item__desc">{{ $opp->summary }}</p>
            </div>
            <div class="board-item__right">
                <a href="{{ $opp->source_url }}" target="_blank" rel="noopener noreferrer" class="btn btn--primary">Apply now ↗</a>
            </div>
        </article>
        @empty
        <div style="padding:6rem 0; text-align:center; color:var(--ink-slate-muted);">
            <p style="font-size:1.6rem;">Nothing matches that search.</p>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted mt-md">Clear filters →</a>
        </div>
        @endforelse
    </div>
    @if ($opportunities->hasPages())
    <div style="padding:4rem 0; display:flex; justify-content:center;">{{ $opportunities->links() }}</div>
    @endif
</div>

<section class="cta-section">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container" style="text-align:center; max-width:64rem; margin:0 auto;">
        <h2 class="display-md reveal" style="color:var(--dark-ink-bright-contrast); margin-bottom:1.6rem;">Want a heads up before deadlines close?</h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.65); margin-bottom:3.2rem;">
            Join our WhatsApp community for new listings as they go live, or write to us if you have a
            specific question about any opportunity here.
        </p>
        <div class="flex-center gap-md reveal reveal-delay-2" style="justify-content:center; flex-wrap:wrap;">
            <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer" class="btn btn--dark">Join our WhatsApp community ↗</a>
            <a href="mailto:info@academicfunding.org" class="btn--ghost" style="color:rgba(248,249,250,0.65);">Send us a question →</a>
        </div>
    </div>
</section>

@endsection