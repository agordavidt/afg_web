/* ── NAV ── */
(function () {
    const nav       = document.querySelector('.nav');
    const hamburger = document.querySelector('.nav__hamburger');
    const mobileNav = document.querySelector('.nav__mobile');

    if (nav) {
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 20);
        });
    }

    if (hamburger && mobileNav) {
        hamburger.addEventListener('click', () => {
            const open = hamburger.classList.toggle('open');
            mobileNav.classList.toggle('open', open);
            document.body.style.overflow = open ? 'hidden' : '';
        });

        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('open');
                mobileNav.classList.remove('open');
                document.body.style.overflow = '';
            });
        });
    }
})();

/* ── SCROLL REVEAL ── */
(function () {
    const els = document.querySelectorAll('.reveal');
    if (!els.length) return;

    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                io.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });

    els.forEach(el => io.observe(el));
})();

/* ── FILTER BUTTONS ── */
(function () {
    document.querySelectorAll('.filter-bar').forEach(bar => {
        bar.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                bar.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const target = btn.dataset.filter;
                const grid   = document.querySelector(btn.dataset.target || '.js-filterable');
                if (!grid) return;

                grid.querySelectorAll('[data-category]').forEach(item => {
                    const match = target === 'all' || item.dataset.category === target;
                    item.style.display = match ? '' : 'none';
                });

                updateCount(grid);
            });
        });
    });

    function updateCount(grid) {
        const counter = document.querySelector('.js-count');
        if (!counter) return;
        const visible = grid.querySelectorAll('[data-category]:not([style*="none"])').length;
        counter.textContent = visible + ' result' + (visible !== 1 ? 's' : '');
    }
})();

/* ── LIVE SEARCH ── */
(function () {
    const input = document.querySelector('.js-search');
    if (!input) return;

    input.addEventListener('input', () => {
        const q     = input.value.trim().toLowerCase();
        const items = document.querySelectorAll('.js-searchable');

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = q === '' || text.includes(q) ? '' : 'none';
        });

        const counter = document.querySelector('.js-count');
        if (counter) {
            const visible = [...items].filter(i => i.style.display !== 'none').length;
            counter.textContent = visible + ' result' + (visible !== 1 ? 's' : '');
        }
    });
})();

/* ── SORT SELECT ── */
(function () {
    const sel = document.querySelector('.js-sort');
    if (!sel) return;

    sel.addEventListener('change', () => {
        const list  = document.querySelector('.js-filterable');
        if (!list) return;
        const items = [...list.querySelectorAll('[data-category]')];

        items.sort((a, b) => {
            if (sel.value === 'deadline') {
                const da = parseInt(a.dataset.days || 999);
                const db = parseInt(b.dataset.days || 999);
                return da - db;
            }
            if (sel.value === 'newest') {
                const ta = parseInt(a.dataset.ts || 0);
                const tb = parseInt(b.dataset.ts || 0);
                return tb - ta;
            }
            return 0;
        });

        items.forEach(item => list.appendChild(item));
    });
})();

/* ── TABLE OF CONTENTS HIGHLIGHT ── */
(function () {
    const links = document.querySelectorAll('.toc__link');
    if (!links.length) return;

    const headings = [...links].map(l => document.querySelector(l.getAttribute('href'))).filter(Boolean);

    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                links.forEach(l => l.classList.remove('active'));
                const active = document.querySelector(`.toc__link[href="#${e.target.id}"]`);
                if (active) active.classList.add('active');
            }
        });
    }, { rootMargin: '0px 0px -60% 0px', threshold: 0 });

    headings.forEach(h => io.observe(h));
})();

/* ── WHATSAPP SHARE ── */
(function () {
    document.querySelectorAll('.js-wa-share').forEach(btn => {
        btn.addEventListener('click', () => {
            const text = encodeURIComponent(
                (btn.dataset.title || document.title) + '\n' + window.location.href
            );
            window.open('https://wa.me/?text=' + text, '_blank');
        });
    });
})();

/* ── NOTIFY FORM (placeholder — wire to backend) ── */
(function () {
    const form = document.querySelector('.js-notify-form');
    if (!form) return;

    form.addEventListener('submit', e => {
        e.preventDefault();
        const input = form.querySelector('input[type="tel"], input[type="text"]');
        if (!input || !input.value.trim()) return;

        const btn = form.querySelector('button[type="submit"]');
        if (btn) {
            btn.textContent = 'Done ✓';
            btn.disabled = true;
        }
    });
})();