<?php
/**
 * PLugin Info
 * @subpackage Admin
 */
if ( ! class_exists( 'BEW_Info' ) ) {
    class BEW_Info{

        private $config;
        private $tabs;

        /**
         * Constructor.
         */
        public function __construct( $config ) {
            $this->config = $config;
            $this->prepare_class();

            /*admin menu*/
            add_action( 'admin_menu', array( $this, 'admin_setting_page' ) );

            /* enqueue script and style for about page */
            add_action( 'admin_enqueue_scripts', array( $this, 'style_and_scripts' ) );

        }

        /**
         * Prepare and setup class properties.
         */
        public function prepare_class() {
            $this->tabs          = isset( $this->config['tabs'] ) ? $this->config['tabs'] : array();
        }

        /**
         * Load css and scripts for the about page
         */
        public function style_and_scripts( $hook_suffix ) {

            // this is needed on all admin pages, not just the about page, for the badge action count in the WordPress main sidebar
            wp_enqueue_style( 'bew-menu-css', plugin_dir_url(__FILE__) . '/assets/css/plugin-info.css');

        }

         /**
         * Register setting page
         * 
         */
        public function admin_setting_page(){
            add_theme_page(
                esc_html__( 'BEW Info','bosa-elementor-for-woocommerce' ),
                esc_html__( 'BEW Info','bosa-elementor-for-woocommerce' ),
                'edit_theme_options',
                'bew-plugin-info', 
                array( $this, 'welcome_info_screen' )
            );
        }

        /**
         * Render the info content screen.
         */
        public function welcome_info_screen() {

            if ( ! empty( $this->config[ 'info_title' ] ) ) {
                $welcome_title = $this->config[ 'info_title' ];
            }
            if ( ! empty( $this->config[ 'info_content' ] ) ) {
                $welcome_content = $this->config[ 'info_content' ];
            }
            if ( ! empty( $this->config[ 'quick_links' ] ) ) {
                $quick_links = $this->config[ 'quick_links' ];
            }

            if (
                ! empty( $welcome_title ) ||
                ! empty( $welcome_content ) ||
                ! empty( $quick_links ) ||
                ! empty( $this->tabs )
            ) {
                echo '<div class="wrap about-wrap info-wrap epsilon-wrap">';
                echo '<div class=" inner-info-wrapper">';
                echo '<div class="inner-info">';

                if ( ! empty( $welcome_title ) ) {
                    echo '<h1>';
                    echo esc_html( $welcome_title );
                    echo '</h1>';
                }
                if ( ! empty( $welcome_content ) ) {
                    echo '<div class="about-text">' . wp_kses_post( $welcome_content ) . '</div>';
                }
                /*quick links*/
                if( !empty( $quick_links ) && is_array( $quick_links ) ){
                    echo '<p class="quick-links">';
                    foreach ( $quick_links as $quick_key => $quick_link ) {
                        $button = 'button-secondary';
                        if( 'pro_url' == $quick_key ){
                            $button = 'button-primary';
                        }
                        echo '<a href="'.esc_url( $quick_link['url'] ).'" class="button '.esc_attr( $button ).'" target="_blank">'.$quick_link['text'].'</a>';
                    }
                    echo "</p>";
                }
                echo "</div>";
                echo '<div class="bew-logo">';
                echo '<a href="' . esc_url( 'https://bosathemes.com/bosa-elementor-for-woocommerce' ) . '" target="_blank" class="wp-badge epsilon-info-logo"></a>';
                echo "</div>";
                echo "</div>";
                /* Display tabs */
                if ( ! empty( $this->tabs ) ) {
                    $current_tab = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'support';

                    echo '<h2 class="nav-tab-wrapper wp-clearfix">';
                    foreach ( $this->tabs as $tab_key => $tab_name ) {

                        echo '<a href="' . esc_url( admin_url( 'themes.php?page=bew-plugin-info' ) ) . '&tab=' . $tab_key . '" class="nav-tab ' . ( $current_tab == $tab_key ? 'nav-tab-active' : '' ) . '" role="tab" data-toggle="tab">';
                        echo esc_html( $tab_name );
                        echo '</a>';
                    }

                    echo '</h2>';

                    /* Display content for current tab, dynamic method according to key provided*/
                    if ( method_exists( $this, $current_tab ) ) {

                        echo "<div class='changelog point-releases'>";
                        $this->$current_tab();
                        echo "</div>";
                    }
                }
                echo '</div><!--/.wrap.about-wrap-->';
            }
        }

        /**
         * Support tab
         */
        public function support() {
            echo '<div class="feature-section col-wrap">';

            if ( ! empty( $this->config['support_content'] ) ) {

                $supports = $this->config['support_content'];

                if ( ! empty( $supports ) ) {

                    $defaults = array(
                        'title' => '',
                        'icon' => '',
                        'desc' => '',
                        'button_label' => '',
                        'button_link' => '',
                        'is_button' => true,
                        'is_new_tab' => true
                    );

                    foreach ( $supports as $support ) {
                        $instance = wp_parse_args( (array) $support, $defaults );

                        /*allowed 7 value in array */
                        $title = $instance[ 'title' ];
                        $icon = $instance[ 'icon'];
                        $desc = $instance[ 'desc'];
                        $button_label = $instance[ 'button_label'];
                        $button_link = $instance[ 'button_link'];
                        $is_button = $instance[ 'is_button'];
                        $is_new_tab = $instance[ 'is_new_tab'];
                        
                        echo '<div class="col"><div class="col-items">';

                        if ( ! empty( $title ) ) {
                            echo '<h3>';
                            if ( ! empty( $icon ) ) {
                                echo '<i class="' . $icon . '"></i>';
                            }
                            echo esc_html($title);
                            echo '</h3>';
                        }

                        if ( ! empty( $desc ) ) {
                            echo '<p><i>' . $desc . '</i></p>';
                        }

                        if ( ! empty( $button_link ) && ! empty( $button_label ) ) {

                            echo '<p>';
                            $button_class = '';
                            if ( $is_button ) {
                                $button_class = 'button button-primary';
                            }

                            $button_new_tab = '_self';
                            if ( isset( $is_new_tab ) ) {
                                if ( $is_new_tab ) {
                                    $button_new_tab = '_blank';
                                }
                            }
                            echo '<a target="' . $button_new_tab . '" href="' . $button_link . '" class="' . $button_class . '">' . $button_label . '</a>';
                            echo '</p>';
                        }
                        echo '</div></div>';
                    }
                }
            }
            echo '</div>';
        }





        /**
        * Free vs Pro tab
        */
        public function free_pro(){
            if( ! empty( $this->config['free_pro'] ) ){
                $free_pro= $this->config['free_pro'];
                    if( ! empty($free_pro) ){

                    /*defaults values for Free vs Pro array */
                        $defaults = array(
                            'title'     => '',
                            'desc'       => '',
                            'recommended_actions'=> '',
                            'link_title'   => '',
                            'link_url'   => '',
                            'is_button' => false,
                            'is_new_tab' => false
                        );

                         echo '<div class="feature-section col-wrap">';

                        foreach ( $free_pro as $free_pro_item ) {

                            /*allowed 6 value in array */
                            $instance = wp_parse_args( (array) $free_pro_item, $defaults );
                            /*default values*/
                            $title = esc_html( $instance[ 'title' ] );
                            $desc = wp_kses_post( $instance[ 'desc' ] );
                            $link_title = esc_html( $instance[ 'link_title' ] );
                            $link_url = esc_url( $instance[ 'link_url' ] );
                            $is_button = $instance[ 'is_button' ];
                            $is_new_tab = $instance[ 'is_new_tab' ];


                            echo '<div class="col"><div class="col-items">';
                            if ( ! empty( $title ) ) {
                                echo '<h3>' . $title . '</h3>';
                            }
                            if ( ! empty( $desc ) ) {
                                echo '<p>' . $desc . '</p>';
                            }
                            if ( ! empty( $link_title ) && ! empty( $link_url ) ) {

                                echo '<p>';
                                $button_class = '';
                                if ( $is_button ) {
                                    $button_class = 'button button-primary';
                                }

                                $button_new_tab = '_self';
                                if ( $is_new_tab ) {
                                    $button_new_tab = '_blank';
                                }

                                echo '<a target="' . $button_new_tab . '" href="' . $free_pro_item['link_url'] . '"class="' . $button_class . '">' . $free_pro_item['link_title'] . '</a>';
                                echo '</p>';
                            }
                            echo '</div></div><!-- .col -->';
                        }
                        echo '</div><!-- .feature-section three-col -->';
                    }
             }
        }

        /**
         * Rating tab
         */
        public function rating(){
            if( ! empty( $this->config['rating'] ) ){
                $rating= $this->config['rating'];
                if( ! empty($rating) ){

                    /*defaults values for demos array */
                    $defaults = array(
                            'title'     => '',
                            'desc'       => '',
                            'link_title'   => '',
                            'link_url'   => '',
                            'is_button' => false,
                            'is_new_tab' => false
                    );
                    echo '<div class="feature-section col-wrap">';
                    foreach ( $rating as $rating_item ) {

                            /*allowed 6 value in array */
                            $instance = wp_parse_args( (array) $rating_item, $defaults );
                            /*default values*/
                            $title = esc_html( $instance[ 'title' ] );
                            $desc = wp_kses_post( $instance[ 'desc' ] );
                            $link_title = esc_html( $instance[ 'link_title' ] );
                            $link_url = esc_url( $instance[ 'link_url' ] );
                            $is_button = $instance[ 'is_button' ];
                            $is_new_tab = $instance[ 'is_new_tab' ];


                            echo '<div class="col"><div class="col-items">';
                            if ( ! empty( $title ) ) {
                                echo '<h3>' . $title . '</h3>';
                            }
                            if ( ! empty( $desc ) ) {
                                echo '<p>' . $desc . '</p>';
                            }
                            if ( ! empty( $link_title ) && ! empty( $link_url ) ) {

                                echo '<p>';
                                $button_class = '';
                                if ( $is_button ) {
                                    $button_class = 'button button-primary';
                                }

                                $button_new_tab = '_self';
                                if ( $is_new_tab ) {
                                    $button_new_tab = '_blank';
                                }

                                echo '<a target="' . $button_new_tab . '" href="' . $rating_item['link_url'] . '"class="' . $button_class . '">' . $rating_item['link_title'] . '</a>';
                                echo '</p>';
                            }
                            echo '</div></div><!-- .col -->';
                    }
                        echo '</div><!-- .feature-section three-col -->';
                }
            }
        }

    }
}

