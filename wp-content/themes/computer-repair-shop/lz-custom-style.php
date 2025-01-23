<?php 

	$computer_repair_shop_custom_style = '';

	// Logo Size
	$computer_repair_shop_logo_top_padding = get_theme_mod('computer_repair_shop_logo_top_padding');
	$computer_repair_shop_logo_bottom_padding = get_theme_mod('computer_repair_shop_logo_bottom_padding');
	$computer_repair_shop_logo_left_padding = get_theme_mod('computer_repair_shop_logo_left_padding');
	$computer_repair_shop_logo_right_padding = get_theme_mod('computer_repair_shop_logo_right_padding');

	if( $computer_repair_shop_logo_top_padding != '' || $computer_repair_shop_logo_bottom_padding != '' || $computer_repair_shop_logo_left_padding != '' || $computer_repair_shop_logo_right_padding != ''){
		$computer_repair_shop_custom_style .=' .logo {';
			$computer_repair_shop_custom_style .=' padding-top: '.esc_attr($computer_repair_shop_logo_top_padding).'px; padding-bottom: '.esc_attr($computer_repair_shop_logo_bottom_padding).'px; padding-left: '.esc_attr($computer_repair_shop_logo_left_padding).'px; padding-right: '.esc_attr($computer_repair_shop_logo_right_padding).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_logo_size = get_theme_mod('computer_repair_shop_logo_size');
	if( $computer_repair_shop_logo_size != '' ) {
		if($computer_repair_shop_logo_size >= 0 && $computer_repair_shop_logo_size <= 100) {
			$calculated_width = $computer_repair_shop_logo_size * 3.5;
			$computer_repair_shop_custom_style .= ' .custom-logo-link img {';
			$computer_repair_shop_custom_style .= ' width: ' . esc_attr($calculated_width) . 'px;';
			$computer_repair_shop_custom_style .= ' }';
		}
	}

	// Site Title color
	$computer_repair_shop_site_title_color = get_theme_mod('computer_repair_shop_site_title_color');
	if ( $computer_repair_shop_site_title_color != '') {
		$computer_repair_shop_custom_style .=' h1.site-title a, p.site-title a {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_site_title_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	// Site Tagline color
	$computer_repair_shop_site_tagline_color = get_theme_mod('computer_repair_shop_site_tagline_color');
	if ( $computer_repair_shop_site_tagline_color != '') {
		$computer_repair_shop_custom_style .=' p.site-description {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_site_tagline_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	//layout width
	$computer_repair_shop_boxfull_width = get_theme_mod('computer_repair_shop_boxfull_width');
	if ($computer_repair_shop_boxfull_width !== '') {
		switch ($computer_repair_shop_boxfull_width) {
			case 'container':
				$computer_repair_shop_custom_style .= ' body, #header, .bottom-header {
					max-width: 1140px;
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'container-fluid':
				$computer_repair_shop_custom_style .= ' body, #header, .bottom-header { 
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'none':
				// No specific width specified, so no additional style needed.
				break;
			default:
				// Handle unexpected values.
				break;
		}
	}

	//Menu animation
	$computer_repair_shop_dropdown_anim = get_theme_mod('computer_repair_shop_dropdown_anim');

	if ( $computer_repair_shop_dropdown_anim != '') {
		$computer_repair_shop_custom_style .=' .nav-menu ul ul {';
			$computer_repair_shop_custom_style .=' animation:'.esc_attr($computer_repair_shop_dropdown_anim).' 1s ease;';
		$computer_repair_shop_custom_style .=' }';
	}

	// Header Image
	$header_image_url = computer_repair_shop_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$computer_repair_shop_custom_style .=' #inner-pages-header {';
			$computer_repair_shop_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat;';
		$computer_repair_shop_custom_style .=' }';
		$computer_repair_shop_custom_style .=' .header-overlay {';
			$computer_repair_shop_custom_style .=' position: absolute; 	width: 100%; height: 100%; 	top: 0; left: 0; background: #000; opacity: 0.3;';
		$computer_repair_shop_custom_style .=' }';
	} else {
		$computer_repair_shop_custom_style .=' #inner-pages-header {';
			$computer_repair_shop_custom_style .=' background:linear-gradient(0deg,#ccc,#0a0607 80%) no-repeat; ';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_headerbg_color = get_theme_mod('computer_repair_shop_headerbg_color');
	if ( $computer_repair_shop_headerbg_color != '') {
		$computer_repair_shop_custom_style .=' .topbar {';
			$computer_repair_shop_custom_style .=' background-color:'.esc_attr($computer_repair_shop_headerbg_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_slider_hide_show = get_theme_mod('computer_repair_shop_slider_hide_show',false);
	if( $computer_repair_shop_slider_hide_show == true){
		$computer_repair_shop_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$computer_repair_shop_custom_style .=' display:none;';
		$computer_repair_shop_custom_style .=' }';
	}

	// Copyright padding
	$computer_repair_shop_copyright_padding = get_theme_mod('computer_repair_shop_copyright_padding');
	if( $computer_repair_shop_copyright_padding != ''){
		$computer_repair_shop_custom_style .=' .site-info {';
			$computer_repair_shop_custom_style .=' padding-top: '.esc_attr($computer_repair_shop_copyright_padding).'px; padding-bottom: '.esc_attr($computer_repair_shop_copyright_padding).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_footer_copy_font_size = get_theme_mod('computer_repair_shop_footer_copy_font_size');
	if ( $computer_repair_shop_footer_copy_font_size != '') {
		$computer_repair_shop_custom_style .=' .site-info p, .site-info a {';
			$computer_repair_shop_custom_style .=' font-size:'.esc_attr($computer_repair_shop_footer_copy_font_size).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_copyright_color = get_theme_mod('computer_repair_shop_copyright_color');
	if ( $computer_repair_shop_copyright_color != '') {
		$computer_repair_shop_custom_style .=' .site-info p, .site-info a {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_copyright_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_copyrightbg_color = get_theme_mod('computer_repair_shop_copyrightbg_color');
	if ( $computer_repair_shop_copyrightbg_color != '') {
		$computer_repair_shop_custom_style .=' .copyright {';
			$computer_repair_shop_custom_style .=' background-color:'.esc_attr($computer_repair_shop_copyrightbg_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	// Slider color
	$computer_repair_shop_slider_title_font_size = get_theme_mod('computer_repair_shop_slider_title_font_size');
	if ( $computer_repair_shop_slider_title_font_size != '') {
		$computer_repair_shop_custom_style .=' #slider h2 a {';
			$computer_repair_shop_custom_style .=' font-size:'.esc_attr($computer_repair_shop_slider_title_font_size).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_slider_text_font_size = get_theme_mod('computer_repair_shop_slider_text_font_size');
	if ( $computer_repair_shop_slider_text_font_size != '') {
		$computer_repair_shop_custom_style .=' #slider p {';
			$computer_repair_shop_custom_style .=' font-size:'.esc_attr($computer_repair_shop_slider_text_font_size).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_slider_color = get_theme_mod('computer_repair_shop_slider_color');
	if ( $computer_repair_shop_slider_color != '') {
		$computer_repair_shop_custom_style .=' #slider h2 a, #slider p {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_slider_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_slidernp_color = get_theme_mod('computer_repair_shop_slidernp_color');
	$computer_repair_shop_slidernpbg_color = get_theme_mod('computer_repair_shop_slidernpbg_color');
	if ( $computer_repair_shop_slidernp_color != '') {
		$computer_repair_shop_custom_style .=' #slider .carousel-control-prev-icon i, #slider .carousel-control-next-icon i {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_slidernp_color).'; background-color:'.esc_attr($computer_repair_shop_slidernpbg_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	// Service color
	$computer_repair_shop_section_title_font_size = get_theme_mod('computer_repair_shop_section_title_font_size');
	if ( $computer_repair_shop_section_title_font_size != '') {
		$computer_repair_shop_custom_style .=' #service-section h3 {';
			$computer_repair_shop_custom_style .=' font-size:'.esc_attr($computer_repair_shop_section_title_font_size).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_service_img_size = get_theme_mod('computer_repair_shop_service_img_size');
	if( $computer_repair_shop_service_img_size != ''){
		$computer_repair_shop_custom_style .=' .service-box .service-img img {';
			$computer_repair_shop_custom_style .=' width: '.esc_attr($computer_repair_shop_service_img_size).'px; height: '.esc_attr($computer_repair_shop_service_img_size).'px;';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_service_title_color = get_theme_mod('computer_repair_shop_service_title_color');
	if ( $computer_repair_shop_service_title_color != '') {
		$computer_repair_shop_custom_style .=' .service-box h4 a {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_service_title_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_service_text_color = get_theme_mod('computer_repair_shop_service_text_color');
	if ( $computer_repair_shop_service_text_color != '') {
		$computer_repair_shop_custom_style .=' .service-box p {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_service_text_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_service_btn_color = get_theme_mod('computer_repair_shop_service_btn_color');
	$computer_repair_shop_service_btnbg_color = get_theme_mod('computer_repair_shop_service_btnbg_color');
	if ( $computer_repair_shop_service_btn_color != '') {
		$computer_repair_shop_custom_style .=' .service-content .read-btn a {';
			$computer_repair_shop_custom_style .=' color:'.esc_attr($computer_repair_shop_service_btn_color).'; background-color:'.esc_attr($computer_repair_shop_service_btnbg_color).';';
		$computer_repair_shop_custom_style .=' }';
	}

	$computer_repair_shop_servicebg_color = get_theme_mod('computer_repair_shop_servicebg_color');
	if ( $computer_repair_shop_servicebg_color != '') {
		$computer_repair_shop_custom_style .=' .service-content {';
			$computer_repair_shop_custom_style .=' background-color:'.esc_attr($computer_repair_shop_servicebg_color).';';
		$computer_repair_shop_custom_style .=' }';
	}