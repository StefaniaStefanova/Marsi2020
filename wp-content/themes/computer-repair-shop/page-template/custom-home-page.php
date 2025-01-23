<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'computer_repair_shop_above_slider' ); ?>

	<?php if( get_theme_mod('computer_repair_shop_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $computer_repair_shop_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'computer_repair_shop_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $computer_repair_shop_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($computer_repair_shop_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $computer_repair_shop_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
		            			<div class="slider-img text-right">
		            				<?php if(has_post_thumbnail()) {?>
		            					<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
		            				<?php } else {?>
		            					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="<?php the_title_attribute(); ?> "/>
		            				<?php }?>
		            			</div>
								<?php
									$computer_repair_shop_slider_effect = get_theme_mod('computer_repair_shop_slider_effect', '') 
								?>
		            			<div class="carousel-caption <?php echo ($computer_repair_shop_slider_effect); ?>">
						            <div class="inner-carousel">
						              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						              	<p class="mb-2"><?php $computer_repair_shop_excerpt = get_the_excerpt(); echo esc_html( computer_repair_shop_string_limit_words( $computer_repair_shop_excerpt, esc_attr(get_theme_mod('computer_repair_shop_slider_excerpt_length','15') ) )); ?></p>
				            		</div>
				            	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="far fa-angle-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','computer-repair-shop' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="far fa-angle-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','computer-repair-shop' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>
	
	<?php do_action('computer_repair_shop_below_slider'); ?>

	<?php if(get_theme_mod('computer_repair_shop_section_title') != '' || get_theme_mod('computer_repair_shop_category_setting') != ''){ ?>
		<section id="service-section" class="py-5">
			<div class="container">
				<div class="service-head text-center mb-5">
					<?php if(get_theme_mod('computer_repair_shop_section_title') != ''){?>
						<h3><?php echo esc_html(get_theme_mod('computer_repair_shop_section_title')); ?></h3>
					<?php }?>
				</div>
				<?php $computer_repair_shop_catData1 =  get_theme_mod('computer_repair_shop_category_setting');
				if($computer_repair_shop_catData1){ 
					$args = array(
						'post_type' => 'post',
						'category_name' => esc_html($computer_repair_shop_catData1 ,'computer-repair-shop'),
			        );
			        $i=1; ?>
			        <div class="row">
		        		<?php $query = new WP_Query( $args );
			          	if ( $query->have_posts() ) :
			        		while( $query->have_posts() ) : $query->the_post(); ?>
			          			<div class="col-lg-4 col-md-6">
			          				<div class="service-box">
	          							<div class="service-img">
	          								<?php the_post_thumbnail(); ?>
	          							</div>
          								<div class="service-content text-center">
				            				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							              	<p><?php $computer_repair_shop_excerpt = get_the_excerpt(); echo esc_html( computer_repair_shop_string_limit_words( $computer_repair_shop_excerpt,15 ) ); ?></p>
							              	<div class="read-btn">
							              		<a href="<?php the_permalink(); ?>"><?php echo esc_html('READ MORE','computer-repair-shop'); ?><span class="screen-reader-text"><?php echo esc_html('READ MORE','computer-repair-shop'); ?></span></a>
							              	</div>
			            				</div>
			          				</div>
							    </div>
			          		<?php $i++; endwhile; 
			          		wp_reset_postdata(); ?>
			          	<?php else : ?>
			              	<div class="no-postfound"></div>
			            <?php endif; ?>
	          		</div>
	      		<?php }?>
			</div>
		</section>
	<?php }?>

	<?php do_action('computer_repair_shop_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>