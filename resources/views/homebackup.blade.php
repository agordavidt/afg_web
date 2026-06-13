@extends('layouts.app')

@section('title', 'Academic Funding Gateway')
@section('meta_description', 'Curated remote work opportunities, scholarships, grants and career guides for Nigerian students and professionals.')

@section('content')

{{-- ── HERO (Slider retained, text refined to be more human) ── --}}
<section class="hero" aria-label="Hero">

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
            <div class="hero__card reveal">
                <p class="hero__card-title">Academic Funding Gateway</p>
                <p class="hero__card-body">
                    We hands-on check and share remote jobs, international scholarships, and funding opportunities 
                    built to help Nigerian students and professionals launch what's next.
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

    <div class="hero__right">
        <div class="hero__headline reveal">
            <h1 class="display-xl">
                Find remote<br>
                work &amp;<br>
                scholarships<br>
                that pay.
            </h1>
        </div>

        <div class="hero__cta-row reveal">
            <a href="{{ route('opportunities.index') }}" class="btn btn--primary">
                Explore All Opportunities →
            </a>
        </div>
    </div>

</section>

{{-- ── STATS (Cleaned up to a balanced 3-column block) ── --}}
{{-- <section class="stats-strip" aria-label="Platform stats">
    <div class="stat-cell reveal">
        <p class="stat-cell__num">{{ \App\Models\Opportunity::active()->count() }}+</p>
        <p class="stat-cell__label">Active Openings</p>
        <p class="stat-cell__sub">vetted and updated weekly</p>
    </div>
    <div class="stat-cell reveal">
        <p class="stat-cell__num">{{ \App\Models\Article::published()->count() }}</p>
        <p class="stat-cell__label">Step-by-Step Guides</p>
        <p class="stat-cell__sub">written by real professionals</p>
    </div>
    <div class="stat-cell reveal">
        <p class="stat-cell__num">{{ \App\Models\Opportunity::active()->where('is_urgent', true)->count() }}</p>
        <p class="stat-cell__label">Closing This Week</p>
        <p class="stat-cell__sub">apply before the windows shut</p>
    </div>
</section> --}}

{{-- ── HOW IT WORKS (Moved up for trust, numbers removed, copy made relatable) ── --}}
<section class="section" aria-labelledby="how-heading">
    <div class="container">

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:start; margin-bottom:4rem;">
            <h2 id="how-heading" class="display-md reveal">Our process is simple.</h2>
            <p class="body-lg text-muted reveal">
                Finding reliable opportunities online shouldn't feel like a full-time job. 
                We sort through the clutter, talk to insiders, and bring you direct access 
                to verified positions—completely skipping the middleman.
            </p>
        </div>

        <div class="process-list" role="list">
            <div class="process-row reveal" role="listitem">
                <span class="process-row__title">Find</span>
                <span class="process-row__desc">
                    We scan international job hubs, universities, and grant databases daily, pulling 
                    only the specific opportunities that actively accept applications from Nigerians.
                </span>
            </div>

            <div class="process-row reveal" role="listitem">
                <span class="process-row__title">Verify</span>
                <span class="process-row__desc">
                    Our team manually checks deadlines, ensures the funding is real, and confirms the application 
                    path is straightforward before anything goes live.
                </span>
            </div>

            <div class="process-row reveal" role="listitem">
                <span class="process-row__title">Guide</span>
                <span class="process-row__desc">
                    We don't just drop links. We attach practical walkthroughs and community advice 
                    to give your application the best possible edge.
                </span>
            </div>
        </div>

    </div>
</section>

