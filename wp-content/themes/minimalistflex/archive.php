<?php
if ( !defined( 'WPINC' ) ) {
    die;
}
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <div class="minimalistflex-archive">
        <?php if ( get_theme_mod( 'minimalistflex_layout_archive_title', 'yes' ) === 'yes' ): ?>
            <h1 class="archive-title panel">
                <?php the_archive_title() ?>
            </h1>
        <?php endif; ?>
        <?php get_template_part( 'templates/loop' ); ?>
    </div>
    <?php the_posts_pagination(); ?>
<?php endif; ?>

<?php get_footer(); ?>
