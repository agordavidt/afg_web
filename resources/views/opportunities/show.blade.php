@extends('layouts.app')

@section('title', 'DAAD Scholarships 2026 — Postgraduate, Germany')
@section('meta_description', 'Full funding for African postgraduate students. Covers tuition, monthly stipend of €934, travel allowance, and health insurance.')

@section('content')

{{-- Placeholder data — replace with $opportunity model when backend is wired --}}
@php
$opp = [
    'type'        => 'scholarship',
    'badge_class' => 'badge--scholar',
    'badge_label' => 'Scholarship',
    'title'       => 'DAAD Scholarships 2026 — Postgraduate, Germany',
    'source'      => 'DAAD',
    'source_url'  => 'https://www.daad.de',
    'deadline'    => 'June 12, 2026',
    'days_left'   => 2,
    'urgent'      => true,
    'summary'     => 'Full funding for African postgraduate students. Covers tuition fees, a monthly stipend of €934, travel allowance, and health insurance. Open to all disciplines.',
    'eligibility' => ['Nigerian / African nationality', 'Bachelor\'s degree with strong academic record', 'Under 36 years of age at time of application', 'Proficiency in English or German'],
    'benefits'    => ['Full tuition coverage', 'Monthly stipend of €934', 'Return travel allowance', 'Health, accident & personal liability insurance', 'German language course (if required)'],
    'apply_url'   => 'https://www.daad.de/en/study-and-research-in-germany/scholarships/',
];
@endphp

{{-- ── ARTICLE HERO ── --}}
<div class="article-hero">
    <div class="container">

        {{-- Breadcrumb --}}
        <div class="page-hero__breadcrumb" style="padding-top:8rem;">
            <a href="{{ route('home') }}">Home</a>
            <span>—</span>
            <a href="{{ route('opportunities.index') }}">Opportunities</a>
            <span>—</span>
            <span>{{ $opp['badge_label'] }}</span>
        </div>

        {{-- Meta row --}}
        <div class="article-meta-row">
            <span class="badge {{ $opp['badge_class'] }}">{{ $opp['badge_label'] }}</span>

            @if($opp['urgent'])
                <span class="deadline deadline--urgent">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    {{ $opp['days_left'] }} days left — closes {{ $opp['deadline'] }}
                </span>
            @else
                <span class="deadline">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Closes {{ $opp['deadline'] }}
                </span>
            @endif

            <span class="body-sm">Source: {{ $opp['source'] }}</span>

            <button
                class="article-share-btn js-wa-share"
                data-title="{{ $opp['title'] }}"
                aria-label="Share on WhatsApp"
            >
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                Share
            </button>
        </div>

        <h1 class="display-md reveal" style="padding-bottom:4rem; max-width:80rem;">
            {{ $opp['title'] }}
        </h1>

    </div>
</div>

