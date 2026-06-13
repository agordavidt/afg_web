@extends('layouts.app')

@section('title', 'Guides')
@section('meta_description', 'Plain guides on remote work, scholarships, platforms and career growth for Nigerians.')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <div class="page-hero__breadcrumb">
                    <a href="{{ route('home') }}">Home</a><span>/</span><span>Guides</span>
                </div>              
                <h1 class="display-lg reveal">Read this before you apply</h1>
            </div>
            <div class="page-hero__right">
                <p class="body-lg text-muted" style="max-width:36rem;">
                    Walkthroughs, application tips and honest notes on the platforms and programmes we
                    feature, written for people applying from Nigeria.
                </p>
            </div>
        </div>
    </div>
</div>

<form method="GET" action="{{ route('articles.index') }}">
<div class="container" style="padding-top:2.4rem; padding-bottom:2.4rem; border-bottom:1px solid var(--border-light-navy-transparent);">
    <div style="display:flex; flex-direction:column; gap:1.6rem;">
        <div class="search-wrap">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" name="q" class="search-input" placeholder="Search guides"
                   value="{{ request('q') }}" aria-label="Search guides" />
        </div>
        <div class="flex-between" style="gap:1.6rem; flex-wrap:wrap;">
            <div class="filter-bar" role="group" aria-label="Filter by category">
                @foreach(['all' => 'All', 'remote' => 'Remote work', 'scholarship' => 'Scholarships', 'platforms' => 'Platforms', 'career' => 'Career'] as $val => $label)
                    <a href="{{ route('articles.index', array_merge(request()->except('category','page'), ['category' => $val])) }}"
                       class="filter-btn {{ (request('category','all') === $val) ? 'active' : '' }}">{{ $label }}</a>
                @endforeach
            </div>
            {{-- <span class="board-count">{{ $articles->total() }} {{ Str::plural('guide', $articles->total()) }}</span> --}}
        </div>
    </div>
</div>
</form>

{{-- Featured --}}
@if ($featured && !request('q') && !request('category'))
<div class="container" style="padding-top:3.2rem;">
    <p class="label mb-md">Featured</p>
    <a href="{{ route('articles.show', $featured->slug) }}" style="display:block;">
        <div class="featured-article">
            <div class="featured-article__img" style="{{ $featured->featured_image_url ? 'background:url(\''.$featured->featured_image_url.'\') center/cover;' : '' }}{{ !$featured->featured_image_url ? 'background:linear-gradient(135deg, rgba(6,214,160,0.18), rgba(11,19,43,0.06));' : '' }}">
                @if (!$featured->featured_image_url)
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.25)" stroke-width="1" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                @endif
            </div>
            <div class="featured-article__body">
                <div>
                    <p class="label mb-sm" style="color:var(--ink-slate-muted);">{{ $featured->category_label }}</p>
                    <h2 class="display-sm" style="margin-bottom:1.2rem;">{{ $featured->title }}</h2>
                    <p class="body-lg text-muted">{{ $featured->excerpt }}</p>
                </div>
                <div style="display:flex; align-items:center; gap:1.6rem; margin-top:2.4rem; padding-top:2rem; border-top:1px solid var(--border-light-navy-transparent); flex-wrap:wrap;">
                    <span class="body-sm">{{ $featured->reading_time_minutes }} min read</span>
                    <span class="body-sm">{{ $featured->formatted_date }}</span>
                    <span class="btn--ghost" style="margin-left:auto;">Read guide →</span>
                </div>
            </div>
        </div>
    </a>
</div>
@endif

{{-- Grid --}}
<div class="container" style="padding-top:3.2rem; padding-bottom:6rem;">
    @if ($featured && !request('q') && !request('category'))
    <p class="label mb-md">All guides</p>
    @endif
    <div class="article-grid">
        @forelse ($articles as $article)
        <article class="article-card">
            <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                <div class="article-card__img">
                    @if ($article->featured_image_url)
                        <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" loading="lazy" width="640" height="360">
                    @else
                        <div class="article-card__img--default">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.3)" stroke-width="1.5" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
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
        <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-slate-muted);">
            <p style="font-size:1.6rem;">Nothing matches that search.</p>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted mt-md">Clear filters →</a>
        </div>
        @endforelse
    </div>
    @if ($articles->hasPages())
    <div style="padding:4rem 0; display:flex; justify-content:center;">{{ $articles->links() }}</div>
    @endif
</div>

<section class="cta-section">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container" style="text-align:center; max-width:64rem; margin:0 auto;">
        <h2 class="display-md reveal" style="color:var(--dark-ink-bright-contrast); margin-bottom:1.6rem;">Got something you want us to cover</h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.65); margin-bottom:3.2rem;">
            If there is a platform, scholarship or career topic you keep getting stuck on, email us and
            we will look into writing about it.
        </p>
        <div class="flex-center gap-md reveal reveal-delay-2" style="justify-content:center; flex-wrap:wrap;">
            <a href="mailto:info@academicfunding.org?subject=Guide request" class="btn btn--dark">Request a guide ↗</a>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost" style="color:rgba(248,249,250,0.65);">Browse opportunities →</a>
        </div>
    </div>
</section>

@endsection