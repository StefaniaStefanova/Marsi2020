<?php
$attributes = $attributes;
$block_id = $attributes['blockID'];
$post_cat = $attributes['selectedCatagories'];
$post_count = $attributes['postCount'];
$link_archive = $attributes['linkArchive'];
$event_type = $attributes['eventType'];
$enable_crop_title = $attributes['enableCropTitle'];
$crop_title_words = !empty($attributes['numberOfWordsTitle']) ? $attributes['numberOfWordsTitle'] : '';
$categories = [];
$placeholder = GUTENKIT_PLUGIN_URL . 'assets/images/placeholder.jpg';

if (empty($post_cat)) {
    $categories = get_categories(array('number' => 15));
} else {
    $categories = $post_cat;
}
?>

<div class="wp-block-gutenkit-post-tab">
    <div class="gkit-post-tab post--tab" data-event="<?php echo esc_attr($event_type); ?>">
        <div class="tab-header">
            <div class="tab__list">
                <?php foreach ($categories as $index => $cat) :
                    $cat_ID = !empty($post_cat) ? $cat['value'] : $cat->cat_ID;

                    if ($link_archive === true) { ?>
                        <a href="<?php echo esc_url(get_category_link($cat_ID)); ?>" target="_blank" class="<?php echo ($index == 0) ? 'active' : ''; ?> tab__list__item" data-category-id="<?php echo esc_attr($cat_ID); ?>">
                            <?php echo esc_html(get_cat_name($cat_ID)); ?>
                        </a>
                    <?php } else {  ?>
                        <span class="<?php echo esc_attr(($index == 0) ? 'active' : ''); ?> tab__list__item" data-category-id="<?php echo esc_attr($cat_ID); ?>">
                            <?php echo esc_html(get_cat_name($cat_ID)); ?>
                        </span>
                <?php };
                endforeach; ?>
            </div>
        </div>
        <div class="gkit--tab__post__details tab-content">
            <?php foreach ($categories as $index => $cat) :
                $cat_ID = !empty($post_cat) ? $cat['value'] : $cat->cat_ID;
                $query = array(
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'cat'    => $cat_ID,
                    'posts_per_page' => $post_count,
                ); ?>

                <div class="tab-item <?php echo esc_attr(($index == 0) ? 'active' : ''); ?>" data-category-id="<?php echo esc_attr($cat_ID); ?>">
                    <?php $xs_query = new \WP_Query($query);
                    if ($xs_query->have_posts()) :
                        while ($xs_query->have_posts()) :
                            $xs_query->the_post(); 
                            ?>
                            <div class="tab__post__single--item">
                                <div class="tab__post__single--inner">
                                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="tab__post--header" aria-label="url">
                                        <img src="<?php echo esc_url(has_post_thumbnail() ? get_the_post_thumbnail_url() : $placeholder); ?>" alt="placeholder">
                                    </a>
                                    <h3 class="tab__post--title">
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            <?php
                                            if ($enable_crop_title) {
                                                echo esc_html(wp_trim_words(get_the_title(), $crop_title_words));
                                            } else {
                                                echo esc_html(get_the_title());
                                            } ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>