@extends('layouts.app')

@section('title', 'Academic Funding Gateway')
@section('meta_description', 'Real remote jobs, scholarships and grants open to Nigerians, checked and updated every week.')

@section('content')

{{-- HERO --}}
<section class="hero" aria-label="Welcome">

    {{-- Slider, desktop only --}}
    <div class="hero__left" id="heroSlider" aria-hidden="true">
        <div class="hero__slides">
            <div class="hero__slide active" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image: url('https://images.unsplash.com/photo-1531545514256-b1400bc00f31?q=80&w=1974&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop')"></div>
            <div class="hero__slide" style="background-image: url('https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?q=80&w=1974&auto=format&fit=crop')"></div>
        </div>

        <div class="hero__slide-overlay"></div>

        <div class="hero__left-content">
            <div class="hero__card reveal">
                <p class="hero__card-title">Academic Funding Gateway</p>
                <p class="hero__card-body">
                    We go through remote jobs, scholarships and grants every week, so you only see the ones
                    that are real and still open to apply.
                </p>
            </div>

            <div class="hero__bottom">
                <div class="hero__dots" role="tablist" aria-label="Slide selector">
                    <button class="hero__dot active" data-slide="0" role="tab" aria-selected="true" aria-label="Slide 1"><span class="hero__dot-pip"></span></button>
                    <button class="hero__dot" data-slide="1" role="tab" aria-selected="false" aria-label="Slide 2"><span class="hero__dot-pip"></span></button>
                    <button class="hero__dot" data-slide="2" role="tab" aria-selected="false" aria-label="Slide 3"><span class="hero__dot-pip"></span></button>
                    <button class="hero__dot" data-slide="3" role="tab" aria-selected="false" aria-label="Slide 4"><span class="hero__dot-pip"></span></button>
                </div>
            </div>
        </div>
    </div>

    {{-- Static hero content, shown on every screen size --}}
    <div class="hero__right">
        <div class="hero__watermark" aria-hidden="true">AFG</div>

        <div class="hero__headline reveal">
            <h1 class="display-xl">
                Find remote work and scholarships that actually pay.
            </h1>
            {{-- <p class="body-lg text-muted mt-sm" style="max-width: 48rem;">
                One simple place to see opportunities open to Nigerians, with clear deadlines and links
                straight to the source.
            </p> --}}
        </div>

        <div class="hero__cta-row reveal reveal-delay-1">
            <a href="{{ route('opportunities.index') }}" class="arrow-btn arrow-btn--accent" aria-label="See opportunities">↗</a>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost">See opportunities</a>
        </div>
    </div>

</section>


{{-- HOW IT WORKS --}}
<section class="section" aria-labelledby="how-heading">
    <div class="container">

        <div style="display:grid; grid-template-columns:1fr; gap:2.4rem; align-items:start; margin-bottom:3.2rem;">
            <h2 id="how-heading" class="display-md reveal">How we pick what goes on this site</h2>
            <p class="body-lg text-muted reveal reveal-delay-1" style="max-width: 64rem;">
                We do not just dump links here. Every listing is read, checked and given a deadline before
                it shows up on the board.
            </p>
        </div>

        <nav class="process-list" aria-label="How we choose listings">

            <div class="process-row reveal">
                <span class="process-row__title">We look</span>
                <span class="process-row__desc">
                    We go through job boards, scholarship pages and grant portals to find roles open to people in Nigeria.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-1">
                <span class="process-row__title">We check</span>
                <span class="process-row__desc">
                    Deadlines, who can apply and how to apply get confirmed before anything goes live. Expired ones are pulled the same day.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-2">
                <span class="process-row__title">We explain</span>
                <span class="process-row__desc">
                    For platforms that come up often, we write a short guide so you know what to expect before you click apply.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

            <div class="process-row reveal reveal-delay-3">
                <span class="process-row__title">You share</span>
                <span class="process-row__desc">
                    Found something useful? Send the link to your WhatsApp group. Someone there might need it today.
                </span>
                <span class="process-row__arrow" aria-hidden="true">↗</span>
            </div>

        </nav>

    </div>
