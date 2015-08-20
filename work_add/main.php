<?php

if ( ! function_exists('storikaze_adcn_main_cnt') ) :
function storikaze_adcn_main_cnt ( $content ) {
  $cnta = $content;
  $cnta = storikaze_adcn_social_fun($cnta);
  return $cnta;
}
endif;



add_filter( 'the_content', 'storikaze_adcn_main_cnt' );

?>