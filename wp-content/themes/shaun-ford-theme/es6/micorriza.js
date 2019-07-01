const $ = jQuery;

$(document).ready(function(){

	var swiperH = new Swiper('.swiper-container-h', {
        pagination: '.swiper-pagination-h',
        loop: true,
        paginationClickable: true,
        // spaceBetween: 50,
        nextButton: '.swiper-button-next-h',
    	prevButton: '.swiper-button-prev-h',
    });

    var swiperV = new Swiper('.swiper-container-v', {
        direction: 'vertical',
        mousewheelControl: true,
        nextButton: '.swiper-button-next-v',
    	// prevButton: '.swiper-button-prev-v',
        // spaceBetween: 50,
    });

	// Instagram Menu
	$('.instagram_JS').click(function (e) {
		e.preventDefault();
		$('#instagram-feed').toggleClass('is-active');
	})
	$(window).resize(function () {
		$('#instagram-feed').removeClass('is-active')
	})

	$('.navbar-burger').click(function() {

		var self = $(this);
		var target = self.data('target');
		target = $('#'+target);

		self.toggleClass('is-active');
		target.toggleClass('is-active');
	});

	$('.navbar-item').click(function() {
		
		var nav = $('.navbar-burger');
		var target = nav.data('target');
		target = $('#'+target);

		if (nav.hasClass('is-active')) {
			nav.removeClass('is-active');
			target.removeClass('is-active');
		}
	})

	$(".nano").nanoScroller();

	$('.slick-wrapper').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		// fade: true,
		asNavFor: '.slick-nav, .slick-test',
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
		nextArrow: '.slick-next',
	});

	$('.slick-test').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		// fade: true,
		asNavFor: '.slick-nav, .slick-wrapper',
	});

	$('#post-gallery_JS').slick({
		centerMode: true,
		centerPadding: '200px',
		slidesToShow: 1,
		arrows: false,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '100px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '50px',
					slidesToShow: 1
				}
			}
		]
	});

	// Gallery
	$('.open_JS').click(function (e) {
		e.preventDefault();
		var $el = $(this);
		var $target = $($el.data('target'));
		
		$el.toggleClass('open');

		if ($el.hasClass('open')) {
			$el.text($el.data('open'));
		}else {
			$el.text($el.data('close'));
		}

		$target.toggleClass('open');
	});

	//Back to top 
	$('a.bktop').click(function(e){
		$('html, body').animate({scrollTop: 0}, '5000');
		e.preventDefault();
	});

	if( $('#register_js').length > 0 ) {

		$("#register_js").validate({

			submitHandler: function(form, e) {

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

				jqxhr.done(function(data) {

					$('#register-submit_js').prop("disabled", false).val('Submit');
					$("#register_js")[0].reset();
					$('#messages-box').slideDown('fast');
					$('#messages').html("Thank you por registering.");
				});

				jqxhr.fail(function(jqXHR, status, thrownError){

					var data = "";

					try {
						data = (JSON.parse(jqXHR.responseText)).message;
					} catch (e) {
						data = "Could not process your request now, try later."
					}

					$('#register-submit_js').prop("disabled", false).val('Submit');
					$('#messages-box').slideDown('fast');
					$('#messages').html(data);
				});

			},
			errorPlacement: function(error, element) {
				error.insertBefore(element);
			},
			errorElement: "em",
			errorClass: "error",
			errorPlacement: function(error, element) {
				// error.appendTo( element.parent() );
				error.appendTo( element.parent() );
			},
			rules: {
				'register_js[firstname]': "required",
				'register_js[lastname]': "required",
			    'register_js[email]': {
			      required: true,
			      email: true
			    },
			}
		});
	}

	$('#messages-close').click(function() {
		$('#messages-box').slideUp('fast');
	});
	

});
