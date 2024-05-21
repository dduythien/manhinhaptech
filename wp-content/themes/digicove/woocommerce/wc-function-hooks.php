<?php

/* Remove result count & product ordering & item product category..... */
function digicove_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
}
add_action( 'init', 'digicove_cwoocommerce_remove_function' );

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'digicove_woocommerce_nav_top', 2 );
function digicove_woocommerce_nav_top() {
	$shop_layout = (isset($_GET['shop-layout'])) ? trim($_GET['shop-layout']) : digicove()->get_theme_opt( '   ', 'grid' );
	?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-archive-layout">
			<?php if($shop_layout == 'list') { ?>
				<span class="archive-layout layout-grid"></span>				
				<span class="archive-layout layout-list active"></span>
			<?php } else { ?>
				<span class="archive-layout layout-grid active"></span>				
				<span class="archive-layout layout-list"></span>			
			<?php } ?>
		</div>
		<div class="woocommerce-result-count">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }

/* Removes the "shop" title on the main shop page */
function digicove_hide_page_title()
{
	return false;
}
add_filter('woocommerce_show_page_title', 'digicove_hide_page_title');
add_filter( 'woocommerce_product_description_heading', '__return_null' );

add_filter( 'woocommerce_after_shop_loop_item', 'digicove_woocommerce_product' );
function digicove_woocommerce_product() {
	global $product;
	?>
	<div class="woocommerce-product-inner">
		<div class="woocommerce-product-header">
			<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
				<?php echo ''.$product->get_image(array( 360, 332 )); ?>
			</a>
			<div class="woocommerce-product-meta">			
				<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
				<?php } else { ?>
					<?php woocommerce_template_loop_add_to_cart(); ?>
				<?php } ?>							
			</div>
		</div>
		<div class="woocommerce-product-content">
			<h4 class="woocommerce-product--title">
				<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
			</h4>
			<?php woocommerce_template_loop_price(); ?>
		</div>
	</div>
<?php }

add_filter ( 'storefront_product_thumbnail_columns', 'bbloomer_change_gallery_columns_storefront' );

function bbloomer_change_gallery_columns_storefront() {
	return 1; 
}

/* Add the custom Tabs Specification */
function digicove_custom_product_tab_specification( $tabs ) {
	$product_specification = digicove()->get_page_opt( 'product_specification' );
	if(!empty($product_specification)) {
		$tabs['tab-product-feature'] = array(
			'title'    => esc_html__( 'Product Specification', 'digicove' ),
			'callback' => 'digicove_custom_tab_content_specification',
			'priority' => 10,
		);
		return $tabs;
	} else {
		return $tabs;
	}
}
add_filter( 'woocommerce_product_tabs', 'digicove_custom_product_tab_specification' );

/* Function that displays output for the Tab Specification. */
function digicove_custom_tab_content_specification( $slug, $tab ) { 
	$product_specification = digicove()->get_page_opt( 'product_specification' );
	$result = count($product_specification); ?>
	<div class="tab-content-wrap">
		<?php if (!empty($product_specification)) : ?>
			<div class="tab-product-feature-list">
				<?php for($i=0; $i<$result; $i+=2) { ?>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12">
							<?php echo isset($product_specification[$i])?esc_html( $product_specification[$i] ):''; ?>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-12">
							<?php echo isset($product_specification[$i+1])?esc_html( $product_specification[$i+1] ):''; ?>
						</div>
					</div>
					<div class="line-gap"></div>
				<?php } ?>
			</div>
		<?php endif; ?>
	</div>
<?php }

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'digicove_loop_shop_columns', 20 ); 
function digicove_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : digicove()->get_theme_opt('products_columns', 4);
	return $columns;
}

add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_echo_qty_front_add_cart' );

function bbloomer_echo_qty_front_add_cart() {
	echo '<span class="qty-suff">quantity</span>'; 
}

