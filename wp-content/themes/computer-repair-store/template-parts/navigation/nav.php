<?php
/**
 * Displays top navigation
 *
 * @package Computer Repair Store
 */
?>
<?php
$computer_repair_services_sticky_header = get_theme_mod('computer_repair_services_sticky_header');
    $computer_repair_services_data_sticky = "false";
    if ($computer_repair_services_sticky_header) {
    $computer_repair_services_data_sticky = "true";
    }
?>
<div class="navigation_header py-2" data-sticky="<?php echo esc_attr($computer_repair_services_data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-6">
                 <div class="all-categories">
                <?php if(class_exists('woocommerce')){ ?>
                    <button><?php esc_html_e('All Categories','computer-repair-store'); ?></button>
                    <div class="home_product_cat">
                      <?php $computer_repair_store_args = array(
                          'number'     => '',
                          'orderby'    => 'title',
                          'order'      => 'ASC',
                          'hide_empty' => '',
                          'include'    => ''
                      );
                      $computer_repair_store_product_categories = get_terms( 'product_cat', $computer_repair_store_args );
                      $computer_repair_store_count = count($computer_repair_store_product_categories);
                        if ( $computer_repair_store_count > 0 ){
                          foreach ( $computer_repair_store_product_categories as $product_category ) {
                          echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
                          $computer_repair_store_args = array(
                            'posts_per_page' => -1,
                            'tax_query' => array(
                              'relation' => 'AND',
                              array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => $product_category->slug
                              )
                            ),
                            'post_type' => 'product',
                            'orderby' => 'title,'
                          );
                        }
                      }?>
                    </div>
                <?php }?>
            </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-6 align-self-center">
                <div class="toggle-nav mobile-menu">
                    <button onclick="computer_repair_services_openNav()"><i class="fas fa-th"></i></button>
                </div>
                <div id="mySidenav" class="nav sidenav">
                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'computer-repair-services' ); ?>">
                        <?php {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'menu', 
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'fallback_cb' => 'wp_page_menu',
                                )
                            );
                        } ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="computer_repair_services_closeNav()"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 align-self-center">
                <?php if(get_theme_mod('computer_repair_services_phone_number') != ''){ ?>
                    <p class="mb-0 call-box"><i class="fas fa-phone me-2"></i><span><?php esc_html_e('Call Us for Enquiry:- ','computer-repair-store'); ?></span><a href="tel:<?php echo esc_html(get_theme_mod('computer_repair_services_phone_number','')); ?>"><?php echo esc_html(get_theme_mod('computer_repair_services_phone_number','')); ?></a></p>
                <?php }?>
            </div>
        </div>
    </div>
</div>
