@extends('layouts.app')

@section('title', 'Global Academic Funding & Remote Career Board')
@section('meta_description', 'Browse active international opportunities, fully funded scholarships, grants, and high-impact remote careers verified directly to their official source.')

@section('content')

{{-- PAGE HEADER --}}
<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span aria-current="page">Opportunities</span>
                </nav>
                <h1 class="display-lg reveal">Opportunities</h1>
            </div>
            <div class="page-hero__right">
                <p class="body-lg text-muted">
                    Discover fully funded academic paths, research grants, and international remote employment. Every listing bypasses middleman portals to route you directly to the verified source.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- CONTROLS --}}
<form method="GET" action="{{ route('opportunities.index') }}" role="search">
    <div class="container">
        <div class="board-controls">

            <div class="search-wrap">
                <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="search" name="q" class="search-input"
                       placeholder="Filter by sector, eligibility, or role title..."
                       value="{{ request('q') }}"
                       aria-label="Search opportunities" />
            </div>

            <div class="board-controls__row">
                <div class="filter-bar" role="group" aria-label="Filter by type">
                    @foreach(['all' => 'All opportunities', 'remote' => 'Remote work', 'scholarship' => 'Scholarships', 'grant' => 'Grants', 'training' => 'Fellowships'] as $val => $label)
                        <a href="{{ route('opportunities.index', array_merge(request()->except('type','page'), ['type' => $val])) }}"
                           class="filter-btn {{ (request('type','all') === $val) ? 'active' : '' }}">{{ $label }}</a>
                    @endforeach
                </div>

                <div class="board-controls__meta">
                    <select name="sort" class="board-select" onchange="this.form.submit()" aria-label="Sort">
                        <option value="newest"   {{ request('sort','newest') === 'newest'   ? 'selected' : '' }}>Recently published</option>
                        <option value="deadline" {{ request('sort') === 'deadline' ? 'selected' : '' }}>Approaching deadlines</option>
                    </select>
                    <span class="board-count">{{ $opportunities->total() }} {{ Str::plural('opening', $opportunities->total()) }} available</span>
                </div>
            </div>

        </div>
    </div>
</form>

{{-- LISTINGS --}}
<div class="container">
    <div class="board-list">
        @forelse ($opportunities as $opp)
        <article class="board-item {{ $opp->is_urgent ? 'board-item--urgent' : '' }}">
            <div class="board-item__body">
                <h2 class="board-item__title">{{ $opp->title }}</h2>
                <p class="board-item__desc">{{ $opp->summary }}</p>
                @if ($opp->deadline)
                <p class="board-item__deadline {{ $opp->is_urgent ? 'board-item__deadline--urgent' : '' }}">
                    Closing Window: {{ $opp->deadline->format('d M Y') }}
                </p>
                @endif
            </div>
            <div class="board-item__right">
                <a href="{{ $opp->source_url }}" target="_blank" rel="noopener noreferrer"
                   class="btn btn--primary">Official Application ↗</a>
            </div>
        </article>
        @empty
        <div class="board-empty">
            <p>No active openings track with your criteria currently.</p>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted mt-sm">Reset filters</a>
        </div>
        @endforelse
    </div>

    @if ($opportunities->hasPages())
    <div class="board-pagination">{{ $opportunities->links() }}</div>
    @endif
</div>

{{-- FOOTER CTA --}}
<section class="cta-section" aria-labelledby="opp-cta-heading">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container cta-section__centered">
        <h2 id="opp-cta-heading" class="display-md reveal" style="color:var(--dark-ink-bright-contrast);">
            Stay ahead of critical closing windows.
        </h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.6); margin-top:1.6rem;">
            High-value international grants and fully funded roles often close without notice. Get instantaneous alert integrations through our notification channel, or flag listing inconsistencies with our tracking desks.
        </p>
        <div class="cta-section__actions reveal reveal-delay-2">
            <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
               class="btn btn--dark">Join Instant Feed via WhatsApp ↗</a>
            <a href="mailto:info@academicfunding.org"
               class="btn--ghost" style="color:rgba(248,249,250,0.6);">Contact Integrity Desk →</a>
        </div>
    </div>
</section>

@endsection