<?php

namespace Elementor;

class BEW_Categories_List extends BEW_Settings {
	
	public function get_name() {
		return 'bew-elements-product-categories-list';
	}
	
	public function get_title() {
		return __( 'Woo - Categories List', 'bosa-elementor-for-woocommerce' );
	}
	
	public function get_icon() {
		return 'bew-widget eicon-radio';
	}

	public function get_keywords() {
		return [ 'bew', 'categories', 'list', 'bew categories', 'woo', 'woo categories list', 'bosa' ];
	}
	
	public function get_categories() {
		return [ 'bosa-elementor-for-woocommerce' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'bew_elements_product_categories_list',
			[
				'label' => __( 'Content', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->get_items_no_res( 'column_no', esc_html__( 'Number of Columns', 'bosa-elementor-for-woocommerce' ), 6 );

		$this->add_control(
			'categories_no',
			[
				'label' => esc_html__( 'Number of Categories', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' 		=> __( 'Image Size', 'bosa-elementor-for-woocommerce' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'medium',
				'options' 		=> $this->get_img_sizes(),
			]
		);	

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_product_categories_list_query',
			[
				'label' => __( 'Query', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'source',
			[
				'label' => esc_html__( 'Source', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'show-all',
				'options' => [
					'show-all'  => esc_html__( 'Show All', 'bosa-elementor-for-woocommerce' ),
					'manual-selection' => esc_html__( 'Manual Selection', 'bosa-elementor-for-woocommerce' ),
					'by-parent' => esc_html__( 'By Parent', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->add_control(
			'product_categories',
			[
				'label' => __( 'Select Categories', 'bosa-elementor-for-woocommerce' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => $this->get_woocommerce_uncategorized_id(),
				'options' => $this->_woocommerce_category(),
				'condition' => [
					'source' => 'manual-selection',
				],
			]
		);

		$this->add_control(
			'parent',
			[
				'label' => esc_html__( 'Parent', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => $this->_woocommerce_category( true ),
				'condition' => [
					'source' => 'by-parent',
				],
			]
		);

		$this->add_control(
			'hide_empty',
			[
				'label' => esc_html__( 'Hide Empty', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bosa-elementor-for-woocommerce' ),
				'label_off' => esc_html__( 'Hide', 'bosa-elementor-for-woocommerce' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'name',
				'options' => [
					'name'  => esc_html__( 'Name', 'bosa-elementor-for-woocommerce' ),
					'slug' => esc_html__( 'Slug', 'bosa-elementor-for-woocommerce' ),
					'description' => esc_html__( 'Description', 'bosa-elementor-for-woocommerce' ),
					'count' => esc_html__( 'Count', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc'  => esc_html__( 'ASC', 'bosa-elementor-for-woocommerce' ),
					'desc' => esc_html__( 'DESC', 'bosa-elementor-for-woocommerce' ),
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'bew_elements_product_categories_list_item_style',
			[
				'label' => __( 'Item', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'items_tabs'
		);
		
		$this->start_controls_tab(
			'item_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'bg_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a', 'background-color' );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'items_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'bg_hover_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), ' .bew-elements-product-categories-list .product-wrapper a:hover', 'background-color' );

		$this->get_normal_color( 'border_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a:hover', 'border-color' );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->get_border_attr( 'item_border', '.bew-elements-product-categories-list .product-wrapper a' );

		$this->get_border_radius( 'item_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a', 'border-radius' );

		$this->add_control(
			'text_row_gap',
			[
				'label' => esc_html__( 'Row Gap', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-product-categories-list' => 'row-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_column_gap',
			[
				'label' => esc_html__( 'Column Gap', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-product-categories-list' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'selector' => '{{WRAPPER}} .bew-elements-product-categories-list .product-wrapper a'
			]
		);

		$this->get_padding( 'item_padding', '.bew-elements-product-categories-list .product-wrapper a' );

        $this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_product_categories_list_image_style',
			[
				'label' => __( 'Image', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_width',
			[
				'label' => esc_html__( 'Image Size', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-product-categories-list .products-cat-wrap .categoryimage' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->get_border_attr( 'img_border', '.bew-elements-product-categories-list .products-cat-wrap .categoryimage' );

		$this->get_normal_color( 'border_hover_color', esc_html__( 'Border Hover Color', 'bosa-elementor-for-woocommerce' ), ' .bew-elements-product-categories-list .product-wrapper a:hover .categoryimage ', 'border-color' );

		$this->get_border_radius( 'img_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .products-cat-wrap .categoryimage, .bew-elements-product-categories-list .product-wrapper .products-cat-wrap .products-cat-image', 'border-radius' );

		$this->end_controls_section();

        $this->start_controls_section(
			'bew_elements_product_categories_list_title_style',
			[
				'label' => __( 'Title', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->get_normal_color( 'title_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .products-cat-wrap  .woocommerce-loop-category__title', 'color' );

		$this->get_normal_color( 'hov_title_color', esc_html__( 'Hover Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a:hover  .woocommerce-loop-category__title', 'color' );

		$this->get_title_typography('title_typography', '.bew-elements-product-categories-list .products-cat-wrap .woocommerce-loop-category__title');

		$this->add_responsive_control(
			'title_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Content Alignment', 'bosa-elementor-for-woocommerce' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bosa-elementor-for-woocommerce' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-product-categories-list .products-cat-wrap .woocommerce-loop-category__title ' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
			]
		);

		$this->get_margin( 'title_margin', '.bew-elements-product-categories-list .products-cat-wrap .woocommerce-loop-category__title' );

		$this->end_controls_section();

		$this->start_controls_section(
			'bew_elements_product_categories_list_count_style',
			[
				'label' => __( 'Count', 'bosa-elementor-for-woocommerce' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'count_tabs'
		);

		$this->start_controls_tab(
			'count_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'count_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .products-cat-wrap .count', 'color' );

		$this->get_normal_color( 'count_background_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .products-cat-wrap .count', 'background-color' );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'count_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'bosa-elementor-for-woocommerce' ),
			]
		);

		$this->get_normal_color( 'count_hover_color', esc_html__( 'Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a:hover .count', 'color' );

		$this->get_normal_color( 'count_background_hover_color', esc_html__( 'Background Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a:hover .count', 'background-color' );

		$this->get_normal_color( 'count_border_hover_color', esc_html__( 'Border Color', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .product-wrapper a:hover .count', 'border-color' );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->get_border_attr( 'count_border', '.bew-elements-product-categories-list .products-cat-wrap .count' );

		$this->get_border_radius( 'count_border_radius', esc_html__( 'Border Radius', 'bosa-elementor-for-woocommerce' ), '.bew-elements-product-categories-list .products-cat-wrap .count', 'border-radius' );

		$this->get_title_typography('count_typography', '.bew-elements-product-categories-list .products-cat-wrap .count');

		$this->add_control(
			'count_width',
			[
				'label' => esc_html__( 'Count Width', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-product-categories-list .products-cat-wrap .count' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'count_height',
			[
				'label' => esc_html__( 'Count Height', 'bosa-elementor-for-woocommerce' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step'	=> 1
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bew-elements-product-categories-list .products-cat-wrap .count' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->get_padding( 'count_padding', '.bew-elements-product-categories-list .products-cat-wrap .count' );

		$this->end_controls_section();

	}

	public function get_category_image ($category_id) { 
	 	 $settings = $this->get_settings_for_display();
	 	 $img_size 					= $settings['image_size'];
		 $img_size 					= $img_size ? $img_size : 'woocommerce_thumbnail';
		 $thumbnail_id = get_term_meta( $category_id,'thumbnail_id', true );
		 if( $thumbnail_id ) {
                $image = wp_get_attachment_image_src( $thumbnail_id, $img_size, true );
            }else {
                $image[0] = wc_placeholder_img_src();
            } ?>
            <div class="products-cat-image <?php print_r( $thumbnail_id ); ?>"> 
				<img class="categoryimage" src="<?php echo esc_url( $image[0] ); ?>">
				
			</div>
	<?php	
	}
	public function get_category_name ($category_name) {
		$term = get_term_by( 'id', $category_name, 'product_cat' );
		$term_name = $term->name;?>
		<span class="name"> <?php echo esc_html($term_name); ?> </span>
		<?php
	}

	public function get_category_count ($category_count) {
		$term = get_term_by( 'id', $category_count, 'product_cat' );
		$sub_count =  apply_filters( 'woocommerce_subcategory_count_html', $term->count , $term);?>

		<span class="count"><?php echo esc_html( $sub_count );  ?></span>
	<?php
	}

	public function get_category_link ($category_link) {
		$term = get_term_by( 'id', $category_link, 'product_cat' );
		$term_link = get_term_link($term); ?>
		<a href="<?php echo esc_url( $term_link ); ?>">
		<?php
	}

	protected function render() {
        $settings       	        = $this->get_settings_for_display();
		$source						= $settings['source'];
		$parent 					= $settings['parent'];
		$hide_empty					= ( $settings['hide_empty'] == 'yes' ) ? false : true ;
		$order_by					= $settings['order_by'];
		$order						= $settings['order'];
		$product_category_ids   	= $settings['product_categories'] ? $settings['product_categories'] : [];
		$categories_no 				= $settings['categories_no'];


		// Image size
		$img_size 					= $settings['image_size'];
		$img_size 					= $img_size ? $img_size : 'woocommerce_thumbnail';
		

		if( $source == 'show-all' ) {
			$cat_args 					= array(
											'taxonomy'   => 'product_cat',
											'orderby'    => $order_by,
											'order'      => $order,
											'hide_empty' => $hide_empty,
											'include'	 => 'all',
											'number'	 => $categories_no,
										);
		} else if( $source == 'manual-selection' ) {
			$cat_args 					= array(
											'taxonomy'   => 'product_cat',
											'orderby'    => $order_by,
											'order'      => $order,
											'hide_empty' => $hide_empty,
											'include'	 => $product_category_ids,
											'number'     => $categories_no,
										);
		} else {
			$cat_args 					= array(
											'taxonomy'   => 'product_cat',
											'orderby'    => $order_by,
											'order'      => $order,
											'hide_empty' => $hide_empty,
											'parent'	 => $parent,
											'number'     => $categories_no,
										);
		}
		$product_categories_final = [];
		$product_categories = get_terms( $cat_args );
		if( is_array( $product_categories ) && !empty( $product_categories ) ){
			foreach( $product_categories as $product_category ) {
				array_push( $product_categories_final, $product_category->term_id );
			}
		}
            $count = 0; 
            if( !empty( $product_categories_final ) ) {
            	?>
            	<section class="bew-elements-widgets bew-display-grid bew-elements-product-categories-list" <?php echo $this->get_column_attr($settings); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		                <?php
		                foreach ( $product_categories_final as $key ) { 
	                	$term = get_term_by( 'id', $key, 'product_cat' );  
	                    if( !$term || ( $source == 'manual-selection' && $term->count == 0 && $hide_empty != false ) ) continue;
	            		?>
	                    <div class="product-wrapper product-category product">
	                       <?php $this->get_category_link($key); ?>
	                            <div class="products-cat-wrap">
                                   <?php $this->get_category_image($key); ?>
                                    <h5 class="woocommerce-loop-category__title">
                                        <?php $this->get_category_name($key); ?>
                                    </h5>
                                    <?php $this->get_category_count($key); ?>
	                            </div>
	                        </a>            
	                    </div>         
	            	<?php } ?>
      			</section>
      		<?php
            }else{
            	?>
            	<div class="bew-error">
            		<?php echo esc_html__( 'No categories found. Please verify that the WooCommerce plugin is active and there are product categories.', 'bosa-elementor-for-woocommerce' ); ?>
            	</div>
            <?php } 

	}
	
}