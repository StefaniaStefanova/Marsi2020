<?php
/**
 * Computer Repair Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Computer Repair Store
 */

if ( ! defined( 'COMPUTER_REPAIR_SERVICES_URL' ) ) {
    define( 'COMPUTER_REPAIR_SERVICES_URL', esc_url( 'https://www.themagnifico.net/products/computer-store-wordpress-theme', 'computer-repair-store') );
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_TEXT' ) ) {
    define( 'COMPUTER_REPAIR_SERVICES_TEXT', __( 'Computer Repair Pro','computer-repair-store' ));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_CONTACT_SUPPORT' ) ) {
define('COMPUTER_REPAIR_SERVICES_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/computer-repair-store','computer-repair-store'));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_REVIEW' ) ) {
define('COMPUTER_REPAIR_SERVICES_REVIEW',__('https://wordpress.org/support/theme/computer-repair-store/reviews/#new-post','computer-repair-store'));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_LIVE_DEMO' ) ) {
define('COMPUTER_REPAIR_SERVICES_LIVE_DEMO',__('https://demo.themagnifico.net/computer-repair-store/','computer-repair-store'));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_GET_PREMIUM_PRO' ) ) {
define('COMPUTER_REPAIR_SERVICES_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/computer-store-wordpress-theme','computer-repair-store'));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_PRO_DOC' ) ) {
define('COMPUTER_REPAIR_SERVICES_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/computer-repair-store-doc/','computer-repair-store'));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_BUY_TEXT' ) ) {
    define( 'COMPUTER_REPAIR_SERVICES_BUY_TEXT', __( 'Buy Computer Repair Store Pro','computer-repair-store' ));
}
if ( ! defined( 'COMPUTER_REPAIR_SERVICES_FREE_DOC' ) ) {
define('COMPUTER_REPAIR_SERVICES_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/computer-repair-store-free-doc/','computer-repair-store'));
}

function computer_repair_store_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    $computer_repair_store_parentcss = 'computer-repair-services-style';
    $computer_repair_store_theme = wp_get_theme(); wp_enqueue_style( $computer_repair_store_parentcss, get_template_directory_uri() . '/style.css', array(), $computer_repair_store_theme->parent()->get('Version'));
    wp_enqueue_style( 'computer-repair-store-style', get_stylesheet_uri(), array( $computer_repair_store_parentcss ), $computer_repair_store_theme->get('Version'));
    wp_enqueue_script('computer-repair-store-child-theme-js', esc_url(get_theme_file_uri()) . '/assets/js/child-theme-script.js', array( 'jquery' ), true );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );  
}

add_action( 'wp_enqueue_scripts', 'computer_repair_store_enqueue_styles' );

function computer_repair_store_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'computer-repair-store-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'computer_repair_store_admin_scripts' );


function computer_repair_store_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function computer_repair_store_customize_register($wp_customize){

    // Pro Version
    class Computer_Repair_Store_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( COMPUTER_REPAIR_SERVICES_BUY_TEXT,'computer-repair-store' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Computer_Repair_Store_sanitize_custom_control( $input ) {
        return $input;
    }

    // Our Shop
    $wp_customize->add_section('computer_repair_store_our_shop_product',array(
        'title' => esc_html__('Our Shop Option','computer-repair-store')
    ));

    $wp_customize->add_setting('computer_repair_store_our_shop_product_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_store_our_shop_product_title',array(
        'label' => esc_html__('Product Title','computer-repair-store'),
        'section' => 'computer_repair_store_our_shop_product',
        'setting' => 'computer_repair_store_our_shop_product_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_store_our_shop_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('computer_repair_store_our_shop_product_number',array(
        'label' => esc_html__('No of Product','computer-repair-store'),
        'section' => 'computer_repair_store_our_shop_product',
        'setting' => 'computer_repair_store_our_shop_product_number',
        'type'  => 'number'
    ));

    $computer_repair_store_args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $computer_repair_store_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('computer_repair_store_our_shop_product_category',array(
        'sanitize_callback' => 'computer_repair_store_sanitize_select',
    ));
    $wp_customize->add_control('computer_repair_store_our_shop_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','computer-repair-store'),
        'section' => 'computer_repair_store_our_shop_product',
    ));
    // Pro Version
    $wp_customize->add_setting( 'pro_version_our_shop_setting', array(
        'sanitize_callback' => 'Computer_Repair_Store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Computer_Repair_Store_Customize_Pro_Version ( $wp_customize,'pro_version_our_shop_setting', array(
        'section'     => 'computer_repair_store_our_shop_product',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'computer-repair-store' ),
        'description' => esc_url( COMPUTER_REPAIR_SERVICES_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'computer_repair_store_customize_register');

if ( ! function_exists( 'computer_repair_store_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function computer_repair_store_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('computer-repair-store-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'computer_repair_services_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'computer_repair_store_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function computer_repair_store_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'computer-repair-store' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'computer-repair-store' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'computer_repair_store_widgets_init' );

function computer_repair_store_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'computer_repair_services_slider_opacity_color' );
    $wp_customize->remove_control( 'computer_repair_services_slider_opacity_color' );
    
}
add_action( 'customize_register', 'computer_repair_store_remove_customize_register', 11 );
