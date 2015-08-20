<?php

// The [storikaze_adc] shortcode: "adc" stands for "ADvertisement Code" --
// can be used for author-controlled placement of ad slots - but also for
// other uses as well.
// The current implementation, though, is merely a place-holder.

if ( ! function_exists( 'storikaze_tag_adc' ) ) :
function storikaze_tag_adc ( $atts, $content = null ) {
	return rawurldecode($content);
}
endif;
add_shortcode( 'storikaze_adc', 'storikaze_tag_adc' );

?>