/* Show product per page */
function digicove_loop_shop_per_page(){
	$product_per_page = digicove()->get_opt('product_per_page',12);

	if(isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
		return $_REQUEST['loop_shop_per_page'];
	} else {
		return $product_per_page;
	}
}
add_filter( 'loop_shop_per_page', 'digicove_loop_shop_per_page' );

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
	$size['width'] = 438;
	$size['height'] = 257;
	$size['crop'] = 1;
	return $size;
});

add_filter('woocommerce_get_image_size_single', function ($size) {
	$size['width'] = 800;
	$size['height'] = 800;
	$size['crop'] = 1;
	return $size;
});

/* Product Single: Summary */
add_action( 'woocommerce_before_single_product_summary', 'digicove_woocommerce_single_summer_start', 0 );
function digicove_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }
add_action( 'woocommerce_after_single_product_summary', 'digicove_woocommerce_single_summer_end', 5 );
function digicove_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_product_title', 5 );
function digicove_woocommerce_sg_product_title() { 
	global $product; 
	$product_title = digicove()->get_opt( 'product_title', false ); 
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
	<?php endif; }

	add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_product_rating', 10 );
	function digicove_woocommerce_sg_product_rating() { global $product; ?>
		<div class="woocommerce-sg-product-rating">
			<?php woocommerce_template_single_rating(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_product_price', 15 );
	function digicove_woocommerce_sg_product_price() { ?>
		<div class="woocommerce-sg-product-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_product_excerpt', 20 );
	function digicove_woocommerce_sg_product_excerpt() { 
		global $product; 
		?>
		<div class="woocommerce-sg-product-excerpt">
			<?php woocommerce_template_single_excerpt(); ?>
		</div>		
	<?php }

	add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_product_meta', 31 );
	function digicove_woocommerce_sg_product_meta() { 
		global $product; 
		?>
		<?php woocommerce_template_loop_add_to_cart(); ?>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_product_button', 30 );
	function digicove_woocommerce_sg_product_button() { 
		global $product; 
		?>
		<div class="wooc-product-meta">
			<?php if (class_exists('WPCleverWoosc')) { ?>
				<?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
			<?php if (class_exists('WPCleverWoosw')) { ?>
				<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'digicove_woocommerce_sg_social_share', 40 );
	function digicove_woocommerce_sg_social_share() { 
		$product_social_share = digicove()->get_opt( 'product_social_share', false );
		if($product_social_share) : ?>
			<div class="woocommerce-social-share">
				<label><?php echo esc_html__('Share:', 'digicove'); ?></label>
				<a class="fb-social" title="<?php echo esc_attr__('Facebook', 'digicove'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
				<a class="tw-social" title="<?php echo esc_attr__('Twitter', 'digicove'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
				<a class="in-social" title="<?php echo esc_attr__('Instagram', 'digicove'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-instagram"></i></a>
				<a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'digicove'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
				<a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'digicove'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
			</div>
		<?php endif; }

		/* Product Single: Gallery */
		add_action( 'woocommerce_before_single_product_summary', 'digicove_woocommerce_single_gallery_start', 0 );
		function digicove_woocommerce_single_gallery_start() { ?>
			<?php echo '<div class="woocommerce-gallery col-xl-6 col-lg-6 col-md-6">'; ?>
		<?php }
		add_action( 'woocommerce_before_single_product_summary', 'digicove_woocommerce_single_gallery_end', 30 );
		function digicove_woocommerce_single_gallery_end() { ?>
			<?php echo '</div><div class="col-xl-6 col-lg-6 col-md-6">'; ?>
		<?php }

		/* Rating */
		function digicove_rating($rating_html, $rating) {
			global $product;
			if($product) {
				$rating_count = $product->get_rating_count();
				if($rating_count == 0) {
					$rating_count = esc_html__( 'No', 'digicove' );
				}
				$rating_html = '<div class="star-rating-wrap">';
				$rating_html .= '<div class="star-rating">';
				$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
				$rating_html .= '</div>';
				$rating_html .= '<div class="count-rating">('.$rating_count.')</div>';
				$rating_html .= '</div>';
			}
			return $rating_html;
		}
		add_filter( 'woocommerce_product_get_rating_html', 'digicove_rating', 10, 2);

		/* Rating */
		function digicove_woosc_rating($rating_html, $rating) {
			global $product;
			if($product) {
				$rating_count = $product->get_rating_count();
				if($rating_count == 0) {
					$rating_count = esc_html__( 'No', 'digicove' );
				}
				$rating_html = '<div class="star-rating-wrap">';
				$rating_html .= '<div class="star-rating">';
				$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
				$rating_html .= '</div>';
				$rating_html .= '<div class="count-rating">('.$rating_count.')</div>';
				$rating_html .= '</div>';
			}
			return $rating_html;
		}
		add_filter( 'woosc_woocommerce_rating', 'digicove_woosc_rating', 10, 2);

		/* Ajax update cart total number */

		add_filter( 'woocommerce_add_to_cart_fragments', 'digicove_woocommerce_sidebar_cart_count_number' );
		function digicove_woocommerce_sidebar_cart_count_number( $fragments ) {
			ob_start();
			?>
			<span class="pxl_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'digicove' ), WC()->cart->cart_contents_count ); ?></span>
			<?php

			$fragments['.pxl_cart_counter'] = ob_get_clean();

			return $fragments;
		}

		add_filter( 'woocommerce_output_related_products_args', 'digicove_related_products_args', 20 );
		function digicove_related_products_args( $args ) {
			$args['posts_per_page'] = 3;
			$args['columns'] = 3;
			return $args;
		}

		add_filter( 'woocommerce_product_related_products_heading', 'bbloomer_rename_related_products' );
		
		function bbloomer_rename_related_products() {
			return "Similar Product";
		}

		/* Pagination Args */
		function digicove_filter_woocommerce_pagination_args( $array ) { 
			$array['end_size'] = 1;
			$array['mid_size'] = 1;
			return $array; 
		}; 
		add_filter( 'woocommerce_pagination_args', 'digicove_filter_woocommerce_pagination_args', 10, 1 ); 

		add_filter( 'woocommerce_checkout_before_order_review_heading', 'digicove_checkout_before_order_review_heading', 10 );
		function digicove_checkout_before_order_review_heading() {
			echo '<div class="pxl-checkout-order-review">';
		}
		add_filter( 'woocommerce_checkout_after_order_review', 'digicove_checkout_after_order_review', 20 );
		function digicove_checkout_after_order_review() {
			echo '</div>';
		}

		function digicove_woocommerce_query($type='recent_product',$post_per_page=-1,$product_ids='',$categories='',$param_args=[]){
			global $wp_query;

			$product_visibility_term_ids = wc_get_product_visibility_term_ids();
			if(!empty($product_ids)){

				if (get_query_var('paged')) {
					$pxl_paged = get_query_var('paged');
				} elseif (get_query_var('page')) {
					$pxl_paged = get_query_var('page');
				} else {
					$pxl_paged = 1;
				}

				$pxl_query = new WP_Query(array(
					'post_type' => 'product',
					'post__in' => array_map('intval', explode(',', $product_ids)),
					'tax_query' => array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'term_taxonomy_id',
							'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
							'operator' => 'NOT IN',
						)
					),
				));

				$posts = $pxl_query;

				$categories = [];
			}else{
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => $post_per_page,
					'post_status' => 'publish',
					'post_parent' => 0,
					'date_query' => array(
						array(
							'before' => date('Y-m-d H:i:s', current_time( 'timestamp' ))
						)
					),
					'tax_query' => array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'term_taxonomy_id',
							'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
							'operator' => 'NOT IN',
						)
					),
				);

				if(!empty($categories)){

					$args['tax_query'][] = array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'operator' => 'IN',
						'terms' => $categories,
					);
				}

				if( !empty($param_args['pro_atts']) ){
					foreach ($param_args['pro_atts'] as $k => $v) {
						$args['tax_query'][] = array(
							'taxonomy' => $k,
							'field' => 'slug',
							'terms' => $v
						);
					}
				}

				$args['meta_query'] = array(
					'relation'    => 'AND'
				);

				if( !empty($param_args['min_price']) && !empty($param_args['max_price'])){ 
					$args['meta_query'][] =   array(
						'key'     => '_price',
						'value'   => array( $param_args['min_price'], $param_args['max_price'] ),
						'compare' => 'BETWEEN',
						'type'    => 'DECIMAL(10,' . wc_get_price_decimals() . ')',
					);
				}

				$args = digicove_product_filter_type_args($type,$args);

				if (get_query_var('paged')){ 
					$pxl_paged = get_query_var('paged'); 
				}elseif(get_query_var('page')){ 
					$pxl_paged = get_query_var('page'); 
				}else{ 
					$pxl_paged = 1; 
				}
				if($pxl_paged > 1){
					$args['paged'] = $pxl_paged;
				}

				$posts = $pxl_query = new WP_Query($args);

				if (empty($categories)) {
					$product_categories = get_categories(array( 'taxonomy' => 'product_cat' ));
					$categories = array();
					foreach($product_categories as $key => $category){
						$categories[] = $category->slug;
					}
				}
			}
			global $wp_query;
			$wp_query = $pxl_query;
			$pagination = get_the_posts_pagination(array(
				'screen_reader_text' => '',
				'mid_size' => 2,
				'prev_text' => esc_html__('Back', 'digicove'),
				'next_text' => esc_html__('Next', 'digicove'),
			));
			global $paged;
			$paged = $pxl_paged; 


			wp_reset_query(); 
			return array(
				'posts' => $posts,
				'categories' => $categories,
				'query' => $pxl_query,
				'args' => $args,
				'paged' => $paged,
				'max' => $pxl_query->max_num_pages,
				'next_link' => next_posts($pxl_query->max_num_pages, false),
				'total' => $pxl_query->found_posts,
				'pagination' => $pagination
			);
		}

		function digicove_product_filter_type_args($type,$args){
			switch ($type) {
				case 'best_selling':
				$args['meta_key']='total_sales';
				$args['orderby']='meta_value_num';
				$args['ignore_sticky_posts']   = 1;
				break;
				case 'featured_product':
				$args['ignore_sticky_posts'] = 1;
				$args['tax_query'][] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['featured'],
				);
				break;
				case 'top_rate':
				$args['meta_key']   ='_wc_average_rating';
				$args['orderby']    ='meta_value_num';
				$args['order']      ='DESC';
				break;
				case 'recent_product':
				$args['orderby']    = 'date';
				$args['order']      = 'DESC';
				break;
				case 'on_sale':
				$args['post__in'] = wc_get_product_ids_on_sale();
				break;
				case 'recent_review':
				if($post_per_page == -1) $_limit = 4;
				else $_limit = $post_per_page;
				global $wpdb;
				$query = $wpdb->prepare("SELECT c.comment_post_ID FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c WHERE p.ID = c.comment_post_ID AND c.comment_approved > 0 AND p.post_type = 'product' AND p.post_status = 'publish' AND p.comment_count > 0 ORDER BY c.comment_date ASC LIMIT 0, %d", $_limit);
				$results = $wpdb->get_results($query, OBJECT);
				$_pids = array();
				foreach ($results as $re) {
					$_pids[] = $re->comment_post_ID;
				}

				$args['post__in'] = $_pids;
				break;
				case 'deals':
				$args['meta_query'][] = array(
					'key' => '_sale_price_dates_to',
					'value' => '0',
					'compare' => '>');
				$args['post__in'] = wc_get_product_ids_on_sale();
				break;
				case 'separate':
				if ( ! empty( $product_ids ) ) {
					$ids = array_map( 'trim', explode( ',', $product_ids ) );
					if ( 1 === count( $ids ) ) {
						$args['p'] = $ids[0];
					} else {
						$args['post__in'] = $ids;
					}
				}
				break;
			}
			return $args;
		}
