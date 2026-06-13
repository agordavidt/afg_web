@extends('layouts.app')

@section('title', $article->title)
@section('meta_description', $article->excerpt)

@section('content')

<div class="article-hero">
    <div class="container">
        <div class="page-hero__breadcrumb" style="padding-top:4rem;">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('articles.index') }}">Guides</a>
            <span>/</span>
            <span>{{ $article->category_label }}</span>
        </div>
        <div class="article-meta-row">
            <span class="label" style="color:var(--ink-slate-muted);">{{ $article->category_label }}</span>
            <span class="body-sm">{{ $article->reading_time_minutes }} min read</span>
            <span class="body-sm">{{ $article->formatted_date }}</span>
            <button class="article-share-btn js-wa-share" data-title="{{ $article->title }}" aria-label="Share on WhatsApp">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                Share
            </button>
        </div>
        <h1 class="display-md reveal" style="padding-bottom:2.4rem; max-width:84rem;">{{ $article->title }}</h1>
    </div>
</div>

@if ($article->featured_image_url)
<div style="width:100%; aspect-ratio:16/9; max-height:48rem; overflow:hidden; border-bottom:1px solid var(--border-light-navy-transparent);">
    <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" loading="lazy"
         style="width:100%; height:100%; object-fit:cover;">
</div>
@else
<div class="article-card__img--default" style="width:100%; aspect-ratio:16/9; max-height:48rem; border-bottom:1px solid var(--border-light-navy-transparent);">
    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.25)" stroke-width="1" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
</div>
@endif

<div class="container">
    <div class="article-layout">

        <article class="article-body article-prose">
            {!! $article->body !!}
        </article>

        <aside class="article-sidebar">
            <div class="sidebar-card sidebar-card--accent">
                <p class="sidebar-card__title">New opportunities every week</p>
                <p class="sidebar-card__body">Join our WhatsApp community for new listings as they go up.</p>
                <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
                   class="btn" style="background:var(--ink-deep-navy); color:var(--dark-ink-bright-contrast); width:100%; justify-content:center;">
                    Join WhatsApp ↗
                </a>
            </div>

            <div class="related-card">
                <p class="related-card__title">Questions about this guide</p>
                <p class="body-sm mb-sm">Send us an email and we will get back to you.</p>
                <a href="mailto:info@academicfunding.org" class="related-card__link">info@academicfunding.org →</a>
            </div>

            @if ($related->isNotEmpty())
            <div class="related-card">
                <p class="related-card__title">Related guides</p>
                <div class="related-card__list">
                    @foreach ($related as $r)
                    <a href="{{ route('articles.show', $r->slug) }}" class="related-card__link">
                        {{ $r->title }} →
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </aside>

    </div>
</div>

@if ($related->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Keep reading</span>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted">See all →</a>
        </div>
        <h2 class="display-sm reveal mb-lg">A few more guides</h2>
        <div class="article-grid">
            @foreach ($related as $r)
            <article class="article-card">
                <a href="{{ route('articles.show', $r->slug) }}" style="display:contents;">
                    <div class="article-card__img">
                        @if ($r->featured_image_url)
                            <img src="{{ $r->featured_image_url }}" alt="{{ $r->title }}" loading="lazy" width="640" height="360">
                        @else
                            <div class="article-card__img--default">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.3)" stroke-width="1.5" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </div>
                        @endif
                    </div>
                    <p class="article-card__cat">{{ $r->category_label }}</p>
                    <h3 class="article-card__title">{{ $r->title }}</h3>
                    <div class="article-card__meta"><span>{{ $r->reading_time_minutes }} min read</span><span>{{ $r->formatted_date }}</span></div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection