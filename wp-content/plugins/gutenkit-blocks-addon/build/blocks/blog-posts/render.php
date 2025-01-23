<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
$attributes                = $attributes;
$content                   = $content;
$block                     = $block;
$block_id                  = $attributes['blockID'];
$align_class               = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
$layout                    = $attributes['layout'];
$image_position            = $attributes['featuredImagePosition'];
$posts_per_page            = $attributes['numberOfPosts'];
$select_post_by            = $attributes['selectPostBy'];
$selected_categories       = $attributes['selectedCategories'];
$category_ids              = !empty($selected_categories) ? array_column($selected_categories, 'value') : array();
$selected_posts            = $attributes['selectedPosts'];
$post_id                   = !empty($selected_posts) ? array_column($selected_posts, 'value') : array();
$offset                    = $attributes['offset'];
$order_by                  = $attributes['orderBy'];
$order                     = $attributes['order'];
$show_meta_data            = $attributes['showMetaData'];
$meta_data_position        = $attributes['metaDataPosition'];
$selected_meta_data        = $attributes['metaData'];
$selected_meta_value       = !empty($selected_meta_data) ? array_column($selected_meta_data, 'value') : array();
$highlight_border          = isset($attributes['showContentHighlightBorder']) && $attributes['showContentHighlightBorder'] ? 'gkit-highlight-border' : '';
$author_icon               = $attributes['authorIcon'];
$show_author_avatar        = $attributes['showAuthorAvatar'];
$date_icon                 = $attributes['dateIcon'];
$category_icon             = $attributes['categoryIcon'];
$comment_icon              = $attributes['commentIcon'];
$show_featured_image       = $attributes['showFeaturedImage'];
$featured_image_size       = $attributes['featuredImageSize'];
$show_title                = $attributes['showPostTitle'];
$crop_title_words          = !empty($attributes['numberOfWordsTitle']) ? $attributes['numberOfWordsTitle'] : '';
$show_content              = $attributes['showPostContent'];
$crop_content_word         = !empty($attributes['numberOfWordsContent']) ? $attributes['numberOfWordsContent'] : '';
$show_floating_date        = !empty($attributes['gkitBlogPostsFloatingDate']) ? $attributes['gkitBlogPostsFloatingDate'] : false;
$floating_date_style_class = !empty($attributes['gkitBlogPostsFloatingDateStyle']) ? "gutenkit-blog-post-floating-date-{$attributes['gkitBlogPostsFloatingDateStyle']}" : '';
$floating_date_triangle_position_alignment_class = !empty($attributes['gkitBlogPostsFloatingDateTrianglePositionAlignment']) ? "floating-date-{$attributes['gkitBlogPostsFloatingDateTrianglePositionAlignment']}" : '';
$show_floating_category                          = !empty($attributes['gkitBlogPostsFloatingCategory']) ? $attributes['gkitBlogPostsFloatingCategory'] : false;
$show_overlay = $attributes['showOverlay'];

$args                   = array();
$args['post_type']      = 'post';
$args['posts_per_page'] = $posts_per_page;
$args['offset']         = $offset;
$args['orderby']        = $order_by;
$args['order']          = $order;

if ($select_post_by === 'category') {
	$args['category__in'] = $category_ids;
}

if ($select_post_by === 'selected') {
	$args['post__in'] = $post_id;
}

$posts = get_posts($args);

