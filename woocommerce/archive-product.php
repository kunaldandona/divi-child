<?php 
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
woocommerce_category_image();
echo showmodule_shortcode(83);
get_footer( 'shop' );

