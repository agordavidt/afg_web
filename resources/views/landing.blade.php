@extends('layouts.app')

@section('title', 'Academic Funding Gateway')
@section('meta_description', 'Curated remote work opportunities, scholarships, grants and career guides for Nigerian students and professionals.')

@section('content')

{{-- ── HERO ── --}}
<section class="hero" aria-label="Hero">

    {{-- LEFT — IMAGE SLIDER --}}
    <div class="hero__left" id="heroSlider" aria-label="Opportunity highlights slideshow">

        {{-- Background slides --}}
        <div class="hero__slides" aria-hidden="true">
            <div class="hero__slide active"
                 style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop')">
            </div>
            <div class="hero__slide"
                 style="background-image: url('https://images.unsplash.com/photo-1531545514256-b1400bc00f31?q=80&w=1974&auto=format&fit=crop')">
            </div>
            <div class="hero__slide"
                 style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop')">
            </div>
            <div class="hero__slide"
                 style="background-image: url('https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?q=80&w=1974&auto=format&fit=crop')">
            </div>
        </div>

        {{-- Gradient overlay --}}
        <div class="hero__slide-overlay" aria-hidden="true"></div>

        {{-- Content layer --}}
        <div class="hero__left-content">

            {{-- Slide label + progress bar --}}
            <div class="hero__slide-label">
                {{-- <span class="hero__slide-label-num" id="slideNum">01 / 04</span> --}}
                {{-- <span class="hero__slide-label-bar">
                    <span class="hero__slide-label-progress" id="slideProgress"></span>
                </span>
                <span class="hero__slide-label-text" id="slideLabelText">Remote Work</span> --}}
            </div>

            {{-- The card --}}
            <div class="hero__card reveal">
                <p class="hero__card-title">Academic Funding Gateway</p>
                <p class="hero__card-body">
                    We curate remote work opportunities, scholarships, grants, and practical career
                    guides so you always know where to look next.
                </p>
                {{-- <p class="hero__card-em">
                    From first search to first paycheck — we point the way.
                </p> --}}
                {{-- <a href="{{ route('opportunities.index') }}" class="hero__card-link">
                    View all opportunities <span aria-hidden="true">→</span>
                </a> --}}
            </div>

            {{-- Bottom: est + dot controls --}}
            <div class="hero__bottom">
                <div class="hero__est">
                    {{-- <span>Est.</span>
                    <strong>2024</strong> --}}
                </div>

                <div class="hero__dots" role="tablist" aria-label="Slide selector">
                    <button class="hero__dot active" data-slide="0" role="tab" aria-selected="true" aria-label="Slide 1: Remote Work">
                        {{-- <span class="hero__dot-label">Remote Work</span> --}}
                        <span class="hero__dot-pip"></span>
                    </button>
                    <button class="hero__dot" data-slide="1" role="tab" aria-selected="false" aria-label="Slide 2: Scholarships">
                        {{-- <span class="hero__dot-label">Scholarships</span> --}}
                        <span class="hero__dot-pip"></span>
                    </button>
                    <button class="hero__dot" data-slide="2" role="tab" aria-selected="false" aria-label="Slide 3: Career Guides">
                        {{-- <span class="hero__dot-label">Career Guides</span> --}}
                        <span class="hero__dot-pip"></span>
                    </button>
                    <button class="hero__dot" data-slide="3" role="tab" aria-selected="false" aria-label="Slide 4: Grants">
                        {{-- <span class="hero__dot-label">Grants</span> --}}
                        <span class="hero__dot-pip"></span>
                    </button>
                </div>
            </div>

        </div>{{-- /hero__left-content --}}
    </div>{{-- /hero__left --}}

    <div class="hero__right">
        <div class="hero__watermark" aria-hidden="true">AFG</div>

        {{-- <p class="hero__corner text-muted reveal">
            We curate only verified opportunities — from first search<br>
            to actual application link.
        </p> --}}

        <div class="hero__headline reveal reveal-delay-1">
            <h1 class="display-xl">
                Find remote<br>
                work &amp;<br>
                scholarships<br>
                that pay.
            </h1>
        </div>

        <div class="hero__cta-row reveal reveal-delay-2">
            <a href="{{ route('opportunities.index') }}" class="arrow-btn arrow-btn--yellow" aria-label="Browse opportunities">
                ↗
            </a>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost">Browse opportunities</a>
        </div>
    </div>

