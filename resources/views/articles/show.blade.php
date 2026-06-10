@extends('layouts.app')

@section('title', 'How to Set Up Your Upwork Profile as a Nigerian')
@section('meta_description', 'Account creation, identity verification with Nigerian documents, profile optimization, and landing your first paid Upwork contract.')

@section('content')

{{-- ── ARTICLE HERO ── --}}
<div class="article-hero">
    <div class="container">

        <div class="page-hero__breadcrumb" style="padding-top:8rem;">
            <a href="{{ route('home') }}">Home</a>
            <span>—</span>
            <a href="{{ route('articles.index') }}">Articles</a>
            <span>—</span>
            <span>Remote work</span>
        </div>

        <div class="article-meta-row">
            <span class="label" style="color:var(--ink-muted);">Remote work</span>
            <span class="body-sm">6 min read</span>
            <span class="body-sm">June 5, 2026</span>
            <button
                class="article-share-btn js-wa-share"
                data-title="How to Set Up Your Upwork Profile as a Nigerian and Get Your First Client"
                aria-label="Share on WhatsApp"
            >
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                Share
            </button>
        </div>

        <h1 class="display-md reveal" style="padding-bottom:4rem; max-width:84rem;">
            How to Set Up Your Upwork Profile as a Nigerian and Get Your First Client
        </h1>

    </div>
</div>

{{-- Featured image placeholder --}}
<div style="width:100%; aspect-ratio:21/9; background:rgba(17,17,16,0.06); display:flex; align-items:center; justify-content:center; border-bottom:1px solid var(--border);" aria-hidden="true">
    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.2)" stroke-width="1"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
</div>

{{-- ── CONTENT ── --}}
<div class="container">
    <div class="article-layout">

        {{-- Body --}}
        <article class="article-body">

            <p style="font-size:1.9rem; font-weight:500; line-height:1.6; margin-bottom:3.2rem; color:var(--ink);">
                Upwork is one of the most accessible platforms for Nigerian freelancers — but only if your profile is set up correctly from day one. This guide walks through every step from account creation to landing your first paid contract.
            </p>

            <h2 id="account">1. Create your account the right way</h2>
            <p>
                Use your real name and a professional photo. Upwork is strict about identity verification — you will need a valid ID. Nigerian passports, NIN slips, and driver's licences are all accepted.
            </p>
            <p>
                Do not use a VPN during signup or verification. Upwork's fraud detection flags accounts created through VPNs, and reversing a suspension is very difficult. Sign up from your regular Nigerian IP address.
            </p>

            <blockquote>
                <p>Use your real name and a clear, professional headshot. Your photo is the first thing a client sees — make it count.</p>
            </blockquote>

            <h2 id="profile">2. Build a profile that converts</h2>
            <p>
                Your profile title should name exactly what you do and who you do it for. "Customer Support Specialist for SaaS Companies" converts better than "Customer Support Expert." Be specific.
            </p>
            <p>
                Your overview (bio) should open with the client's problem, not your credentials. Start with what you solve, then explain how you solve it, then mention your experience. Three paragraphs maximum.
            </p>
            <ul>
                <li>Choose a single skill category to start — generalists rarely win early</li>
                <li>Add your top five skills — these drive search visibility</li>
                <li>Set your hourly rate 20–30% below market for your first month to build reviews</li>
                <li>Upload at least one portfolio sample, even if it is a self-initiated project</li>
            </ul>

            <h2 id="verification">3. Pass identity verification</h2>
            <p>
                Upwork will ask you to verify your identity before you can submit proposals. Have your Nigerian passport or NIN slip ready. The verification video takes about two minutes — find a well-lit, quiet space.
            </p>
            <p>
                If your verification is rejected, check that your document is not expired and that the photo matches your profile. Contact Upwork support directly — do not create a second account.
            </p>

            <h2 id="proposals">4. Write proposals that get read</h2>
            <p>
                Most proposals are ignored because they start with "Dear Hiring Manager, I am interested in this job." Instead, open with something specific about the client's posting that shows you actually read it.
            </p>
            <p>
                Keep it under 150 words for your first proposal. Answer the job description directly, mention one relevant piece of experience, and end with a single clear question that invites a reply.
            </p>

            <h2 id="payment">5. Set up your payment method</h2>
            <p>
                Upwork pays out via Payoneer, direct bank transfer (USD), or wire transfer. For Nigerian freelancers, Payoneer is the most reliable option — set it up before you win your first contract so there is no delay when payment arrives.
            </p>
            <p>
                Read our full guide on receiving remote pay in Nigeria:
                <a href="{{ route('articles.index') }}" style="color:var(--ink); text-decoration:underline; text-underline-offset:3px;">
                    Payoneer vs Wise — which is better for Nigerian freelancers?
                </a>
            </p>

            {{-- Related opportunity callout --}}
            <div style="margin:3.2rem 0; padding:2.4rem; border:1px solid var(--border); border-radius:var(--radius); display:flex; align-items:center; justify-content:space-between; gap:1.6rem; flex-wrap:wrap;">
                <div>
                    <p style="font-size:1.2rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:var(--ink-muted); margin-bottom:0.4rem;">Related opportunity</p>
                    <p style="font-size:1.5rem; font-weight:600;">Freelance Content Writer — Remote, via Contra</p>
                    <p class="body-sm">Rolling applications. Pays via Payoneer.</p>
                </div>
                <a href="{{ route('opportunities.index') }}" class="btn btn--primary">View ↗</a>
            </div>

            <h2 id="first-client">6. Land your first client</h2>
            <p>
                Apply to 3–5 jobs per day for the first two weeks. Focus on jobs posted within the last 24 hours — response rates drop sharply after 48 hours. Filter for clients who have verified payment methods and have hired before.
            </p>
            <p>
                When you win your first contract, over-deliver on the first milestone. A five-star review from your first client is the single most valuable thing on Upwork — it unlocks the algorithm and puts your proposals in front of more clients automatically.
            </p>

        </article>

        {{-- Sidebar --}}
        <aside class="article-sidebar" aria-label="Article sidebar">

            <nav class="toc mb-md" aria-label="Table of contents">
                <p class="toc__title">In this guide</p>
                <ul class="toc__list">
                    <li><a href="#account" class="toc__link">Create your account</a></li>
                    <li><a href="#profile" class="toc__link">Build a profile that converts</a></li>
                    <li><a href="#verification" class="toc__link">Pass identity verification</a></li>
                    <li><a href="#proposals" class="toc__link">Write proposals that get read</a></li>
                    <li><a href="#payment" class="toc__link">Set up your payment method</a></li>
                    <li><a href="#first-client" class="toc__link">Land your first client</a></li>
                </ul>
            </nav>

            <div class="sidebar-card mb-md">
                <p class="sidebar-card__title">Quick facts</p>
                <div style="display:flex; flex-direction:column; gap:1rem; margin-top:1.2rem;">
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Platform</p>
                        <p style="font-size:1.4rem;">Upwork</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Nigeria eligible</p>
                        <p style="font-size:1.4rem;">Yes</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Payment method</p>
                        <p style="font-size:1.4rem;">Payoneer, Bank transfer</p>
                    </div>
                    <div>
                        <p style="font-size:1.1rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(242,241,239,0.4); margin-bottom:0.3rem;">Free to join</p>
                        <p style="font-size:1.4rem;">Yes (platform fee on earnings)</p>
                    </div>
                </div>
            </div>

            <div class="sidebar-card--yellow" style="padding:2.4rem; border-radius:var(--radius); margin-bottom:2rem;">
                <p class="sidebar-card__title" style="margin-bottom:0.8rem;">New opportunities drop weekly</p>
                <p style="font-size:1.3rem; line-height:1.6; color:rgba(17,17,16,0.65); margin-bottom:1.4rem;">
                    Join our WhatsApp community and get notified.
                </p>
                <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
                   class="btn btn--primary" style="background:var(--ink); color:var(--bg); width:100%; justify-content:center;">
                    Join WhatsApp ↗
                </a>
            </div>

            <div style="border:1px solid var(--border); padding:2.4rem; border-radius:var(--radius);">
                <p class="toc__title" style="margin-bottom:1.2rem;">Related guides</p>
                <div style="display:flex; flex-direction:column; gap:1.2rem;">
                    <a href="#" class="body-sm" style="color:var(--ink); display:block; transition:color 0.2s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--ink-muted)'">Payoneer vs Wise: Best for Nigerian Freelancers →</a>
                    <a href="#" class="body-sm" style="color:var(--ink); display:block; transition:color 0.2s;">How to Write a Fiverr Gig That Gets Orders →</a>
                    <a href="#" class="body-sm" style="color:var(--ink); display:block; transition:color 0.2s;">The 5 Most In-Demand Remote Skills for 2026 →</a>
                </div>
            </div>

        </aside>
    </div>
