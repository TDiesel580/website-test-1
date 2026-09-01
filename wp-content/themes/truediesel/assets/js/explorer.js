(function () {
        'use strict';

        var root = document.querySelector('[data-explorer]');

        if (!root) {
                return;
        }

        var hotspots = root.querySelectorAll('.truck-hotspot[data-system]');
        var cards = document.querySelectorAll('[data-service-system]');

        var activeSystem = null;
        var previewSystem = null;

        function updateState() {
                hotspots.forEach(function (hotspot) {
                        var system = hotspot.getAttribute('data-system');
                        var isActive = system === activeSystem;
                        var isPreview =
                                system === previewSystem &&
                                system !== activeSystem;

                        hotspot.classList.toggle('is-active', isActive);
                        hotspot.classList.toggle('is-preview', isPreview);

                        hotspot.setAttribute(
                                'aria-pressed',
                                String(isActive)
                        );
                });

                cards.forEach(function (card) {
                        var system = card.getAttribute('data-service-system');
                        var isActive = system === activeSystem;
                        var isPreview =
                                system === previewSystem &&
                                system !== activeSystem;

                        card.classList.toggle(
                                'is-explorer-active',
                                isActive
                        );

                        card.classList.toggle(
                                'is-explorer-preview',
                                isPreview
                        );

                        card.setAttribute(
                                'aria-pressed',
                                String(isActive)
                        );
                });
        }

        function preview(system) {
                previewSystem = system;
                updateState();
        }

        function clearPreview() {
                previewSystem = null;
                updateState();
        }

        function select(system) {
                activeSystem = system;
                previewSystem = null;
                updateState();
        }

        /*
         * Truck -> service card
         */
        hotspots.forEach(function (hotspot) {
                var system = hotspot.getAttribute('data-system');

                hotspot.setAttribute('aria-pressed', 'false');

                hotspot.addEventListener('mouseenter', function () {
                        preview(system);
                });

                hotspot.addEventListener('mouseleave', function () {
                        clearPreview();
                });

                hotspot.addEventListener('focus', function () {
                        preview(system);
                });

                hotspot.addEventListener('blur', function () {
                        clearPreview();
                });

                hotspot.addEventListener('click', function () {
                        select(system);
                });

                hotspot.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                                event.preventDefault();
                                select(system);
                        }
                });
        });

        /*
         * Service card -> truck
         */
        cards.forEach(function (card) {
                var system = card.getAttribute('data-service-system');

                card.setAttribute('role', 'button');
                card.setAttribute('tabindex', '0');
                card.setAttribute('aria-pressed', 'false');

                card.addEventListener('mouseenter', function () {
                        preview(system);
                });

                card.addEventListener('mouseleave', function () {
                        clearPreview();
                });

                card.addEventListener('focus', function () {
                        preview(system);
                });

                card.addEventListener('blur', function () {
                        clearPreview();
                });

                card.addEventListener('click', function () {
                        select(system);
                });

                card.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                                event.preventDefault();
                                select(system);
                        }
                });
        });

        updateState();
})();
