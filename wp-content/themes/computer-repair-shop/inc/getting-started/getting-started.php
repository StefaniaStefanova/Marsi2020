<?php
//about theme info
add_action( 'admin_menu', 'computer_repair_shop_gettingstarted' );
function computer_repair_shop_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'computer-repair-shop'), esc_html__('About Theme', 'computer-repair-shop'), 'edit_theme_options', 'computer_repair_shop_guide', 'computer_repair_shop_mostrar_guide'); 
}

// Add a Custom CSS file to WP Admin Area
function computer_repair_shop_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'computer_repair_shop_admin_theme_style');

//guidline for about theme
function computer_repair_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'computer-repair-shop' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Computer Repair Shop WordPress Theme', 'computer-repair-shop' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'computer-repair-shop' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'computer-repair-shop' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'computer-repair-shop' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'computer-repair-shop' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'computer-repair-shop' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'computer-repair-shop' ); ?> <a href="<?php echo esc_url( COMPUTER_REPAIR_SHOP_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'computer-repair-shop' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Computer Repair Shop is a free theme with quality features and a minimal and stunning design for showcasing computer repair services, computer and mobile phones, Mac, Windows, electronics, software services, IT solutions, software cleaning and installation service, and junk removal, and relevant service providers. It is elegant in design and has a user-friendly interface for bringing an intuitive design that allows every user irrespective of their coding skills to create a professional website. With its responsive design, you will be able to have a website that fits perfectly on every device and make our content look incredible. With personalization options given, you can try several colors, and fonts and change the background images. Call to Action Buttons (CTA) will work for obtaining better conversions and for getting you better promotion options, you will have social media icons. There are SEO-friendly codes made available for making your website easily noticeable in the SERPs. These optimized codes also result in a lightweight design giving faster page load time and better performance on several devices. The Bootstrap framework makes the theme robust and easy to modify. This modern theme has .pot files bringing translation-ready options for making your website support multiple languages.', 'computer-repair-shop')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Computer Repair Shop Theme', 'computer-repair-shop' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'computer-repair-shop'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( COMPUTER_REPAIR_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'computer-repair-shop'); ?></a>
			<a href="<?php echo esc_url( COMPUTER_REPAIR_SHOP_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'computer-repair-shop'); ?></a>
			<a href="<?php echo esc_url( COMPUTER_REPAIR_SHOP_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'computer-repair-shop'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/computer-repair-shop.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'computer-repair-shop'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'computer-repair-shop'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'computer-repair-shop'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>