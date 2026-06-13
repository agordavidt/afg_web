@extends('layouts.app')

@section('title', 'AFG — Remote jobs, scholarships and grants for Nigerians')
@section('meta_description', 'AFG is where ambitious Nigerians find verified remote jobs, scholarships, grants and training — plus honest guides on how to actually get them.')

@section('content')

{{-- ── HERO ── --}}
<section class="hero" aria-label="Introduction">

    {{-- LEFT — IMAGE SLIDER --}}
    <div class="hero__left" id="heroSlider" aria-label="Opportunity highlights slideshow">

        <div class="hero__slides" aria-hidden="true">
            <div class="hero__slide active" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image: url('https://images.unsplash.com/photo-1531545514256-b1400bc00f31?q=80&w=1974&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image: url('https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?q=80&w=1974&auto=format&fit=crop')"></div>
        </div>

        <div class="hero__slide-overlay" aria-hidden="true"></div>

        <div class="hero__left-content">

            <div class="hero__slide-label" aria-hidden="true"></div>

            <div class="hero__card reveal">
               <p class="hero__card-title">Academic Funding Gateway</p>
                <p class="hero__card-body">
                    We hands-on check and share remote jobs, international scholarships, and funding opportunities 
                    built to help students and professionals launch what's next.
                </p>               
            </div>

            <div class="hero__bottom">
                <div class="hero__est" aria-hidden="true"></div>

                <div class="hero__dots" role="tablist" aria-label="Slide selector">
                    <button class="hero__dot active" data-slide="0" role="tab" aria-selected="true" aria-label="Slide 1"><span class="hero__dot-pip"></span></button>
                    <button class="hero__dot" data-slide="1" role="tab" aria-selected="false" aria-label="Slide 2"><span class="hero__dot-pip"></span></button>
                    <button class="hero__dot" data-slide="2" role="tab" aria-selected="false" aria-label="Slide 3"><span class="hero__dot-pip"></span></button>
                    <button class="hero__dot" data-slide="3" role="tab" aria-selected="false" aria-label="Slide 4"><span class="hero__dot-pip"></span></button>
                </div>
            </div>

        </div>
    </div>

    {{-- RIGHT — HEADLINE --}}
    <div class="hero__right">
        <div class="hero__watermark" aria-hidden="true">AFG</div>

        <div class="hero__headline reveal reveal-delay-1">
            <h1 class="display-xl">
                Remote work
                and scholarships
                worth your
                time.
            </h1>
        </div>

        <div class="hero__cta-row reveal reveal-delay-2">
            <a href="{{ route('opportunities.index') }}" class="arrow-btn arrow-btn--yellow" aria-label="Browse opportunities">↗</a>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost">Browse opportunities</a>
        </div>
    </div>

</section>

{{-- ── STATS ── --}}
<section class="stats-strip" aria-label="At a glance">
    <div class="stat-cell reveal">
        <p class="stat-cell__num">{{ \App\Models\Opportunity::active()->count() }}+</p>
        <p class="stat-cell__label">Open right now</p>
        <p class="stat-cell__sub">new ones added weekly</p>
    </div>
    <div class="stat-cell reveal reveal-delay-1">
        <p class="stat-cell__num">{{ \App\Models\Article::published()->count() }}</p>
        <p class="stat-cell__label">Guides you can actually use</p>
        <p class="stat-cell__sub">written from real applications</p>
    </div>
    <div class="stat-cell reveal reveal-delay-2">
        <p class="stat-cell__num">{{ \App\Models\Opportunity::active()->where('is_urgent', true)->count() }}</p>
        <p class="stat-cell__label">Closing soon</p>
        <p class="stat-cell__sub">don't sit on these</p>
    </div>
    <div class="stat-cell reveal reveal-delay-3">
        <p class="stat-cell__num">4</p>
        <p class="stat-cell__label">Ways in</p>
        <p class="stat-cell__sub">remote work, scholarships, grants, training</p>
    </div>
</section>

{{-- ── OPPORTUNITIES ── --}}
<section class="section" aria-labelledby="opp-heading">
    <div class="container">

        <div class="flex-between mb-md" style="flex-wrap:wrap; gap:1.6rem;">
            <h2 id="opp-heading" class="display-md reveal">What's open right now.</h2>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted reveal">
                See everything <span aria-hidden="true">→</span>
            </a>
        </div>

        <div class="filter-bar mb-lg reveal" role="group" aria-label="Filter opportunities by category">
            <button class="filter-btn active" data-filter="all" data-target=".js-opp-grid" aria-pressed="true">All</button>
            <button class="filter-btn" data-filter="remote" data-target=".js-opp-grid" aria-pressed="false">Remote work</button>
            <button class="filter-btn" data-filter="scholarship" data-target=".js-opp-grid" aria-pressed="false">Scholarships</button>
            <button class="filter-btn" data-filter="grant" data-target=".js-opp-grid" aria-pressed="false">Grants</button>
            <button class="filter-btn" data-filter="training" data-target=".js-opp-grid" aria-pressed="false">Training</button>
        </div>

        <div class="opp-grid js-opp-grid">
            @forelse ($opportunities as $opp)
            <article class="opp-card" data-category="{{ $opp->type }}">
                <div class="opp-card__top">
                    <span class="badge {{ $opp->badge_class }}">{{ $opp->type_label }}</span>
                    {{-- <span class="deadline {{ $opp->is_urgent ? 'deadline--urgent' : '' }}">
                        {{ $opp->deadline_label }}
                    </span> --}}
                </div>
                <h3 class="opp-card__title">{{ $opp->title }}</h3>
                <p class="opp-card__desc">{{ Str::limit($opp->summary, 110) }}</p>
                <div class="opp-card__footer">
                    <a href="{{ route('opportunities.show', $opp->slug) }}" class="opp-card__link">
                        View details ↗
                    </a>
                </div>
            </article>
            @empty
            <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-slate-muted);">
                <p style="font-size:1.6rem;">Nothing posted yet — give it a few days and check back.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ── HOW THIS WORKS ── --}}
