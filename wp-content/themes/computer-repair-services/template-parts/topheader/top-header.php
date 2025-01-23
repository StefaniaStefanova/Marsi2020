<?php
/**
 * Displays main header
 *
 * @package Computer Repair Services
 */
?>

<div class="main-header py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 align-self-center">
                <div class="navbar-brand text-center pb-3 pb-lg-0 text-lg-start">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $computer_repair_services_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $computer_repair_services_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                              <?php if( get_theme_mod('computer_repair_services_logo_title_text',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php } ?>
                            <?php else : ?>
                              <?php if( get_theme_mod('computer_repair_services_logo_title_text',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                              <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $computer_repair_services_description = get_bloginfo( 'description', 'display' );
                            if ( $computer_repair_services_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('computer_repair_services_theme_description',false) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($computer_repair_services_description); ?></p>
                      <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 align-self-center contact-info">
                <?php if(get_theme_mod('computer_repair_services_address') != ''){ ?>
                    <p class="mb-0 text-center add"><i class="fas fa-map-marker-alt me-2"></i><span><?php esc_html_e('Address:- ','computer-repair-services'); ?></span> <?php echo esc_html(get_theme_mod('computer_repair_services_address','')); ?></p>
                <?php }?>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 align-self-center contact-info">
                <?php if(get_theme_mod('computer_repair_services_email') != ''){ ?>
                    <p class="mb-0 text-center mail"><i class="fas fa-envelope me-2"></i><span><?php esc_html_e('Mail Us:- ','computer-repair-services'); ?></span> <a href="mailto:<?php echo esc_html(get_theme_mod('computer_repair_services_email','')); ?>"><?php echo esc_html(get_theme_mod('computer_repair_services_email','')); ?></a></p>
                <?php }?>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 align-self-center">
                <div class="social-link text-center">
                    <?php if(get_theme_mod('computer_repair_services_facebook_url') != '' || get_theme_mod('computer_repair_services_intagram_url') != '' || get_theme_mod('computer_repair_services_linkedin_url') != '' || get_theme_mod('computer_repair_services_youtube_url') != '' || get_theme_mod('computer_repair_services_watsapp_url') != ''){ ?>
                    <span><?php esc_html_e('Contact With Us:- ','computer-repair-services'); ?></span>
                        <?php if(get_theme_mod('computer_repair_services_facebook_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('computer_repair_services_facebook_url','')); ?>"><i class="fab fa-facebook-f me-2"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('computer_repair_services_intagram_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('computer_repair_services_intagram_url','')); ?>"><i class="fab fa-instagram me-2"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('computer_repair_services_linkedin_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('computer_repair_services_linkedin_url','')); ?>"><i class="fab fa-linkedin-in me-2"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('computer_repair_services_youtube_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('computer_repair_services_youtube_url','')); ?>"><i class="fab fa-youtube me-2"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('computer_repair_services_watsapp_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('computer_repair_services_watsapp_url','')); ?>"><i class="fab fa-whatsapp"></i></a>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