if (!function_exists('gutenkit_metaDataContent')) :
	function gutenkit_metaDataContent($meta_value, $author_icon, $date_icon, $category_icon, $comment_icon, $post_id, $show_author_avatar)
	{ ?>
		<?php if (count($meta_value) > 0) : ?>
			<div class="post-meta-list">
				<?php if (in_array('author', $meta_value)) : ?>
					<span class="meta-author">
						<?php
						if (!empty($author_icon) && !$show_author_avatar) :
							echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($author_icon['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
						endif;
						?>
						<?php if ($show_author_avatar) : ?>
							<span class="meta-author-image">
								<?php
								$author_id = get_the_author_meta( 'ID' );
								echo wp_kses(get_avatar($author_id), Gutenkit\Helpers\Utils::img_allowed_html());
								?>
							</span>
						<?php endif; ?>
						<a href="<?php echo esc_url(get_the_author_link()); ?>" rel="author"><?php echo esc_html(get_the_author()); ?></a>
					</span>
				<?php endif; ?>
				<?php if (in_array('date', $meta_value)) : ?>
					<span class="meta-date">
						<?php
						if (!empty($date_icon)) :
							echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($date_icon['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
						endif;
						?>
						<span class="meta-date-text"><?php echo esc_html(get_the_date()); ?></span>
					</span>
				<?php endif; ?>
				<?php if (in_array('category', $meta_value)) : ?>
					<span class="post-cat">
						<span class="post-cat-item">
							<?php
							if (!empty($category_icon)) :
								echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($category_icon['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
							endif;

							$categories = get_the_category($post_id);
							foreach ($categories as $category) {
							?>
								<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" rel="category tag">
									<?php echo esc_html($category->name); ?>
								</a>
							<?php
							}
							?>
						</span>
					</span>
				<?php endif; ?>
				<?php if (in_array('comment', $meta_value)) : ?>
					<span class="post-comment">
						<span class="post-comment-item">
							<?php
							if (!empty($comment_icon)) :
								echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($comment_icon['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
							endif;
							?>
							<a href="<?php echo esc_url(get_comments_link($post_id)); ?>"><?php echo esc_html(get_comments_number($post_id)); ?></a>
						</span>
					</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
<?php
	}
endif;
?>

<div <?php echo wp_kses_post(Gutenkit\Helpers\Utils::get_dynamic_block_wrapper_attributes($block)) ?>>
	<div class="gutenkit-blog-posts gutenkit-blog-posts-layout-<?php echo esc_attr($layout); ?>">
		<?php foreach ($posts as $index => $post) : ?>
			<div class="gutenkit-blog-post-container">
				<div class="gutenkit-blog-post gutenkit-blog-post-direction-<?php echo esc_attr($image_position); ?>">
					<?php if (has_post_thumbnail($post) && $show_featured_image && $layout !== 'grid') : ?>
						<div class="gutenkit-blog-post-thumbnail">
							<a href="<?php echo esc_url(get_the_permalink($post)); ?>" class="gutenkit-blog-post-thumbnail-link" aria-label="<?php echo esc_attr__('Blog Post Thumbnail Read More', 'gutenkit-blocks-addon'); ?>">
								<?php echo wp_kses_post(get_the_post_thumbnail($post, $featured_image_size ? $featured_image_size : 'full', array('class' => 'gutenkit-blog-post-thumbnail-image'))); ?>
								<?php if ($show_overlay) {
									echo "<div class='gkit-blog-post-overlay'></div>";
								} ?>
							</a>
							<?php
							if ($layout === 'grid-thumb') {
								if ($show_floating_date) :
							?>
									<div class="gutenkit-blog-post-floating-date <?php echo esc_attr($floating_date_style_class); ?>">
										<div class="gutenkit-blog-post-floating-date-wrapper <?php echo esc_attr($floating_date_triangle_position_alignment_class); ?>">
											<strong class='gutenkit-blog-post-floating-date-text'>
												<?php
												echo esc_html(get_the_date('j', $post));
												?>
											</strong>
											<span class='gutenkit-blog-post-floating-date-month'>
												<?php echo esc_html(get_the_date('M', $post)); ?>
											</span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($show_floating_category) : ?>
									<div class="gutenkit-blog-post-floating-category">
										<span class="gutenkit-blog-post-floating-category-wrapper">
											<?php
											$categories = get_the_category($post->ID);
											foreach ($categories as $category) {
											?>
												<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" rel="category tag">
													<?php echo esc_html($category->name); ?>
												</a>
											<?php
											}
											?>
										</span>
									</div>
							<?php
								endif;
							}
							?>
						</div>
					<?php endif; ?>
					<div class="gutenkit-blog-post-content <?php echo esc_attr($highlight_border); ?>">
						<?php if ($show_meta_data && $meta_data_position === 'before-title') : ?>
							<?php gutenkit_metaDataContent($selected_meta_value, $author_icon, $date_icon, $category_icon, $comment_icon, $post->ID, $show_author_avatar); ?>
						<?php endif; ?>
						<?php if ($show_title) : ?>
							<h2 class="gutenkit-blog-post-title">
								<a href="<?php echo esc_url(get_the_permalink($post)); ?>" class="gutenkit-blog-post-title-link">
									<?php
									if ($crop_title_words) {
										echo esc_html(wp_trim_words(get_the_title($post), $crop_title_words));
									} else {
										echo esc_html(get_the_title($post));
									}
									?>
								</a>
								<?php if ($layout === 'grid' && !empty($attributes['gkitBlogPostsTitleSeparator']) && $attributes['gkitBlogPostsTitleSeparator']) : ?>
									<span class='gutenkit-blog-post-horizontal-line'></span>
								<?php endif; ?>
							</h2>
						<?php endif; ?>
						<?php if ($show_meta_data && $meta_data_position === 'after-title') : ?>
							<?php gutenkit_metaDataContent($selected_meta_value, $author_icon, $date_icon, $category_icon, $comment_icon, $post->ID, $show_author_avatar); ?>
						<?php endif; ?>
						<div class="gutenkit-blog-post-description">
							<?php
							if ($show_content) {
								if ($crop_content_word) {
									echo esc_html(wp_trim_words(get_the_excerpt($post), $crop_content_word));
								} else {
									echo esc_html(get_the_excerpt($post));
								}
							}
							?>
						</div>
						<?php if ($show_meta_data && $meta_data_position === 'after-content') : ?>
							<?php gutenkit_metaDataContent($selected_meta_value, $author_icon, $date_icon, $category_icon, $comment_icon, $post->ID, $show_author_avatar); ?>
						<?php endif; ?>
						<?php if ($attributes['layout'] !== 'list' && $attributes['showBlogPostsReadMore']) : ?>
							<div class="gutenkit-blog-post-btn-wraper">
								<a href="<?php echo esc_url(get_the_permalink($post)); ?>" class="gutenkit-blog-post-btn gkit-btn">
									<?php
									if (!empty($attributes['gkitBlogPostsShowBtnIcon']) && $attributes['gkitBlogPostsBtnIconAlign'] == 'left' && !empty($attributes['gkitBlogPostsBtnIcon'])) :
										echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($attributes['gkitBlogPostsBtnIcon']['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
									endif;
									?>
									<span class="gutenkit-blog-post-btn-text">
										<?php echo esc_html($attributes['gkitBlogPostsBtnText']); ?>
									</span>
									<?php
									if (!empty($attributes['gkitBlogPostsShowBtnIcon']) && $attributes['gkitBlogPostsBtnIconAlign'] == 'right' && !empty($attributes['gkitBlogPostsBtnIcon'])) :
										echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($attributes['gkitBlogPostsBtnIcon']['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
									endif;
									?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
