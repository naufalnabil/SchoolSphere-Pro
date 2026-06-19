/**
 * SchoolSphere-Pro — Main JavaScript
 * Tahap 2: Design System Foundation
 *
 * Fitur:
 * 1. Mobile Drawer (open/close)
 * 2. Sticky Navbar scroll state
 * 3. Smooth scroll untuk anchor links
 * 4. Scroll reveal (IntersectionObserver, ringan)
 * 5. prefers-reduced-motion support
 *
 * Tidak memakai library besar.
 */

(function () {
    'use strict';

    // ── Detect reduced motion preference ──
    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ── DOM Ready ──
    document.addEventListener('DOMContentLoaded', function () {
        initDrawer();
        initStickyNavbar();
        initSmoothScroll();
        initScrollReveal();

        console.log('[SchoolSphere-Pro] JS loaded — Tahap 2 OK');
    });

    // ════════════════════════════════════════════════════════
    // 1. MOBILE DRAWER
    // ════════════════════════════════════════════════════════

    function initDrawer() {
        var toggle  = document.getElementById('navbar-toggle');
        var drawer  = document.getElementById('mobile-drawer');
        var close   = document.getElementById('drawer-close');
        var overlay = document.getElementById('drawer-overlay');

        if (!toggle || !drawer) return;

        function openDrawer() {
            drawer.classList.add('drawer--open');
            document.body.classList.add('drawer-open');
            toggle.setAttribute('aria-expanded', 'true');
            drawer.setAttribute('aria-hidden', 'false');
            if (close) {
                setTimeout(function () { close.focus(); }, 100);
            }
        }

        function closeDrawer() {
            drawer.classList.remove('drawer--open');
            document.body.classList.remove('drawer-open');
            toggle.setAttribute('aria-expanded', 'false');
            drawer.setAttribute('aria-hidden', 'true');
            toggle.focus();
        }

        toggle.addEventListener('click', function () {
            if (drawer.classList.contains('drawer--open')) {
                closeDrawer();
            } else {
                openDrawer();
            }
        });

        if (close) close.addEventListener('click', closeDrawer);
        if (overlay) overlay.addEventListener('click', closeDrawer);

        // Close on link click inside drawer
        var drawerLinks = drawer.querySelectorAll('.drawer__link');
        drawerLinks.forEach(function (link) {
            link.addEventListener('click', closeDrawer);
        });

        // Close on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('drawer--open')) {
                closeDrawer();
            }
        });
    }

    // ════════════════════════════════════════════════════════
    // 2. STICKY NAVBAR — scroll state
    // ════════════════════════════════════════════════════════

    function initStickyNavbar() {
        var navbar = document.getElementById('navbar');
        if (!navbar) return;

        var scrollThreshold = 20;
        var ticking = false;

        function updateNavbar() {
            if (window.scrollY > scrollThreshold) {
                navbar.classList.add('navbar--scrolled');
            } else {
                navbar.classList.remove('navbar--scrolled');
            }
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }, { passive: true });

        // Set initial state
        updateNavbar();
    }

    // ════════════════════════════════════════════════════════
    // 3. SMOOTH SCROLL — anchor links
    // ════════════════════════════════════════════════════════

    function initSmoothScroll() {
        // Skip if user prefers reduced motion (CSS handles scroll-behavior)
        if (prefersReducedMotion) return;

        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var targetId = this.getAttribute('href');
                if (targetId === '#') return;

                var target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    var navbarHeight = document.getElementById('navbar')
                        ? document.getElementById('navbar').offsetHeight
                        : 0;
                    var targetY = target.getBoundingClientRect().top + window.scrollY - navbarHeight;

                    window.scrollTo({
                        top: targetY,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // ════════════════════════════════════════════════════════
    // 4. SCROLL REVEAL — lightweight, no library
    // ════════════════════════════════════════════════════════

    function initScrollReveal() {
        var revealElements = document.querySelectorAll('.reveal');
        if (revealElements.length === 0) return;

        // If reduced motion, reveal everything immediately
        if (prefersReducedMotion) {
            revealElements.forEach(function (el) {
                el.classList.add('reveal--visible');
            });
            return;
        }

        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal--visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -40px 0px'
            });

            revealElements.forEach(function (el) {
                observer.observe(el);
            });
        } else {
            // Fallback: show all immediately
            revealElements.forEach(function (el) {
                el.classList.add('reveal--visible');
            });
        }
    }

})();
