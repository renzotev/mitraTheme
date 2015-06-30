jQuery(function(){

	// ---------------------- MENU -----------------------------------
 
	jQuery('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
		event.preventDefault(); 
		event.stopPropagation(); 
		jQuery(this).parent().siblings().removeClass('open');
		jQuery(this).parent().toggleClass('open');
	});

	var activeMenu = function () {
		var liMenu = jQuery('.navbar .nav.navbar-nav > li');

		liMenu.each(function( index ) {
			if(jQuery('.navbar .nav.navbar-nav > li').eq(index).find('.active').length) {
				jQuery('.navbar .nav.navbar-nav > li').eq(index).addClass('active');
			}
		});
	}

	activeMenu();

	// ---------------------------- SLIDER -------------------------------
	
	if (jQuery('#slides').length) {
		jQuery('#slides').slidesjs({
			width: 1140,
			height: 400,
			navigation: false,
			play: {
				auto: true,
				pauseOnHover: true
			}
		});
	}

	// ----------------- CAROUSEL -------------------------

	if (jQuery('.owl-carousel').length) {
		jQuery('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:15,
	        nav:true,
	        dots:false,
	        autoplay: true,
	        autoplayHoverPause: true,
	        navContainer: ".owl-carousel" ,
	        navText: ["<span class='glyphicon glyphicon-chevron-left'></span>","<span class='glyphicon glyphicon-chevron-right'></span>"]
		});
	}

	// ----------------- BACK TO TOP --------------------------

	var scrollTimeOut;
	var flag = true;

	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > jQuery( window ).height()/2) {
			jQuery('.scrollToTop-wrapper').show(500);
		} else {
			jQuery('.scrollToTop-wrapper').hide(500);
		}
	});
	
	jQuery('.scrollToTop-wrapper').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});
});
