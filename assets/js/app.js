/**
 * @package Hutami
 * @subpackage Hutami Theme
 * @since Hutami Theme 1.0
 */

(function($){
	/* Configuration */

	var Config = {

	},
	$document = $(document),
	$window = $(window),
	$footer = $('#footer'),
	$loader = $('#loader'),
	$mask = $('#mask'),
	$bullets = $('.tp-bullets'),
	$carousel = $('.home-carousel'),
	viewport_width = $window.width(),
	viewport_height = $window.height(),
    mobile_menu = false;


	/* Utilities */
	var Util = window.Util = {
		popupCenter: function(url, title, w, h) {
			// Fixes dual-screen position Most browsersFirefox
			var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
			var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;
			var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
			var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

			var left = ((width / 2) - (w / 2)) + dualScreenLeft;
			var top = ((height / 3) - (h / 3)) + dualScreenTop;

			var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

			// Puts focus on the newWindow
			if (window.focus) {
				newWindow.focus();
			}
		},
		isEmail: function(email) {
		    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    if(!regex.test(email)) {
		       return false;
		    }else{
		       return true;
	   		}
	   	},
	   	submenuOnHover: function(){
	   		$('ul.navbar-nav li.menu-item-has-children').hover(function() {
				$(this).find('.sub-menu').first().stop(true, true).delay(150).slideDown();
			  	//$(this).addClass('open');
			}, function() {
			  	$(this).find('.sub-menu').first().stop(true, true).delay(100).slideUp();
			  	//$(this).removeClass('open');
			});
	   	},
	   	textSizer: function(){
	   		$('#text-sizer a').click(function(event) {
	   			/* Act on the event */
	   			event.preventDefault();
	   			var text_size = $(this).attr('rel'),
	   				$content = $('.page-trial-container .post-content');
	   			if (text_size === "big"){
	   				$content.css({
	   					'font-size': font_size_medium+'px',
	   					'line-height': line_height_medium+'px'
	   				});
	   			}else if (text_size === "bigger"){
	   				$content.css({
	   					'font-size': font_size_large+'px',
	   					'line-height': line_height_large+'px'
	   				});
	   			}else{
	   				$content.css({
	   					'font-size': font_size_small+'px',
	   					'line-height': line_height_small+'px'
	   				});
	   			}
	   		});
	   	},
	   	loadLatestNews: function(page_number){
	   		$.ajax({
	   			url: ajax_url,
	   			type: 'POST',
	   			ddata: 'action=latest_news_load_infinite&page_no="'+ page_number,
	   		})
	   		.done(function() {
	   			console.log("success");
	   		})
	   		.fail(function() {
	   			console.log("error");
	   		})
	   		.always(function() {
	   			console.log("complete");
	   		});
	   		return false;
	   	},
		environment: {
			isAndroid: function() {
				return navigator.userAgent.match(/Android/i);
			},
			isBlackBerry: function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			isNewBlackberry: function() {
				return navigator.userAgent.match(/BB10/i);
			},
			isIOS: function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			isOpera: function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			isIPad: function() {
				return navigator.userAgent.match(/iPad/i);
			},
			isWindows: function() {
				return navigator.userAgent.match(/IEMobile/i);
			},
			isMSIE9: function(){
				return navigator.userAgent.match(/MSIE 9.0/i);
			},
			isGS4Browser: function(){
				var cond1 = navigator.userAgent.match(/SAMSUNG GT-I9505/i);
				var cond2 = navigator.userAgent.match(/Version\/1.0/i);
				return (cond1 && cond2);
			},
			isTablet: function(){
				return (Util.environment.isIPad() || ($(window).width() > 991 && $(window).width() < 1329));
			},
			isMobile: function() {
				return ($(window).width() < 991) || (Util.environment.isAndroid() || Util.environment.isBlackBerry() || Util.environment.isNewBlackberry() || Util.environment.isIOS() || Util.environment.isOpera() || Util.environment.isWindows());
			},
			isIE: function(){
				return (navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )
			},
			isChrome: function(){
				return navigator.userAgent.indexOf("Chrome") != -1;
			},
			isOpera: function(){
				return navigator.userAgent.indexOf("Opera") != -1;
			},
			isFirefox: function(){
				return navigator.userAgent.indexOf("Firefox") != -1;
			},
			isSafari: function(){
				return navigator.appVersion.indexOf("Mac") !=- 1;
			}

 	 	}

	}



	var App = window.App = {
		init: function(){
			App.generalBindings();
			App.initInfiniteScroll();
			App.initSticky();
			App.initBackToTop();
		},
		generalBindings: function(){
			// Code for event on click, on hover, on submit, etc...

			// Share button on click
			$('.share a.popup').on('click', function(e){			
				var _this = $(this);
				Util.popupCenter(_this.attr('href'), _this.find('.text').html(), 580, 470);
				e.preventDefault();
			});		

			// Sub menu on hover
			Util.submenuOnHover();

			// Text Sizer
			Util.textSizer();
		},
		initInfiniteScroll: function(){
			var page = 1,
				$content = $('#latest-content');
			if($content.length){
				$(window).scroll(function(){
	                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
	                    page ++;
	                    //$('#infscr-loading').removeClass('is-hidden');
	                    $.ajax({
				   			url: ajax_url,
				   			type: 'POST',
				   			data: 'action=post_infinite_scroll&page_no='+page,
				   			success: function(response){
					   			$content.append(response);
				   			}
				   		});
	                }
	            }); 
	        }
		},
		initPrealoader: function(){
			// Preloader
		    $loader.delay(700).fadeOut();
		    $mask.delay(1200).fadeOut("slow");
		},
		initCarousel: function(){
			if($carousel.length){
				$carousel.owlCarousel({
					itemsCustom: [
				        [0, 1],
				        [450, 1],
				        [640, 2],
				        [940, 3],
				        [1120, 3],
				    ],
				    autoHeight: true,
			    	pagination: false,
				    navigation: true,
				    navigationText: [
				      '<i class="home-arrow-left"></i>',
				      '<i class="home-arrow-right"></i>'
				    ],

					// Responsive 
					responsive: true,
					responsiveRefreshRate: 200,
					responsiveBaseWidth: $carousel,
					lazyLoad : true,
				});

			}

		},
		initIsotope: function(){

		},
		initMobileMenu: function(){

		},
		initSticky: function(){

		},
		initSidebarWidget: function(){

		},
		initBackToTop: function(){
			$('.back-to-top').click(function () {
				$('html, body').animate({
					scrollTop: 0
				}, 1500);
				return false;
			});
		},
		initAnimation: function(){
			// Elements animation
			var $el=$('.animated');
			if($el.length){
				$el.appear(function() {
					var element = $(this);
					var animation = element.data('animation');
					var animationDelay = element.data('delay');
					if(animationDelay) {
						setTimeout(function(){
							element.addClass( animation + " visible" );
							element.removeClass('hiding');
						}, animationDelay);
					} else {
						element.addClass( animation + " visible" );
						element.removeClass('hiding');
					}    			
				}, {accY: -150});
			}
		},
	}

	App.init();
})(jQuery); 

 