<section class="section" aria-labelledby="how-heading">
    <div class="container">

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:start; margin-bottom:6rem;">
            <h2 id="how-heading" class="display-md reveal">
                How we decide<br>what makes it<br>onto this page.
            </h2>
            <p class="body-lg text-muted reveal reveal-delay-1" style="padding-top:1rem;">
                We go through job boards, scholarship portals and grant databases every day
                and only keep what's actually open to people applying from Nigeria. Every
                listing links straight to the real source — no middlemen, no forms asking
                for money upfront.
            </p>
        </div>

        <nav class="process-list" aria-label="How we put this page together">

            <div class="process-row reveal">
                <span class="process-row__title">We look everywhere</span>
                <span class="process-row__desc">
                    Remote job boards, scholarship listings, grant portals — we go through
                    them so you don't have to.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-1">
                <span class="process-row__title">We check it's real</span>
                <span class="process-row__desc">
                    Deadline, eligibility, how payment works — we look at all of it before
                    anything goes live. Expired listings come down the same day.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-2">
                <span class="process-row__title">We show you how to apply</span>
                <span class="process-row__desc">
                    For most platforms we feature, there's a guide walking you through the
                    application — so you go in prepared.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-3">
                <span class="process-row__title">You pass it on</span>
                <span class="process-row__desc">
                    Found something useful? Share it in your group chat. Someone else is
                    looking for exactly this.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

        </nav>

    </div>
</section>

{{-- ── GUIDES ── --}}
<section class="section" aria-labelledby="articles-heading">
    <div class="container">

        <div class="flex-between mb-lg" style="flex-wrap:wrap; gap:1.6rem;">
            <h2 id="articles-heading" class="display-md reveal">Read this before you apply.</h2>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted reveal">
                All guides <span aria-hidden="true">→</span>
            </a>
        </div>

        <div class="article-grid">
            @forelse ($articles as $article)
            <article class="article-card reveal">
                <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                    <div class="article-card__img" aria-hidden="true">
                        @if ($article->featured_image_url)
                            <img src="{{ $article->featured_image_url }}" alt="Cover image for the guide: {{ $article->title }}" loading="lazy" width="640" height="360">
                        @else
                            <div style="background:rgba(11,19,43,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.25)" stroke-width="1.5" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </div>
                        @endif
                    </div>
                    <p class="article-card__cat">{{ $article->category_label }}</p>
                    <h3 class="article-card__title">{{ $article->title }}</h3>
                    <p class="article-card__excerpt">{{ $article->excerpt }}</p>
                    <div class="article-card__meta">
                        <span>{{ $article->reading_time_minutes }} min read</span>
                        <span>{{ $article->formatted_date }}</span>
                    </div>
                </a>
            </article>
            @empty
            <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-slate-muted);">
                <p style="font-size:1.6rem;">No guides up yet — first one's coming soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<section class="cta-section" aria-labelledby="cta-heading">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container">
        <div class="cta-section__grid">

            <div>               
                <h2 id="cta-heading" class="display-lg reveal" style="color:var(--dark-ink-bright-contrast);">
                    Don't miss the<br>next one.
                </h2>
                <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.6); margin-top:2.4rem; max-width:40rem;">
                    New remote jobs and scholarships go up all the time, and the good ones
                    don't last. Join our WhatsApp community and you'll know the moment
                    something new lands.
                </p>
                <div class="flex-center gap-md mt-md reveal reveal-delay-2">
                    <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer" class="btn btn--dark">
                        Join the WhatsApp community ↗
                    </a>
                </div>
            </div>

            <div class="cta-section__right reveal reveal-delay-1">
                <div class="cta-detail-block">
                    <p class="cta-detail-block__title">What you get</p>
                    <ul class="cta-detail-block__list">
                        <li>Remote jobs and scholarships open to Nigerians, checked before they're posted</li>
                        <li>A heads-up before deadlines, not after</li>
                        <li>Step-by-step guides for the platforms we feature</li>
                    </ul>
                </div>

                <div class="email-contact">
                    <p class="email-contact__title">Prefer email?</p>
                    <p class="email-contact__body">
                        Got a question, found a broken link, or just want opportunity
                        alerts in your inbox instead of WhatsApp? Send us a message and
                        we'll sort it out.
                    </p>
                    <a href="mailto:info@academicfunding.org" class="email-contact__link">info@academicfunding.org</a>
                </div>
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
    let current  = 0;
    let timer    = null;

    if (!slides.length) return;

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

    startAuto();
})();
</script>
@endpush