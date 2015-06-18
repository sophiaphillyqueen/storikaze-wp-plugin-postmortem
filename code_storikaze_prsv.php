<?php

// The [storikaze_x_prsv] shortcode is really meant for Storikaze's internal
// usage -- not external use.

if ( ! function_exists( 'storikaze_tag_x_prsv' ) ) :
function storikaze_tag_x_prsv ( $atts, $content = null ) {
	return rawurldecode($content);
}
endif;
add_shortcode( 'storikaze_x_prsv', 'storikaze_tag_x_prsv' );

?>