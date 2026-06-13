<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'AFG curates remote jobs, scholarships, grants and training opportunities open to Nigerians — plus straight-talk guides on how to actually apply.')" />
    <link rel="icon" href="{{ asset('assets/img/logo-favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @stack('head')

    <title>@yield('title', 'AFG')</title>
</head>
<body>

    {{-- ── NAV ── --}}
    <nav class="nav" role="navigation" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="nav__logo" aria-label="AFG home">
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
                    Guides
                </a>
            </li>
            <li>
                <a href="{{ route('opportunities.index') }}" class="nav__cta">
                    Browse opportunities <span aria-hidden="true">↗</span>
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
            Guides
        </a>
        <a href="{{ route('opportunities.index') }}" class="nav__cta">
            Browse opportunities ↗
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
                    <span style="font-size:1.2rem; font-weight:400; color:rgba(248,249,250,0.4); margin-left:1.2rem;">
                        // opportunities for Nigerians, every week
                    </span>
                </span>

                <ul class="footer__links" role="list">
                    <li><a href="{{ route('opportunities.index') }}" class="footer__link">Opportunities</a></li>
                    <li><a href="{{ route('articles.index') }}" class="footer__link">Guides</a></li>
                    <li>
                        <a href="mailto:info@academicfunding.org" class="footer__link">
                            info@academicfunding.org
                        </a>
                    </li>
                </ul>

                <p class="footer__copy">
                    &copy; {{ date('Y') }} AFG. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

</body>
</html>