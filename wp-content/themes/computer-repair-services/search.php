<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Computer Repair Services
 */
get_header(); ?>

    <div id="skip-content" class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-12 <?php echo is_active_sidebar('sidebar') ? "col-lg-9" : "col-lg-12"; ?>">
                <main id="main" class="site-main module-border-wrap mb-4">
                    <div class="row">
                        <?php if (have_posts()) { ?>
                            <header class="page-header">
                                <h4 class="page-title">
                                    <?php
                                        /* translators: %s: search query. */
                                        printf(esc_html__('Search Results for: %s', 'computer-repair-services'), '<span>' . get_search_query() . '</span>');
                                    ?>
                                </h4>
                            </header>
                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content',get_post_format());

                            endwhile;

                            if( get_theme_mod('computer_repair_services_post_page_pagination',1) == 1){ 
                                the_posts_navigation();
                            }

                        }else {

                            get_template_part('template-parts/content', 'none');

                        } ?>
                    </div>
                </main>
            </div>
            <?php get_sidebar();?>
        </div>
    </div>

<?php get_footer();