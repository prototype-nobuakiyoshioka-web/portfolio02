(function () {
	'use strict';

	document.documentElement.classList.add('js');

	var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var hasGsap = typeof window.gsap !== 'undefined';

	if (!reduced && hasGsap && typeof window.ScrollTrigger !== 'undefined') {
		window.gsap.registerPlugin(window.ScrollTrigger);
	}

	initReveal();

	function initReveal() {
		var targets = document.querySelectorAll('.js-reveal, .js-reveal-fade');
		if (!targets.length) return;

		if (reduced || !hasGsap) {
			targets.forEach(function (el) {
				el.style.opacity = '1';
				el.style.transform = 'none';
			});
			return;
		}

		targets.forEach(function (el) {
			var isFade = el.classList.contains('js-reveal-fade');
			window.gsap.to(el, {
				opacity: 1,
				y: 0,
				duration: isFade ? 0.6 : 0.8,
				ease: 'power3.out',
				scrollTrigger: {
					trigger: el,
					start: 'top 86%',
					once: true,
				},
			});
		});
	}
})();
