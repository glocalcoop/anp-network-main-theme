/*
Main Theme Scription
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

jQuery().ready( function( $ ){

	$('.network-posts-list').bxSlider({
		slideWidth: 5000,
		minSlides: 2,
		maxSlides: 2,
		slideMargin: 10,
		pager: false
	});
	
	var responsive_viewport = $( window ).width();

	$(responsive_viewport < 320) {
		$('.network-posts-list').reloadSlider({
			slideWidth: 5000,
			minSlides: 1,
			maxSlides: 1,
			slideMargin: 10,
			pager: false
		});
	}

} );


