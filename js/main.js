jQuery(function(){
	jQuery('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
		event.preventDefault(); 
		event.stopPropagation(); 
		jQuery(this).parent().siblings().removeClass('open');
		jQuery(this).parent().toggleClass('open');
	});
	
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
});
