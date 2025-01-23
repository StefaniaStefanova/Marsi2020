<?php
if ( !defined( 'WPINC' ) ) {
    die;
}
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <div class="minimalistflex-search">
        <?php if ( get_theme_mod( 'minimalistflex_layout_search_title', 'yes' ) === 'yes' ): ?>
            <h1 class="search-title panel">
                <?php
                    printf(
                        /* translators: %s: The search query. */
                        esc_html__( 'You have searched for: "%s"', 'minimalistflex' ),
                        get_search_query()
                    )
                ?>
            </h1>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'minimalistflex_layout_search_form', 'yes' ) === 'yes' ): ?>
            <div class="search-form panel">
                <p>
                    <?php esc_html_e( 'Not finding what you are looking at? You may refine your search below:', 'minimalistflex' ) ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
        <?php get_template_part( 'templates/loop' ); ?>
    </div>
    <?php the_posts_pagination(); ?>
<?php else: ?>
    <div class="minimalistflex-search">
        <?php if ( get_theme_mod( 'minimalistflex_layout_search_title', 'yes' ) === 'yes' ): ?>
            <h1 class="search-title panel">
                <?php
                    printf(
                        /* translators: %s: The search query. */
                        esc_html__( 'You have searched for: "%s"', 'minimalistflex' ),
                        get_search_query()
                    )
                ?>
            </h1>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'minimalistflex_layout_search_form', 'yes' ) === 'yes' ): ?>
            <div class="search-form panel">
                <p>
                    <?php esc_html_e( 'We are unable to find anything with this query. Try refine your search below:', 'minimalistflex' ) ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        <?php else: ?>
            <div class="search-form panel">
                <p>
                    <?php esc_html_e( 'We are unable to find anything with this query.', 'minimalistflex' ) ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
