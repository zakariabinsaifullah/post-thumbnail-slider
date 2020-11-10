;(function($){
	
	/**
	 * Placeholder on Devices
	 */
	
	let pts_dimension = document.querySelectorAll('.hide_placeholder .csf--input');
	let pts_dimension_item = document.querySelectorAll('.hide_placeholder .csf--input input');

	pts_dimension_item.forEach(function( item ){
		item.setAttribute( 'min', '1' );
	});

	pts_dimension[0].lastChild.setAttribute( 'placeholder', 'Desktop' );

	pts_dimension[1].lastChild.setAttribute( 'placeholder', 'Tablet' );

	pts_dimension[2].lastChild.setAttribute( 'placeholder', 'Mobile' );

	/**
	 * Placeholder on Devices Space 
	 */
	
	let pts_space = document.querySelectorAll('.hide_placeholder_space .csf--input');
	let pts_space_item = document.querySelectorAll('.hide_placeholder_space .csf--input input');

	pts_space_item.forEach(function( item ){
		item.setAttribute( 'min', '0' );
	});

	pts_space[0].lastChild.setAttribute( 'placeholder', 'Desktop' );

	pts_space[1].lastChild.setAttribute( 'placeholder', 'Tablet' );

	pts_space[2].lastChild.setAttribute( 'placeholder', 'Mobile' );
	
	/**
	 * Thumbnail Height
	 */
	let pts_thumb_height = document.querySelectorAll('.hide_thumb_placeholder .csf--input');
	let pts_thumb_item = document.querySelectorAll('.hide_thumb_placeholder .csf--input input');

	pts_thumb_item.forEach(function( item ){
		item.setAttribute( 'min', '1' );
	});

	pts_thumb_height[0].lastChild.setAttribute( 'placeholder', 'Desktop' );

	pts_thumb_height[1].lastChild.setAttribute( 'placeholder', 'Tablet' );

	pts_thumb_height[2].lastChild.setAttribute( 'placeholder', 'Mobile' );

	/**
	 * Carousel Mode 
	 */
	let pts_carousel_modes = document.querySelectorAll( '.pts_pro_carousel_mode .csf--button' );

	pts_carousel_modes[1].classList.add('pts_btn_pro');

	/**
	 * Display Style
	 *
	 **/
	let pts_display_style = document.querySelectorAll( '.pts_pro_display .csf--button' );

	pts_display_style[1].classList.add('pts_btn_pro');

	/**
	 * Display Mode
	 *
	 **/
	let pts_display_mode = document.querySelectorAll( '.pts_pro_display_mode .csf--button' );

	pts_display_mode[1].classList.add('pts_btn_pro');

	/**
	 * Pro Post Type 
	 */
	
	let pts_pro_post_type = document.querySelectorAll('.pro_select_pt .csf--button');

	pts_pro_post_type[1].classList.add('pts_btn_pro');

	/**
	 * Pro Feature
	 */
	
	let pts_pro_options = document.querySelectorAll('.pro_select .csf-fieldset option');

	$count = 0; 
	pts_pro_options.forEach(function( option ){

		if ( $count > 0 ) {
			option.setAttribute( 'disabled', 'disabled' );
		}

		$count++; 
	});


})(jQuery);