</section>

{{-- ── STATS ── --}}
<section class="stats-strip" aria-label="Platform stats">
    <div class="stat-cell reveal">
        <p class="stat-cell__num">48+</p>
        <p class="stat-cell__label">Active opportunities</p>
        <p class="stat-cell__sub">updated weekly</p>
    </div>
    <div class="stat-cell reveal reveal-delay-1">
        <p class="stat-cell__num">12</p>
        <p class="stat-cell__label">Guides published</p>
        <p class="stat-cell__sub">platform walkthroughs & career tips</p>
    </div>
    <div class="stat-cell reveal reveal-delay-2">
        <p class="stat-cell__num">6</p>
        <p class="stat-cell__label">Closing this week</p>
        <p class="stat-cell__sub">apply before deadline</p>
    </div>
    <div class="stat-cell reveal reveal-delay-3">
        <p class="stat-cell__num">4</p>
        <p class="stat-cell__label">Categories</p>
        <p class="stat-cell__sub">remote work · scholarships · grants · training</p>
    </div>
</section>

{{-- ── OPPORTUNITIES ── --}}
<section class="section" aria-labelledby="opp-heading">
    <div class="container">

        <div class="section-header">
            <div class="section-meta">
                <span class="section-num">01 —</span>
                <span class="section-tag">Opportunities</span>
            </div>
            <div class="section-aside">Featured this week</div>
        </div>

        <div class="flex-between mb-md" style="flex-wrap:wrap; gap:1.6rem;">
            <h2 id="opp-heading" class="display-md reveal">Latest opportunities.</h2>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted reveal">
                View all 48 <span aria-hidden="true">→</span>
            </a>
        </div>

        {{-- Filter bar --}}
        <div class="filter-bar mb-lg reveal" role="group" aria-label="Filter opportunities">
            <button class="filter-btn active" data-filter="all" data-target=".js-opp-grid">All</button>
            <button class="filter-btn" data-filter="remote" data-target=".js-opp-grid">Remote work</button>
            <button class="filter-btn" data-filter="scholarship" data-target=".js-opp-grid">Scholarships</button>
            <button class="filter-btn" data-filter="grant" data-target=".js-opp-grid">Grants</button>
            <button class="filter-btn" data-filter="training" data-target=".js-opp-grid">Training</button>
        </div>

        <div class="opp-grid js-opp-grid">

            {{-- Card 1 --}}
            <article class="opp-card" data-category="remote">
                <div class="opp-card__top">
                    <span class="badge badge--remote">Remote work</span>
                    <span class="deadline">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        5 days left
                    </span>
                </div>
                <h3 class="opp-card__title">Customer Support Representative — Fully Remote</h3>
                <p class="opp-card__desc">Open to Nigerian applicants. Equipment provided. $800/mo. Strong English required.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via RemoteOK</span>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="opp-card__link">
                        Apply ↗
                    </a>
                </div>
            </article>

            {{-- Card 2 --}}
            <article class="opp-card" data-category="scholarship">
                <div class="opp-card__top">
                    <span class="badge badge--scholar">Scholarship</span>
                    <span class="deadline deadline--urgent">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        2 days left
                    </span>
                </div>
                <h3 class="opp-card__title">DAAD Scholarships 2026 — Postgraduate, Germany</h3>
                <p class="opp-card__desc">Full funding for African postgrad students. Covers tuition, monthly stipend, and travel allowance.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via DAAD</span>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="opp-card__link">
                        Apply ↗
                    </a>
                </div>
            </article>

            {{-- Card 3 --}}
            <article class="opp-card" data-category="grant">
                <div class="opp-card__top">
                    <span class="badge badge--grant">Grant</span>
                    <span class="deadline">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        14 days left
                    </span>
                </div>
                <h3 class="opp-card__title">Tony Elumelu Foundation Entrepreneurship Grant 2026</h3>
                <p class="opp-card__desc">$5,000 seed funding plus mentorship for African entrepreneurs. Open to all sectors.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via TEF</span>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="opp-card__link">
                        Apply ↗
                    </a>
                </div>
            </article>

            {{-- Card 4 --}}
            <article class="opp-card" data-category="remote">
                <div class="opp-card__top">
                    <span class="badge badge--remote">Remote work</span>
                    <span class="deadline">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Rolling
                    </span>
                </div>
                <h3 class="opp-card__title">Freelance Content Writer — Tech Niche</h3>
                <p class="opp-card__desc">Remote-first company hiring writers globally. Flexible hours. Pays via Payoneer.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via Contra</span>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="opp-card__link">
                        Apply ↗
                    </a>
                </div>
            </article>

            {{-- Card 5 --}}
            <article class="opp-card" data-category="training">
                <div class="opp-card__top">
                    <span class="badge badge--train">Training</span>
                    <span class="deadline">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Open enrollment
                    </span>
                </div>
                <h3 class="opp-card__title">Google Career Certificates — Free for Africans</h3>
                <p class="opp-card__desc">Data analytics, UX design, IT support. Globally recognized. Fully subsidized access for eligible students.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via Coursera</span>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="opp-card__link">
                        Enroll ↗
                    </a>
                </div>
            </article>

            {{-- Card 6 --}}
            <article class="opp-card" data-category="scholarship">
                <div class="opp-card__top">
                    <span class="badge badge--scholar">Scholarship</span>
                    <span class="deadline">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        21 days left
                    </span>
                </div>
                <h3 class="opp-card__title">MasterCard Foundation Scholars Program 2026</h3>
                <p class="opp-card__desc">Undergraduate and graduate scholarships at partner universities. Includes living allowance.</p>
                <div class="opp-card__footer">
                    <span class="opp-card__source">via MCF</span>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="opp-card__link">
                        Apply ↗
                    </a>
                </div>
            </article>

        </div>{{-- /opp-grid --}}

    </div>
