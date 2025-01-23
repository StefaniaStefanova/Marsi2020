<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$attributes = $attributes;
$block_id = $attributes['blockID'];
$align_class = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
$categories = $attributes['selectedCategories'] ?? [];
$post_count = $attributes['postCount'];
$enableCropTitle = $attributes['enableCropTitle'];
$numberOfWordsTitle = $attributes['numberOfWordsTitle'];
$post_cat=[];

foreach($categories as $key => $category) {
    $post_cat[$key] = $category['value'];
}

$query = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $post_count,
);
if(!empty($categories)) {
	$query['cat'] = $post_cat;
}
?>

<div <?php echo wp_kses_post(Gutenkit\Helpers\Utils::get_dynamic_block_wrapper_attributes($block)) ?>>
	<?php
	$xs_query = new \WP_Query($query);
	if ($xs_query->have_posts()) :
		while ($xs_query->have_posts()) :
			$xs_query->the_post();
			$img_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID()) : ''; // Check if thumbnail exists
			$title = get_the_title();
			if ($enableCropTitle) {
				$title = wp_trim_words($title, $numberOfWordsTitle);
			}
			?>
				<div class="gkit-post-grid-item">
					<a href="<?php echo esc_url(get_the_permalink()); ?>" class="gkit-post-grid-item__header" aria-label="url">
						<div class="gkit-post-grid-item__thumb" style="background-image: url('<?php echo esc_url($img_url); ?>')"></div>
						<?php if (get_post_format()  == 'video') : ?>
							<div class="tab__post--icon"><span class="fa fa-play-circle-o"></span></div>
						<?php endif; ?>
					</a>
					<h3 class="gkit-post-grid-item__title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html($title); ?></a></h3>
				</div>
			<?php
		endwhile;
	endif;
	wp_reset_postdata(); ?>
</div>