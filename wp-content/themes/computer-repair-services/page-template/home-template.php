<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <?php if(get_theme_mod('computer_repair_services_top_slider_setting',1) == 1){ ?>
    <section id="top-slider" slider-loop="<?php echo esc_html(get_theme_mod('computer_repair_services_slider_loop')); ?>">
      <?php $computer_repair_services_slide_pages = array();
        for ( $computer_repair_services_count = 1; $computer_repair_services_count <= 3; $computer_repair_services_count++ ) {
          $computer_repair_services_mod = intval( get_theme_mod( 'computer_repair_services_top_slider_page' . $computer_repair_services_count ));
          if ( 'page-none-selected' != $computer_repair_services_mod ) {
            $computer_repair_services_slide_pages[] = $computer_repair_services_mod;
          }
        }
        if( !empty($computer_repair_services_slide_pages) ) :
          $computer_repair_services_args = array(
            'post_type' => 'page',
            'post__in' => $computer_repair_services_slide_pages,
            'orderby' => 'post__in'
          );
          $computer_repair_services_query = new WP_Query( $computer_repair_services_args );
          if ( $computer_repair_services_query->have_posts() ) :
            $i = 1;
      ?>
      <div class="owl-carousel" role="listbox">
        <?php  while ( $computer_repair_services_query->have_posts() ) : $computer_repair_services_query->the_post(); ?>
          <div class="slider-box">
            <?php if(has_post_thumbnail()){
              the_post_thumbnail();
              } else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
            <?php } ?>
            <div class="slider-inner-box">
              <?php if(get_theme_mod('computer_repair_services_slider_title_setting',1) == 1){ ?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <?php }?>
              <?php if(get_theme_mod('computer_repair_services_slider_content_setting',1) == 1){ ?>
                <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
              <?php }?>
              <?php if(get_theme_mod('computer_repair_services_slider_button_setting',1) == 1 && get_theme_mod('computer_repair_services_slider_button_text','Read More') != ''){ ?>
                <div class="slider-box-btn mt-4">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e(get_theme_mod('computer_repair_services_slider_button_text','Read More')); ?></a>
                </div>
              <?php }?>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </section>
  <?php }?>

  <?php if(get_theme_mod('computer_repair_services_about_page') != ''){ ?>
    <section id="about_sec" class="py-5">
      <div class="container">
        <?php $computer_repair_services_about_pages = array();
          $computer_repair_services_mod = intval( get_theme_mod( 'computer_repair_services_about_page' ));
          if ( 'page-none-selected' != $computer_repair_services_mod ) {
            $computer_repair_services_about_pages[] = $computer_repair_services_mod;
          }
          if( !empty($computer_repair_services_about_pages) ) :
            $computer_repair_services_args = array(
              'post_type' => 'page',
              'post__in' => $computer_repair_services_about_pages,
              'orderby' => 'post__in'
            );
            $computer_repair_services_query = new WP_Query( $computer_repair_services_args );
            if ( $computer_repair_services_query->have_posts() ) :
        ?>
        <?php  while ( $computer_repair_services_query->have_posts() ) : $computer_repair_services_query->the_post(); ?>
          <div class="row">
            <div class="col-lg-6 col-md-6 align-self-center">
              <div class="about-inner-image-box">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
                <?php } ?>
                <?php if(get_theme_mod('computer_repair_services_about_image_text') != ''){ ?>
                  <div class="image-text">
                    <p class="mb-0"><?php echo esc_html(get_theme_mod('computer_repair_services_about_image_text','')); ?></p>
                  </div>
                <?php }?>
                <?php if(get_theme_mod('computer_repair_services_phone_number') != ''){ ?>
                  <div class="call-outer">
                    <p class="mb-0 call-text"><?php esc_html_e('Call Us Now:- ','computer-repair-services'); ?></p>
                    <a href="tel:<?php echo esc_html(get_theme_mod('computer_repair_services_phone_number','')); ?>"><p class="mb-0 call-box"><?php echo esc_html(get_theme_mod('computer_repair_services_phone_number','')); ?></p></a>
                  </div>
                <?php }?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 align-self-center">
              <div class="about-inner-box">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
              <?php if(get_theme_mod('computer_repair_services_about_support_text') != '' || get_theme_mod('computer_repair_services_about_team_text') != ''){ ?>
                <div class="row support-box py-4">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <p><i class="fas fa-headset me-3"></i><?php echo esc_html(get_theme_mod('computer_repair_services_about_support_text','')); ?></p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <p><i class="fas fa-users me-3"></i><?php echo esc_html(get_theme_mod('computer_repair_services_about_team_text','')); ?></p>
                  </div>
                </div>
              <?php }?>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
      </div>
    </section>
  <?php }?>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
