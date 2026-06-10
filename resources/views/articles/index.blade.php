@extends('layouts.app')

@section('title', 'Guides & Articles')
@section('meta_description', 'Practical guides on remote work platforms, scholarship applications, freelancing, and career development for Nigerians.')

@section('content')

{{-- ── PAGE HERO ── --}}
<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <div class="page-hero__breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>—</span>
                    <span>Articles</span>
                </div>
                <p class="label mb-sm">05 — Guides &amp; Articles</p>
                <h1 class="display-lg reveal">Read before<br>you apply.</h1>
            </div>
            <div class="page-hero__right">
                <p class="body-lg text-muted" style="max-width:36rem;">
                    Platform walkthroughs, scholarship application tips, and career guides —
                    written specifically for Nigerians navigating remote work and global opportunities.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- ── FILTER + SEARCH ── --}}
<div class="container" style="padding-top:3.2rem; padding-bottom:3.2rem; border-bottom:1px solid var(--border);">
    <div style="display:flex; align-items:center; gap:2rem; flex-wrap:wrap;">
        <div class="search-wrap">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input
                type="search"
                class="search-input js-search"
                placeholder="Search articles..."
                aria-label="Search articles"
            />
        </div>

        <div class="filter-bar" role="group" aria-label="Filter by category">
            <button class="filter-btn active" data-filter="all" data-target=".js-filterable">All</button>
            <button class="filter-btn" data-filter="remote" data-target=".js-filterable">Remote work</button>
            <button class="filter-btn" data-filter="scholarship" data-target=".js-filterable">Scholarships</button>
            <button class="filter-btn" data-filter="platforms" data-target=".js-filterable">Platforms &amp; tools</button>
            <button class="filter-btn" data-filter="career" data-target=".js-filterable">Career</button>
        </div>

        <span class="board-count js-count" style="margin-left:auto;">6 articles</span>
    </div>
</div>

{{-- ── FEATURED ARTICLE ── --}}
<div class="container" style="padding-top:4rem; padding-bottom:0;">
    <p class="label mb-md">Featured</p>
    <a href="{{ route('articles.show', 'upwork-profile-nigerian') }}" style="display:block;">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:0; border:1px solid var(--border); border-radius:var(--radius); overflow:hidden; transition:border-color 0.2s;" onmouseover="this.style.borderColor='var(--ink)'" onmouseout="this.style.borderColor='var(--border)'">
            <div style="background:rgba(17,17,16,0.05); min-height:32rem; display:flex; align-items:center; justify-content:center;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.2)" stroke-width="1" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <div style="padding:4rem; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <p class="label mb-sm" style="color:var(--ink-muted);">Remote work</p>
                    <h2 class="display-sm" style="margin-bottom:1.6rem;">How to Set Up Your Upwork Profile as a Nigerian and Get Your First Client</h2>
                    <p class="body-lg text-muted">Account creation, identity verification with Nigerian documents, profile optimization, and landing that crucial first contract.</p>
                </div>
                <div style="display:flex; align-items:center; gap:1.6rem; margin-top:3.2rem; padding-top:2.4rem; border-top:1px solid var(--border);">
                    <span class="body-sm">6 min read</span>
                    <span class="body-sm">June 5, 2026</span>
                    <span class="btn--ghost" style="margin-left:auto;">Read article →</span>
                </div>
            </div>
        </div>
    </a>
</div>

{{-- ── ARTICLE GRID ── --}}
<div class="container" style="padding-top:4rem; padding-bottom:0;">
    <p class="label mb-md">All articles</p>
    <div class="article-grid js-filterable">

        <article class="article-card js-searchable" data-category="scholarship">
            <div class="article-card__img" aria-hidden="true">
                <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
            </div>
            <p class="article-card__cat">Scholarships</p>
            <h2 class="article-card__title">5 Fully Funded Scholarships Open to Nigerians Right Now</h2>
            <p class="article-card__excerpt">DAAD, MasterCard Foundation, Commonwealth, Chevening, and more — with direct application links and eligibility breakdowns.</p>
            <div class="article-card__meta">
                <span>4 min read</span>
                <span>June 2026</span>
            </div>
        </article>

        <article class="article-card js-searchable" data-category="platforms">
            <div class="article-card__img" aria-hidden="true">
                <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
            </div>
            <p class="article-card__cat">Platforms &amp; tools</p>
            <h2 class="article-card__title">Payoneer vs Wise: The Best Way to Receive Remote Pay in Nigeria</h2>
            <p class="article-card__excerpt">Fees, withdrawal limits, setup time, and which banks accept each. A practical comparison for Nigerian freelancers.</p>
            <div class="article-card__meta">
                <span>5 min read</span>
                <span>May 2026</span>
            </div>
        </article>

        <article class="article-card js-searchable" data-category="remote">
            <div class="article-card__img" aria-hidden="true">
                <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </div>
            </div>
            <p class="article-card__cat">Remote work</p>
            <h2 class="article-card__title">How to Write a Fiverr Gig Description That Actually Gets Orders</h2>
            <p class="article-card__excerpt">The gig title formula, pricing tiers, keywords that rank, and the mistakes that kill first impressions.</p>
            <div class="article-card__meta">
                <span>7 min read</span>
                <span>May 2026</span>
            </div>
        </article>

        <article class="article-card js-searchable" data-category="career">
            <div class="article-card__img" aria-hidden="true">
                <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
            </div>
            <p class="article-card__cat">Career</p>
            <h2 class="article-card__title">The 5 Most In-Demand Remote Skills for Nigerians in 2026</h2>
            <p class="article-card__excerpt">Data analysis, copywriting, virtual assistance, UI design, and customer support — with free resources to learn each one.</p>
            <div class="article-card__meta">
                <span>5 min read</span>
                <span>April 2026</span>
            </div>
        </article>

        <article class="article-card js-searchable" data-category="platforms">
            <div class="article-card__img" aria-hidden="true">
                <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
                </div>
            </div>
            <p class="article-card__cat">Platforms &amp; tools</p>
            <h2 class="article-card__title">Toptal vs Upwork vs Contra: Which Pays Nigerian Freelancers Better?</h2>
            <p class="article-card__excerpt">A frank comparison of three major freelance platforms — vetting requirements, payment methods, fee structures, and real earning potential.</p>
            <div class="article-card__meta">
                <span>8 min read</span>
                <span>April 2026</span>
            </div>
        </article>

        <article class="article-card js-searchable" data-category="scholarship">
            <div class="article-card__img" aria-hidden="true">
                <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5" aria-hidden="true"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                </div>
            </div>
            <p class="article-card__cat">Scholarships</p>
            <h2 class="article-card__title">How to Write a Scholarship Motivation Letter That Gets Noticed</h2>
            <p class="article-card__excerpt">Structure, tone, common mistakes, and a template you can adapt — based on what DAAD, Chevening, and MCF reviewers actually want to read.</p>
            <div class="article-card__meta">
                <span>6 min read</span>
                <span>March 2026</span>
            </div>
        </article>

    </div>
</div>

{{-- ── CTA ── --}}
<section class="cta-section" style="padding:8rem 0; margin-top:8rem;" aria-label="Stay updated">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container" style="text-align:center; max-width:72rem;">
        <p class="cta-section__tag" style="justify-content:center;">Have a topic in mind?</p>
        <h2 class="display-md reveal" style="color:var(--dark-ink); margin-bottom:2rem;">
            Request a guide.
        </h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(242,241,239,0.6); margin-bottom:3.2rem;">
            Is there a platform, scholarship, or career topic you want us to cover?
            Send us a message on WhatsApp and we'll write it.
        </p>
        <div class="flex-center gap-md reveal reveal-delay-2" style="justify-content:center; flex-wrap:wrap;">
            <a href="https://wa.me/2349134448135?text=Hi%2C+please+write+a+guide+on..." target="_blank" rel="noopener noreferrer"
               class="btn btn--dark">
                Request a guide ↗
            </a>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost" style="color:rgba(242,241,239,0.6);">
                Browse opportunities →
            </a>
        </div>
    </div>
</section>

@endsection