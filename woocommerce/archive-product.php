<?php 
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );

?>

<div class="et_pb_section et_pb_section_1 et_pb_with_background et_pb_inner_shadow et_section_regular section_has_divider et_pb_bottom_divider">
    <div class="et_pb_row et_pb_row_0">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
            <div class="et_pb_module et_pb_image et_pb_image_0">
			    <span class="et_pb_image_wrap ">
                    <?php woocommerce_category_image(); ?>
                </span>
                </div>
            <div class="et_pb_module et_pb_text et_pb_text_0 et_pb_bg_layout_light  et_pb_text_align_center">
				<div class="et_pb_text_inner"><h1><?php woocommerce_page_title(); ?></h1></div>
			</div> <!-- .et_pb_text -->
		</div> <!-- .et_pb_column -->	
	</div> <!-- .et_pb_row -->
	<div class="et_pb_bottom_inside_divider"></div>
</div>


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
echo showmodule_shortcode(83);
get_footer( 'shop' );

