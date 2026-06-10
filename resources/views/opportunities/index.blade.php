@extends('layouts.app')

@section('title', 'Opportunities')
@section('meta_description', 'Browse all remote work jobs, scholarships, grants and training opportunities curated for Nigerians.')

@section('content')

{{-- ── PAGE HERO ── --}}
<div class="page-hero">
    <div class="container">
        <div class="page-hero__inner">
            <div>
                <div class="page-hero__breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>—</span>
                    <span>Opportunities</span>
                </div>
                <p class="label mb-sm">04 — All opportunities</p>
                <h1 class="display-lg reveal">All<br>opportunities.</h1>
            </div>
            <div class="page-hero__right">
                <div class="urgent-bar" style="max-width:32rem;" role="alert">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Listings marked with a red border close within 48 hours
                </div>
                <p class="body-sm" style="max-width:30rem;">
                    Every opportunity links directly to the original source.
                    We verify each listing before publishing and remove expired ones daily.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- ── CONTROLS ── --}}
<div class="container">
    <div class="board-controls">

        <div class="search-wrap">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input
                type="search"
                class="search-input js-search"
                placeholder="Search opportunities..."
                aria-label="Search opportunities"
            />
        </div>

        <div class="filter-bar" role="group" aria-label="Filter by type">
            <button class="filter-btn active" data-filter="all" data-target=".js-filterable">All</button>
            <button class="filter-btn" data-filter="remote" data-target=".js-filterable">Remote work</button>
            <button class="filter-btn" data-filter="scholarship" data-target=".js-filterable">Scholarships</button>
            <button class="filter-btn" data-filter="grant" data-target=".js-filterable">Grants</button>
            <button class="filter-btn" data-filter="training" data-target=".js-filterable">Training</button>
        </div>

        <select class="board-select js-sort" aria-label="Sort by">
            <option value="newest">Sort: Newest</option>
            <option value="deadline">Sort: Deadline</option>
        </select>

        <span class="board-count js-count" aria-live="polite">8 results</span>
    </div>
</div>

