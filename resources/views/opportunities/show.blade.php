@extends('layouts.app')

@section('title', $opportunity->title)
@section('meta_description', $opportunity->summary)

@section('content')

<div class="article-hero">
    <div class="container">
        <div class="page-hero__breadcrumb" style="padding-top:4rem;">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('opportunities.index') }}">Opportunities</a>
            <span>/</span>
            <span>{{ $opportunity->type_label }}</span>
        </div>
        <div class="article-meta-row">
            <span class="badge">{{ $opportunity->type_label }}</span>
            <span class="deadline {{ $opportunity->is_urgent ? 'deadline--urgent' : '' }}">
                {{ $opportunity->deadline_label }}
                @if($opportunity->deadline) (closes {{ $opportunity->deadline->format('d M Y') }}) @endif
            </span>
            <button class="article-share-btn js-wa-share" data-title="{{ $opportunity->title }}" aria-label="Share on WhatsApp">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                Share
            </button>
        </div>
        <h1 class="display-md reveal" style="padding-bottom:2.4rem; max-width:80rem;">{{ $opportunity->title }}</h1>
    </div>
</div>

<div class="container">
    <div class="article-layout">
        <div class="article-body">
            <p style="font-size:1.8rem; font-weight:500; line-height:1.6; margin-bottom:2.4rem;">{{ $opportunity->summary }}</p>

            <div style="padding:2.4rem; background:var(--emerald-accent-action); border-radius:var(--radius);">
                <p style="font-size:1.5rem; font-weight:700; margin-bottom:0.8rem; color:var(--ink-deep-navy);">Ready to apply</p>
                <p style="font-size:1.4rem; margin-bottom:1.8rem; color:rgba(11,19,43,0.7);">
                    This button takes you to {{ $opportunity->source_name }}, where the actual application form is.
                </p>
                <a href="{{ $opportunity->source_url }}" target="_blank" rel="noopener noreferrer"
                   class="btn" style="background:var(--ink-deep-navy); color:var(--dark-ink-bright-contrast);">
                    Apply on {{ $opportunity->source_name }} ↗
                </a>
            </div>
        </div>

        <aside class="article-sidebar">
            <div class="sidebar-card">
                <p class="sidebar-card__title">Quick facts</p>
                <div style="display:flex; flex-direction:column; gap:1.2rem; margin-top:1.2rem;">
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(248,249,250,0.4); margin-bottom:0.3rem;">Type</p>
                        <p style="font-size:1.4rem;">{{ $opportunity->type_label }}</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(248,249,250,0.4); margin-bottom:0.3rem;">Deadline</p>
                        <p style="font-size:1.4rem; {{ $opportunity->is_urgent ? 'color:#FF8A75;' : '' }}">
                            {{ $opportunity->deadline ? $opportunity->deadline->format('d M Y') : 'Open all year' }}
                        </p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(248,249,250,0.4); margin-bottom:0.3rem;">Where it is from</p>
                        <p style="font-size:1.4rem;">{{ $opportunity->source_name }}</p>
                    </div>
                </div>
            </div>

            <div class="sidebar-card sidebar-card--accent">
                <p class="sidebar-card__title">Stay in the loop</p>
                <p class="sidebar-card__body">Join our WhatsApp community for new listings as soon as they go up.</p>
                <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
                   class="btn" style="background:var(--ink-deep-navy); color:var(--dark-ink-bright-contrast); width:100%; justify-content:center;">
                    Join WhatsApp ↗
                </a>
            </div>

            <div class="related-card">
                <p class="related-card__title">Have a question</p>
                <p class="body-sm mb-sm">If something about this listing is unclear, send us an email and we will help.</p>
                <a href="mailto:info@academicfunding.org" class="related-card__link">info@academicfunding.org →</a>
            </div>
        </aside>
    </div>
</div>

@if ($related->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">More like this</span>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted">See all →</a>
        </div>
        <h2 class="display-sm reveal mb-lg">A few more worth a look</h2>
        <div class="opp-grid">
            @foreach ($related as $r)
            <article class="opp-card">
                <div class="opp-card__top">
                    <span class="badge">{{ $r->type_label }}</span>
                    <span class="deadline {{ $r->is_urgent ? 'deadline--urgent' : '' }}">{{ $r->deadline_label }}</span>
                </div>
                <h3 class="opp-card__title">{{ $r->title }}</h3>
                <p class="opp-card__desc">{{ Str::limit($r->summary, 100) }}</p>
                <div class="opp-card__footer">
                    <a href="{{ $r->source_url }}" target="_blank" rel="noopener noreferrer" class="opp-card__link">Apply ↗</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection