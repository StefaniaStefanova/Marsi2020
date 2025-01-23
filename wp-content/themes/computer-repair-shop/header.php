<?php
/**
 * The header for our theme
 *
 * @subpackage Computer Repair Shop
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'computer-repair-shop' ); ?></a>

<div id="header">
	<div class="topbar pt-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 align-self-center">
					<div class="logo text-center">
						<?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		             	<?php if (get_theme_mod('computer_repair_shop_show_site_title',true)) {?>
		          			<?php $blog_info = get_bloginfo( 'name' ); ?>
			                <?php if ( ! empty( $blog_info ) ) : ?>
			                  	<?php if ( is_front_page() && is_home() ) : ?>
			                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                  	<?php else : ?>
		                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                  		<?php endif; ?>
			                <?php endif; ?>
			            <?php }?>
			            <?php if (get_theme_mod('computer_repair_shop_show_tagline',true)) {?>
			                <?php $description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) : ?>
			                  	<p class="site-description"><?php echo esc_html($description); ?></p>
		              		<?php endif; ?>
		          		<?php }?>
					</div>
				</div>
				<div class="offset-lg-2 col-lg-2 col-md-6 align-self-center contact">
					<?php if( get_theme_mod('computer_repair_shop_phone_number') != '' || get_theme_mod('computer_repair_shop_phone_text') != ''){?>
						<div class="row">
							<div class="col-lg-3 col-md-3 align-self-center">
								<i class="fas fa-phone"></i>
							</div>
							<div class="col-lg-9 col-md-9 align-self-center">
								<?php if( get_theme_mod('computer_repair_shop_phone_text') != '' ){?>
									<p class="contact-text mb-0"><?php echo esc_html(get_theme_mod('computer_repair_shop_phone_text')); ?></p>
								<?php }?>
								<?php if( get_theme_mod('computer_repair_shop_phone_number') != '' ){?>
									<a href="tel:<?php echo esc_attr(get_theme_mod('computer_repair_shop_phone_number')); ?>"><?php echo esc_html(get_theme_mod('computer_repair_shop_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('computer_repair_shop_phone_number')); ?></span></a>
								<?php }?>
							</div>
						</div>
					<?php }?>
				</div>
				<div class="col-lg-3 col-md-6 align-self-center contact">
					<?php if( get_theme_mod('computer_repair_shop_timing') != '' || get_theme_mod('computer_repair_shop_timing_text') != ''){?>
						<div class="row">
							<div class="col-lg-2 col-md-3 align-self-center">
								<i class="far fa-clock"></i>
							</div>
							<div class="col-lg-10 col-md-9 align-self-center">
								<?php if( get_theme_mod('computer_repair_shop_timing_text') != '' ){?>
									<p class="contact-text mb-0"><?php echo esc_html(get_theme_mod('computer_repair_shop_timing_text')); ?></p>
								<?php }?>
								<?php if( get_theme_mod('computer_repair_shop_timing') != '' ){?>
									<p class="mb-0"><?php echo esc_html(get_theme_mod('computer_repair_shop_timing')); ?></p>
								<?php }?>
							</div>
						</div>
					<?php }?>
				</div>
				<div class="col-lg-2 col-md-6 align-self-center quote-btn text-lg-right text-left">
					<?php if (get_theme_mod('computer_repair_shop_quote_btn_text') != '' || get_theme_mod('computer_repair_shop_quote_btn_url') != '') {?>
						<a href="<?php echo esc_url(get_theme_mod('computer_repair_shop_quote_btn_url')); ?>"><?php echo esc_html(get_theme_mod('computer_repair_shop_quote_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('computer_repair_shop_quote_btn_text')); ?></span></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 align-self-center">
					<div class="menu-bar">
						<div class="toggle-menu responsive-menu text-right">
							<?php if(has_nav_menu('primary')){ ?>
				            	<button onclick="computer_repair_shop_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','computer-repair-shop'); ?></span></button>
				            <?php }?>
				        </div>
						<div id="sidelong-menu" class="nav sidenav">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'computer-repair-shop' ); ?>">
			                  	<?php if(has_nav_menu('primary')){
				                    wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu-navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
				                    ) ); 
			                  	} ?>
			                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="computer_repair_shop_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','computer-repair-shop'); ?></span></a>
			                </nav>
			            </div>
			        </div>
				</div>
				<div class="col-lg-3 col-md-3 align-self-center">
					<div class="social-icons text-md-right text-center">
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
			</div>
		</div>
	</div>
</div>


<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		    	<div class="row">
		    		<div class="col-lg-7 col-md-8 align-self-center">
				      	<h1><?php single_post_title(); ?></h1>
		    		</div>
		    		<div class="col-lg-5 col-md-4 align-self-center">
				      	<div class="theme-breadcrumb text-md-right text-left">
							<?php computer_repair_shop_breadcrumb();?>
						</div>
		    		</div>
		    	</div>
		    </div>
		</div>
	</div>
<?php } ?>