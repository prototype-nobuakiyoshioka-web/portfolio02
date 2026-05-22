(function () {
	document.documentElement.classList.add('js');

	var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var heroTargets = document.querySelectorAll('.js-hero-reveal');
	var revealTargets = document.querySelectorAll('.section-reveal');

	if (!revealTargets.length && !heroTargets.length) {
		return;
	}

	if (prefersReducedMotion || typeof window.gsap === 'undefined') {
		heroTargets.forEach(function (target) {
			target.style.opacity = '1';
			target.style.transform = 'none';
		});

		revealTargets.forEach(function (target) {
			target.style.opacity = '1';
			target.style.transform = 'none';
		});
		return;
	}

	if (typeof window.ScrollTrigger !== 'undefined') {
		window.gsap.registerPlugin(window.ScrollTrigger);
	}

	if (heroTargets.length) {
		window.gsap.to(heroTargets, {
			autoAlpha: 1,
			duration: 1.15,
			ease: 'power3.out',
			stagger: 0.12,
			y: 0
		});
	}

	revealTargets.forEach(function (target) {
		window.gsap.to(target, {
			autoAlpha: 1,
			duration: 0.9,
			ease: 'power3.out',
			scrollTrigger: {
				trigger: target,
				start: 'top 84%',
				once: true
			},
			y: 0
		});
	});
})();
