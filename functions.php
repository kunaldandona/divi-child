<?php
function my_theme_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function showmodule_shortcode($moduleid) {
    extract(shortcode_atts(array('id' =>'*'),$moduleid)); 
    return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}
add_shortcode('showmodule', 'showmodule_shortcode');

/**
 * Display category image on category archive
 */
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img src="' . $image . '" alt="' . $cat->name . '" />';
		}
	}
}

// Using Custom JS File
function my_theme_scripts() {
    wp_enqueue_script( 'mainJS', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_custom_plugin_styles' );

function register_custom_plugin_styles() {
    wp_register_style( 'typekit', 'https://use.typekit.net/xsu6cgz.css' );
    wp_enqueue_style( 'typekit' );
}

/* Display WooCommerce product category description on all category archive pages */
function flexxi_woocommerce_taxonomy_archive_description() {
    if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) != 0 ) {
        $description = wc_format_content( term_description() );
        if ( $description ) {
            echo '<div class="term-description">' . $description . '</div>';
        }
    }
}
add_action( 'woocommerce_archive_description', 'flexxi_woocommerce_taxonomy_archive_description');

/* Display WooCommerce product category description on all category archive pages */
function check_woo_description() {
    if ( is_tax( array( 'product_cat', 'product_tag' ) ) ) {
        $description = wc_format_content( term_description() );
        if ( $description ) {
            return true;
        }
    }
}
add_action( 'woocommerce_archive_description', 'check_woo_description');

/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );


add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
$args['posts_per_page'] = 4; // 4 related products
$args['columns'] = 4; // arranged in 4 columns
return $args;
}