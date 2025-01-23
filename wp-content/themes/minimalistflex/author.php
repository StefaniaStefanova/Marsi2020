<?php
if ( !defined( 'WPINC' ) ) {
    die;
}
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <div class="minimalistflex-author">
        <?php $mf_id = get_the_author_meta( 'ID' ); ?>
        <h1 class="author-title panel">
            <?php if ( get_theme_mod( 'minimalistflex_layout_author_title', 'yes' ) === 'yes' ): ?>
                <?php the_archive_title() ?>
            <?php endif; ?>
            <div class="author-page-avatar<?php if ( user_can( $mf_id, 'administrator' ) && get_theme_mod( 'minimalistflex_layout_author_admin', 'yes' ) === 'yes' ) {
                echo ' author-admin';
            } ?>" aria-hidden="true">
                <?php echo get_avatar( $mf_id, 150 ); ?>
            </div>
        </h1>
        <div class="author-details">
            <?php
                $mf_titles = Array(
                    esc_html__( 'User description', 'minimalistflex' ),
                    esc_html__( 'Registration time', 'minimalistflex' ),
                    esc_html__( 'Website', 'minimalistflex' ),
                    esc_html__( 'Email', 'minimalistflex' )
                );
                $mf_metas = Array(
                    'description',
                    'user_registered',
                    'user_url',
                    'user_email'
                );
                $mf_i = 0;
            ?>
            <?php while ( $mf_i < 4 ): ?>
                <?php $mf_meta = get_the_author_meta( $mf_metas[$mf_i] ); ?>
                <?php if ( strlen( $mf_meta ) && get_theme_mod( 'minimalistflex_layout_author_elements_' . $mf_metas[$mf_i], 'yes' ) === 'yes' ): ?>
                    <div class="author-detail">
                        <h2><?php echo $mf_titles[$mf_i] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
                        <?php echo esc_html( $mf_meta ) ?>
                    </div>
                <?php endif; ?>
                <?php $mf_i++; ?>
            <?php endwhile; ?>
        </div>
        <h2 class="author-page-all-posts-title">
            <?php
                printf(
                    /* translators: %s: The author display name. */
                    esc_html__( 'All posts by %s', 'minimalistflex' ),
                    esc_html( get_the_author_meta( 'display_name' ) )
                )
            ?>
        </h2>
        <?php get_template_part( 'templates/loop' ) ?>
    </div>
    <?php the_posts_pagination(); ?>
<?php endif; ?>

<?php get_footer(); ?>
