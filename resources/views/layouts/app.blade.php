<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Academic Funding Gateway — Your hub for remote work opportunities, scholarships, grants, and career guides for Nigerians.')" />
    <link rel="icon" href="{{ asset('assets/img/logo-favicon.png') }}" />

    {{-- Space Grotesk --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @stack('head')

    <title>@yield('title', 'Academic Funding Gateway') — Opportunities for Nigerians</title>
</head>
<body>

    {{-- ── NAV ── --}}
    <nav class="nav" role="navigation" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="nav__logo" aria-label="Academic Funding Gateway home">
            AFG<sup style="font-size:0.6em; font-weight:400">®</sup>
        </a>

        <ul class="nav__links" role="list">
            <li>
                <a href="{{ route('home') }}"
                   class="nav__link {{ request()->routeIs('home*') ? 'active' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('opportunities.index') }}"
                   class="nav__link {{ request()->routeIs('opportunities.*') ? 'active' : '' }}">
                    Opportunities
                </a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}"
                   class="nav__link {{ request()->routeIs('articles.*') ? 'active' : '' }}">
                    Articles
                </a>
            </li>
            <li>
                <a href="{{ route('donation') }}"
                   class="nav__link {{ request()->routeIs('donation') ? 'active' : '' }}">
                    Partner with us
                </a>
            </li>
            <li>
                <a href="{{ route('opportunities.index') }}" class="nav__cta">
                    Browse Opportunities <span aria-hidden="true">↗</span>
                </a>
            </li>
        </ul>

        <button class="nav__hamburger" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </nav>

    {{-- Mobile nav --}}
    <div class="nav__mobile" role="dialog" aria-label="Mobile navigation">
        <a href="{{ route('home') }}"
           class="nav__link {{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>
        <a href="{{ route('opportunities.index') }}"
           class="nav__link {{ request()->routeIs('opportunities.*') ? 'active' : '' }}">
            Opportunities
        </a>
        <a href="{{ route('articles.index') }}"
           class="nav__link {{ request()->routeIs('articles.*') ? 'active' : '' }}">
            Articles
        </a>
        <a href="{{ route('donation') }}"
           class="nav__link {{ request()->routeIs('donation') ? 'active' : '' }}">
            Partner with us
        </a>
        <a href="{{ route('opportunities.index') }}" class="nav__cta">
            Browse Opportunities ↗
        </a>
    </div>

    {{-- ── MAIN ── --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- ── FOOTER ── --}}
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer__inner">
                <span class="footer__logo">
                    AFG<sup style="font-size:0.6em; font-weight:400">®</sup>
                    <span style="font-size:1.2rem; font-weight:400; color:rgba(242,241,239,0.4); margin-left:1.2rem;">
                        // Academic Funding Gateway
                    </span>
                </span>

                <ul class="footer__links" role="list">
                    <li><a href="{{ route('opportunities.index') }}" class="footer__link">Opportunities</a></li>
                    <li><a href="{{ route('articles.index') }}" class="footer__link">Articles</a></li>
                    <li><a href="{{ route('donation') }}" class="footer__link">Partner with us</a></li>
                    <li>
                        <a href="mailto:info@academicfunding.org" class="footer__link">
                            info@academicfunding.org
                        </a>
                    </li>
                </ul>

                <p class="footer__copy">
                    &copy; {{ date('Y') }} Academic Funding Gateway. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

</body>
</html>