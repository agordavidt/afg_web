@extends('layouts.app')

@section('title', 'Academic Funding Gateway | Global Scholarships, Grants & Remote Roles')
@section('meta_description', 'Discover fully funded scholarships, global grants, and international remote jobs designed to advance your academic and professional career.')

@section('content')

{{-- ── HERO ── --}}
<section class="hero" aria-label="Welcome">

    {{-- Slider: desktop only, purely decorative --}}
    <div class="hero__left" id="heroSlider" aria-hidden="true">
        <div class="hero__slides">
            <div class="hero__slide active" style="background-image:url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image:url('https://images.unsplash.com/photo-1531545514256-b1400bc00f31?q=80&w=1974&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image:url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image:url('https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?q=80&w=1974&auto=format&fit=crop')"></div>
        </div>
        <div class="hero__slide-overlay"></div>
        <div class="hero__dots-wrap">
            <div class="hero__dots" role="tablist" aria-label="Slide selector">
                <button class="hero__dot active" data-slide="0" role="tab" aria-selected="true" aria-label="Slide 1"><span class="hero__dot-pip"></span></button>
                <button class="hero__dot" data-slide="1" role="tab" aria-selected="false" aria-label="Slide 2"><span class="hero__dot-pip"></span></button>
                <button class="hero__dot" data-slide="2" role="tab" aria-selected="false" aria-label="Slide 3"><span class="hero__dot-pip"></span></button>
                <button class="hero__dot" data-slide="3" role="tab" aria-selected="false" aria-label="Slide 4"><span class="hero__dot-pip"></span></button>
            </div>
        </div>
    </div>

    {{-- Static content: visible on all screens --}}
    <div class="hero__right">
        <div class="hero__watermark" aria-hidden="true">AFG</div>

        <div class="hero__headline reveal">
            <h1 class="display-xl">
                Remote work.<br>Scholarships.<br>Grants.
            </h1>
            <p class="hero__sub reveal reveal-delay-1">
                Your borderless gateway to global education, career funding, and international employment.
            </p>
        </div>

        <a href="{{ route('opportunities.index') }}" class="btn btn--primary hero__cta reveal reveal-delay-2">
            Explore Opportunities ↗
        </a>
    </div>

</section>

{{-- ── VALUE PROPOSITION / FEATURES STRIP (Replaced Stats) ── --}}
<section class="stats-strip" aria-label="Platform values" style="padding: 2.5rem 0;">
    <div class="stat-cell reveal">
        <p class="stat-cell__num" style="font-size: 1.5rem; font-weight: 600; letter-spacing: 0;">Fully Funded</p>
        <p class="stat-cell__label">Scholarships & Grants</p>
    </div>
    <div class="stat-cell reveal reveal-delay-1">
        <p class="stat-cell__num" style="font-size: 1.5rem; font-weight: 600; letter-spacing: 0;">Global Scope</p>
        <p class="stat-cell__label">Borderless opportunities</p>
    </div>
    <div class="stat-cell reveal reveal-delay-2">
        <p class="stat-cell__num" style="font-size: 1.5rem; font-weight: 600; letter-spacing: 0;">Verified Steps</p>
        <p class="stat-cell__label">Clear application guides</p>
    </div>
    <div class="stat-cell reveal reveal-delay-3">
        <p class="stat-cell__num" style="font-size: 1.5rem; font-weight: 600; letter-spacing: 0;">100% Free</p>
        <p class="stat-cell__label">No hidden paywalls</p>
    </div>
</section>

{{-- ── OPPORTUNITIES ── --}}
<section class="section" aria-labelledby="opp-heading">
    <div class="container">

        <h2 id="opp-heading" class="display-md reveal mb-lg">Latest Openings</h2>

        <div class="opp-grid js-opp-grid">
            @forelse ($opportunities as $opp)
            <article class="opp-card">
                <h3 class="opp-card__title">{{ $opp->title }}</h3>
                <p class="opp-card__desc">{{ Str::limit($opp->summary, 120) }}</p>
                <a href="{{ route('opportunities.show', $opp->slug) }}" class="opp-card__link opp-card__link--visible">
                    View and apply ↗
                </a>
            </article>
            @empty
            <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-slate-muted);">
                <p>Curating new opportunities. Check back shortly!</p>
            </div>
            @endforelse
        </div>

        <div class="section-cta reveal">
            <a href="{{ route('opportunities.index') }}" class="btn btn--outline">Browse all opportunities</a>
        </div>

    </div>
</section>

{{-- ── ARTICLES ── --}}
<section class="section section--tinted" aria-labelledby="articles-heading">
    <div class="container">

        <h2 id="articles-heading" class="display-md reveal mb-lg">Application Guides</h2>

        <div class="article-grid">
            @forelse ($articles as $article)
            <article class="article-card reveal">
                <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                    <div class="article-card__img">
                        @if ($article->featured_image_url)
                            <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" loading="lazy" width="640" height="360">
                        @else
                            <div class="article-card__img--default">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.25)" stroke-width="1.5" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="article-card__title">{{ $article->title }}</h3>
                    <p class="article-card__excerpt">{{ $article->excerpt }}</p>
                </a>
            </article>
            @empty
            <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-slate-muted);">
                <p>New strategy guides coming soon.</p>
            </div>
            @endforelse
        </div>

        <div class="section-cta reveal">
            <a href="{{ route('articles.index') }}" class="btn btn--outline">Read all guides</a>
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
                    Never miss a critical application window.
                </h2>
                <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.6); margin-top:2rem; max-width:44rem;">
                    Join our instant alert community. We deliver upcoming deadlines and high-value drops right to your feed.
                </p>
                <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer"
                   class="btn btn--dark mt-md reveal reveal-delay-2">
                    Join via WhatsApp ↗
                </a>
            </div>

            <div class="cta-section__right reveal reveal-delay-1">
                <div class="cta-email-block">
                    <p class="cta-email-block__title">Partner or Inquire</p>
                    <p class="cta-email-block__body">
                        Have an official opportunity to list, spotted an outdated link, or need guidance using our toolkit? Contact us directly.
                    </p>
                    <a href="mailto:info@academicfunding.org" class="cta-email-block__link">
                        info@academicfunding.org ↗
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    const INTERVAL = 5500;
    const slides   = document.querySelectorAll('.hero__slide');
    const dots     = document.querySelectorAll('.hero__dot');
    let current = 0, timer = null;

    if (!slides.length) return;

    function goTo(idx) {
        slides[current].classList.remove('active');
        slides[current].classList.add('exit');
        const prev = current;
        setTimeout(() => slides[prev].classList.remove('exit'), 1400);
        dots[current].classList.remove('active');
        dots[current].setAttribute('aria-selected', 'false');
        current = ((idx % slides.length) + slides.length) % slides.length;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
        dots[current].setAttribute('aria-selected', 'true');
    }

    function startAuto() {
        clearInterval(timer);
        timer = setInterval(() => goTo(current + 1), INTERVAL);
    }

    dots.forEach((dot, i) => dot.addEventListener('click', () => { goTo(i); startAuto(); }));

    const slider = document.getElementById('heroSlider');
    slider?.addEventListener('mouseenter', () => clearInterval(timer));
    slider?.addEventListener('mouseleave', startAuto);

    startAuto();
})();
</script>
@endpush