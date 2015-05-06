<?php
/**
 * Plugin Name: Storikaze Wordpress Plugin
 * Description: Gets WordPress to act as a Webserial fiction manager rather than a blog
 * License: GPL2
 */


// WordPress was originally written for blogs - and therefore
// sorts the entries so that the most recent one appears first.
// However, that is not what we want in webfiction - so this
// code will change the order so that the oldest post appears
// first.
if ( ! function_exists( 'storikaze_fix_sort_order_in_qry' ) ) :
function storikaze_fix_sort_order_in_qry ( $query )
{
	$query->set('order','ASC');
}
endif; // twentyfifteen_setup
add_action( 'pre_get_posts', 'storikaze_fix_sort_order_in_qry' );




?>