<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Computer Repair Services
 */

$computer_repair_services_post_page_title =  get_theme_mod( 'computer_repair_services_post_page_title', 1 );
$computer_repair_services_post_page_meta =  get_theme_mod( 'computer_repair_services_post_page_meta', 1 );
$computer_repair_services_post_page_btn = get_theme_mod( 'computer_repair_services_post_page_btn', 1 );
$computer_repair_services_post_page_content =  get_theme_mod( 'computer_repair_services_post_page_content', 1 );
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
      <div class="serv-cont">
        <?php if ($computer_repair_services_post_page_meta == 1 ) {?>
          <div class="meta-info-box my-2">
            <span class="entry-author"><?php esc_html_e('BY','computer-repair-services'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <span class="ms-2"></i><?php echo esc_html(get_the_date()); ?></span>
          </div>
        <?php }?>
        <div class="post-summery mt-2">
          <?php if ($computer_repair_services_post_page_title == 1 ) {?>
              <?php the_title('<h3 class="entry-title pb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
          <?php }?>
          <?php if ($computer_repair_services_post_page_content == 1 ) {?>
            <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('computer_repair_services_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('computer_repair_services_post_page_excerpt_suffix','[...]')); ?></p>
          <?php }?>
          <?php if ($computer_repair_services_post_page_btn == 1 ) {?>
            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','computer-repair-services'); ?></a>
          <?php }?>
        </div>
      </div>
    </article>
  </div>