(() => {
    'use strict';

    const hero = document.querySelector('.hero');

    if (!hero) {
        return;
    }

    const slides = Array.from(
        hero.querySelectorAll('[data-hero-slide]')
    );

    const dots = Array.from(
        hero.querySelectorAll('[data-hero-dot]')
    );

    if (!slides.length) {
        return;
    }

    const SLIDE_DURATION = 6000;

    let currentIndex = 0;
    let timer = null;

    function stopTimer() {
        if (timer !== null) {
            clearTimeout(timer);
            timer = null;
        }
    }

    function stopVideos() {
        slides.forEach((slide) => {
            const video = slide.querySelector('video');

            if (!video) {
                return;
            }

            video.pause();

            try {
                video.currentTime = 0;
            } catch (e) {}
        });
    }

    function showSlide(index) {
        stopTimer();
        stopVideos();

        currentIndex =
            ((index % slides.length) + slides.length) %
            slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle(
                'is-active',
                i === currentIndex
            );
        });

        dots.forEach((dot, i) => {
            const active = i === currentIndex;

            dot.classList.toggle('is-active', active);

            if (active) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });

        const video =
            slides[currentIndex].querySelector('video');

        if (video) {
            video.muted = true;
            video.playsInline = true;

            try {
                video.currentTime = 0;
            } catch (e) {}

            const promise = video.play();

            if (promise) {
                promise.catch(() => {});
            }
        }

        timer = setTimeout(() => {
            showSlide(currentIndex + 1);
        }, SLIDE_DURATION);
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', (event) => {
            event.preventDefault();
            showSlide(index);
        });
    });

    showSlide(0);
})();
