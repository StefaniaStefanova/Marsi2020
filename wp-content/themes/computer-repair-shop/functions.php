<?php
/**
 * Computer Repair Shop functions and definitions
 *
 * @subpackage Computer Repair Shop
 * @since 1.0
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Computer_Repair_Shop_Loader.php' );

$Computer_Repair_Shop_Loader = new \WPTRT\Autoload\Computer_Repair_Shop_Loader();

$Computer_Repair_Shop_Loader->computer_repair_shop_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Computer_Repair_Shop_Loader->computer_repair_shop_register();

function computer_repair_shop_setup() {
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
	    'default-color'          => '',
	    'default-image'          => '',
	    'default-repeat'         => '',
	    'default-position-x'     => '',
	    'default-attachment'     => '',
	    'wp-head-callback'       => '_custom_background_cb',
	    'admin-head-callback'    => '',
	    'admin-preview-callback' => ''
	));

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'computer-repair-shop' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', computer_repair_shop_fonts_url() ) );

	// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'computer_repair_shop_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'computer_repair_shop_setup' );

// Notice after Theme Activation
function computer_repair_shop_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'computer-repair-shop' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing Computer Repair Shop theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'computer-repair-shop' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=computer_repair_shop_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'computer-repair-shop' ) .'</a></p>';
	echo '</div>';
}

function computer_repair_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'computer-repair-shop' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'computer-repair-shop' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'computer-repair-shop' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'computer-repair-shop' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'computer-repair-shop' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'computer-repair-shop' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'computer-repair-shop' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'computer-repair-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'computer_repair_shop_widgets_init' );

function computer_repair_shop_fonts_url(){
	$font_families = array(
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

//Enqueue scripts and styles.
function computer_repair_shop_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'computer-repair-shop-fonts', computer_repair_shop_fonts_url(), array(), null );
	
	//Bootstarp 
	wp_enqueue_style( 'bootstrap-css', esc_url( get_template_directory_uri() ).'/assets/css/bootstrap.css' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'computer-repair-shop-basic-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'computer-repair-shop-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'computer-repair-shop-style' ), '1.0' );
		wp_style_add_data( 'computer-repair-shop-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'computer-repair-shop-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'computer-repair-shop-style' ), '1.0' );
	wp_style_add_data( 'computer-repair-shop-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome-css', esc_url( get_template_directory_uri() ).'/assets/css/fontawesome-all.css' );

	wp_enqueue_style('custom-animations', get_template_directory_uri() . '/assets/css/animations.css');

	require get_parent_theme_file_path( '/lz-custom-style.php' );
	wp_add_inline_style( 'computer-repair-shop-basic-style',$computer_repair_shop_custom_style );

	wp_enqueue_script( 'computer-repair-shop-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', esc_url( get_template_directory_uri() ). '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url( get_template_directory_uri() ). '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'computer_repair_shop_scripts' );

function computer_repair_shop_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'computer_repair_shop_front_page_template' );

define('COMPUTER_REPAIR_SHOP_LIVE_DEMO',__('https://www.luzukdemo.com/demo/computer-repair-shop/','computer-repair-shop'));
define('COMPUTER_REPAIR_SHOP_PRO_DOCS',__('https://www.luzukdemo.com/docs/computer-repair-shop/','computer-repair-shop'));
define('COMPUTER_REPAIR_SHOP_BUY_NOW',__('https://www.luzuk.com/product/computer-repair-shop-wordpress-theme/','computer-repair-shop'));
define('COMPUTER_REPAIR_SHOP_SUPPORT',__('https://wordpress.org/support/theme/computer-repair-shop/','computer-repair-shop'));
define('COMPUTER_REPAIR_SHOP_CREDIT',__('https://www.luzuk.com/themes/free-computer-repair-shop-wordpress-theme/','computer-repair-shop'));

if ( ! function_exists( 'computer_repair_shop_credit' ) ) {
	function computer_repair_shop_credit(){
		echo "<a href=".esc_url(COMPUTER_REPAIR_SHOP_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('computer_repair_shop_footer_copy',__('By Luzuk','computer-repair-shop')))."</a>";
	}
}

function computer_repair_shop_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function computer_repair_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function computer_repair_shop_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function computer_repair_shop_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function computer_repair_shop_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Excerpt Limit Begin */
function computer_repair_shop_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, (int)($word_limit) + 1);
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'computer_repair_shop_loop_columns');
if (!function_exists('computer_repair_shop_loop_columns')) {
	function computer_repair_shop_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Breadcrumb Begin */
function computer_repair_shop_breadcrumb() {
	if (!is_home()) {
		echo '<i class="fas fa-home mr-2"></i><a href="';
			echo esc_url(home_url());
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			echo "&nbsp;&#187;&nbsp;";
			the_category(', ');
			if (is_single()) {
				echo "&nbsp;&#187;&nbsp;";
				echo "<span> ";
					the_title();
				echo "</span>";
			}
		} elseif (is_page()) {
			echo "&nbsp;&#187;&nbsp;";
			echo "<span> ";
				the_title();
			echo "</span> ";
		}
	}
}

function computer_repair_shop_banner_image( $image_url ){
    global $post;

    if( is_singular() ){
        $image_url      = get_the_post_thumbnail_url( $post->ID, 'full' );
    }
    return $image_url;
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );

require get_parent_theme_file_path( '/inc/wptt-webfont-loader.php' );