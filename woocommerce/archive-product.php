<?php 
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );

?>

<div class="archive-page-header">
    <div class="row">
        <?php woocommerce_category_image(); ?>
        <h1><?php woocommerce_page_title(); ?></h1>
    </div>
	<div class="bottom-divider"></div>
</div>
<div class="row-archive">

<?php
$cate = get_queried_object();
$cateID = $cate->term_id;
echo $cateID;
?>
<h2><?php echo the_field('text-category', 19); ?></h2>

<img src="<?php echo the_field('background-hero', 19); ?>" />

<?php
if ( woocommerce_product_loop() ) {
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
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
</div>
<?php
echo showmodule_shortcode(83);
get_footer( 'shop' );