$config = array(

    // Main welcome title
    'info_title' => esc_html__( 'Welcome to Bosa Elementor For WooCommerce', 'bosa-elementor-for-woocommerce' ),

    // Main welcome content
    'info_content' => esc_html__( 'Bosa Elementor For WooCommerce is now installed and ready to use. We hope the following information will help and you enjoy using it!', 'bosa-elementor-for-woocommerce' ),

    /**
     * Quick links
     */
    'quick_links' => array(
        'plugin_url'  => array(
            'text' => __( 'Plugin Details', 'bosa-elementor-for-woocommerce' ),
            'url' => 'https://bosathemes.com/bosa-elementor-for-woocommerce'
        ),
        'pro_url'  => array(
            'text' => __( 'Buy Pro', 'bosa-elementor-for-woocommerce' ),
            'url' => 'https://bosathemes.com/bosa-elementor-for-woocommerce/#pricing'
        ),
        'rate_url'  => array(
            'text' => __( 'Rate This Plugin', 'bosa-elementor-for-woocommerce' ),
            'url' => 'https://wordpress.org/support/plugin/bosa-elementor-for-woocommerce/reviews'
        ),  
    ),

    'tabs' => array(
        'support'              => esc_html__( 'Plugin Info', 'bosa-elementor-for-woocommerce' ),
        'free_pro'             => esc_html__( 'Free VS Pro', 'bosa-elementor-for-woocommerce' ),
        'rating'               => esc_html__( 'Rate Plugin', 'bosa-elementor-for-woocommerce' )
    ),


    // Support content tab.
    'support_content' => array(
        array(
            'title' => esc_html__( 'BEW Templates for WooCommerce', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'Checkout our Elementor templates for WooCommerce.', 'bosa-elementor-for-woocommerce' ),
            'button_label' => esc_html__( 'BEW Templates', 'bosa-elementor-for-woocommerce' ),
            'button_link' => esc_url( admin_url( 'admin.php?page=bew-elements-templates' ) ),
            'is_button' => true,
            'is_new_tab' => true
        ),
        array(
            'title' => esc_html__( 'BEW Widgets', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'Checkout our documentation on how to use widgets.', 'bosa-elementor-for-woocommerce' ),
            'button_label' => esc_html__( 'BEW Widgets', 'bosa-elementor-for-woocommerce' ),
            'button_link' => esc_url( 'https://bosathemes.com/docs/bosa-elementor-for-woocommerce/how-to-use-plugin-widgets/' ),
            'is_button' => true,
            'is_new_tab' => true
        ),
        array(
            'title' => esc_html__( 'Need more features?', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'Upgrade to PRO version for more exciting features and Priority Support.', 'bosa-elementor-for-woocommerce' ),
            'button_label' => esc_html__( 'Upgrade to PRO', 'bosa-elementor-for-woocommerce' ),
            'button_link' => esc_url( 'https://bosathemes.com/bosa-elementor-for-woocommerce/#pricing' ),
            'is_button' => true,
            'is_new_tab' => true
        ),
        array(
            'title' => esc_html__( 'Documentation', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'Please check our full documentation for detailed information on how to Setup and Use Bosa Elementor for WooCommerce.', 'bosa-elementor-for-woocommerce' ),
            'button_label' => esc_html__( 'Read full documentation', 'bosa-elementor-for-woocommerce' ),
            'button_link' => esc_url( 'https://bosathemes.com/docs/bosa-elementor-for-woocommerce/' ),
            'is_button' => true,
            'is_new_tab' => true
        ),
        array(
            'title' => esc_html__( 'Got sales related question?', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( "Have any query before purchase, you are more than welcome to ask.", 'bosa-elementor-for-woocommerce' ),
            'button_label' => esc_html__( 'Pre-sale Question?', 'bosa-elementor-for-woocommerce' ),
            'button_link' => esc_url( 'https://bosathemes.com/pre-sale' ),
            'is_button' => true,
            'is_new_tab' => true
        ),
        array(
            'title' => esc_html__( 'Customization Request', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'Needed any customization for the plugin, you can request from here.', 'bosa-elementor-for-woocommerce' ),
            'button_label' => esc_html__( 'Customization Request', 'bosa-elementor-for-woocommerce' ),
            'button_link' => esc_url( 'https://bosathemes.com/hire-us' ),
            'is_button' => true,
            'is_new_tab' => true
        )
    ),
    
    // Free vs Pro
    'free_pro' => array (
        'first'=> array(
            'title' => esc_html__( 'Free VS Pro Features', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'Bosa Elementor for WooCommerce is a multipurpose free WordPress Plugin. However, Bosa Elementor for WooCommerce Pro comes with more cool and awesome addons that give you a flexible and wide range of options to build a full-fledged website.', 'bosa-elementor-for-woocommerce' ),
            'link_title' => esc_html__( 'Check All Features', 'bosa-elementor-for-woocommerce' ),
            'link_url' => esc_url( 'https://bosathemes.com/bosa-elementor-for-woocommerce/#free-vs-pro' ),
            'is_button' => true,
            'recommended_actions' => false,
            'is_new_tab' => true
        ),
    ),

    // rating
    'rating' => array(
        'first'=> array(
            'title' => esc_html__( 'Show us how much you like our plugin.', 'bosa-elementor-for-woocommerce' ),
            'desc' => esc_html__( 'If you like our work, please give us a moment of your time to rate our plugin 5 stars on ', 'bosa-elementor-for-woocommerce' ) .'<a target="_blank" href="https://wordpress.org/support/plugin/bosa-elementor-for-woocommerce/reviews">' . 'wordpress.org' . '</a>' . esc_html__('. It will give us more energy to work on this plugin.', 'bosa-elementor-for-woocommerce' ),
            'link_title' => esc_html__( 'Rate Plugin', 'bosa-elementor-for-woocommerce' ),
            'link_url' => esc_url( 'https://wordpress.org/support/plugin/bosa-elementor-for-woocommerce/reviews' ),
            'is_button' => true,
            'is_new_tab' => true
        )
    )
);
return new BEW_Info( $config );