<?php
/**
 * Computer Repair Services Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Computer Repair Services
 */

if ( ! defined( 'COMPUTER_REPAIR_SERVICES_URL' ) ) {
    define( 'COMPUTER_REPAIR_SERVICES_URL', esc_url( 'https://www.themagnifico.net/products/computer-wordpress-theme', 'computer-repair-services') );
}

if ( ! defined( 'COMPUTER_REPAIR_SERVICES_TEXT' ) ) {
    define( 'COMPUTER_REPAIR_SERVICES_TEXT', __( 'Computer Repair Pro','computer-repair-services' ));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_BUY_TEXT' ) ) {
    define( 'COMPUTER_REPAIR_SERVICES_BUY_TEXT', __( 'Buy Computer Repair Pro','computer-repair-services' ));
}

use WPTRT\Customize\Section\Computer_Repair_Services_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Computer_Repair_Services_Button::class );

    $manager->add_section(
        new Computer_Repair_Services_Button( $manager, 'computer_repair_services_pro', [
            'title'       => esc_html( COMPUTER_REPAIR_SERVICES_TEXT, 'computer-repair-services' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'computer-repair-services' ),
            'button_url'  => esc_url( COMPUTER_REPAIR_SERVICES_URL)
        ] )
    );
} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'computer-repair-services-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'computer-repair-services-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function computer_repair_services_customize_register($wp_customize){

    // Pro Version
    class Computer_Repair_Services_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( COMPUTER_REPAIR_SERVICES_BUY_TEXT,'computer-repair-services' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Computer_Repair_Services_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('computer_repair_services_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'computer_repair_services_sanitize_number_absint'
    ));
    $wp_customize->add_control('computer_repair_services_logo_max_height',array(
        'label' => esc_html__('Logo Width','computer-repair-services'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('computer_repair_services_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'computer-repair-services' ),
        'section'        => 'title_tagline',
        'settings'       => 'computer_repair_services_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'computer-repair-services' ),
        'section'        => 'title_tagline',
        'settings'       => 'computer_repair_services_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'computer_repair_services_logo_title_color', array(
        'label'    => __('Site Title Color', 'computer-repair-services'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('computer_repair_services_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'computer_repair_services_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'computer-repair-services'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('computer_repair_services_general_settings',array(
        'title' => esc_html__('General Settings','computer-repair-services'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('computer_repair_services_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','computer-repair-services' ),
        'type' => 'radio',
        'section' => 'computer_repair_services_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','computer-repair-services'),
            'Wide Width' => __('Wide Width','computer-repair-services'),
            'Container Width' => __('Container Width','computer-repair-services')
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_general_settings',
        'settings'       => 'computer_repair_services_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'computer_repair_services_preloader_bg_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_services_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'settings' => 'computer_repair_services_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'computer_repair_services_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_services_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'settings' => 'computer_repair_services_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'computer_repair_services_preloader_dot_2_color', array(
        'default' => '#f10026',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_services_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'settings' => 'computer_repair_services_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('computer_repair_services_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_general_settings',
        'settings'       => 'computer_repair_services_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_scroll_top_position',array(
        'label'       => esc_html__( 'Scroll To Top Positions','computer-repair-services' ),
        'type' => 'radio',
        'section' => 'computer_repair_services_general_settings',
        'choices' => array(
            'Right' => __('Right','computer-repair-services'),
            'Left' => __('Left','computer-repair-services'),
            'Center' => __('Center','computer-repair-services')
        ),
    ) );

    $wp_customize->add_setting( 'computer_repair_services_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_services_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'settings' => 'computer_repair_services_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'computer_repair_services_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'computer_repair_services_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'settings' => 'computer_repair_services_scroll_color'
    )));

    $wp_customize->add_setting('computer_repair_services_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','computer-repair-services'),
        'description' => __('Put in px','computer-repair-services'),
        'section'   => 'computer_repair_services_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'computer_repair_services_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','computer-repair-services' ),
        'section'     => 'computer_repair_services_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_general_settings',
        'settings'       => 'computer_repair_services_sticky_header',
        'type'           => 'checkbox',
    )));

    // Product Columns
   $wp_customize->add_setting( 'computer_repair_services_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'computer_repair_services_sanitize_select',
   ) );

   $wp_customize->add_control('computer_repair_services_products_per_row', array(
       'label' => __( 'Product per row', 'computer-repair-services' ),
       'section'  => 'computer_repair_services_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
   ) );

   $wp_customize->add_setting('computer_repair_services_product_per_page',array(
       'default'   => '9',
       'sanitize_callback' => 'computer_repair_services_sanitize_float'
   ));
   $wp_customize->add_control('computer_repair_services_product_per_page',array(
       'label' => __('Product per page','computer-repair-services'),
       'section'   => 'computer_repair_services_general_settings',
       'type'      => 'number'
   ));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('computer_repair_services_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_general_settings',
        'settings'       => 'computer_repair_services_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','computer-repair-services'),
            'Right Sidebar' => __('Right Sidebar','computer-repair-services'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('computer_repair_services_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_general_settings',
        'settings'       => 'computer_repair_services_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','computer-repair-services'),
        'section' => 'computer_repair_services_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','computer-repair-services'),
            'Right Sidebar' => __('Right Sidebar','computer-repair-services'),
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'computer_repair_services_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','computer-repair-services' ),
        'section'     => 'computer_repair_services_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 150,
        ),
    ) );

    $wp_customize->add_setting( 'computer_repair_services_woo_product_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_woo_product_image_box_shadow', array(
        'label'       => esc_html__( 'Product Image Box Shadow','computer-repair-services' ),
        'section'     => 'computer_repair_services_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_woocommerce_product_sale',array(
        'label' => __('Woocommerce Product Sale Positions','computer-repair-services'),
        'type' => 'radio',
        'section' => 'computer_repair_services_general_settings',
        'choices' => array(
            'Right' => __('Right','computer-repair-services'),
            'Left' => __('Left','computer-repair-services'),
            'Center' => __('Center','computer-repair-services')
        ),
    ) );

    $wp_customize->add_setting( 'computer_repair_services_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','computer-repair-services' ),
        'section'     => 'computer_repair_services_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'computer_repair_services_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    //Header
    $wp_customize->add_section('computer_repair_services_header',array(
        'title' => esc_html__('Header Option','computer-repair-services')
    ));

    $wp_customize->add_setting('computer_repair_services_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_address',array(
        'label' => esc_html__('Address','computer-repair-services'),
        'section' => 'computer_repair_services_header',
        'setting' => 'computer_repair_services_address',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('computer_repair_services_email',array(
        'label' => esc_html__('Email Address','computer-repair-services'),
        'section' => 'computer_repair_services_header',
        'setting' => 'computer_repair_services_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'computer_repair_services_sanitize_phone_number'
    ));
    $wp_customize->add_control('computer_repair_services_phone_number',array(
        'label' => esc_html__('Phone Number','computer-repair-services'),
        'section' => 'computer_repair_services_header',
        'setting' => 'computer_repair_services_phone_number',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'computer_repair_services_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    //Social Icon
    $wp_customize->add_section('computer_repair_services_media',array(
        'title' => esc_html__('Social Media Option','computer-repair-services')
    ));

    $wp_customize->add_setting('computer_repair_services_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_facebook_url',array(
        'label' => esc_html__('Facebook URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_intagram_url',array(
        'label' => esc_html__('Instagram URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_linkedin_url',array(
        'label' => esc_html__('Linkdin URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_youtube_url',array(
        'label' => esc_html__('Youtube URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_youtube_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_watsapp_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_watsapp_url',array(
        'label' => esc_html__('Whatsapp URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_watsapp_url',
        'type'  => 'url'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'computer_repair_services_media',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('computer_repair_services_top_slider',array(
        'title' => esc_html__('Slider Option','computer-repair-services')
    ));

    $wp_customize->add_setting('computer_repair_services_top_slider_setting', array(
        'default' => 1,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_top_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_top_slider',
        'settings'       => 'computer_repair_services_top_slider_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_slider_loop', array(
        'default' => 1,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_slider_loop',array(
        'label'          => __( 'Enable Disable Slider Loop', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_top_slider',
        'settings'       => 'computer_repair_services_slider_loop',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Title', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_top_slider',
        'settings'       => 'computer_repair_services_slider_title_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_slider_content_setting', array(
        'default' => 1,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_slider_content_setting',array(
        'label'          => __( 'Enable Disable Slider Content', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_top_slider',
        'settings'       => 'computer_repair_services_slider_content_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('computer_repair_services_slider_button_setting', array(
        'default' => 1,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'computer_repair_services_slider_button_setting',array(
        'label'          => __( 'Enable Disable Slider Button', 'computer-repair-services' ),
        'section'        => 'computer_repair_services_top_slider',
        'settings'       => 'computer_repair_services_slider_button_setting',
        'type'           => 'checkbox',
    )));

    for ( $computer_repair_services_count = 1; $computer_repair_services_count <= 3; $computer_repair_services_count++ ) {
        $wp_customize->add_setting( 'computer_repair_services_top_slider_page' . $computer_repair_services_count, array(
            'default'           => '',
            'sanitize_callback' => 'computer_repair_services_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'computer_repair_services_top_slider_page' . $computer_repair_services_count, array(
            'label'    => __( 'Select Slide Page', 'computer-repair-services' ),
            'description' => __('Slider image size (1400 x 550)','computer-repair-services'),
            'section'  => 'computer_repair_services_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Slider button text
    $wp_customize->add_setting('computer_repair_services_slider_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_slider_button_text',array(
        'label' => __('Slider Button Text','computer-repair-services'),
        'section'=> 'computer_repair_services_top_slider',
        'type'=> 'text'
    ));

    //Slider Image Opacity
    $wp_customize->add_setting('computer_repair_services_slider_opacity_color',array(
      'default' => '',
      'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));

    $wp_customize->add_control( 'computer_repair_services_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','computer-repair-services' ),
    'section'     => 'computer_repair_services_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','computer-repair-services'),
      '0.1' =>  esc_attr('0.1','computer-repair-services'),
      '0.2' =>  esc_attr('0.2','computer-repair-services'),
      '0.3' =>  esc_attr('0.3','computer-repair-services'),
      '0.4' =>  esc_attr('0.4','computer-repair-services'),
      '0.5' =>  esc_attr('0.5','computer-repair-services'),
      '0.6' =>  esc_attr('0.6','computer-repair-services'),
      '0.7' =>  esc_attr('0.7','computer-repair-services'),
      '0.8' =>  esc_attr('0.8','computer-repair-services'),
      '0.9' =>  esc_attr('0.9','computer-repair-services')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('computer_repair_services_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_slider_img_height',array(
        'label' => __('Slider Height','computer-repair-services'),
        'description'   => __('Add the slider height in px(eg. 500px).','computer-repair-services'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'computer-repair-services' ),
        ),
        'section'=> 'computer_repair_services_top_slider',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'computer_repair_services_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    //About Us
    $wp_customize->add_section('computer_repair_services_new_project',array(
        'title' => esc_html__('About Us','computer-repair-services'),
        'description' => esc_html__('Here you have to select about page which will display perticular about section in the home page.','computer-repair-services')
    ));

    $wp_customize->add_setting( 'computer_repair_services_about_page', array(
        'default'           => '',
        'sanitize_callback' => 'computer_repair_services_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'computer_repair_services_about_page', array(
        'label'    => __( 'Select About Page', 'computer-repair-services' ),
        'section'  => 'computer_repair_services_new_project',
        'type'     => 'dropdown-pages'
    ) );

    $wp_customize->add_setting('computer_repair_services_about_image_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_about_image_text',array(
        'label' => esc_html__('About Text','computer-repair-services'),
        'section' => 'computer_repair_services_new_project',
        'setting' => 'computer_repair_services_about_image_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_about_support_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_about_support_text',array(
        'label' => esc_html__('Support Text','computer-repair-services'),
        'section' => 'computer_repair_services_new_project',
        'setting' => 'computer_repair_services_about_support_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_about_team_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_about_team_text',array(
        'label' => esc_html__('Team Text','computer-repair-services'),
        'section' => 'computer_repair_services_new_project',
        'setting' => 'computer_repair_services_about_team_text',
        'type'  => 'text'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_about_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_about_setting', array(
        'section'     => 'computer_repair_services_new_project',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('computer_repair_services_site_footer_section', array(
        'title' => esc_html__('Footer', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_show_hide_footer',array(
        'default' => true,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control('computer_repair_services_show_hide_footer',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Footer','computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
        'priority' => 1,
    ));

    $wp_customize->add_setting('computer_repair_services_footer_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'computer_repair_services_footer_background_color', array(
        'label'    => __('Footer Background Color', 'computer-repair-services'),
        'section'  => 'computer_repair_services_site_footer_section',
    )));

    $wp_customize->add_setting('computer_repair_services_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'computer_repair_services_footer_bg_image',array(
        'label' => __('Footer Background Image','computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
    )));

    $wp_customize->add_setting('computer_repair_services_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','computer-repair-services'),
        'choices' => array(
            'fixed' => __('fixed','computer-repair-services'),
            'scroll' => __('scroll','computer-repair-services'),
        ),
        'section'=> 'computer_repair_services_site_footer_section',
    ));

    $wp_customize->add_setting('computer_repair_services_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
        'choices' => array(
            'Left' => __('Left','computer-repair-services'),
            'Center' => __('Center','computer-repair-services'),
            'Right' => __('Right','computer-repair-services')
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
        'choices' => array(
            'Left' => __('Left','computer-repair-services'),
            'Center' => __('Center','computer-repair-services'),
            'Right' => __('Right','computer-repair-services')
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control('computer_repair_services_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
    ));

    $wp_customize->add_setting('computer_repair_services_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('computer_repair_services_footer_text_setting', array(
        'label' => __('Replace the footer text', 'computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('computer_repair_services_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'computer_repair_services_sanitize_choices'
    ));
    $wp_customize->add_control('computer_repair_services_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
        'choices' => array(
            'Left' => __('Left','computer-repair-services'),
            'Center' => __('Center','computer-repair-services'),
            'Right' => __('Right','computer-repair-services')
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'computer_repair_services_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'computer-repair-services'),
        'section'  => 'computer_repair_services_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'computer_repair_services_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('computer_repair_services_post_settings',array(
        'title' => esc_html__('Post Settings','computer-repair-services'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_title',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_meta',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_thumb',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting( 'computer_repair_services_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','computer-repair-services' ),
        'section'     => 'computer_repair_services_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_post_page_content',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_excerpt_length',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('computer_repair_services_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_btn',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_post_page_pagination',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_single_post_thumb',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting( 'computer_repair_services_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','computer-repair-services' ),
        'section'     => 'computer_repair_services_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'computer_repair_services_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'computer_repair_services_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'computer_repair_services_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','computer-repair-services' ),
        'section'     => 'computer_repair_services_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('computer_repair_services_single_post_meta',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_single_post_title',array(
            'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_single_post_page_content',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_single_post_tags',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'computer-repair-services'),
        'section'     => 'computer_repair_services_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox'
    ));
    $wp_customize->add_control('computer_repair_services_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','computer-repair-services'),
        'section' => 'computer_repair_services_post_settings',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'computer_repair_services_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('computer_repair_services_page_settings',array(
        'title' => esc_html__('Page Settings','computer-repair-services'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('computer_repair_services_single_page_title',array(
            'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'computer-repair-services'),
        'section'     => 'computer_repair_services_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_single_page_thumb',array(
        'sanitize_callback' => 'computer_repair_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('computer_repair_services_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'computer-repair-services'),
        'section'     => 'computer_repair_services_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'computer-repair-services'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Computer_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'computer_repair_services_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-services' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'computer_repair_services_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function computer_repair_services_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function computer_repair_services_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function computer_repair_services_customize_preview_js(){
    wp_enqueue_script('computer-repair-services-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'computer_repair_services_customize_preview_js');


/*
** Load dynamic logic for the customizer controls area.
*/
function computer_repair_services_panels_js() {
    wp_enqueue_style( 'computer-repair-services-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'computer-repair-services-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'computer_repair_services_panels_js' );

