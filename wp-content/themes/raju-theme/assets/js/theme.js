/** Lightweight accessible navigation and reveal effects. */
(function () {
	'use strict';

	document.documentElement.classList.add('has-js');
	var pageLoader = document.querySelector('.site-loader');
	if (pageLoader) {
		document.documentElement.classList.add('is-loading');
		var hidePageLoader = function () {
			document.documentElement.classList.remove('is-loading');
			document.documentElement.classList.add('has-loaded');
		};
		if (document.readyState === 'complete') {
			hidePageLoader();
		} else {
			window.addEventListener('load', hidePageLoader, { once: true });
		}
	}

	var menuButton = document.querySelector('.menu-toggle');
	var navigation = document.querySelector('.primary-navigation');
	var headerCta = document.querySelector('.site-header__cta');
	var stickyMenu = document.querySelector('.site-header__main');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	var aboutSection = document.querySelector('[data-about-section]');
	var aboutVisual = document.querySelector('[data-about-visual]');

	if (aboutSection) {
		if (reduceMotion.matches || !('IntersectionObserver' in window)) {
			aboutSection.classList.add('is-active');
		} else {
			var aboutObserver = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						aboutSection.classList.add('is-active');
						aboutObserver.unobserve(aboutSection);
					}
				});
			}, { threshold: 0.22 });
			aboutObserver.observe(aboutSection);
		}
	}

	if (aboutSection && !reduceMotion.matches && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
		aboutSection.addEventListener('pointermove', function (event) {
			var bounds = aboutSection.getBoundingClientRect();
			aboutSection.style.setProperty('--about-pointer-x', (event.clientX - bounds.left) + 'px');
			aboutSection.style.setProperty('--about-pointer-y', (event.clientY - bounds.top) + 'px');
			aboutSection.classList.add('has-pointer');
		});
		aboutSection.addEventListener('pointerleave', function () {
			aboutSection.classList.remove('has-pointer');
		});
	}

	if (aboutVisual && !reduceMotion.matches && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
		var aboutFrame = aboutVisual.querySelector('.about-visual__frame');
		aboutVisual.addEventListener('pointermove', function (event) {
			var bounds = aboutVisual.getBoundingClientRect();
			var x = (event.clientX - bounds.left) / bounds.width - 0.5;
			var y = (event.clientY - bounds.top) / bounds.height - 0.5;
			aboutFrame.style.transform = 'rotateX(' + (-y * 5) + 'deg) rotateY(' + (x * 7) + 'deg) rotate(1deg)';
		});
		aboutVisual.addEventListener('pointerleave', function () {
			aboutFrame.style.transform = '';
		});
	}

	if (stickyMenu) {
		var previousScrollY = window.pageYOffset;
		var scrollUpdatePending = false;
		window.addEventListener('scroll', function () {
			if (scrollUpdatePending) {
				return;
			}
			scrollUpdatePending = true;
			window.requestAnimationFrame(function () {
				var currentScrollY = window.pageYOffset;
				if (currentScrollY < 80 || currentScrollY < previousScrollY) {
					stickyMenu.classList.remove('is-hidden');
				} else if (currentScrollY > previousScrollY) {
					stickyMenu.classList.add('is-hidden');
				}
				previousScrollY = currentScrollY;
				scrollUpdatePending = false;
			});
		}, { passive: true });
	}

	if (headerCta && typeof headerCta.animate === 'function') {
		var animateCtaPress = function () {
			if (reduceMotion.matches) {
				return;
			}

			headerCta.animate(
				[
					{ transform: 'translateY(-2px) scale(1)', offset: 0 },
					{ transform: 'translateY(0) scale(0.96)', offset: 0.45 },
					{ transform: 'translateY(-1px) scale(1)', offset: 1 },
				],
				{ duration: 260, easing: 'cubic-bezier(0.2, 0.75, 0.25, 1)' }
			);
		};
		headerCta.addEventListener('pointerdown', animateCtaPress);
		headerCta.addEventListener('keydown', function (event) {
			if ('Enter' === event.key) {
				animateCtaPress();
			}
		});
	}

	if (menuButton && navigation) {
		menuButton.addEventListener('click', function () {
			var isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
			menuButton.setAttribute('aria-expanded', String(!isExpanded));
			navigation.classList.toggle('is-open', !isExpanded);
		});

		navigation.addEventListener('click', function (event) {
			if (event.target.closest('a')) {
				navigation.classList.remove('is-open');
				menuButton.setAttribute('aria-expanded', 'false');
			}
		});

		window.addEventListener('resize', function () {
			if (window.matchMedia('(min-width: 901px)').matches) {
				navigation.classList.remove('is-open');
				menuButton.setAttribute('aria-expanded', 'false');
			}
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && navigation.classList.contains('is-open')) {
				navigation.classList.remove('is-open');
				menuButton.setAttribute('aria-expanded', 'false');
				menuButton.focus();
			}
		});
	}

	var heroSlider = document.querySelector('[data-hero-slider]');
	if (heroSlider) {
		var heroSlides = Array.prototype.slice.call(heroSlider.querySelectorAll('[data-hero-slide]'));
		var sliderDots = Array.prototype.slice.call(heroSlider.querySelectorAll('[data-slide-to]'));
		var slideCount = heroSlider.querySelector('[data-slide-count]');
		var sliderTimer = null;
		var activeSlide = 0;
		var rotationPaused = reduceMotion.matches;

		var setActiveSlide = function (index) {
			activeSlide = (index + heroSlides.length) % heroSlides.length;
			heroSlides.forEach(function (slide, slideIndex) {
				var isActive = slideIndex === activeSlide;
				slide.classList.toggle('is-active', isActive);
				slide.setAttribute('aria-hidden', String(!isActive));
				slide.inert = !isActive;
			});
			sliderDots.forEach(function (dot, dotIndex) {
				var isActive = dotIndex === activeSlide;
				dot.classList.toggle('is-active', isActive);
				dot.setAttribute('aria-pressed', String(isActive));
			});
			if (slideCount) {
				slideCount.textContent = String(activeSlide + 1).padStart(2, '0');
			}
		};

		var stopRotation = function () {
			if (sliderTimer) {
				window.clearInterval(sliderTimer);
				sliderTimer = null;
			}
		};
		var startRotation = function () {
			stopRotation();
			if (rotationPaused || reduceMotion.matches || document.hidden || heroSlides.length < 2 || heroSlider.matches(':hover') || heroSlider.contains(document.activeElement)) {
				return;
			}
			sliderTimer = window.setInterval(function () {
				setActiveSlide(activeSlide + 1);
			}, 5000);
		};

		heroSlider.classList.add('is-ready');
		heroSlides.forEach(function (slide, slideIndex) {
			slide.inert = 0 !== slideIndex;
		});
		setActiveSlide(0);

		var previousButton = heroSlider.querySelector('[data-slide-prev]');
		var nextButton = heroSlider.querySelector('[data-slide-next]');
		var rotationButton = heroSlider.querySelector('[data-slider-toggle]');
		if (previousButton) {
			previousButton.addEventListener('click', function () {
				setActiveSlide(activeSlide - 1);
				startRotation();
			});
		}
		if (nextButton) {
			nextButton.addEventListener('click', function () {
				setActiveSlide(activeSlide + 1);
				startRotation();
			});
		}
		sliderDots.forEach(function (dot) {
			dot.addEventListener('click', function () {
				setActiveSlide(Number(dot.getAttribute('data-slide-to')));
				startRotation();
			});
		});
		if (rotationButton) {
			rotationButton.addEventListener('click', function () {
				rotationPaused = !rotationPaused;
				rotationButton.setAttribute('aria-pressed', String(rotationPaused));
				rotationButton.setAttribute('aria-label', rotationPaused ? 'Play slide rotation' : 'Pause slide rotation');
				rotationButton.firstElementChild.textContent = rotationPaused ? '▶' : 'Ⅱ';
				startRotation();
			});
		}
		heroSlider.addEventListener('mouseenter', stopRotation);
		heroSlider.addEventListener('mouseleave', startRotation);
		heroSlider.addEventListener('focusin', stopRotation);
		heroSlider.addEventListener('focusout', function (event) {
			if (!heroSlider.contains(event.relatedTarget)) {
				startRotation();
			}
		});
		heroSlider.addEventListener('keydown', function (event) {
			if ('ArrowLeft' === event.key) {
				setActiveSlide(activeSlide - 1);
				startRotation();
			} else if ('ArrowRight' === event.key) {
				setActiveSlide(activeSlide + 1);
				startRotation();
			}
		});
		document.addEventListener('visibilitychange', function () {
			if (document.hidden) {
				stopRotation();
			} else {
				startRotation();
			}
		});
		if (typeof reduceMotion.addEventListener === 'function') {
			reduceMotion.addEventListener('change', function (event) {
				rotationPaused = event.matches;
				startRotation();
			});
		}
		startRotation();
	}

	var revealItems = document.querySelectorAll('[data-reveal]');
	var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!('IntersectionObserver' in window) || prefersReducedMotion) {
		revealItems.forEach(function (item) { item.classList.add('is-visible'); });
		return;
	}

	var revealObserver = new IntersectionObserver(function (entries, observer) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.12, rootMargin: '0px 0px -24px 0px' });

	revealItems.forEach(function (item) { revealObserver.observe(item); });
}());
