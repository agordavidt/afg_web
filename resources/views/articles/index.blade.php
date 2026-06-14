@extends('layouts.app')

@section('title', 'Application & Strategy Guides | Academic Funding Gateway')
@section('meta_description', 'In-depth platform walkthroughs, strategic application roadmaps, and honest insights to unlock global remote work and funding opportunities.')

@section('content')

{{-- PAGE HEADER --}}
<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span aria-current="page">Guides</span>
                </nav>
                <h1 class="display-lg reveal">Guides & Insights</h1>
            </div>
            <div class="page-hero__right">
                <p class="body-lg text-muted">
                    Platform walkthroughs, strategic roadmaps, and honest application breakdowns designed to give you a competitive edge.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- SEARCH AND FILTER --}}
<form method="GET" action="{{ route('articles.index') }}" role="search">
    <div class="container">
        <div class="board-controls">

            <div class="search-wrap">
                <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="search" name="q" class="search-input"
                       placeholder="Search resources and tactics..."
                       value="{{ request('q') }}"
                       aria-label="Search guides" />
            </div>

            <div class="board-controls__row">
                <div class="filter-bar" role="group" aria-label="Filter by category">
                    @foreach(['all' => 'All', 'remote' => 'Remote work', 'scholarship' => 'Scholarships', 'platforms' => 'Platforms', 'career' => 'Career'] as $val => $label)
                        <a href="{{ route('articles.index', array_merge(request()->except('category','page'), ['category' => $val])) }}"
                           class="filter-btn {{ (request('category','all') === $val) ? 'active' : '' }}">{{ $label }}</a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</form>

{{-- FEATURED ARTICLE --}}
@if ($featured && !request('q') && !request('category'))
<div class="container" style="padding-top:3.2rem; padding-bottom:0;">
    <a href="{{ route('articles.show', $featured->slug) }}" class="featured-article" aria-label="Read: {{ $featured->title }}">
        <div class="featured-article__img"
             role="img"
             aria-label="{{ $featured->title }}"
             style="{{ $featured->featured_image_url
                 ? 'background:url(\''.$featured->featured_image_url.'\') center/cover no-repeat;'
                 : 'background:linear-gradient(135deg, rgba(6,214,160,0.1), rgba(11,19,43,0.05));' }}">
            @unless($featured->featured_image_url)
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.2)" stroke-width="1" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            @endunless
        </div>
        <div class="featured-article__body">
            <div>
                <span class="body-sm" style="text-transform: uppercase; letter-spacing: 0.1em; color: var(--accent-color, #06d6a0); font-weight: 700; display: block; margin-bottom: 0.5rem;">Featured Guide</span>
                <h2 class="display-sm" style="margin-bottom:1.2rem; line-height:1.15;">{{ $featured->title }}</h2>
                <p class="body-lg text-muted">{{ $featured->excerpt }}</p>
            </div>
            <div class="featured-article__footer">
                <span class="body-sm">{{ $featured->reading_time_minutes }} min read</span>
                <span class="btn--ghost">Read strategy →</span>
            </div>
        </div>
    </a>
</div>
@endif

{{-- ARTICLES GRID --}}
<div class="container" style="padding-top:3.2rem; padding-bottom:6rem;">
    <div class="article-grid">
        @forelse ($articles as $article)
        <article class="article-card">
            <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                <div class="article-card__img">
                    @if ($article->featured_image_url)
                        <img src="{{ $article->featured_image_url }}"
                             alt="{{ $article->title }}"
                             loading="lazy" width="640" height="360">
                    @else
                        <div class="article-card__img--default" aria-hidden="true">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.25)" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                    @endif
                </div>
                <h2 class="article-card__title">{{ $article->title }}</h2>
                <p class="article-card__excerpt">{{ $article->excerpt }}</p>
                <div class="article-card__meta">
                    <span>{{ $article->reading_time_minutes }} min read</span>
                    <span>{{ $article->formatted_date }}</span>
                </div>
            </a>
        </article>
        @empty
        <div class="board-empty" style="grid-column:1/-1;">
            <p>No guides match your search refinement right now.</p>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted mt-sm">Reset search pipeline</a>
        </div>
        @endforelse
    </div>

    @if ($articles->hasPages())
    <div class="board-pagination">{{ $articles->links() }}</div>
    @endif
</div>

{{-- FOOTER CTA --}}
<section class="cta-section" aria-labelledby="articles-cta-heading">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container cta-section__centered">
        <h2 id="articles-cta-heading" class="display-md reveal" style="color:var(--dark-ink-bright-contrast);">
            Need strategic clarity on a specific platform?
        </h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.6); margin-top:1.6rem;">
            If you are navigating an application barrier or need a step-by-step blueprint for a specific global fund, let us know. We investigate and build custom roadmaps based directly on user submissions.
        </p>
        <div class="cta-section__actions reveal reveal-delay-2">
            <a href="mailto:info@academicfunding.org?subject=Guide Blueprint Request"
               class="btn btn--dark">Submit a topic request ↗</a>
            <a href="{{ route('opportunities.index') }}"
               class="btn--ghost" style="color:rgba(248,249,250,0.6);">Explore active openings →</a>
        </div>
    </div>
</section>

@endsection