{{-- ── OPPORTUNITIES (Distractions removed: No 'via source', no timers/clocks) ── --}}
<section class="section" aria-labelledby="opp-heading">
    <div class="container">

        <div class="flex-between mb-md" style="flex-wrap:wrap; gap:1.6rem;">
            <h2 id="opp-heading" class="display-md reveal">Latest opportunities.</h2>
            <a href="{{ route('opportunities.index') }}" class="btn--ghost-muted reveal">
                See all openings <span aria-hidden="true">→</span>
            </a>
        </div>

        <div class="filter-bar mb-lg reveal" role="group" aria-label="Filter opportunities">
            <button class="filter-btn active" data-filter="all" data-target=".js-opp-grid">All</button>
            <button class="filter-btn" data-filter="remote" data-target=".js-opp-grid">Remote work</button>
            <button class="filter-btn" data-filter="scholarship" data-target=".js-opp-grid">Scholarships</button>
            <button class="filter-btn" data-filter="grant" data-target=".js-opp-grid">Grants</button>
            <button class="filter-btn" data-filter="training" data-target=".js-opp-grid">Training</button>
        </div>

        <div class="opp-grid js-opp-grid">
            @forelse ($opportunities as $opp)
            <article class="opp-card" data-category="{{ $opp->type }}">
                <div class="opp-card__top">
                    <span class="badge {{ $opp->badge_class }}">{{ $opp->type_label }}</span>
                </div>
                <h3 class="opp-card__title" style="margin-top: 1rem;">{{ $opp->title }}</h3>
                <p class="opp-card__desc">{{ Str::limit($opp->summary, 120) }}</p>
                <div class="opp-card__footer" style="justify-content: flex-end;">
                    <a href="{{ route('opportunities.show', $opp->slug) }}" class="opp-card__link">
                        View Details ↗
                    </a>
                </div>
            </article>
            @empty
            <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-muted);">
                <p style="font-size:1.6rem;">No openings posted yet — check back shortly.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ── ARTICLES (Section numbers removed) ── --}}
<section class="section" aria-labelledby="articles-heading">
    <div class="container">

        <div class="section-header">
            <div class="section-meta">
                <span class="section-tag">Guides &amp; Advice</span>
            </div>
            <a href="{{ route('articles.index') }}" class="btn--ghost-muted">
                Read all articles <span aria-hidden="true">→</span>
            </a>
        </div>

        <h2 id="articles-heading" class="display-md reveal mb-lg">Read before you apply.</h2>

        <div class="article-grid">
            @forelse ($articles as $article)
            <article class="article-card reveal">
                <a href="{{ route('articles.show', $article->slug) }}" style="display:contents;">
                    <div class="article-card__img" aria-hidden="true">
                        @if ($article->featured_image_url)
                            <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" loading="lazy">
                        @else
                            <div style="background:rgba(17,17,16,0.06); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(17,17,16,0.25)" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
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
            <div style="grid-column:1/-1; padding:4rem 0; text-align:center; color:var(--ink-muted);">
                <p style="font-size:1.6rem;">New articles are cooking — check back soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ── CTA (Eliminated duplicate options; focused solely on a clean, single-action community join) ── --}}
<section class="cta-section" aria-labelledby="cta-heading">
    <div class="container">
        <div class="cta-section__grid">

            <div>                
                <h2 id="cta-heading" class="display-lg reveal" style="color:var(--dark-ink);">
                    Get fresh listings<br>sent straight to you.
                </h2>
                <p class="body-lg reveal" style="color:rgba(242,241,239,0.6); margin-top:2.4rem; max-width:40rem;">
                    We share new remote jobs and vetted international scholarships the exact moment they open up. 
                    Join our community workspace to ensure you never miss out on early applications.
                </p>
                <div class="reveal" style="margin-top: 3.2rem;">
                    <a href="https://wa.me/2349134448135" target="_blank" rel="noopener noreferrer" class="btn btn--dark">
                        Join Our WhatsApp Community ↗
                    </a>
                </div>
            </div>

            <div class="cta-section__right reveal">
                <div class="cta-detail-block">
                    <p class="cta-detail-block__title">What you get inside:</p>
                    <ul class="cta-detail-block__list">
                        <li>Instant notifications on flash application deadlines</li>
                        <li>Direct links to original applications (absolutely zero spam)</li>
                        <li>Occasional templates for CVs and statement-of-purpose essays</li>
                    </ul>
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