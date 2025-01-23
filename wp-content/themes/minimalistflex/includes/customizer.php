<?php
if ( !defined( 'WPINC' ) ) {
    die;
}

require_once 'color-definitions.php';
require_once 'sanitize-callbacks.php';

function minimalistflex_customizer_enqueue_scripts() {
    wp_enqueue_script( 'minimalistflex_color_palette', get_template_directory_uri() . '/js/color-palette.js', Array( 'jquery' ), null, true );
}

add_action( 'customize_controls_enqueue_scripts', 'minimalistflex_customizer_enqueue_scripts' );

function minimalistflex_default_featured_image_register( $wp_customize ) {
    require_once 'class-multi-image-control.php';

    $wp_customize -> add_section( 'minimalistflex_default_featured_image', Array(
        'title' => __( 'Default Featured Images', 'minimalistflex' ),
        'description' => __( 'The theme can provide the following images as a fallback when there\'s no featured image set for a post. You can also select where to display those images.', 'minimalistflex' ),
        'priority' => 50,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_default_featured_images', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_default_featured_images_location', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'archive',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_default_featured_images_first_image', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_control( new MinimalistFlex_Multi_Image_Custom_Control( $wp_customize, 'minimalistflex_default_featured_images', Array(
        'label' => __( 'Default Images', 'minimalistflex' ),
        'description' => __( 'Click on "Add Image" to add an image. Click on the image to remove it. There\'s no limit on how many images you can add.', 'minimalistflex' ),
        'priority' => 20,
        'section' => 'minimalistflex_default_featured_image',
        'suggest_label' => __( 'Suggested Images', 'minimalistflex' ),
        'suggest_description' => __( 'We have prepared some pre-built, generic purpose images for you to choose from. Click on an image will add it into the selection.', 'minimalistflex' ),
        'suggest_images' => Array( '/defaults/1.png', '/defaults/2.png', '/defaults/3.png', '/defaults/4.png', '/defaults/5.png', '/defaults/6.png' )
    ) ) );
    $wp_customize -> add_control( 'minimalistflex_default_featured_images_location', Array(
        'label' => __( 'Location', 'minimalistflex' ),
        'description' => __( 'You may decide if and where should the default image show.', 'minimalistflex' ),
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_default_featured_image',
        'choices' => Array(
            'both' => __( 'Always', 'minimalistflex' ),
            'archive' => __( 'Archive Page Only', 'minimalistflex' ),
            'single' => __( 'Single Page Only', 'minimalistflex' ),
            'no' => __( 'Never', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_default_featured_images_first_image', Array(
        'label' => __( 'Display First Image', 'minimalistflex' ),
        'description' => __( 'The theme can also retrieve the first image in a post if possible. When no image was found, the theme can fallback to the default images set below.', 'minimalistflex' ),
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_default_featured_image',
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' ),
        )
    ) );
}
add_action( 'customize_register', 'minimalistflex_default_featured_image_register' );