{{-- ── BOARD LIST ── --}}
<div class="container">
    <div class="board-list js-filterable">

        {{-- Item 1 --}}
        <article class="board-item js-searchable" data-category="scholarship" data-days="2" data-ts="1748995200" style="border-left:2px solid #A32D2D;">
            <div class="board-item__badges">
                <span class="badge badge--scholar">Scholarship</span>
                <span class="deadline deadline--urgent">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    2 days left
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">DAAD Scholarships 2026 — Postgraduate, Germany</h2>
                <p class="board-item__desc">Full funding for African postgraduate students. Covers tuition fees, a monthly stipend of €934, travel allowance, and health insurance. Open to all disciplines.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via DAAD</span>
                <a href="https://www.daad.de" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

        {{-- Item 2 --}}
        <article class="board-item js-searchable" data-category="remote" data-days="5" data-ts="1748908800">
            <div class="board-item__badges">
                <span class="badge badge--remote">Remote work</span>
                <span class="deadline">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    5 days left
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">Customer Support Representative — Fully Remote</h2>
                <p class="board-item__desc">Teleperformance is hiring remote support representatives open to applicants in Nigeria. $800/month. Strong English required. Equipment shipped to you. Training provided.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via RemoteOK</span>
                <a href="https://remoteok.com" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

        {{-- Item 3 --}}
        <article class="board-item js-searchable" data-category="grant" data-days="14" data-ts="1748822400">
            <div class="board-item__badges">
                <span class="badge badge--grant">Grant</span>
                <span class="deadline">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    14 days left
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">Tony Elumelu Foundation Entrepreneurship Grant 2026</h2>
                <p class="board-item__desc">$5,000 seed funding plus mentorship for African entrepreneurs. Open to all sectors. Includes a 10-week business training programme and access to TEF's pan-African network.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via TEF</span>
                <a href="https://www.tonyelumelufoundation.org" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

        {{-- Item 4 --}}
        <article class="board-item js-searchable" data-category="scholarship" data-days="21" data-ts="1748736000">
            <div class="board-item__badges">
                <span class="badge badge--scholar">Scholarship</span>
                <span class="deadline">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    21 days left
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">MasterCard Foundation Scholars Program 2026</h2>
                <p class="board-item__desc">Undergraduate and graduate scholarships at top partner universities across Africa and globally. Covers tuition, accommodation, and a monthly living allowance. Academic excellence required.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via MCF</span>
                <a href="https://mastercardfdn.org" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

        {{-- Item 5 --}}
        <article class="board-item js-searchable" data-category="remote" data-days="999" data-ts="1748649600">
            <div class="board-item__badges">
                <span class="badge badge--remote">Remote work</span>
                <span class="deadline">Rolling</span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">Freelance Content Writer — Tech Niche</h2>
                <p class="board-item__desc">Remote-first company hiring writers globally. Flexible hours, pay per article. Requires strong written English and basic tech knowledge. Payment via Payoneer accepted.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via Contra</span>
                <a href="https://contra.com" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

        {{-- Item 6 --}}
        <article class="board-item js-searchable" data-category="training" data-days="999" data-ts="1748563200">
            <div class="board-item__badges">
                <span class="badge badge--train">Training</span>
                <span class="deadline">Open enrollment</span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">Google Career Certificates — Free for Africans</h2>
                <p class="board-item__desc">Data analytics, UX design, IT support, project management. Globally recognized certificates. Fully subsidized access available for eligible students via the Grow with Google Africa program.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via Coursera</span>
                <a href="https://coursera.org" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Enroll ↗
                </a>
            </div>
        </article>

        {{-- Item 7 --}}
        <article class="board-item js-searchable" data-category="remote" data-days="10" data-ts="1748476800">
            <div class="board-item__badges">
                <span class="badge badge--remote">Remote work</span>
                <span class="deadline">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    10 days left
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">Virtual Assistant — Executive Support (Part-time)</h2>
                <p class="board-item__desc">US-based startup hiring a part-time virtual assistant for calendar management, email triage, and research tasks. $15/hr. 20 hrs/week. Payoneer or Wise.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via We Work Remotely</span>
                <a href="https://weworkremotely.com" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

        {{-- Item 8 --}}
        <article class="board-item js-searchable" data-category="grant" data-days="30" data-ts="1748390400">
            <div class="board-item__badges">
                <span class="badge badge--grant">Grant</span>
                <span class="deadline">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    30 days left
                </span>
            </div>
            <div class="board-item__body">
                <h2 class="board-item__title">YouthConnekt Africa Innovation Grant</h2>
                <p class="board-item__desc">Grants of up to $10,000 for youth-led innovation projects in agriculture, health, and technology. Open to African applicants aged 18–35. Includes a mentorship component.</p>
            </div>
            <div class="board-item__right">
                <span class="board-item__source">via YouthConnekt</span>
                <a href="#" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                    Apply ↗
                </a>
            </div>
        </article>

    </div>{{-- /board-list --}}
</div>

{{-- ── BOTTOM CTA ── --}}
<section class="cta-section" style="padding:8rem 0;" aria-label="Stay updated">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container" style="text-align:center; max-width:72rem;">
        <p class="cta-section__tag" style="justify-content:center;">Never miss a deadline</p>
        <h2 class="display-md reveal" style="color:var(--dark-ink); margin-bottom:2rem;">
            Get notified when new<br>opportunities drop.
        </h2>
        <p class="body-lg reveal reveal-delay-1" style="color:rgba(242,241,239,0.6); margin-bottom:3.2rem;">
            Join our WhatsApp community. We post new listings as soon as they go live.
        </p>
        <div class="flex-center gap-md reveal reveal-delay-2" style="justify-content:center; flex-wrap:wrap;">
            <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
               class="btn btn--dark">
                Join WhatsApp community ↗
            </a>
            <a href="{{ route('articles.index') }}" class="btn--ghost" style="color:rgba(242,241,239,0.6);">
                Read our guides →
            </a>
        </div>
    </div>
</section>

@endsection