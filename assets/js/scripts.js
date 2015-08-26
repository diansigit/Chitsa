(function(){



	// Init global DOM elements, functions and arrays

  	window.app 			 = {el : {}, fn : {}};

	app.el['window']     = jQuery(window);

	app.el['document']   = jQuery(document);

	

	app.fn.hiddenBulletOnSafari = function(){

		var detect = navigator.userAgent.toLowerCase();

		if(detect.indexOf('safari') + 1){

			if(app.el['window'].width() < 768 && jQuery('.tp-bullets').length){

				jQuery('.navbar-toggle').click(function(){

					//console.log(jQuery('.tp-bullets').offset().top - jQuery(document).scrollTop());

					//console.log(jQuery('#header').height());

					if((jQuery('.tp-bullets').offset().top - jQuery(document).scrollTop()) > jQuery('#header').height()){

						if(!jQuery('.navbar-collapse').hasClass('in')){

							jQuery('.tp-bullets').css('visibility','hidden');

						}else{

							jQuery('.tp-bullets').css('visibility','visible');

						}

					}else{

						jQuery('.tp-bullets').css('visibility','visible');

					}





					if((jQuery('.tparrows').offset().top - jQuery(document).scrollTop()) > jQuery('#header').height()){

						if(!jQuery('.navbar-collapse').hasClass('in')){

							jQuery('.tparrows').css('visibility','hidden');

						}else{

							jQuery('.tparrows').css('visibility','visible');

						}

					}

				});

			}

			app.el['window'].scroll(function(){

				if(jQuery('.tp-bullets').length || jQuery('.tparrows').length){

					console.log((jQuery('.tp-bullets').offset().top - jQuery(document).scrollTop())+' '+jQuery('#header').height());

					if((jQuery('.tp-bullets').offset().top - jQuery(document).scrollTop()) < jQuery('#header').height()){

						jQuery('.tp-bullets').css('visibility','hidden');

					}else{

						jQuery('.tp-bullets').css('visibility','visible');

						//alert('');

					}



					if((jQuery('.tparrows').offset().top - jQuery(document).scrollTop()) < jQuery('#header').height()){

						jQuery('.tparrows').css('visibility','hidden');

					}else{

						jQuery('.tparrows').css('visibility','visible');

					}
				}

			}).trigger('scroll');

		}

	}



	jQuery(function() {	

		app.el['window'].load(function(){

			app.fn.hiddenBulletOnSafari();

		});


	});



})(jQuery);