function minimalistflex_customize_color_register( $wp_customize ) {
    require_once 'class-color-palette-control.php';

    $wp_customize -> add_setting( 'minimalistflex_color_placeholder', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_control( new MinimalistFlex_Color_Palette_Custom_Control( $wp_customize, 'minimalistflex_color_placeholder', Array(
        'priority' => 1,
        'label' => __( 'Color Palettes', 'minimalistflex' ),
        'description' => __( 'We had prepared some fine tuned color palettes for you. Select an option and it will automatically apply the palette to your site.', 'minimalistflex' ),
        'section' => 'colors'
    ) ) );

    global $colors;
    global $labels;
    global $desciprtions;
    $color_keys = array_keys( $colors );
    foreach( $color_keys as $color_key ) {
        $wp_customize -> add_setting( 'minimalistflex_color_' . $color_key, Array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'default' => $colors[$color_key],
            'sanitize_callback' => 'minimalistflex_sanitize_color_cb'
        ) );
        $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'minimalistflex_color_' . $color_key, Array(
            'label' => $labels[$color_key],
            'description' => $desciprtions[$color_key],
            'section' => 'colors'
        ) ) );
    };
    $wp_customize -> add_setting( 'minimalistflex_color_disable_shadow', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'no',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_control( 'minimalistflex_color_disable_shadow', Array(
        'type' => 'radio',
        'label' => __( 'Disable Shadows', 'minimalistflex' ),
        'description' => __( 'This option lets you disable the shadow on the site. It should only affect the shadow created by the theme.', 'minimalistflex' ),
        'priority' => 2,
        'section' => 'colors',
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> get_control( 'background_color' ) -> description = __( 'The default background setting from the WordPress core. If set, it will blend with the content &amp; sidebar background colors set below.', 'minimalistflex' );
    $wp_customize -> get_control( 'header_textcolor' ) -> description = __( 'The default header text setting from the WordPress core. Used on the header and the toggle button.', 'minimalistflex' );
}

$metadatas = Array(
    /* translators: This line is special. The part before <br> is the description of the section, while the rest is the option name.*/
    'description' => __( 'Below are some metadatas that you may configure whether to display or not.<br>Description', 'minimalistflex' ),
    'user_registered' => __( 'Registration time', 'minimalistflex' ),
    'user_url' => __( 'Website', 'minimalistflex' ),
    'user_email' => __( 'Email address', 'minimalistflex' )
);

function minimalistflex_customize_author_elements_register( $wp_customize ) {
    global $metadatas;

    $metadata_keys = array_keys( $metadatas );
    foreach( $metadata_keys as $metadata_key ) {
        $wp_customize -> add_setting( 'minimalistflex_layout_author_elements_' . $metadata_key, Array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'default' => 'yes',
            'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
        ) );
        if ( $metadata_key == 'description' ) {
            $wp_customize -> add_control( 'minimalistflex_layout_author_elements_' . $metadata_key, Array(
                'type' => 'radio',
                'priority' => 45,
                'capability' => 'edit_theme_options',
                'label' => __( 'Metadatas', 'minimalistflex' ),
                'description' => $metadatas[$metadata_key],
                'section' => 'minimalistflex_layout_author',
                'choices' => Array(
                    'yes' => __( 'Yes', 'minimalistflex' ),
                    'no' => __( 'No', 'minimalistflex' )
                )
            ) );   
        } else {
            $wp_customize -> add_control( 'minimalistflex_layout_author_elements_' . $metadata_key, Array(
                'type' => 'radio',
                'priority' => 50,
                'capability' => 'edit_theme_options',
                'description' => $metadatas[$metadata_key],
                'section' => 'minimalistflex_layout_author',
                'choices' => Array(
                    'yes' => __( 'Yes', 'minimalistflex' ),
                    'no' => __( 'No', 'minimalistflex' )
                )
            ) );
        }
    }
}

function minimalistflex_customize_register( $wp_customize ) {

    // Start adding panels.
    $wp_customize -> add_panel( 'minimalistflex_layout', Array(
        'title' => _x( 'Layout', 'customizer panel' , 'minimalistflex' ),
        'description' => __( 'Here you may configure how different pages on your site looks like.', 'minimalistflex' ),
        'priority' => 70,
        'capability' => 'edit_theme_options'
    ) );

    // Start adding sections.
    $wp_customize -> add_section( 'minimalistflex_layout_home', Array(
        'title' => _x( 'Blog Page', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your blog page.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 10,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_layout_front', Array(
        'title' => _x( 'Front Page', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your front page. Only takes effect when using a static front page.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 12,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_layout_archive', Array(
        'title' => _x( 'Archives', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your archive pages.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 15,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_layout_search', Array(
        'title' => _x( 'Search Results', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your search result pages.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 17,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_layout_author', Array(
        'title' => _x( 'Author Pages', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your author pages.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 20,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_layout_singular', Array(
        'title' => _x( 'Single Posts', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your posts.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 25,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_layout_page', Array(
        'title' => _x( 'Pages', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'Here you may customize the layout of your pages.', 'minimalistflex' ),
        'panel' => 'minimalistflex_layout',
        'priority' => 30,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_interface', Array(
        'title' => _x( 'Interface &amp; Elements', 'customizer section' , 'minimalistflex' ),
        'description' => __( 'You may customize your site\'s interface and the elements displayed here.', 'minimalistflex' ),
        'priority' => 71,
        'capability' => 'edit_theme_options'
    ) );
    $wp_customize -> add_section( 'minimalistflex_footer', Array(
        'title' => _x( 'Footer', 'customizer section', 'minimalistflex' ),
        'description' => __( 'You may customize how your footer looks like here.', 'minimalistflex' ),
        'priority' => 140,
        'capability' => 'edit_theme_options'
    ) );

    // Start adding settings.
    $wp_customize -> add_setting( 'minimalistflex_header_link', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_header_label', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_attr'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_home_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_home_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_front_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_front_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_archive_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_archive_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_archive_title', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_search_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_search_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_search_title', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_search_form', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_author_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_author_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_author_title', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_author_admin', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_singular_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_singular_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_page_sidebar', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'right',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_layout_page_header', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_scroll_top', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_excerpt', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 55,
        'sanitize_callback' => 'minimalistflex_sanitize_int_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_autoh2label', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'no',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_comment_count', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_publisher', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'yes',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_date', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'modify',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_readlink', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => __( 'Read More', 'minimalistflex' ),
        'sanitize_callback' => 'esc_html'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_thumbnail_height', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'auto',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_interface_thumbnail_height_px', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 300,
        'sanitize_callback' => 'minimalistflex_sanitize_int_cb'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_footer_type', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'both',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_callback'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_footer_text', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_data'
    ) );
    $wp_customize -> add_setting( 'minimalistflex_footer_widget_layout', Array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => 'one',
        'sanitize_callback' => 'minimalistflex_sanitize_radio_callback'
    ) );

    // Start binding controls (UI).
    $wp_customize -> add_control( 'minimalistflex_header_link', Array(
        'type' => 'url',
        'priority' => 50,
        'section' => 'header_image',
        'label' => __( 'Header Image Link', 'minimalistflex' ),
        'description' => __( 'You may link the header image to a URL. Leave blank if you do not want to do so.', 'minimalistflex' )
    ) );
    $wp_customize -> add_control( 'minimalistflex_header_label', Array(
        'type' => 'text',
        'priority' => 40,
        'section' => 'header_image',
        'label' => __( 'Header Image Label', 'minimalistflex' ),
        'description' => __( 'You may provide a description of your header image. Also will become the label of the link if set. Should be set for better accessibility.', 'minimalistflex' )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_home_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_home',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_home_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_home',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_front_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_front',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_front_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_front',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_archive_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_archive',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_archive_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_archive',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_archive_title', Array(
        'type' => 'radio',
        'priority' => 20,
        'section' => 'minimalistflex_layout_archive',
        'label' => _x( 'Title', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the archive title.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_search_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_search',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_search_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_search',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_search_title', Array(
        'type' => 'radio',
        'priority' => 20,
        'section' => 'minimalistflex_layout_search',
        'label' => _x( 'Search Query', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the search query.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_search_form', Array(
        'type' => 'radio',
        'priority' => 20,
        'section' => 'minimalistflex_layout_search',
        'label' => _x( 'Search Form', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to also display the search form.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_author_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_author',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_author_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_author',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_author_title', Array(
        'type' => 'radio',
        'priority' => 20,
        'section' => 'minimalistflex_layout_author',
        'label' => _x( 'Author Name', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the author name.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_author_admin', Array(
        'type' => 'radio',
        'priority' => 40,
        'section' => 'minimalistflex_layout_author',
        'label' => _x( 'Admin Status', 'layout' , 'minimalistflex' ),
        'description' => __( 'Show an indicator in the bottom-right of the avatar if the author is an admin.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_singular_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_singular',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_singular_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_singular',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_page_sidebar', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_layout_page',
        'label' => _x( 'Sidebar', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the sidebar, and its location.', 'minimalistflex' ),
        'choices' => Array(
            'left' => __( 'Left sidebar', 'minimalistflex' ),
            'right' => __( 'Right sidebar', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_layout_page_header', Array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'minimalistflex_layout_page',
        'label' => _x( 'Header Image', 'layout' , 'minimalistflex' ),
        'description' => __( 'Select whether to display the header image.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_scroll_top', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Scroll to top button', 'minimalistflex' ),
        'description' => __( 'Whether to display a "Scroll to top" button in the bottom-right corner.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_excerpt', Array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Excerpt Word Count', 'minimalistflex' ),
        'description' => __( 'The word count of the excerpts on any archive page and the blog page.', 'minimalistflex' )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_autoh2label', Array(
        'type' => 'radio',
        'priority' => 25,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Auto h2 Label', 'minimalistflex' ),
        'description' => __( 'The theme can automatically theme and label the h2 elements in single posts and pages, providing a better visual. May not work well in all circumstances, use with caution.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_comment_count', Array(
        'type' => 'radio',
        'priority' => 30,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Comment Count', 'minimalistflex' ),
        'description' => __( 'Whether to display the comment count of the posts listed in an archive page.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_publisher', Array(
        'type' => 'radio',
        'priority' => 35,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Publisher', 'minimalistflex' ),
        'description' => __( 'Whether to display the publisher.', 'minimalistflex' ),
        'choices' => Array(
            'yes' => __( 'Yes', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_date', Array(
        'type' => 'radio',
        'priority' => 40,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Publish Date', 'minimalistflex' ),
        'description' => __( 'Whether to display the published date.', 'minimalistflex' ),
        'choices' => Array(
            'publish' => __( 'Yes, publish time only.', 'minimalistflex' ),
            'modify' => __( 'Yes, and display modified time if possible.', 'minimalistflex' ),
            'no' => __( 'No', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_readlink', Array(
        'type' => 'text',
        'priority' => 45,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Read More Link', 'minimalistflex' ),
        'description' => __( 'The text for the "Read More" links.', 'minimalistflex' )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_thumbnail_height', Array(
        'type' => 'radio',
        'priority' => 50,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Thumbnail Images Size', 'minimalistflex' ),
        'description' => __( 'Select whether to enable flexible height for your thumbnail images, or use a fixed height.', 'minimalistflex' ),
        'choices' => Array(
            'fixed' => __( 'Fixed', 'minimalistflex' ),
            'auto' => __( 'Flexible', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( 'minimalistflex_interface_thumbnail_height_px', Array(
        'type' => 'number',
        'priority' => 51,
        'section' => 'minimalistflex_interface',
        'label' => __( 'Height', 'minimalistflex' ),
        'description' => __( 'Enter your desired height here. Should be in pixels.', 'minimalistflex' ),
    ) );
    $wp_customize -> add_control( 'minimalistflex_footer_type', Array(
        'type' => 'radio',
        'priority' => 9,
        'section' => 'minimalistflex_footer',
        'label' => __( 'Footer Options', 'minimalistflex' ),
        'description' => __( 'Choose what to display in your footer credit section.', 'minimalistflex' ),
        'choices' => Array(
            'both' => __( 'Both MinimalistFlex credits and custom footer text.', 'minimalistflex' ),
            'minimalistflex' => __( 'MinimalistFlex credits only.', 'minimalistflex' ),
            'custom' => __( 'Custom footer text only.', 'minimalistflex' ),
            'none' => __( 'Neither.', 'minimalistflex' )
        )
    ) );
    $wp_customize -> add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'minimalistflex_footer_text', Array(
        'code_type' => 'htmlmixed',
        'priority' => 15,
        'section' => 'minimalistflex_footer',
        'label' => __( 'Custom Footer Text', 'minimalistflex' ),
        'description' => __( 'Here you may set a custom footer text to be displayed in the footer credits. HTML allowed.', 'minimalistflex' )
    ) ) );
    $wp_customize -> add_control( 'minimalistflex_footer_widget_layout', Array(
        'type' => 'radio',
        'priority' => 10,
        'section' => 'minimalistflex_footer',
        'label' => __( 'Footer Widget Layout', 'minimalistflex' ),
        'description' => __( 'Choose the layout of the footer widgets.', 'minimalistflex' ),
        'choices' => Array(
            'one' => __( 'One column. Only shows the "Footer" widget area.', 'minimalistflex' ),
            'two' => __( 'Two columns. Also shows the "Footer 2" widget area.', 'minimalistflex' ),
            'three' => __( 'Three columns. Also shows the "Footer 3" widget area (aka all areas).', 'minimalistflex' )
        )
    ) );

}
add_action( 'customize_register', 'minimalistflex_customize_register' );
add_action( 'customize_register', 'minimalistflex_customize_color_register' );
add_action( 'customize_register', 'minimalistflex_customize_author_elements_register' );