</div>

{{-- ── MORE ARTICLES ── --}}
<section class="section" aria-labelledby="more-heading">
    <div class="container">
        <div class="section-header">
            <div class="section-meta">
                <span class="section-num">—</span>
                <span class="section-tag">More guides</span>
            </div>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted">View all →</a>
        </div>
        <h2 id="more-heading" class="display-sm reveal mb-lg">Keep reading.</h2>
        <div class="article-grid" style="grid-template-columns:repeat(3,1fr);">

            <article class="article-card">
                <div class="article-card__img" aria-hidden="true">
                    <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    </div>
                </div>
                <p class="article-card__cat">Platforms &amp; tools</p>
                <h3 class="article-card__title">Payoneer vs Wise: The Best Way to Receive Remote Pay in Nigeria</h3>
                <div class="article-card__meta"><span>5 min read</span><span>May 2026</span></div>
            </article>

            <article class="article-card">
                <div class="article-card__img" aria-hidden="true">
                    <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </div>
                </div>
                <p class="article-card__cat">Scholarships</p>
                <h3 class="article-card__title">5 Fully Funded Scholarships Open to Nigerians Right Now</h3>
                <div class="article-card__meta"><span>4 min read</span><span>June 2026</span></div>
            </article>

            <article class="article-card">
                <div class="article-card__img" aria-hidden="true">
                    <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    </div>
                </div>
                <p class="article-card__cat">Career</p>
                <h3 class="article-card__title">The 5 Most In-Demand Remote Skills for Nigerians in 2026</h3>
                <div class="article-card__meta"><span>5 min read</span><span>April 2026</span></div>
            </article>

        </div>
    </div>
</section>

@endsection