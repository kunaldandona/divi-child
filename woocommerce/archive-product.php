<?php 
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );

$term = get_queried_object();
$termID = $term->term_id;
$post_id = 'product_cat_'.$termID;

// Custom Field Text
$text = get_field("text_category", $post_id);

$categorybanner = get_field('background-hero', $post_id);
if($categorybanner){
	$heroBanner = '<div class="hero-banner"><img src="'. $categorybanner .'" /></div>';
}

$children = get_terms( $term->taxonomy, array(
	'parent'    => $term->term_id,
	'hide_empty' => false
	));
?>


<?php
if ( woocommerce_product_loop() ) {
	do_action( 'woocommerce_before_shop_loop' );
	woocommerce_product_loop_start();
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();
			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );
			wc_get_template_part( 'content', 'product' );
		}
	}
	woocommerce_product_loop_end();
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
?>

<?php


	get_footer( 'shop' );

