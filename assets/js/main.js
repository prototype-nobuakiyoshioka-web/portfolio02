(function () {
	document.documentElement.classList.add('js');

	var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var hasGsap = typeof window.gsap !== 'undefined';

	initReveal();
	initWorksSlider();

	function initReveal() {
		var heroTargets = document.querySelectorAll('.js-hero-reveal');
		var revealTargets = document.querySelectorAll('.section-reveal');
		if (!revealTargets.length && !heroTargets.length) return;

		if (prefersReducedMotion || !hasGsap) {
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
				y: 0,
			});
		}

		revealTargets.forEach(function (target) {
			window.gsap.to(target, {
				autoAlpha: 1,
				duration: 0.9,
				ease: 'power3.out',
				scrollTrigger: { trigger: target, start: 'top 84%', once: true },
				y: 0,
			});
		});
	}

	function initWorksSlider() {
		var slider = document.querySelector('[data-works-slider]');
		if (!slider) return;

		var items = Array.prototype.slice.call(
			slider.querySelectorAll('.works-slider__item')
		);
		var slides = Array.prototype.slice.call(
			slider.querySelectorAll('.works-slider__slide')
		);
		var counter = slider.querySelector('[data-current]');
		var caption = slider.querySelector('[data-caption]');
		var progress = slider.querySelector('[data-progress]');
		if (!items.length || !slides.length) return;

		var captions = items.map(function (item) {
			var titleEl = item.querySelector('.works-slider__title');
			return titleEl ? titleEl.getAttribute('data-caption') || titleEl.textContent : '';
		});
		items.forEach(function (item, i) {
			var titleEl = item.querySelector('.works-slider__title');
			captions[i] =
				item.getAttribute('data-caption') ||
				(titleEl ? titleEl.textContent : '');
		});

		var active = 0;
		var autoplayTimer = null;
		var paused = false;

		function setActive(index, opts) {
			opts = opts || {};
			if (index === active && !opts.force) return;
			var prev = active;
			active = (index + items.length) % items.length;

			items.forEach(function (item, i) {
				var isActive = i === active;
				item.classList.toggle('is-active', isActive);
				item.setAttribute('aria-selected', isActive ? 'true' : 'false');
				item.setAttribute('tabindex', isActive ? '0' : '-1');
			});

			var direction = active > prev ? 1 : -1;
			if ((prev === 0 && active === items.length - 1)) direction = -1;
			if ((prev === items.length - 1 && active === 0)) direction = 1;

			slides.forEach(function (slide, i) {
				var isActive = i === active;
				slide.classList.toggle('is-active', isActive);
				if (isActive) {
					slide.removeAttribute('aria-hidden');
				} else {
					slide.setAttribute('aria-hidden', 'true');
				}
			});

			if (hasGsap && !prefersReducedMotion) {
				var prevSlide = slides[prev];
				var nextSlide = slides[active];
				if (prevSlide && prevSlide !== nextSlide) {
					window.gsap.to(prevSlide, {
						autoAlpha: 0,
						x: -direction * 24,
						duration: 0.45,
						ease: 'power2.out',
					});
				}
				if (nextSlide) {
					window.gsap.fromTo(
						nextSlide,
						{ autoAlpha: 0, x: direction * 24 },
						{ autoAlpha: 1, x: 0, duration: 0.55, ease: 'power3.out' }
					);
				}
			}

			if (counter) counter.textContent = String(active + 1).padStart(2, '0');
			if (caption) caption.textContent = captions[active];
			if (progress) {
				progress.style.setProperty(
					'--progress',
					Math.round(((active + 1) / items.length) * 100) + '%'
				);
			}

			if (opts.focus) {
				items[active].focus({ preventScroll: true });
			}
		}

		items.forEach(function (item, i) {
			item.addEventListener('mouseenter', function () {
				setActive(i);
			});
			item.addEventListener('focusin', function () {
				setActive(i);
			});
			item.addEventListener('click', function (e) {
				if (e.target.closest('a')) return;
				e.preventDefault();
				setActive(i, { focus: true });
			});
			item.addEventListener('keydown', function (e) {
				if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
					e.preventDefault();
					setActive(active + 1, { focus: true });
				} else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
					e.preventDefault();
					setActive(active - 1, { focus: true });
				} else if (e.key === 'Home') {
					e.preventDefault();
					setActive(0, { focus: true });
				} else if (e.key === 'End') {
					e.preventDefault();
					setActive(items.length - 1, { focus: true });
				}
			});
		});

		slider.addEventListener('mouseenter', function () {
			paused = true;
		});
		slider.addEventListener('mouseleave', function () {
			paused = false;
		});

		function tick() {
			if (!paused && document.visibilityState === 'visible' && !prefersReducedMotion) {
				setActive(active + 1);
			}
			autoplayTimer = window.setTimeout(tick, 4200);
		}
		if (!prefersReducedMotion) {
			autoplayTimer = window.setTimeout(tick, 4200);
		}

		var startX = null;
		slider.addEventListener('touchstart', function (e) {
			startX = e.touches[0].clientX;
		}, { passive: true });
		slider.addEventListener('touchend', function (e) {
			if (startX === null) return;
			var dx = e.changedTouches[0].clientX - startX;
			if (Math.abs(dx) > 40) {
				setActive(active + (dx < 0 ? 1 : -1));
			}
			startX = null;
		});
	}
})();
