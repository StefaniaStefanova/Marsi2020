/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-computer_repair_services_options-';
		
		// Label
		function computer_repair_services_customizer_label( id, title ) {

			// Colors

			if ( id === 'computer_repair_services_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header 

			if ( id === 'computer_repair_services_address' || id === 'computer_repair_services_email' || id === 'computer_repair_services_phone_number' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Social Icon 

			if ( id === 'computer_repair_services_facebook_url' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'computer_repair_services_scroll_hide' || id === 'computer_repair_services_preloader_hide' || id === 'computer_repair_services_sticky_header' || id === 'computer_repair_services_products_per_row' || id === 'computer_repair_services_woocommerce_product_sale')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce Product Border Radius

			if ( id === 'computer_repair_services_woo_product_border_radius') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// About Us

			if ( id === 'computer_repair_services_about_page' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'computer_repair_services_top_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Our Shop

			if ( id === 'computer_repair_store_our_shop_product_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'computer_repair_services_show_hide_footer' || id === 'computer_repair_services_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'computer_repair_services_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'computer_repair_services_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'computer_repair_services_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-computer_repair_services_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	/*
	** Tabs
	*/

		// Colors
		computer_repair_services_customizer_label( 'computer_repair_services_theme_color', 'Theme Color' );
		computer_repair_services_customizer_label( 'background_color', 'Colors' );
		computer_repair_services_customizer_label( 'background_image', 'Image' );

		// Site Identity
		computer_repair_services_customizer_label( 'custom_logo', 'Logo Setup' );
		computer_repair_services_customizer_label( 'site_icon', 'Favicon' );

		// Social Icon
		computer_repair_services_customizer_label( 'computer_repair_services_facebook_url', 'Social Icons' );

		// Header
		computer_repair_services_customizer_label( 'computer_repair_services_address', 'Address' );
		computer_repair_services_customizer_label( 'computer_repair_services_email', 'Email' );
		computer_repair_services_customizer_label( 'computer_repair_services_phone_number', 'Phone' );

		// General Setting
		computer_repair_services_customizer_label( 'computer_repair_services_scroll_hide', 'Scroll To Top' );
		computer_repair_services_customizer_label( 'computer_repair_services_preloader_hide', 'Preloader' );
		computer_repair_services_customizer_label( 'computer_repair_services_sticky_header', 'Sticky Header' );
		computer_repair_services_customizer_label( 'computer_repair_services_products_per_row', 'woocommerce Setting' );
		computer_repair_services_customizer_label( 'computer_repair_services_woocommerce_product_sale', 'Woocommerce Product Sale' );
		computer_repair_services_customizer_label( 'computer_repair_services_woo_product_border_radius', 'Woocommerce Product' );

		// About Us
		computer_repair_services_customizer_label( 'computer_repair_services_about_page', 'About Us' );

		//Slider
		computer_repair_services_customizer_label( 'computer_repair_services_top_slider_setting', 'Slider' );

		//Our Shop
		computer_repair_services_customizer_label( 'computer_repair_store_our_shop_product_title', 'Our Shop' );
		

		//Header Image
		computer_repair_services_customizer_label( 'header_image', 'Header Image' );

		//Footer
		computer_repair_services_customizer_label( 'computer_repair_services_show_hide_footer', 'Footer' );
		computer_repair_services_customizer_label( 'computer_repair_services_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		computer_repair_services_customizer_label( 'computer_repair_services_single_post_thumb', 'Single Post Setting' );

		// Post Setting
		computer_repair_services_customizer_label( 'computer_repair_services_post_page_title', 'Post Setting' );

		// Page Setting
		computer_repair_services_customizer_label( 'computer_repair_services_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
