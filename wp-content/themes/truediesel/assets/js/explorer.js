/**
 * Truck system explorer — STAGE 5 PLACEHOLDER.
 *
 * Enqueued on the front page only (see inc/enqueue.php). Wires the text
 * triggers now; the SVG hotspot half lands with the artwork at Stage 5.
 *
 * Design rule for Stage 5: the text list is the interface. The SVG mirrors
 * it. Both call the same selectSystem() so there is exactly one code path and
 * keyboard users are never second-class.
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
	 * Make one system the active one; clicking the active system clears it.
	 *
	 * @param {string} slug System identifier, e.g. "aftertreatment".
	 */
	function selectSystem(slug) {
		if (current === slug) {
			slug = null;
		}
		current = slug;

		triggers.forEach(function (button) {
			var isActive = button.getAttribute('data-explorer-target') === slug;
			button.setAttribute('aria-expanded', String(isActive));
		});

		// Mirror the state onto the SVG groups, once they exist.
		root.querySelectorAll('[id^="td-system-"]').forEach(function (group) {
			group.classList.toggle('is-active', group.id === 'td-system-' + slug);
		});

		// Stage 5: render the detail copy for `slug` into `panel`.
		// The panel is aria-live="polite", so whatever is written here is
		// announced without stealing focus.
		if (panel && !slug) {
			panel.textContent = '';
		}
	}

	triggers.forEach(function (button) {
		button.addEventListener('click', function () {
			selectSystem(button.getAttribute('data-explorer-target'));
		});
	});
})();
