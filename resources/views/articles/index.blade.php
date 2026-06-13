@extends('layouts.app')

@section('title', 'Guides & Articles')
@section('meta_description', 'Practical guides on remote work, scholarships, freelancing platforms and career development for Nigerians.')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <div class="page-hero__breadcrumb">
                    <a href="{{ route('home') }}">Home</a><span>—</span><span>Articles</span>
                </div>
                <p class="label mb-sm">Guides & Articles</p>
                <h1 class="display-lg reveal">Read before<br>you apply.</h1>
            </div>
            <div class="page-hero__right">
                <p class="body-lg text-muted" style="max-width:36rem;">
                    Platform walkthroughs, scholarship application tips, and career guides —
                    written for Nigerians navigating remote work and global opportunities.
                </p>
            </div>
        </div>
    </div>
</div>

<form method="GET" action="{{ route('articles.index') }}">
<div class="container" style="padding-top:3.2rem; padding-bottom:3.2rem; border-bottom:1px solid var(--border);">
    <div style="display:flex; align-items:center; gap:2rem; flex-wrap:wrap;">
        <div class="search-wrap">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" name="q" class="search-input" placeholder="Search articles…"
                   value="{{ request('q') }}" aria-label="Search articles" />
        </div>
        <div class="filter-bar" role="group" aria-label="Filter by category">
            @foreach(['all' => 'All', 'remote' => 'Remote work', 'scholarship' => 'Scholarships', 'platforms' => 'Platforms & tools', 'career' => 'Career'] as $val => $label)
                <a href="{{ route('articles.index', array_merge(request()->except('category','page'), ['category' => $val])) }}"
                   class="filter-btn {{ (request('category','all') === $val) ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>
        <span class="board-count" style="margin-left:auto;">{{ $articles->total() }} {{ Str::plural('article', $articles->total()) }}</span>
    </div>
</div>
</form>

{{-- Featured --}}
@if ($featured && !request('q') && !request('category'))
<div class="container" style="padding-top:4rem;">
    <p class="label mb-md">Featured</p>
    <a href="{{ route('articles.show', $featured->slug) }}" style="display:block;">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:0; border:1px solid var(--border); border-radius:var(--radius); overflow:hidden; transition:border-color 0.2s;" onmouseover="this.style.borderColor='var(--ink)'" onmouseout="this.style.borderColor='var(--border)'">
            <div style="{{ $featured->featured_image_url ? 'background:url('.$featured->featured_image_url.') center/cover;' : 'background:rgba(17,17,16,0.05);' }} min-height:32rem; display:flex; align-items:center; justify-content:center;">
                @if (!$featured->featured_image_url)
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.2)" stroke-width="1"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                @endif
            </div>
            <div style="padding:4rem; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <p class="label mb-sm" style="color:var(--ink-muted);">{{ $featured->category_label }}</p>
                    <h2 class="display-sm" style="margin-bottom:1.6rem;">{{ $featured->title }}</h2>
                    <p class="body-lg text-muted">{{ $featured->excerpt }}</p>
                </div>
                <div style="display:flex; align-items:center; gap:1.6rem; margin-top:3.2rem; padding-top:2.4rem; border-top:1px solid var(--border);">
                    <span class="body-sm">{{ $featured->reading_time_minutes }} min read</span>
                    <span class="body-sm">{{ $featured->formatted_date }}</span>
                    <span class="btn--ghost" style="margin-left:auto;">Read article →</span>
                </div>
            </div>
        </div>
    </a>
</div>
@endif

{{-- Grid --}}
<div class="container" style="padding-top:4rem; padding-bottom:8rem;">
    @if ($featured && !request('q') && !request('category'))
    <p class="label mb-md">All articles</p>
    @endif
    <div class="article-grid">
        @forelse ($articles as $article)
        <article class="article-card">
            <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                <div class="article-card__img">
                    @if ($article->featured_image_url)
                        <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" loading="lazy">
                    @else
                        <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.2)" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                    @endif
                </div>
                <p class="article-card__cat">{{ $article->category_label }}</p>
                <h2 class="article-card__title">{{ $article->title }}</h2>
                <p class="article-card__excerpt">{{ $article->excerpt }}</p>
                <div class="article-card__meta">
                    <span>{{ $article->reading_time_minutes }} min read</span>
                    <span>{{ $article->formatted_date }}</span>
                </div>
            </a>
        </article>
        @empty
        <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-muted);">
            <p style="font-size:1.6rem;">No articles found.</p>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted mt-md">Clear filters →</a>
        </div>
        @endforelse
    </div>
    @if ($articles->hasPages())
    <div style="padding:4rem 0; display:flex; justify-content:center;">{{ $articles->links() }}</div>
    @endif
</div>

<section class="cta-section" style="padding:8rem 0;">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container" style="text-align:center; max-width:72rem;">
        <p class="cta-section__tag" style="justify-content:center;">Have a topic in mind?</p>
        <h2 class="display-md reveal" style="color:var(--dark-ink); margin-bottom:2rem;">Request a guide.</h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(242,241,239,0.6); margin-bottom:3.2rem;">Is there a platform, scholarship, or career topic you want us to cover? Send us a message on WhatsApp.</p>
        <div class="flex-center gap-md reveal reveal-delay-2" style="justify-content:center; flex-wrap:wrap;">
            <a href="https://wa.me/2349134448135?text=Hi%2C+please+write+a+guide+on..." target="_blank" rel="noopener noreferrer" class="btn btn--dark">Request a guide ↗</a>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost" style="color:rgba(242,241,239,0.6);">Browse opportunities →</a>
        </div>
    </div>
</section>

@endsection