<?php 
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
echo showmodule_shortcode(83);
woocommerce_category_image();
get_footer( 'shop' );

