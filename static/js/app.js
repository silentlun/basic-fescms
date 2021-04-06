$(function() {
	var $offset = 0;
	$('#homeheader').on('click', '.nav-link', function(event) {
		var _href = $(this).attr('href');
		var pos = _href.indexOf('#');
		var $position = $(_href.substr(pos)).offset().top;
		$('html, body').stop().animate({
			scrollTop: $position - $offset
		}, 600);
		event.preventDefault();
	});
	$(window).scroll(function() {
		if ($(window).scrollTop() > 60) {
			$('.header').addClass('header-fixed');
		} else {
			$('.header').removeClass('header-fixed');
		}
	});
	$(window).scroll(function() {
		$('.navbar-collapse.show').collapse('hide');
	});
	var m = $(".bg-img, .footer, section, div");
	m.each(function(t) {
		if ($(this).attr("data-background")) {
			$(this).css("background-image", "url(" + $(this).data("background") + ")")
		}
	});
	$(".home-carousel").owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		dots: false,
		animateOut: "fadeOut",
		animateIn: "fadeIn",
		active: true,
		autoplay: true,
		smartSpeed: 1000,
		autoplayTimeout: 5000,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			425: {
				items: 1
			},
			768: {
				items: 1
			},
			1024: {
				items: 1
			},
			1440: {
				items: 1
			}
		}
	});
	$(".client-items").owlCarousel({
		loop: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 3000,
		nav: false,
		dots: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			425: {
				items: 2
			},
			768: {
				items: 3
			},
			1024: {
				items: 4
			},
			1440: {
				items: 5
			}
		}
	});
	$(".counter").counterUp({
		delay: 10,
		time: 1000
	});
	if ($(".wow").length) {
		var s = new WOW({
			boxClass: "wow",
			animateClass: "animated",
			offset: 0,
			mobile: false,
			live: true
		});
		s.init()
	}
	
	$("#contact-form").validate({
		rules:{
			'Feedback[name]':{required:true},
			'Feedback[mobile]':{required:true},
			'Feedback[email]':{required:true},
			'Feedback[verifyCode]':{required:true},
		},
		messages:{
			'Feedback[name]':{required:'请输入您的姓名'},
			'Feedback[mobile]':{required:'请输入手机号',mobile:'手机号码格式不正确',maxlength:'手机号码长度不能超过11位数',},
			'Feedback[email]':{required:'请输入邮箱',email:'邮箱地址格式不正确',},
			'Feedback[verifyCode]':{required:'请输入验证码'},
		},
		submitHandler:function(form){
			$(form).find(":submit").attr("disabled", true);
			form.submit();
		}
	});



});

