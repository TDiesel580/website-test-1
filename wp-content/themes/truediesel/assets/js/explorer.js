/**
 * True Diesel truck system explorer.
 *
 * The HTML control list is the canonical interaction interface.
 * The SVG mirrors the same state through selectSystem().
 */

(function () {
        'use strict';

        var root = document.querySelector('[data-explorer]');

        if (!root) {
                return;
        }

        var triggers = root.querySelectorAll('[data-explorer-target]');
        var panel = root.querySelector('[data-explorer-panel]');
        var current = null;

        /**
         * Find a text trigger for a system.
         *
         * @param {string} slug Stable service-system ID.
         * @return {Element|null}
         */
        function getTrigger(slug) {
                return root.querySelector(
                        '[data-explorer-target="' + slug + '"]'
                );
        }

        /**
         * Render the detail panel for a system.
         *
         * @param {Element|null} trigger Canonical HTML trigger.
         */
        function renderPanel(trigger) {
                if (!panel) {
                        return;
                }

                panel.replaceChildren();

                if (!trigger) {
                        return;
                }

                var title = document.createElement('h3');
                title.className = 'explorer__panel-title';
                title.textContent = trigger.textContent.trim();

                var summary = document.createElement('p');
                summary.className = 'explorer__panel-summary';
                summary.textContent =
                        trigger.getAttribute('data-explorer-summary') || '';

                panel.appendChild(title);
                panel.appendChild(summary);
        }

        /**
         * Set the selected service system.
         *
         * Selecting the active system again clears the selection.
         *
         * @param {string|null} slug Stable service-system ID.
         */
        function selectSystem(slug) {
                if (current === slug) {
                        slug = null;
                }

                current = slug;

                triggers.forEach(function (button) {
                        var isActive =
                                button.getAttribute('data-explorer-target') === slug;

                        button.setAttribute(
                                'aria-expanded',
                                String(isActive)
                        );
                });

                root.querySelectorAll('[id^="td-system-"]').forEach(
                        function (group) {
                                var trigger = slug ? getTrigger(slug) : null;
                                var svgId = trigger
                                        ? trigger.getAttribute('data-explorer-svg-id')
                                        : null;

                                group.classList.toggle(
                                        'is-active',
                                        group.id === svgId
                                );
                        }
                );

                renderPanel(slug ? getTrigger(slug) : null);
        }

        triggers.forEach(function (button) {
                button.addEventListener('click', function () {
                        selectSystem(
                                button.getAttribute('data-explorer-target')
                        );
                });
        });

        /*
         * Stage 5 SVG regions call this same function.
         * Keeping it on the explorer root avoids creating a global function.
         */
        root.tdSelectSystem = selectSystem;
})();