{{-- ── CONTENT ── --}}
<div class="container">
    <div class="article-layout">

        {{-- Body --}}
        <div class="article-body">

            <p style="font-size:1.9rem; font-weight:500; line-height:1.6; margin-bottom:3.2rem; color:var(--ink);">
                {{ $opp['summary'] }}
            </p>

            <h2 id="eligibility">Who can apply</h2>
            <ul>
                @foreach($opp['eligibility'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <h2 id="benefits">What you get</h2>
            <ul>
                @foreach($opp['benefits'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <h2 id="how-to-apply">How to apply</h2>
            <p>
                Applications are submitted directly through the DAAD portal. You will need to create
                an account, upload your academic transcripts, a motivation letter, and two academic
                references. Ensure all documents are in PDF format.
            </p>
            <p>
                The process typically takes 3–4 weeks from submission to a first response.
                Shortlisted candidates are contacted directly by the DAAD office. Do not pay any
                intermediary or agent — the application is free.
            </p>

            <blockquote>
                <p>
                    Apply directly on the DAAD website. Never pay an agent or middleman —
                    this scholarship is 100% free to apply for.
                </p>
            </blockquote>

            <h2 id="tips">Tips before you apply</h2>
            <p>
                Read the eligibility criteria carefully before starting your application. Many rejections
                come from applicants who do not meet the age or discipline requirements. Give yourself
                at least two weeks to prepare a strong motivation letter.
            </p>
            <p>
                If you need help structuring your motivation letter or understanding the requirements,
                read our guide on
                <a href="{{ route('articles.index') }}" style="color:var(--ink); text-decoration:underline; text-underline-offset:3px;">
                    how to write a winning scholarship application
                </a>.
            </p>

            {{-- Apply CTA --}}
            <div style="margin-top:4rem; padding:3.2rem; background:var(--yellow); border-radius:var(--radius);">
                <p style="font-size:1.5rem; font-weight:700; margin-bottom:0.8rem;">
                    Ready to apply?
                </p>
                <p style="font-size:1.4rem; margin-bottom:1.8rem; color:rgba(17,17,16,0.65);">
                    This takes you to the official DAAD application portal. The process is free.
                </p>
                <a
                    href="{{ $opp['apply_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn--primary"
                    style="background:var(--ink); color:var(--bg);"
                >
                    Apply on DAAD ↗
                </a>
            </div>

        </div>

        {{-- Sidebar --}}
        <aside class="article-sidebar" aria-label="Article sidebar">

            {{-- TOC --}}
            <nav class="toc mb-md" aria-label="Table of contents">
                <p class="toc__title">On this page</p>
                <ul class="toc__list">
                    <li><a href="#eligibility" class="toc__link">Who can apply</a></li>
                    <li><a href="#benefits" class="toc__link">What you get</a></li>
                    <li><a href="#how-to-apply" class="toc__link">How to apply</a></li>
                    <li><a href="#tips" class="toc__link">Tips before you apply</a></li>
                </ul>
            </nav>

            {{-- Quick facts --}}
            <div class="sidebar-card mb-md">
                <p class="sidebar-card__title">Quick facts</p>
                <div style="display:flex; flex-direction:column; gap:1rem; margin-top:1.2rem;">
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Type</p>
                        <p style="font-size:1.4rem;">Postgraduate Scholarship</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Location</p>
                        <p style="font-size:1.4rem;">Germany</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Deadline</p>
                        <p style="font-size:1.4rem; color:#F87171;">{{ $opp['deadline'] }}</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Cost to apply</p>
                        <p style="font-size:1.4rem;">Free</p>
                    </div>
                </div>
            </div>

            {{-- WhatsApp notify --}}
            <div class="sidebar-card--yellow" style="padding:2.4rem; border-radius:var(--radius);">
                <p class="sidebar-card__title" style="margin-bottom:0.8rem;">Get deadline alerts</p>
                <p style="font-size:1.3rem; line-height:1.6; color:rgba(17,17,16,0.65); margin-bottom:1.4rem;">
                    We'll notify you on WhatsApp before this closes.
                </p>
                <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
                   class="btn btn--primary" style="background:var(--ink); color:var(--bg); width:100%; justify-content:center;">
                    Join WhatsApp ↗
                </a>
            </div>

        </aside>
    </div>
</div>

{{-- ── RELATED OPPORTUNITIES ── --}}
<section class="section" aria-labelledby="related-heading">
    <div class="container">
        <div class="section-header">
            <div class="section-meta">
                <span class="section-num">—</span>
                <span class="section-tag">More opportunities</span>
            </div>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted">View all →</a>
        </div>
        <h2 id="related-heading" class="display-sm reveal mb-lg">You might also like.</h2>
        <div class="opp-grid" style="grid-template-columns:repeat(3,1fr);">

            <article class="opp-card" data-category="scholarship">
                <div class="opp-card__top">
                    <span class="badge badge--scholar">Scholarship</span>
                    <span class="deadline">21 days left</span>
                </div>
                <h3 class="opp-card__title">MasterCard Foundation Scholars Program 2026</h3>
                <p class="opp-card__desc">Undergrad and grad scholarships at top partner universities. Living allowance included.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via MCF</span>
                    <a href="#" class="opp-card__link">Apply ↗</a>
                </div>
            </article>

            <article class="opp-card" data-category="grant">
                <div class="opp-card__top">
                    <span class="badge badge--grant">Grant</span>
                    <span class="deadline">14 days left</span>
                </div>
                <h3 class="opp-card__title">Tony Elumelu Foundation Grant 2026</h3>
                <p class="opp-card__desc">$5,000 seed funding plus mentorship for African entrepreneurs. All sectors welcome.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via TEF</span>
                    <a href="#" class="opp-card__link">Apply ↗</a>
                </div>
            </article>

            <article class="opp-card" data-category="training">
                <div class="opp-card__top">
                    <span class="badge badge--train">Training</span>
                    <span class="deadline">Open enrollment</span>
                </div>
                <h3 class="opp-card__title">Google Career Certificates — Free for Africans</h3>
                <p class="opp-card__desc">Globally recognized certificates. Data analytics, UX, IT support. Fully subsidized access.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via Coursera</span>
                    <a href="#" class="opp-card__link">Enroll ↗</a>
                </div>
            </article>

        </div>
    </div>
</section>

@endsection