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

$parent = ( isset( $term->parent ) ) ? get_term_by( 'id', $term->parent, 'types' ) : false;
?>

<div class="archive-page-header">
    <div class="row">
        <?php woocommerce_category_image(); ?>
        <h1><?php woocommerce_page_title(); ?></h1>
    </div>
	<div class="bottom-divider"></div>
</div>
<div class="row-archive">
<?php echo $heroBanner ?>
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
	//Custom logic condition to check if description exist of category, then display block.
	if(check_woo_description() === true){
		echo '<div class="row-archive"><div class="cat-description"><h1>';
		echo woocommerce_page_title();
		echo '</h1>';
		echo woocommerce_taxonomy_archive_description(); 
		echo flexxi_woocommerce_taxonomy_archive_description();
		echo '</div></div>';
	}
?>

<?php if( $parent ): ?>
    <h2>Archive Parent Term</h2>
    <h3><?php echo $parent->name; ?></h3>
<?php else:?>
    <h2>Archive <?php single_term_title(); ?></h2>
<?php endif; ?>


<?php

echo showmodule_shortcode(5566);
get_footer( 'shop' );

