/**
 * True Diesel — site behaviour.
 *
 * No-build (D11): plain ES2020, no modules, no transpiler. Loaded with
 * `defer` so the DOM is parsed by the time this runs.
 */

(function () {
	'use strict';

	/* ---------------------------------------------------------------------
	 * Mobile navigation toggle.
	 *
	 * The button's aria-expanded and the panel's `hidden` attribute are the
	 * single source of truth — CSS keys off `hidden`, so visual state and
	 * assistive-tech state cannot drift apart.
	 * ------------------------------------------------------------------- */

	var toggle = document.querySelector('[data-nav-toggle]');
	var panel = document.querySelector('[data-nav-panel]');

	if (toggle && panel) {
		var mq = window.matchMedia('(max-width: 47.99em)');

		/**
		 * Below the breakpoint the panel starts collapsed; above it, the
		 * attribute is cleared entirely so desktop layout is never affected
		 * by leftover mobile state.
		 */
		var syncToBreakpoint = function () {
			if (mq.matches) {
				panel.hidden = true;
				toggle.setAttribute('aria-expanded', 'false');
			} else {
				panel.hidden = false;
				toggle.setAttribute('aria-expanded', 'false');
			}
		};

		syncToBreakpoint();
		mq.addEventListener('change', syncToBreakpoint);

		toggle.addEventListener('click', function () {
			var open = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', String(!open));
			panel.hidden = open;
		});

		// Escape closes the menu and returns focus to the button, which is
		// the expected keyboard behaviour for a disclosure.
		document.addEventListener('keydown', function (event) {
			if (event.key !== 'Escape') {
				return;
			}
			if (toggle.getAttribute('aria-expanded') === 'true') {
				toggle.setAttribute('aria-expanded', 'false');
				panel.hidden = true;
				toggle.focus();
			}
		});
	}

	/* ---------------------------------------------------------------------
	 * Skip-link focus.
	 *
	 * Some browsers move the scroll position but not keyboard focus when a
	 * fragment link is followed. <main> has tabindex="-1" so it can receive
	 * focus explicitly.
	 * ------------------------------------------------------------------- */

	var skip = document.querySelector('.skip-link');
	var main = document.getElementById('main');

	if (skip && main) {
		skip.addEventListener('click', function () {
			main.focus();
		});
	}
})();