</section>

{{-- ── HOW IT WORKS ── --}}
<section class="section" aria-labelledby="how-heading">
    <div class="container">

        <div class="section-header">
            <div class="section-meta">
                <span class="section-num">02 —</span>
                <span class="section-tag">How it works</span>
            </div>
            <div class="section-aside">Simple, every time</div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:start; margin-bottom:6rem;">
            <h2 id="how-heading" class="display-md reveal">How we<br>find them<br>for you.</h2>
            <p class="body-lg text-muted reveal reveal-delay-1" style="padding-top:1rem;">
                We monitor hundreds of sources daily — job boards, scholarship databases, grant portals —
                and bring only the verified, accessible ones here.
                Each listing links directly to the original source. No middlemen.
            </p>
        </div>

        <nav class="process-list" aria-label="How it works steps">

            <div class="process-row reveal">
                <span class="process-row__num">01</span>
                <span class="process-row__title">Discover</span>
                <span class="process-row__desc">
                    We scan remote job boards, scholarship portals, and grant databases.
                    Only opportunities open to Nigerians make the cut.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-1">
                <span class="process-row__num">02</span>
                <span class="process-row__title">Verify</span>
                <span class="process-row__desc">
                    We check each listing — deadline, eligibility, payment method — before it goes live.
                    Expired listings are removed the same day.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-2">
                <span class="process-row__num">03</span>
                <span class="process-row__title">Guide</span>
                <span class="process-row__desc">
                    Alongside every platform we feature, we publish a practical how-to guide —
                    so you show up prepared, not lost.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-3">
                <span class="process-row__num">04</span>
                <span class="process-row__title">Share</span>
                <span class="process-row__desc">
                    Every article and listing is built to share. Drop a link in your WhatsApp group —
                    let others find their next opportunity too.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

        </nav>

    </div>
