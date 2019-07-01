/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "./js/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

	'use strict';
	
	function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
	
	var $ = jQuery;
	
	$(document).ready(function () {
	
		var swiperH = new Swiper('.swiper-container-h', {
			pagination: '.swiper-pagination-h',
			loop: true,
			paginationClickable: true,
			// spaceBetween: 50,
			nextButton: '.swiper-button-next-h',
			prevButton: '.swiper-button-prev-h'
		});
	
		var swiperV = new Swiper('.swiper-container-v', {
			direction: 'vertical',
			mousewheelControl: true,
			nextButton: '.swiper-button-next-v'
			// prevButton: '.swiper-button-prev-v',
			// spaceBetween: 50,
		});
	
		// Instagram Menu
		$('.instagram_JS').click(function (e) {
			e.preventDefault();
			$('#instagram-feed').toggleClass('is-active');
		});
		$(window).resize(function () {
			$('#instagram-feed').removeClass('is-active');
		});
	
		$('.navbar-burger').click(function () {
	
			var self = $(this);
			var target = self.data('target');
			target = $('#' + target);
	
			self.toggleClass('is-active');
			target.toggleClass('is-active');
		});
	
		$('.navbar-item').click(function () {
	
			var nav = $('.navbar-burger');
			var target = nav.data('target');
			target = $('#' + target);
	
			if (nav.hasClass('is-active')) {
				nav.removeClass('is-active');
				target.removeClass('is-active');
			}
		});
	
		$(".nano").nanoScroller();
	
		$('.slick-wrapper').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			// fade: true,
			asNavFor: '.slick-nav, .slick-test'
		});
		$('.slick-nav').slick({
			// slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slick-wrapper, .slick-test',
			dots: true,
			appendDots: '.slick-dots-wrapper',
			variableWidth: true,
			// centerMode: true,
			focusOnSelect: true,
			prevArrow: '.slick-prev',
			nextArrow: '.slick-next'
		});
	
		$('.slick-test').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			// fade: true,
			asNavFor: '.slick-nav, .slick-wrapper'
		});
	
		$('#post-gallery_JS').slick({
			centerMode: true,
			centerPadding: '200px',
			slidesToShow: 1,
			arrows: false,
			responsive: [{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '100px',
					slidesToShow: 1
				}
			}, {
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '50px',
					slidesToShow: 1
				}
			}]
		});
	
		// Gallery
		$('.open_JS').click(function (e) {
			e.preventDefault();
			var $el = $(this);
			var $target = $($el.data('target'));
	
			$el.toggleClass('open');
	
			if ($el.hasClass('open')) {
				$el.text($el.data('open'));
			} else {
				$el.text($el.data('close'));
			}
	
			$target.toggleClass('open');
		});
	
		//Back to top 
		$('a.bktop').click(function (e) {
			$('html, body').animate({ scrollTop: 0 }, '5000');
			e.preventDefault();
		});
	
		if ($('#register_js').length > 0) {
			var _$$validate;
	
			$("#register_js").validate((_$$validate = {
	
				submitHandler: function submitHandler(form, e) {
	
					e.stopPropagation();
					e.preventDefault();
	
					$('#register-submit_js').prop("disabled", true).val("Sending...");
					$('#messages-box').slideUp('fast');
					$('#messages').html('');
	
					var datos = $(form).serializeArray();
	
					datos.push({
						name: "action",
						value: 'Cltvo_Register_ajax'
					});
	
					var jqxhr = $.post(cltvo_js_vars.ajax_url, datos);
	
					jqxhr.done(function (data) {
	
						$('#register-submit_js').prop("disabled", false).val('Submit');
						$("#register_js")[0].reset();
						$('#messages-box').slideDown('fast');
						$('#messages').html("Thank you por registering.");
					});
	
					jqxhr.fail(function (jqXHR, status, thrownError) {
	
						var data = "";
	
						try {
							data = JSON.parse(jqXHR.responseText).message;
						} catch (e) {
							data = "Could not process your request now, try later.";
						}
	
						$('#register-submit_js').prop("disabled", false).val('Submit');
						$('#messages-box').slideDown('fast');
						$('#messages').html(data);
					});
				},
				errorPlacement: function errorPlacement(error, element) {
					error.insertBefore(element);
				},
				errorElement: "em",
				errorClass: "error"
			}, _defineProperty(_$$validate, 'errorPlacement', function errorPlacement(error, element) {
				// error.appendTo( element.parent() );
				error.appendTo(element.parent());
			}), _defineProperty(_$$validate, 'rules', {
				'register_js[firstname]': "required",
				'register_js[lastname]': "required",
				'register_js[email]': {
					required: true,
					email: true
				}
			}), _$$validate));
		}
	
		$('#messages-close').click(function () {
			$('#messages-box').slideUp('fast');
		});


		function scrollMenuMobile(sm) {
		    if (sm.matches) {
		        // Menú scroll down up
				// Hide Header on on scroll down
				var didScroll;
				var lastScrollTop = 0;
				var delta = 5;
				var navbarHeight = $('.navbar').outerHeight();

				$(window).scroll(function(event){
				    didScroll = true;
				});
				
				setInterval(function() {
				    if (didScroll) {
				        hasScrolled();
				        didScroll = false;
				    }
				}, 250);

				function hasScrolled() {
				    var st = $(window).scrollTop();
				    
				    // Make sure they scroll more than delta
				    if(Math.abs(lastScrollTop - st) <= delta)
				        return;
				    
				    // If they scrolled down and are past the navbar, add class .nav-up.
				    // This is necessary so you never see what is "behind" the navbar.
				    if (st > lastScrollTop && st > navbarHeight){
				        // Scroll Down
				        $('.navbar').removeClass('nav-down').addClass('nav-up');
				    } else {
				        // Scroll Up
				        if(st + $(window).height() < $(document).height()) {
				            $('.navbar').removeClass('nav-up').addClass('nav-down');
				        }
				    }
				    
				    lastScrollTop = st;
				}
		    }
		}
		var sm = window.matchMedia("(max-width: 768px)")
		scrollMenuMobile(sm)
		sm.addListener(scrollMenuMobile)


	});

/***/ })
/******/ ]);
//# sourceMappingURL=functions.js.map