(function () {
	// "use strict";

	// Payment Method Toggle
	function toggleCardInfo(show) {
		var cardInfo = document.querySelector('.card-info');
		cardInfo.style.display = show ? 'block' : 'none';
	}

	// Payment Method Change Event
	$('#paymentMethod').on('change', function () {
		var value = $(this).val();
		if (value === 'Nagad' || value === 'bKash' || value === 'Rocket') {
			toggleCardInfo(true);
		} else {
			toggleCardInfo(false);
		}
		clearCardInfoInputs();
	});

	// Clear Card Info Inputs
	function clearCardInfoInputs() {
		var cardInfoInputs = document.querySelectorAll('.card-info input');
		cardInfoInputs.forEach(function (input) {
			input.value = '';
		});
	}

	$(function toogleSeeMore() {
		$(document).ready(function () {
			$('#seemore_btn').click(function () {
				$('#multiCollapseExample1').toggleClass('active');
			});
		});


	});

	$(function ItemSelectors() {
		$(document).ready(function () {
			// Handle Select All checkbox
			$('#selectAll').on('change', function () {
				$('.item-checkbox').prop('checked', $(this).is(':checked'));
			});

			// Handle individual item checkbox
			$('.item-checkbox').on('change', function () {
				if ($('.item-checkbox:checked').length === $('.item-checkbox').length) {
					$('#selectAll').prop('checked', true);
				} else {
					$('#selectAll').prop('checked', false);
				}
			});
		});

	});

	// Add event listeners for filter container button and cross button
	$(document).ready(function () {
		$('#filter-container-btn').on('click', function () {
			$('#filter-container').addClass('active');
			// $('#overlay').addClass('show');
		});

		$('#cross').on('click', function () {
			$('#filter-container').removeClass('active');
		});
	});

	$('.owl-men-item').owlCarousel({
		items: 5,
		loop: true,
		dots: true,
		nav: true,
		margin: 30,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})

	$('.owl-women-item').owlCarousel({
		items: 5,
		loop: true,
		dots: true,
		nav: true,
		margin: 30,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})

	$('.owl-kid-item').owlCarousel({
		items: 5,
		loop: true,
		dots: true,
		nav: true,
		margin: 30,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})

	// Window Resize Mobile Menu Fix
	mobileNav();

	// Scroll animation init
	window.sr = new scrollReveal();

	// Menu Dropdown Toggle
	if ($('.menu-trigger').length) {
		$(".menu-trigger").on('click', function () {
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}

	// Menu elevator animation
	$('.scroll-to-section a[href*=\\#]:not([href=\\#])').on('click', function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				var width = $(window).width();
				if (width < 991) {
					$('.menu-trigger').removeClass('active');
					$('.header-area .nav').slideUp(200);
				}
				$('html,body').animate({
					scrollTop: (target.offset().top) - 80
				}, 700);
				return false;
			}
		}
	});

	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		var box = $('#top').height();
		var header = $('header').height();

		if (scroll >= box - header) {
			$("header").addClass("background-header");
		} else {
			$("header").removeClass("background-header");
		}
	});

	// Page loading animation
	$(window).on('load', function () {
		if ($('.cover').length) {
			$('.cover').parallax({
				imageSrc: $('.cover').data('image'),
				zIndex: '1'
			});
		}

		$("#preloader").animate({
			'opacity': '0'
		}, 600, function () {
			setTimeout(function () {
				$("#preloader").css("visibility", "hidden").fadeOut();
			}, 300);
		});
	});

	// Window Resize Mobile Menu Fix
	$(window).on('resize', function () {
		mobileNav();
	});

	// Window Resize Mobile Menu Fix
	function mobileNav() {
		var width = $(window).width();
		$('.submenu').on('click', function () {
			if (width < 767) {
				$('.submenu ul').removeClass('active');
				$(this).find('ul').toggleClass('active');
			}
		});
	}

	initThumbnail();

	function initQuantity() {
		if ($('.plus').length && $('.minus').length) {
			$('.plus').on('click', function () {
				var $quantityInput = $(this).siblings('.quantity_value');
				var $productContainer = $(this).closest('.stock');
				var stock = parseInt($productContainer.attr('data-stock'));
				var currentValue = parseInt($quantityInput.val());

				if (!isNaN(currentValue) && currentValue < stock) {
					$quantityInput.val(currentValue + 1);
				} else {
					// $quantityInput.val(1);
					alert("Cannot add more than the available stock. Cart PAGE");
				}
			});

			$('.minus').on('click', function () {
				var $quantityInput = $(this).siblings('.quantity_value');
				var currentValue = parseInt($quantityInput.val());
				if (!isNaN(currentValue) && currentValue > 1) {
					$quantityInput.val(currentValue - 1);
				} else {
					$quantityInput.val(1);
				}
			});
		} else {
			console.error("One or more elements not found. Plus:", $('.plus').length, "Minus:", $('.minus').length, "Value:", $('.quantity_value').length);
		}
	}

	$(document).ready(function () {
		initQuantity();
	});

	logreg();

	function logreg() {
		document.getElementById('signup').addEventListener('click', function () {
			document.getElementById('registerForm').classList.add('show');
			document.getElementById('overlay').classList.add('show');
		});

		document.getElementById('showRegisterForm').addEventListener('click', function (event) {
			event.preventDefault();
			document.getElementById('loginForm').classList.remove('show');
			document.getElementById('registerForm').classList.add('show');
		});

		document.getElementById('closeRegisterForm').addEventListener('click', function () {
			document.getElementById('registerForm').classList.remove('show');
			document.getElementById('overlay').classList.remove('show');
		});

		document.getElementById('login').addEventListener('click', function () {
			document.getElementById('loginForm').classList.add('show');
			document.getElementById('overlay').classList.add('show');
		});

		document.getElementById('showLoginForm').addEventListener('click', function (event) {
			event.preventDefault();
			document.getElementById('registerForm').classList.remove('show');
			document.getElementById('loginForm').classList.add('show');
		});


		document.getElementById('closeLoginForm').addEventListener('click', function () {
			document.getElementById('loginForm').classList.remove('show');
			document.getElementById('overlay').classList.remove('show');
		});

		document.getElementById('overlay').addEventListener('click', function () {
			document.getElementById('registerForm').classList.remove('show');
			document.getElementById('loginForm').classList.remove('show');
			document.getElementById('overlay').classList.remove('show');
		});
	}

	function initThumbnail() {
		if ($('.single_product_thumbnails ul li').length) {
			var thumbs = $('.single_product_thumbnails ul li');
			var singleImage = $('.single_product_image');

			thumbs.each(function () {
				var item = $(this);
				item.on('click', function () {
					thumbs.removeClass('active');
					item.addClass('active');
					var img = item.find('img').data('image');
					var video = item.find('img').data('video');
					singleImage.attr('src', img);
				});
			});
		}
	}

	$('.recommendations').slick({
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		nextArrow: ".right_btn",
		prevArrow: ".left_btn",
		arrows: true,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});

})(window.jQuery);