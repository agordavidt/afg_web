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
            --color-whatsapp: #25D366;
            --color-youtube: #FF0000;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }
        body {
            font-family: "Rubik", sans-serif;
            line-height: 1;
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
            row-gap: 9.6rem;
        }
        .grid:not(:last-child) {
            margin-bottom: 9.6rem;
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
            margin-bottom: 9.6rem;
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
            font-size: 2rem;
            font-weight: 600;
            padding: 1.6rem 3.2rem;
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
        .list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 1.6rem;
        }
        .list-item {
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 1.6rem;
            line-height: 1.2;
        }
        .list-icon {
            width: 3rem;
            height: 3rem;
            color: var(--color-primary);
        }
        .margin-right-sm {
            margin-right: 1.6rem !important;
        }
        .center-text {
            text-align: center;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--color-light-background);
            height: 9.6rem;
            padding: 0 4.8rem;
            position: relative;
        }
        .logo {
            height: clamp(2.8rem, 4vw, 3.2rem);
        }
        .main-nav-list {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 4.8rem;
        }
        .main-nav-link:link,
        .main-nav-link:visited {
            display: inline-block;
            text-decoration: none;
            color: var(--color-dark);
            font-weight: 500;
            font-size: 1.8rem;
            transition: all 0.3s;
        }
        .main-nav-link:hover,
        .main-nav-link:active {
            color: var(--color-secondary);
        }
        .main-nav-link.nav-cta:link,
        .main-nav-link.nav-cta:visited {
            padding: 1.2rem 2.4rem;
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
            height: 4.8rem;
            width: 4.8rem;
            color: var(--color-dark);
        }
        .section-hero {
            background: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop') no-repeat center center/cover;
            position: relative;
            padding: 4.8rem 0 9.6rem 0;
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
            gap: 9.6rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        .hero-description {
            font-size: 2rem;
            line-height: 1.6;
            margin-bottom: 4.8rem;
            color: #fff;
        }
        .section-about {
            padding: 9.6rem 0;
        }
        .step-description {
            font-size: 1.8rem;
            line-height: 1.8;
        }
        .step-img-box {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 11px;
        }
        .step-img-box::before,
        .step-img-box::after {
            content: "";
            display: block;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .step-img-box::before {
            width: 60%;
            padding-bottom: 60%;
            background-color: var(--color-light-background);
            z-index: -2;
        }
        .step-img-box::after {
            width: 45%;
            padding-bottom: 45%;
            background-color: #e6f3f4;
            z-index: -1;
        }
        .step-img {
            width: 100%;
            max-width: 50%;
            object-fit: cover;
            border-radius: 11px;
        }
        .section-benefits {
            padding: 9.6rem 0;
            background-color: #fff;
        }
        .section-cta {
            padding: 9.6rem 0;
            background-image: linear-gradient(to right bottom, var(--color-primary), var(--color-secondary));
        }
        .cta-text {
            font-size: 2.4rem;
            color: #fff;
            text-align: center;
            margin-bottom: 4.8rem;
            max-width: 90rem;
            margin-left: auto;
            margin-right: auto;
        }
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 3.2rem;
            flex-wrap: wrap;
        }
        .footer {
            padding: 6.4rem 0;
            background-color: var(--color-dark);
            color: #fff;
        }
        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4.8rem;
            align-items: center;
        }
        .footer-logo-col {
            text-align: center;
        }
        .footer-logo {
            height: 6.4rem;
            margin-bottom: 2.4rem;
        }
        .contacts {
            font-size: 1.6rem;
            line-height: 1.8;
        }
        .address {
            margin-bottom: 1.6rem;
        }
        .footer-link:link,
        .footer-link:visited {
            color: #fff;
            text-decoration: none;
        }
        .footer-link:hover {
            color: var(--color-primary);
        }
        .copyright {
            font-size: 1.4rem;
            color: #aaa;
            text-align: center;
            margin-top: 4.8rem;
        }
        @media (max-width: 75em) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 4.8rem;
            }
            .heading-primary {
                font-size: 4.4rem;
            }
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            .btn--whatsapp,
            .btn--youtube {
                width: 80%;
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
            .btn-mobile-nav {
                display: block;
            }
            .main-nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--color-light-background);
                padding: 2.4rem;
                z-index: 1000;
            }
            .main-nav.active {
                display: block;
            }
            .main-nav-list {
                flex-direction: column;
                gap: 2.4rem;
                align-items: center;
            }
            .step-img-box {
                display: none;
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

        <section class="section-about" id="about">
            <div class="container">
                <span class="subheading">About Us</span>
                <h2 class="heading-secondary center-text">Empowering Students to Become Entrepreneurs</h2>
                <div class="grid grid--2-cols grid--center-v">
                    <div>
                        <p class="step-description">
                            The Student-to-CEO Initiative, powered by the Academic Funding Gateway Network, is committed to bridging the gap between education and entrepreneurship. We equip Nigerian students with the financial support, incubation, and learning tools they need to start and grow businesses—while still in school.
                        </p>
                    </div>
                    <div class="step-img-box">
                        <img src="{{ asset('assets/img/students_working_business_idea.jpg') }}" class="step-img" alt="Students working on business ideas" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Consolidated Benefits Section (replaces How It Works, What We Offer, and previous Benefits) -->
        <section class="section-benefits">
            <div class="container center-text">
                <span class="subheading">Why Register</span>
                <h2 class="heading-secondary">Exclusive Benefits of Joining Academic Funding</h2>
            </div>
            <div class="container">
                <ul class="list" style="max-width: 90rem; margin: 0 auto;">
                    <li class="list-item">
                        <ion-icon class="list-icon" name="school-outline"></ion-icon>
                        <span>Full Entrepreneurship trainings</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="briefcase-outline"></ion-icon>
                        <span>Workplace trainings</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="notifications-outline"></ion-icon>
                        <span>Daily updates on jobs, grants, internships and fellowships</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="hand-right-outline"></ion-icon>
                        <span>Direct membership and personalised guidance for any application</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="globe-outline"></ion-icon>
                        <span>Access to vocational training from institutions worldwide</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="ribbon-outline"></ion-icon>
                        <span>Receive recognised entrepreneurship and workplace training certificates</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="cash-outline"></ion-icon>
                        <span>Eligibility for business grants and startup funding</span>
                    </li>
                    <li class="list-item">
                        <ion-icon class="list-icon" name="people-outline"></ion-icon>
                        <span>Expert mentorship and six-month business incubation</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- New CTA Section with WhatsApp & YouTube -->
        <section class="section-cta">
            <div class="container center-text">
                <p class="cta-text">
                    Stay connected! Join our community for real-time updates, support, and success stories. 
                    Get instant help from admins and watch inspiring tutorials on our channel.
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
        </section>
    </main>

    <!-- Redesigned Compact Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo-col">
                    <img class="footer-logo" alt="Academic Funding Gateway logo" src="{{ asset('assets/img/logo-light-transparent.png') }}" />
                    <address class="contacts">
                        <p class="address">NO 3 TAURA CLOSE 2/2 KUBWA, ABUJA, FCT</p>
                        <p>
                            <a class="footer-link" href="tel:09134448135">09134448135</a> | 
                            <a class="footer-link" href="mailto:info@academicfunding.org">info@academicfunding.org</a>
                        </p>
                    </address>
                </div>
            </div>
            <p class="copyright">
                &copy; 2025 Academic Funding Gateway. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script>
        document.querySelector('.btn-mobile-nav').addEventListener('click', function () {
            const nav = document.querySelector('.main-nav');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            nav.classList.toggle('active');
        });
    </script>
</body>
</html>