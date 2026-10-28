/* Page-local progressive enhancement. No external libraries. */
(function () {
  'use strict';
  var page = document.getElementById('tdts');
  if (!page || !('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  var items = Array.prototype.slice.call(page.querySelectorAll('.tdts-reveal'));
  if (!items.length) return;
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('tdts-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { rootMargin: '0px 0px -30px 0px', threshold: 0.06 });
  page.classList.add('tdts-js');
  items.forEach(function (item) { observer.observe(item); });
  // Prevent hidden content if IntersectionObserver callbacks are blocked.
  window.addEventListener('load', function () {
    var isVisible = function (element) {
      var r = element.getBoundingClientRect();
      return r.top < window.innerHeight && r.bottom > 0;
    };
    items.forEach(function (item) { if (isVisible(item)) item.classList.add('tdts-visible'); });
  }, { once: true });
})();
