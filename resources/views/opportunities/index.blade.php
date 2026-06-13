@extends('layouts.app')

@section('title', 'Opportunities')
@section('meta_description', 'Browse remote work jobs, scholarships, grants and training opportunities curated for Nigerians.')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <div class="page-hero__breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>—</span>
                    <span>Opportunities</span>
                </div>
                <p class="label mb-sm">All opportunities</p>
                <h1 class="display-lg reveal">All<br>opportunities.</h1>
            </div>
            <div class="page-hero__right">
                @if ($urgentCount > 0)
                <div class="urgent-bar" style="max-width:32rem;" role="alert">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $urgentCount }} {{ Str::plural('listing', $urgentCount) }} closing within 48 hours
                </div>
                @endif
                <p class="body-sm" style="max-width:30rem;">
                    Every listing links directly to the original source.
                    Verified before publishing, removed when expired.
                </p>
            </div>
        </div>
    </div>
</div>

<form method="GET" action="{{ route('opportunities.index') }}">
<div class="container">
    <div class="board-controls">
        <div class="search-wrap">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" name="q" class="search-input" placeholder="Search opportunities…"
                   value="{{ request('q') }}" aria-label="Search opportunities" />
        </div>
        <div class="filter-bar" role="group" aria-label="Filter by type">
            @foreach(['all' => 'All', 'remote' => 'Remote work', 'scholarship' => 'Scholarships', 'grant' => 'Grants', 'training' => 'Training'] as $val => $label)
                <a href="{{ route('opportunities.index', array_merge(request()->except('type','page'), ['type' => $val])) }}"
                   class="filter-btn {{ (request('type','all') === $val) ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>
        <select name="sort" class="board-select" onchange="this.form.submit()" aria-label="Sort">
            <option value="newest"   {{ request('sort','newest') === 'newest'   ? 'selected' : '' }}>Sort: Newest</option>
            <option value="deadline" {{ request('sort') === 'deadline' ? 'selected' : '' }}>Sort: Deadline</option>
        </select>
        <span class="board-count">{{ $opportunities->total() }} {{ Str::plural('result', $opportunities->total()) }}</span>
    </div>
</div>
</form>

<div class="container">
    <div class="board-list">
        @forelse ($opportunities as $opp)
        <article class="board-item" style="{{ $opp->is_urgent ? 'border-left:2px solid #A32D2D;' : '' }}">
            <div class="board-item__badges">
                <span class="badge {{ $opp->badge_class }}">{{ $opp->type_label }}</span>
                <span class="deadline {{ $opp->is_urgent ? 'deadline--urgent' : '' }}">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    {{ $opp->deadline_label }}
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">{{ $opp->title }}</h2>
                <p class="board-item__desc">{{ $opp->summary }}</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via {{ $opp->source_name }}</span>
                <a href="{{ $opp->source_url }}" target="_blank" rel="noopener noreferrer" class="btn btn--primary">Apply ↗</a>
            </div>
        </article>
        @empty
        <div style="padding:6rem 0; text-align:center; color:var(--ink-muted);">
            <p style="font-size:1.6rem;">No opportunities found.</p>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted mt-md">Clear filters →</a>
        </div>
        @endforelse
    </div>
    @if ($opportunities->hasPages())
    <div style="padding:4rem 0; display:flex; justify-content:center;">{{ $opportunities->links() }}</div>
    @endif
</div>

<section class="cta-section" style="padding:8rem 0;">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container" style="text-align:center; max-width:72rem;">
        <p class="cta-section__tag" style="justify-content:center;">Never miss a deadline</p>
        <h2 class="display-md reveal" style="color:var(--dark-ink); margin-bottom:2rem;">Get notified when new<br>opportunities drop.</h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(242,241,239,0.6); margin-bottom:3.2rem;">Join our WhatsApp community. We post new listings as soon as they go live.</p>
        <div class="flex-center gap-md reveal reveal-delay-2" style="justify-content:center; flex-wrap:wrap;">
            <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer" class="btn btn--dark">Join WhatsApp community ↗</a>
            <a href="{{ route('articles.index') }}" class="btn--ghost" style="color:rgba(242,241,239,0.6);">Read our guides →</a>
        </div>
    </div>
</section>

@endsection