<?php
/**
 * Computer Repair Shop: Customizer
 *
 * @subpackage Computer Repair Shop
 * @since 1.0
 */

use WPTRT\Customize\Section\Computer_Repair_Shop_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Computer_Repair_Shop_Button::class );

	$manager->add_section(
		new Computer_Repair_Shop_Button( $manager, 'computer_repair_shop_pro', [
			'title'      => __( 'Computer Repair Shop Pro', 'computer-repair-shop' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'computer-repair-shop' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/computer-repair-shop-wordpress-theme/', 'computer-repair-shop')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'computer-repair-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'computer-repair-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function computer_repair_shop_customize_register( $wp_customize ) {

	$wp_customize->add_setting('computer_repair_shop_logo_size',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_logo_size',array(
		'type' => 'range',
		'description' => __('Logo Size (0-100%)','computer-repair-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('computer_repair_shop_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('computer_repair_shop_logo_padding',array(
		'label' => __('Logo Margin','computer-repair-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('computer_repair_shop_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','computer-repair-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('computer_repair_shop_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','computer-repair-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('computer_repair_shop_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','computer-repair-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('computer_repair_shop_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
 	));
 	$wp_customize->add_control('computer_repair_shop_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','computer-repair-shop'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('computer_repair_shop_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('computer_repair_shop_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','computer-repair-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'computer_repair_shop_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_site_title_color', array(
		   'label' => 'Title Color',
			'section' => 'title_tagline',
	   )));

	$wp_customize->add_setting('computer_repair_shop_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('computer_repair_shop_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','computer-repair-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'computer_repair_shop_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_site_tagline_color', array(
		   'label' => 'Tagline Color',
			'section' => 'title_tagline',
	   )));

	$wp_customize->add_panel( 'computer_repair_shop_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'computer-repair-shop' ),
		'description' => __( 'Description of what this panel does.', 'computer-repair-shop' ),
	) );

	$wp_customize->add_section( 'computer_repair_shop_theme_options_section', array(
    	'title'      => __( 'General Settings', 'computer-repair-shop' ),
		'priority'   => 30,
		'panel' => 'computer_repair_shop_panel_id'
	) );

	$wp_customize->add_setting('computer_repair_shop_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	$wp_customize->add_control('computer_repair_shop_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','computer-repair-shop'),
		'section' => 'computer_repair_shop_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','computer-repair-shop'),
		   'Right Sidebar' => __('Right Sidebar','computer-repair-shop'),
		   'One Column' => __('One Column','computer-repair-shop'),
		   'Three Columns' => __('Three Columns','computer-repair-shop'),
		   'Four Columns' => __('Four Columns','computer-repair-shop'),
		   'Grid Layout' => __('Grid Layout','computer-repair-shop')
		),
	));

	$wp_customize->add_setting('computer_repair_shop_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	$wp_customize->add_control('computer_repair_shop_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','computer-repair-shop'),
        'section' => 'computer_repair_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','computer-repair-shop'),
            'Right Sidebar' => __('Right Sidebar','computer-repair-shop'),
            'One Column' => __('One Column','computer-repair-shop')
        ),
	));

	$wp_customize->add_setting('computer_repair_shop_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	$wp_customize->add_control('computer_repair_shop_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','computer-repair-shop'),
        'section' => 'computer_repair_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','computer-repair-shop'),
            'Right Sidebar' => __('Right Sidebar','computer-repair-shop'),
            'One Column' => __('One Column','computer-repair-shop')
        ),
	));

	$wp_customize->add_setting('computer_repair_shop_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	$wp_customize->add_control('computer_repair_shop_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','computer-repair-shop'),
        'section' => 'computer_repair_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','computer-repair-shop'),
            'Right Sidebar' => __('Right Sidebar','computer-repair-shop'),
            'One Column' => __('One Column','computer-repair-shop'),
		   	'Three Columns' => __('Three Columns','computer-repair-shop'),
		   	'Four Columns' => __('Four Columns','computer-repair-shop'),
            'Grid Layout' => __('Grid Layout','computer-repair-shop')
        ),
	));

	$wp_customize->add_setting( 'computer_repair_shop_boxfull_width', array(
		'default'           => '',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	
	$wp_customize->add_control( 'computer_repair_shop_boxfull_width', array(
		'label'    => __( 'Section Width', 'computer-repair-shop' ),
		'section'  => 'computer_repair_shop_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'container'  => __('Box Width', 'computer-repair-shop'),
			'container-fluid' => __('Full Width', 'computer-repair-shop'),
			'none' => __('None', 'computer-repair-shop')
		),
	));

	$wp_customize->add_setting( 'computer_repair_shop_dropdown_anim', array(
		'default'           => 'None',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'computer_repair_shop_dropdown_anim', array(
		'label'    => __( 'Menu Dropdown Animations', 'computer-repair-shop' ),
		'section'  => 'computer_repair_shop_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInUp'  => __('bounceInUp', 'computer-repair-shop'),
			'fadeInUp' => __('fadeInUp', 'computer-repair-shop'),
			'zoomIn'    => __('zoomIn', 'computer-repair-shop'),
			'None'    => __('None', 'computer-repair-shop')
		),
	));

	//Header
	$wp_customize->add_section( 'computer_repair_shop_header_section' , array(
    	'title'    => __( 'Header', 'computer-repair-shop' ),
		'priority' => null,
		'panel' => 'computer_repair_shop_panel_id'
	) );

	$wp_customize->add_setting('computer_repair_shop_phone_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('computer_repair_shop_phone_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Text','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_phone_number',array(
    	'default' => '',
    	'sanitize_callback'	=> 'computer_repair_shop_sanitize_phone_number'
	));
	$wp_customize->add_control('computer_repair_shop_phone_number',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_timing_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('computer_repair_shop_timing_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Timing Text','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_timing',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('computer_repair_shop_timing',array(
	   	'type' => 'text',
	   	'label' => __('Add Timing','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_quote_btn_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('computer_repair_shop_quote_btn_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Quote Button Text','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_quote_btn_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('computer_repair_shop_quote_btn_url',array(
	   	'type' => 'text',
	   	'label' => __('Add Quote Button URL','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('computer_repair_shop_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('computer_repair_shop_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('computer_repair_shop_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting('computer_repair_shop_linkedin_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('computer_repair_shop_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_header_section',
	));

	$wp_customize->add_setting( 'computer_repair_shop_headerbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_headerbg_color', array(
		   'label' => 'Top Background Color',
		'section' => 'computer_repair_shop_header_section',
	   )));

	//home page slider
	$wp_customize->add_section( 'computer_repair_shop_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'computer-repair-shop' ),
		'priority' => null,
		'panel' => 'computer_repair_shop_panel_id'
	) );

	$wp_customize->add_setting('computer_repair_shop_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'computer_repair_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('computer_repair_shop_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','computer-repair-shop'),
	   	'section' => 'computer_repair_shop_slider_section',
	));

	$wp_customize->add_setting( 'computer_repair_shop_slider_effect', array(
		'default'           => '',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'computer_repair_shop_slider_effect', array(
		'label'    => __( 'Onload Transactions Effects', 'computer-repair-shop' ),
		'section'  => 'computer_repair_shop_slider_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInLeft'  => __('bounceInLeft', 'computer-repair-shop'),
			'bounceInRight' => __('bounceInRight', 'computer-repair-shop'),
			'bounceInUp'    => __('bounceInUp', 'computer-repair-shop'),
			'bounceInDown'    => __('bounceInDown', 'computer-repair-shop'),
			'zoomIn'  => __('zoomIn', 'computer-repair-shop'),
			'zoomOut' => __('zoomOut', 'computer-repair-shop'),
			'fadeInDown'    => __('fadeInDown', 'computer-repair-shop'),
			'fadeInUp'    => __('fadeInUp', 'computer-repair-shop'),
			'fadeInLeft'  => __('fadeInLeft', 'computer-repair-shop'),
			'fadeInRight' => __('fadeInRight', 'computer-repair-shop'),
			'flip-up'    => __('flip-up', 'computer-repair-shop'),
			'none'    => __('none', 'computer-repair-shop')
		),
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'computer_repair_shop_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'computer_repair_shop_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'computer_repair_shop_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'computer-repair-shop' ),
			'description'=> __('Image size (1400px x 600px)','computer-repair-shop'),
			'section' => 'computer_repair_shop_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('computer_repair_shop_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','computer-repair-shop'),
		'section' => 'computer_repair_shop_slider_section',
	));

	$wp_customize->add_setting('computer_repair_shop_slider_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_slider_title_font_size',array(
		'type' => 'number',
		'label' => __('Title Font Size','computer-repair-shop'),
		'section' => 'computer_repair_shop_slider_section',
	));

	$wp_customize->add_setting('computer_repair_shop_slider_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_slider_text_font_size',array(
		'type' => 'number',
		'label' => __('Text Font Size','computer-repair-shop'),
		'section' => 'computer_repair_shop_slider_section',
	));

	$wp_customize->add_setting( 'computer_repair_shop_slider_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_slider_color', array(
		'label' => 'Text Color',
		'section' => 'computer_repair_shop_slider_section',
	)));

	$wp_customize->add_setting( 'computer_repair_shop_slidernp_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_slidernp_color', array(
		'label' => 'Next/Pre Arrow Color',
		'section' => 'computer_repair_shop_slider_section',
	)));

	$wp_customize->add_setting( 'computer_repair_shop_slidernpbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_slidernpbg_color', array(
		'label' => 'Next/Pre Arrow Bg Color',
		'section' => 'computer_repair_shop_slider_section',
	)));

	//Services Section
	$wp_customize->add_section('computer_repair_shop_service_section',array(
		'title'	=> __('Service Section','computer-repair-shop'),
		'description'=> __('<b>Note</b> : This section will appear below the slider.','computer-repair-shop'),
		'panel' => 'computer_repair_shop_panel_id',
	));

    $wp_customize->add_setting('computer_repair_shop_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('computer_repair_shop_section_title',array(
		'label'	=> __('Section Title','computer-repair-shop'),
		'section' => 'computer_repair_shop_service_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('computer_repair_shop_section_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_section_title_font_size',array(
		'type' => 'number',
		'label' => __('Font Size','computer-repair-shop'),
		'section' => 'computer_repair_shop_service_section',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('computer_repair_shop_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'computer_repair_shop_sanitize_choices',
	));
	$wp_customize->add_control('computer_repair_shop_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','computer-repair-shop'),
		'section' => 'computer_repair_shop_service_section',
	));

	$wp_customize->add_setting('computer_repair_shop_service_img_size',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_service_img_size',array(
		'type' => 'number',
		'description' => __('Image Size','computer-repair-shop'),
		'section' => 'computer_repair_shop_service_section',
	));

	$wp_customize->add_setting( 'computer_repair_shop_service_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_service_title_color', array(
		'label' => 'Box Title Color',
		'section' => 'computer_repair_shop_service_section',
	)));

	$wp_customize->add_setting( 'computer_repair_shop_service_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_service_text_color', array(
		'label' => 'Box Text Color',
		'section' => 'computer_repair_shop_service_section',
	)));

	$wp_customize->add_setting( 'computer_repair_shop_service_btn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_service_btn_color', array(
		'label' => 'Button Text Color',
		'section' => 'computer_repair_shop_service_section',
	)));

	$wp_customize->add_setting( 'computer_repair_shop_service_btnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_service_btnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'computer_repair_shop_service_section',
	)));

	//Footer
    $wp_customize->add_section( 'computer_repair_shop_footer', array(
    	'title'  => __( 'Footer Setting', 'computer-repair-shop' ),
		'priority' => null,
		'panel' => 'computer_repair_shop_panel_id'
	) );

	$wp_customize->add_setting('computer_repair_shop_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'computer_repair_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('computer_repair_shop_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','computer-repair-shop'),
       'section' => 'computer_repair_shop_footer'
    ));

    $wp_customize->add_setting('computer_repair_shop_footer_copy',array(
		'default' => 'Computer Repair WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('computer_repair_shop_footer_copy',array(
		'label'	=> __('Copyright Text','computer-repair-shop'),
		'section' => 'computer_repair_shop_footer',
		'setting' => 'computer_repair_shop_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('computer_repair_shop_footer_copy_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
	));
	$wp_customize->add_control('computer_repair_shop_footer_copy_font_size',array(
		'type' => 'number',
		'label' => __('Font Size','computer-repair-shop'),
		'section' => 'computer_repair_shop_footer',
	));

	$wp_customize->add_setting('computer_repair_shop_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'computer_repair_shop_sanitize_float'
 	));
 	$wp_customize->add_control('computer_repair_shop_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','computer-repair-shop'),
		'section' => 'computer_repair_shop_footer',
	));

	$wp_customize->add_setting( 'computer_repair_shop_copyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_copyright_color', array(
		'label' => 'Copyright Text Color',
		'section' => 'computer_repair_shop_footer',
	)));

	$wp_customize->add_setting( 'computer_repair_shop_copyrightbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_shop_copyrightbg_color', array(
		'label' => 'Copyright Bg Color',
		'section' => 'computer_repair_shop_footer',
	)));

	$wp_customize->register_section_type( Computer_Repair_Shop_Button::class );

	$wp_customize->add_section(
		new Computer_Repair_Shop_Button( $wp_customize, 'computer_repair_shop_pro_link', [
			'title'      => __( 'Computer Repair Shop Pro', 'computer-repair-shop' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'computer-repair-shop' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/computer-repair-shop-wordpress-theme/', 'computer-repair-shop'),
			'panel' => 'computer_repair_shop_panel_id'
		] )
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'computer_repair_shop_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'computer_repair_shop_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'computer_repair_shop_customize_register' );

function computer_repair_shop_customize_partial_blogname() {
	bloginfo( 'name' );
}

function computer_repair_shop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function computer_repair_shop_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function computer_repair_shop_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}