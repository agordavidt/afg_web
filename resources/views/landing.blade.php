<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Academic Funding Gateway empowers Nigerian students with grants, training, and mentorship to become entrepreneurs and leaders." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('assets/img/logo-favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
    <title>Academic Funding Gateway &mdash; From Student to CEO</title>
    <style>
        :root {
            --color-light-background: #f9f7f0;
            --color-primary: #18b7be;
            --color-secondary: #178ca4;
            --color-dark: #072a40;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        body {
            font-family: "Rubik", sans-serif;
            line-height: 1.6;
            font-weight: 400;
            color: var(--color-dark);
            overflow-x: hidden;
            background-color: var(--color-light-background);
        }

        .container {
            max-width: 120rem;
            padding: 0 3.2rem;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            column-gap: 6.4rem;
            row-gap: 6.4rem;
        }

        .grid--2-cols {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid--3-cols {
            grid-template-columns: repeat(3, 1fr);
        }

        .grid--center-v {
            align-items: center;
        }

        .heading-primary,
        .heading-secondary,
        .heading-tertiary {
            font-weight: 700;
            color: var(--color-dark);
            letter-spacing: -0.5px;
        }

        .heading-primary {
            font-size: 5.2rem;
            line-height: 1.05;
            margin-bottom: 3.2rem;
        }

        .heading-secondary {
            font-size: 4.4rem;
            line-height: 1.2;
            margin-bottom: 4.8rem;
        }

        .heading-tertiary {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 3.2rem;
        }

        .subheading {
            display: block;
            font-size: 1.6rem;
            font-weight: 500;
            color: var(--color-primary);
            text-transform: uppercase;
            margin-bottom: 1.6rem;
            letter-spacing: 0.75px;
        }

        .btn,
        .btn:link,
        .btn:visited {
            display: inline-block;
            text-decoration: none;
            font-size: 1.8rem;
            font-weight: 600;
            padding: 1.4rem 2.8rem;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.3s;
        }

        .btn--full:link,
        .btn--full:visited {
            background-color: var(--color-primary);
            color: #fff;
        }

        .btn--full:hover,
        .btn--full:active {
            background-color: var(--color-secondary);
        }

        .btn--outline:link,
        .btn--outline:visited {
            background-color: #fff;
            color: var(--color-dark);
            border: 1px solid #ddd;
        }

        .btn--outline:hover,
        .btn--outline:active {
            background-color: var(--color-light-background);
            box-shadow: inset 0 0 0 3px #fff;
        }

        .btn--whatsapp {
            background-color: var(--color-whatsapp);
            color: #fff;
            font-size: 2.2rem;
            padding: 2rem 4rem;
        }
        .btn--whatsapp:hover {
            background-color: #128C7E;
        }
        .btn--youtube {
            background-color: var(--color-youtube);
            color: #fff;
            font-size: 2.2rem;
            padding: 2rem 4rem;
        }
        .btn--youtube:hover {
            background-color: #CC0000;
        }

        .center-text {
            text-align: center;
        }

        strong {
            font-weight: 600;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--color-light-background);
            height: 9.6rem;
            padding: 0 4.8rem;
            position: relative;
            z-index: 100;
        }

        .logo {
            height: clamp(2.8rem, 4vw, 3.2rem);
        }

        .main-nav-list {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 3.2rem;
        }

        .main-nav-link:link,
        .main-nav-link:visited {
            display: inline-block;
            text-decoration: none;
            color: var(--color-dark);
            font-weight: 500;
            font-size: 1.7rem;
            transition: all 0.3s;
        }

        .main-nav-link:hover,
        .main-nav-link:active {
            color: var(--color-secondary);
        }

        .main-nav-link.nav-cta:link,
        .main-nav-link.nav-cta:visited {
            padding: 1rem 2rem;
            border-radius: 9px;
            color: #fff;
            background-color: var(--color-primary);
        }

        .main-nav-link.nav-cta:hover,
        .main-nav-link.nav-cta:active {
            background-color: var(--color-secondary);
        }

        .btn-mobile-nav {
            border: none;
            background: none;
            cursor: pointer;
            display: none;
        }

        .icon-mobile-nav {
            height: 4rem;
            width: 4rem;
            color: var(--color-dark);
        }

        .icon-mobile-nav[name="close-outline"] {
            display: none;
        }

        .sticky .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 8rem;
            padding: 0 2.4rem;
            background-color: rgba(255, 255, 255, 0.97);
            box-shadow: 0 1.2rem 3.2rem rgba(0, 0, 0, 0.03);
            z-index: 999;
        }

        .sticky .section-hero {
            margin-top: 9.6rem;
        }

        .section-hero {
            background: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop') no-repeat center center/cover;
            position: relative;
            padding: 6.4rem 0;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero-overlay {
            background-color: rgba(7, 42, 64, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .hero {
            max-width: 130rem;
            margin: 0 auto;
            padding: 0 3.2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6.4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-description {
            font-size: 1.9rem;
            line-height: 1.6;
            margin-bottom: 3.2rem;
            color: #fff;
        }

        .hero-img {
            width: 100%;
            border-radius: 12px;
            transform: scale(1.02);
            transition: transform 0.5s;
        }

        .hero-img:hover {
            transform: scale(1.05);
        }

        .section-featured {
            padding: 3.2rem 0;
        }

        .heading-featured-in {
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: 0.75px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 2.4rem;
            color: #888;
        }

        .logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4rem;
            flex-wrap: wrap;
        }

        .logos img {
            height: 3.2rem;
            filter: brightness(0);
            opacity: 50%;
            transition: all 0.3s;
        }

        .logos img:hover {
            opacity: 100%;
            filter: brightness(1);
        }

        /* Alternating section backgrounds */
        .section-about {
            padding: 8rem 0;
            background-color: #fff; /* White */
        }

        .section-benefits {
            padding: 9.6rem 0;
            background-color: var(--color-light-background); /* Light beige */
        }

        .section-cta {
            padding: 6.4rem 0;
            background-color: #fff; /* Keeps contrast before dark footer */
        }

        /* About Us - Equal height columns */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6.4rem;
            align-items: stretch; /* Key: makes both columns same height */
        }

        .about-text-box {
            font-size: 1.7rem;
            line-height: 1.8;
            color: #555;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .about-img-container {
            display: flex;
            align-items: center;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .about-img {
          
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .about-img:hover {
            transform: scale(1.05);
        }

        .benefit-card {
            background: white;
            padding: 3.2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
        }

        .benefit-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .benefit-icon {
            width: 8rem;
            height: 8rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }

        .benefit-title {
            font-size: 2.2rem;
            margin-bottom: 1.6rem;
            color: var(--color-dark);
        }

        .benefit-text {
            font-size: 1.6rem;
            line-height: 1.6;
            color: #555;
        }

        .cta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 2.4rem 4.8rem rgba(0, 0, 0, 0.1);
            border-radius: 11px;
            background-image: linear-gradient(to right bottom, var(--color-primary), var(--color-secondary));
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s;
        }

        .cta.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .cta-text-box {
            padding: 4.8rem;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cta .heading-secondary {
            color: inherit;
            margin-bottom: 2rem;
            font-size: 3.3rem;
        }

        .cta-text {
            font-size: 1.7rem;
            line-height: 1.6;
            margin-bottom: 3.2rem;
        }
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 3.2rem;
            flex-wrap: wrap;
        }

        .social-icons-container {
            display: flex;
            gap: 1.6rem; /* Reduced from 2.4rem */
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 3.2rem;
        }

        .social-icon-large {
            width: 7rem;
            height: 7rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .social-icon-large:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .cta-img-box {
            min-height: 30rem;
            background-image: linear-gradient(
                to right bottom,
                rgba(24, 183, 190, 0.35),
                rgba(23, 140, 164, 0.35)
            ),
            url("https://images.unsplash.com/photo-1522204523234-8729aa6e993e?q=80&w=2070&auto=format&fit=crop");
            background-size: cover;
            background-position: center;
        }

        .cta-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.9;
            display: block;
        }

        .footer {
            padding: 4.8rem 0;
            border-top: 1px solid #eee;
            background-color: var(--color-dark);
            color: #fff;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .footer-logo img {
            height: 4rem;
        }

        .contacts {
            font-style: normal;
            font-size: 1.5rem;
            line-height: 1.6;
        }

        .contacts a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .contacts a:hover {
            color: var(--color-primary);
        }

        .copyright {
            font-size: 1.4rem;
            color: #999;
            text-align: center;
            margin-top: 2.4rem;
            padding-top: 2.4rem;
            border-top: 1px solid #444;
        }

        /* Responsive */
        @media (max-width: 75em) {
            .container {
                padding: 0 2.4rem;
            }

            .grid--2-cols,
            .grid--3-cols,
            .about-grid {
                grid-template-columns: 1fr;
                row-gap: 4.8rem;
            }

            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 3.2rem;
            }

            .cta {
                grid-template-columns: 1fr;
            }

            .cta-img-box {
                min-height: 40rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        @media (max-width: 59em) {
            html {
                font-size: 56.25%;
            }

            .header {
                padding: 0 2.4rem;
            }

            .main-nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--color-light-background);
                padding: 2.4rem;
            }

            .main-nav.active {
                display: block;
            }

            .main-nav-list {
                flex-direction: column;
                gap: 2.4rem;
                align-items: center;
            }

            .btn-mobile-nav {
                display: block;
            }

            .btn-mobile-nav[aria-expanded="true"] .icon-mobile-nav[name="menu-outline"] {
                display: none;
            }

            .btn-mobile-nav[aria-expanded="true"] .icon-mobile-nav[name="close-outline"] {
                display: block;
            }

            .heading-primary {
                font-size: 4rem;
            }

            .heading-secondary {
                font-size: 3.2rem;
            }
        }

        @media (max-width: 34em) {
            html {
                font-size: 50%;
            }

            .container {
                padding: 0 1.6rem;
            }

            .section-hero,
            .section-about,
            .section-benefits,
            .section-cta {
                padding: 4.8rem 0;
            }

            .logos {
                gap: 2rem;
            }

            .logos img {
                height: 2.8rem;
            }

            .social-icons-container {
                gap: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="{{ route('landing') }}">
            <img class="logo" alt="Academic Funding Gateway logo" src="{{ asset('assets/img/logo-dark-transparent.png') }}" />
        </a>
        <nav class="main-nav">
            <ul class="main-nav-list">
                <li><a class="main-nav-link" href="#about">About Us</a></li>
                <li><a class="main-nav-link" href="{{ route('donation') }}">Partner with us</a></li>           
                <li><a class="main-nav-link nav-cta" href="{{ route('student.register') }}">Complete Registration</a></li>
            </ul>
        </nav>
        <button class="btn-mobile-nav" aria-expanded="false">
            <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
            <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
        </button>
    </header>

    <main>
        <section class="section-hero">
            <div class="hero-overlay"></div>
            <div class="hero">
                <div class="hero-text-box">
                    <h1 class="heading-primary" style="color: #ffffff;">From Student to CEO – Empowering the Next Generation of Leaders</h1>
                    <p class="hero-description">
                        We provide Nigerian students with grants, training, mentorship, and resources to transition from the classroom to the boardroom.
                    </p>
                    <a href="{{ route('student.register') }}" class="btn btn--full margin-right-sm">Complete Registration</a>
                    <a href="#about" class="btn btn--outline">Learn More &darr;</a>
                </div>
            </div>
        </section>

        <section class="section-featured">
            <div class="container">
                <h2 class="heading-featured-in"></h2>
                <div class="logos">
                    <!-- Logos can be added here later -->
                </div>
            </div>
        </section>

        <section class="section-about" id="about">
            <div class="container center-text">
                <span class="subheading" style="margin-bottom: 30px;">About Us</span>                
            </div>
            <div class="container">
                <div class="about-grid">
                    <div class="about-text-box">
                        <h2 class="heading-secondary">Empowering Students to Become Entrepreneurs</h2>
                        <p class="about-description">
                            The Student-to-CEO Initiative, powered by the Academic Funding Gateway Network, is committed to bridging the gap between education and entrepreneurship. We equip Nigerian students with the financial support, incubation, and learning tools they need to start and grow businesses—while still in school.
                        </p>
                    </div>
                    <div class="about-img-container">
                        <img
                            src="{{ asset('assets/img/ac_funding.jpg') }}"
                            class="about-img"
                            alt="Students working on business ideas"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="section-benefits" id="benefits">
            <div class="container center-text">
                <span class="subheading">Your Journey Starts Here</span>
                <h2 class="heading-secondary">Why Join Academic Funding?</h2>
                <p style="font-size: 1.8rem; margin-bottom: 4.8rem; color: #666;">
                    We don’t just offer benefits—we build futures. Here’s how we empower you:
                </p>
            </div>
            <div class="container grid grid--3-cols">
                <div class="benefit-card">
                    <div class="benefit-icon" style="background: #e3f2fd;">
                        <ion-icon name="school-outline" style="font-size: 4rem; color: #1976d2;"></ion-icon>
                    </div>
                    <h3 class="benefit-title">Learn & Grow</h3>
                    <p class="benefit-text">
                        Access full entrepreneurship training and workplace workshops to sharpen your skills and launch your career.
                    </p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon" style="background: #f3e5f5;">
                        <ion-icon name="cash-outline" style="font-size: 4rem; color: #7b1fa2;"></ion-icon>
                    </div>
                    <h3 class="benefit-title">Fund Your Dreams</h3>
                    <p class="benefit-text">
                        Get grants, daily job alerts, and direct support for applications—so you never miss an opportunity.
                    </p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon" style="background: #e8f5e8;">
                        <ion-icon name="globe-outline" style="font-size: 4rem; color: #2e7d32;"></ion-icon>
                    </div>
                    <h3 class="benefit-title">Go Global</h3>
                    <p class="benefit-text">
                        Train with global institutions, earn recognized certificates, and expand your network worldwide.
                    </p>
                </div>
            </div>
        </section>

        <section class="section-cta" id="cta">
            <div class="container">
                <div class="cta">
                    <div class="cta-text-box">
                        <h2 class="heading-secondary">Ready to Launch?</h2>
                        <p class="cta-text">
                            Join thousands of students transforming their futures. Connect with us today!
                        </p>
                        <div class="cta-buttons">
                            <a href="https://chat.whatsapp.com/YourWhatsAppGroupLinkHere" target="_blank" class="btn btn--whatsapp">
                                <ion-icon name="logo-whatsapp" style="font-size: 3.2rem; vertical-align: middle; margin-right: 1.2rem;"></ion-icon>
                                Join WhatsApp Community
                            </a>
                            <a href="https://www.youtube.com/@academicfunding" target="_blank" class="btn btn--youtube">
                                <ion-icon name="logo-youtube" style="font-size: 3.2rem; vertical-align: middle; margin-right: 1.2rem;"></ion-icon>
                                Subscribe on YouTube
                            </a>
                        </div>
                    </div>
                    <div class="cta-img-box">
                        <img src="{{ asset('assets/img/cta.jpg') }}" alt="Students collaborating" />
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content" style="padding: 4rem 0;">
                <div>
                    <a href="#" class="footer-logo">
                        <img class="logo" alt="Academic Funding Gateway logo" src="{{ asset('assets/img/logo-light-transparent.png') }}" />
                    </a>
                    <p style="font-size: 1.4rem; margin-top: 1.6rem; color: #ccc;">
                        Besides Transformer Orange farm Byhazin Accross, Kubwa Abuja<br>
                        <a class="footer-link" href="tel:09134448135" style="color: #aaa;">09134448135</a> |
                        <a class="footer-link" href="mailto:info@academicfunding.org" style="color: #aaa;">info@academicfunding.org</a>
                    </p>
                </div>
                <div style="text-align: right;">
                    <p style="font-size: 1.4rem; color: #ccc;">&copy; 2026 Academic Funding Gateway. All Rights Reserved.</p>
                </div>
            </div>
            <div class="copyright">
               
            </div>
        </div>
    </footer>

    <script>
        // Mobile navigation
        document.querySelector('.btn-mobile-nav').addEventListener('click', function () {
            const nav = document.querySelector('.main-nav');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            nav.classList.toggle('active');
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Scroll animations
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.benefit-card, .cta');
            elements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight * 0.85) {
                    el.classList.add('visible');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);

        // Initial state
        document.querySelectorAll('.benefit-card, .cta').forEach(el => {
            el.style.transition = 'all 0.6s ease';
        });
    </script>
</body>
</html>