</section>


{{-- OPPORTUNITIES --}}
<section class="section" aria-labelledby="opp-heading">
    <div class="container">

        <div class="flex-between mb-md" style="flex-wrap:wrap; gap:1.6rem;">
            <h2 id="opp-heading" class="display-md reveal">What is open right now</h2>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted reveal">
                See all <span aria-hidden="true">→</span>
            </a>
        </div>

        <div class="filter-bar mb-lg reveal" role="group" aria-label="Filter opportunities by type">
            <button class="filter-btn active" data-filter="all" data-target=".js-opp-grid">All</button>
            <button class="filter-btn" data-filter="remote" data-target=".js-opp-grid">Remote jobs</button>
            <button class="filter-btn" data-filter="scholarship" data-target=".js-opp-grid">Scholarships</button>
            <button class="filter-btn" data-filter="grant" data-target=".js-opp-grid">Grants</button>
            <button class="filter-btn" data-filter="training" data-target=".js-opp-grid">Training</button>
        </div>

        <div class="opp-grid js-opp-grid">
            @forelse ($opportunities as $opp)
            <article class="opp-card" data-category="{{ $opp->type }}">
                <div class="opp-card__top">
                    <span class="badge">{{ $opp->type_label }}</span>
                    <span class="deadline {{ $opp->is_urgent ? 'deadline--urgent' : '' }}">
                        {{ $opp->deadline_label }}
                    </span>
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
                <p style="font-size:1.6rem;">Nothing posted yet. Check back soon.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ARTICLES --}}
<section class="section" aria-labelledby="articles-heading">
    <div class="container">

        <div class="flex-between mb-lg" style="flex-wrap:wrap; gap:1.6rem;">
            <h2 id="articles-heading" class="display-md reveal">Guides worth reading first</h2>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted reveal">
                See all <span aria-hidden="true">→</span>
            </a>
        </div>

        <div class="article-grid">
            @forelse ($articles as $article)
            <article class="article-card reveal">
                <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                    <div class="article-card__img">
                        @if ($article->featured_image_url)
                            <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" loading="lazy" width="640" height="360">
                        @else
                            <div class="article-card__img--default">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(11,19,43,0.3)" stroke-width="1.5" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
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
                <p style="font-size:1.6rem;">No guides published yet. Check back soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section" aria-labelledby="cta-heading">
    <div class="cta-section__watermark" aria-hidden="true">AFG</div>
    <div class="container">
        <div class="cta-section__grid">

            <div>
                <h2 id="cta-heading" class="display-lg reveal" style="color:var(--dark-ink-bright-contrast);">
                    Want the next opportunity sent straight to you?
                </h2>
                <p class="body-lg reveal reveal-delay-1" style="color:rgba(248,249,250,0.65); margin-top:2rem; max-width:44rem;">
                    Join our WhatsApp community and you will get a message as soon as a new job or
                    scholarship is added. No spam, just opportunities.
                </p>
                <div class="flex-center gap-md mt-md reveal reveal-delay-2" style="flex-wrap:wrap;">
                    <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer" class="btn btn--dark">
                        Join our WhatsApp community ↗
                    </a>                    
                </div>
            </div>

            <div class="cta-section__right reveal reveal-delay-1">
                <div class="cta-email-block">
                    <p class="cta-email-block__title">Prefer email?</p>
                    <p class="cta-email-block__body">
                        If WhatsApp is not your thing, or you have a question about a listing, write to us
                        and we will get back to you. You can also ask to be added to our email alerts.
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
    const INTERVAL = 5000;
    const slides   = document.querySelectorAll('.hero__slide');
    const dots     = document.querySelectorAll('.hero__dot');
    let current = 0;
    let timer   = null;

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
    slider?.addEventListener('mouseenter', () => clearInterval(timer));
    slider?.addEventListener('mouseleave', () => startAuto());

    startAuto();
})();
</script>
@endpush