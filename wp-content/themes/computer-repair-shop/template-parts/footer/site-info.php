<?php
/**
 * Displays footer site info
 *
 * @subpackage Computer Repair Shop
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info">
    <div class="row">
        <?php if(get_theme_mod('computer_repair_shop_facebook_url') != '' || get_theme_mod('computer_repair_shop_instagram_url') != '' || get_theme_mod('computer_repair_shop_twitter_url') != '' || get_theme_mod('computer_repair_shop_linkedin_url') != ''){ ?>
            <div class="col-lg-4 col-md-5 align-self-center">
                <div class="social-icons text-md-left text-center">
                    <?php if(get_theme_mod('computer_repair_shop_facebook_url','')){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('computer_repair_shop_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'computer-repair-shop'); ?></span></a>
                    <?php }?>
                    <?php if(get_theme_mod('computer_repair_shop_instagram_url','')){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('computer_repair_shop_instagram_url','')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'computer-repair-shop'); ?></span></a>
                    <?php }?>
                    <?php if(get_theme_mod('computer_repair_shop_twitter_url','')){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('computer_repair_shop_twitter_url','')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'computer-repair-shop'); ?></span></a>
                    <?php }?>
                    <?php if(get_theme_mod('computer_repair_shop_linkedin_url','')){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('computer_repair_shop_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'computer-repair-shop'); ?></span></a>
                    <?php }?>
                </div>
            </div>
        <?php }?>
        <div class="<?php if(get_theme_mod('computer_repair_shop_facebook_url') != '' || get_theme_mod('computer_repair_shop_instagram_url') != '' || get_theme_mod('computer_repair_shop_twitter_url') != '' || get_theme_mod('computer_repair_shop_linkedin_url') != ''){ ?>col-lg-8 col-md-7 text-md-right <?php } else {?> col-lg-12 col-md-12 text-center <?php }?> align-self-center">
            <p><?php computer_repair_shop_credit(); ?></p>
        </div>
    </div>
</div>