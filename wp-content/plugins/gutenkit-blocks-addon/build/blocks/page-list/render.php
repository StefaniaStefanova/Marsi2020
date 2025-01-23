<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$attributes = $attributes;
$block_id = $attributes['blockID'];
$align_class = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
$list_items = $attributes['listItems'];
$link_appearance = $attributes['LinkAppearance'];
$show_hide_rel = $attributes['showHideRel'];
$customClasses = isset($attributes['layOut']) && $attributes['layOut'] === 'inline' ? 'gkit-inline-items' : '';
?>

<div <?php echo wp_kses_post(Gutenkit\Helpers\Utils::get_dynamic_block_wrapper_attributes($block)) ?>>
    <div class="gkit-page-list-container <?php echo esc_attr($customClasses); ?>">
        <?php
        foreach ($list_items as $index => $item) :
            $post = '';
            if ($item['listPageOrLink'] == 'page') {
                if (isset($item['listPage']['value'])) {
                    if (get_post_status($item['listPage']['value']) == 'publish') {
                        $post = get_post($item['listPage']['value']);
                    }
                }
            } else {
                $post = !empty($item['listLink']) ? $item['listLink']['url'] : null;
            }

            if ($post != null) :
                $link = [];
                $title = '';
                if (!empty($item['listPage']) && $item['listPageOrLink'] == 'page') {

                    $link = [
                        'href' => isset($item['listPage']['link']) ? $item['listPage']['link'] : '',
                        'target'    => $link_appearance == '_blank' ? '_blank' : null,
                        'rel'        => $show_hide_rel ? 'nofollow noopener' : 'noopener'
                    ];
                } elseif ($item['listPageOrLink'] !== 'page') {
                    $link = [
                        'href' => isset($item['listLink']['url']) ? $item['listLink']['url'] : '',
                        'target'    => (isset($item['listLink']['newTab']) && $item['listLink']['newTab'] == true) ? '_blank' : '_self',
                        'rel' => ''
                    ];

                    if (isset($item['listLink']['noFollow']) && $item['listLink']['noFollow'] == true) {
                        $link['rel'] = 'nofollow';
                    }
                }
        
				if (($item["listPageOrLink"] == "link" && $item["listText"]) || ($item["listPageOrLink"] == "page")) :
					$target = isset($link['target']) ? $link['target'] : 'self';
					$rel = isset($link['rel']) ? 'rel="' . $link['rel'] . '"' : '';
				?>
					<div class="gkit-page-list ">
						<a class="gkit-page-link gkit-page-link-<?php echo esc_attr($index); ?>" href="<?php echo esc_url($link['href']) ?>" target="<?php echo esc_attr($target) ?>" <?php echo esc_attr($rel); ?>>
							<div class="gkit-page-list-content">
								<div class="gkit-page-list-icon">
									<span>
										<?php if (isset($item['listIconActive']) && $item['listIconActive'] == true) :
											if (!empty($item['listIcon']['src'])) :
												echo wp_kses(Gutenkit\Helpers\Utils::add_class_to_svg($item['listIcon']['src']), Gutenkit\Helpers\Utils::svg_allowed_html());
											endif;
										endif; ?>
									</span>
								</div>
								<div class="gkit-page-list-text">
									<span class="gkit-page-list-title">
										<?php
										if(!empty($item['listText'])) {
											echo esc_html($item['listText']);
										} else {
											echo esc_html($post->post_title);
										}
										?>
									</span>
									<?php if (!empty($item['listSubTitle'])) : ?>
										<span class="gkit-page-subtitle"><?php echo esc_html($item['listSubTitle']); ?></span>
									<?php endif; ?>
								</div>
							</div>
							<?php if (!empty($item['listLabelText']) && $item['listShowLabelActive'] == true) : ?>
								<span class="gkit-page-list-label">
									<?php echo esc_html($item['listLabelText']); ?>
								</span>
							<?php endif; ?>
						</a>
					</div>
				<?php endif;

			endif;

		endforeach; ?>
	</div>
</div>