</section>

{{-- ── ARTICLES ── --}}
<section class="section" aria-labelledby="articles-heading">
    <div class="container">

        <div class="section-header">
            <div class="section-meta">
                <span class="section-num">03 —</span>
                <span class="section-tag">Guides &amp; Articles</span>
            </div>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted">
                View all <span aria-hidden="true">→</span>
            </a>
        </div>

        <h2 id="articles-heading" class="display-md reveal mb-lg">Read before<br>you apply.</h2>

        <div class="article-grid">

            <article class="article-card reveal">
                <div class="article-card__img" aria-hidden="true">
                    <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </div>
                </div>
                <p class="article-card__cat">Remote work</p>
                <h3 class="article-card__title">How to Set Up Your Upwork Profile as a Nigerian and Get Your First Client</h3>
                <p class="article-card__excerpt">Account creation, identity verification with Nigerian documents, profile optimization, and landing that crucial first contract.</p>
                <div class="article-card__meta">
                    <span>6 min read</span>
                    <span>June 2026</span>
                </div>
            </article>

            <article class="article-card reveal reveal-delay-1">
                <div class="article-card__img" aria-hidden="true">
                    <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </div>
                </div>
                <p class="article-card__cat">Scholarships</p>
                <h3 class="article-card__title">5 Fully Funded Scholarships Open to Nigerians Right Now</h3>
                <p class="article-card__excerpt">DAAD, MasterCard Foundation, Commonwealth, Chevening, and more — with direct application links and eligibility breakdowns.</p>
                <div class="article-card__meta">
                    <span>4 min read</span>
                    <span>June 2026</span>
                </div>
            </article>

            <article class="article-card reveal reveal-delay-2">
                <div class="article-card__img" aria-hidden="true">
                    <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    </div>
                </div>
                <p class="article-card__cat">Platforms &amp; tools</p>
                <h3 class="article-card__title">Payoneer vs Wise: The Best Way to Receive Remote Pay in Nigeria</h3>
                <p class="article-card__excerpt">Fees, withdrawal limits, setup time, and which banks accept each. A practical comparison for Nigerian freelancers.</p>
                <div class="article-card__meta">
                    <span>5 min read</span>
                    <span>May 2026</span>
                </div>
            </article>

        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<section class="cta-section" aria-labelledby="cta-heading">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container">
        <div class="cta-section__grid">

            <div>
                <p class="cta-section__tag">Updated weekly</p>
                <h2 id="cta-heading" class="display-lg reveal" style="color:var(--dark-ink);">
                    Ready to find<br>your next<br>opportunity?
                </h2>
                <p class="body-lg reveal reveal-delay-1" style="color:rgba(242,241,239,0.6); margin-top:2.4rem; max-width:40rem;">
                    Join our WhatsApp community and get notified the moment a new remote job
                    or scholarship is added.
                </p>
                <div class="flex-center gap-md mt-md reveal reveal-delay-2">
                    <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
                       class="btn btn--dark">
                        Join WhatsApp community ↗
                    </a>
                    <a href="{{ route('opportunities.index') }}" class="btn--ghost" style="color:rgba(242,241,239,0.6);">
                        Browse now →
                    </a>
                </div>
            </div>

            <div class="cta-section__right reveal reveal-delay-1">
                <div class="cta-detail-block">
                    <p class="cta-detail-block__title">What you get</p>
                    <ul class="cta-detail-block__list">
                        <li>Verified remote jobs open to Nigerians</li>
                        <li>Active scholarship &amp; grant listings with deadlines</li>
                        <li>Step-by-step platform guides</li>
                        <li>Weekly WhatsApp alerts for new listings</li>
                    </ul>
                </div>

                <div class="cta-detail-block">
                    <p class="cta-detail-block__title">How to stay updated</p>
                    <ul class="cta-detail-block__list">
                        <li>Bookmark this site and check weekly</li>
                        <li>Join our WhatsApp community for alerts</li>
                        <li>Follow us on YouTube for platform walkthroughs</li>
                    </ul>
                </div>

                <form class="js-notify-form" style="display:flex; gap:1rem; flex-wrap:wrap;" novalidate>
                    <input
                        type="tel"
                        placeholder="Your WhatsApp number"
                        style="flex:1; min-width:18rem; padding:1.2rem 1.6rem; font-family:var(--font); font-size:1.4rem; background:rgba(242,241,239,0.08); border:1px solid rgba(242,241,239,0.2); border-radius:10rem; color:var(--dark-ink); outline:none;"
                        aria-label="Your WhatsApp number"
                    />
                    <button type="submit" class="btn btn--dark">Notify me</button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    const INTERVAL   = 5000;
    const slides     = document.querySelectorAll('.hero__slide');
    const dots       = document.querySelectorAll('.hero__dot');
    const numEl      = document.getElementById('slideNum');
    const labelEl    = document.getElementById('slideLabelText');
    const progressEl = document.getElementById('slideProgress');

    if (!slides.length) return;

    const labels = ['Remote Work', 'Scholarships', 'Career Guides', 'Grants'];
    let current  = 0;
    let timer    = null;

    function pad(n) { return String(n + 1).padStart(2, '0'); }

    function goTo(idx, restart) {
        slides[current].classList.remove('active');
        slides[current].classList.add('exit');
        const exiting = current;
        setTimeout(() => slides[exiting].classList.remove('exit'), 1300);

        dots[current].classList.remove('active');
        dots[current].setAttribute('aria-selected', 'false');

        current = ((idx % slides.length) + slides.length) % slides.length;

        slides[current].classList.add('active');
        dots[current].classList.add('active');
        dots[current].setAttribute('aria-selected', 'true');

        if (numEl)   numEl.textContent   = pad(current) + ' / ' + pad(slides.length - 1);
        if (labelEl) labelEl.textContent = labels[current] || '';

        // Reset + restart progress bar
        if (progressEl) {
            progressEl.style.transition = 'none';
            progressEl.style.width = '0%';
            void progressEl.offsetWidth;
            progressEl.style.transition = 'width ' + INTERVAL + 'ms linear';
            progressEl.style.width = '100%';
        }

        if (restart !== false) startAuto();
    }

    function startAuto() {
        clearInterval(timer);
        timer = setInterval(() => goTo(current + 1, false), INTERVAL);
    }

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => { if (i !== current) goTo(i); });
    });

    const slider = document.getElementById('heroSlider');

    slider?.addEventListener('keydown', e => {
        if (e.key === 'ArrowDown'  || e.key === 'ArrowRight') { e.preventDefault(); goTo(current + 1); }
        if (e.key === 'ArrowUp'    || e.key === 'ArrowLeft')  { e.preventDefault(); goTo(current - 1); }
    });

    slider?.addEventListener('mouseenter', () => clearInterval(timer));
    slider?.addEventListener('mouseleave', () => startAuto());

    let tx = 0;
    slider?.addEventListener('touchstart', e => { tx = e.touches[0].clientX; }, { passive: true });
    slider?.addEventListener('touchend',   e => {
        const dx = e.changedTouches[0].clientX - tx;
        if (Math.abs(dx) > 40) goTo(dx < 0 ? current + 1 : current - 1);
    }, { passive: true });

    // Boot — trigger first progress bar
    if (progressEl) {
        progressEl.style.transition = 'width ' + INTERVAL + 'ms linear';
        progressEl.style.width = '100%';
    }
    startAuto();
})();
</script>
@endpush