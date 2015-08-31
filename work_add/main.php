<?php

require_once(dirname(__FILE__) . "/fun_storikaze_adcn_adc_idtag.php");

if ( ! function_exists('storikaze_adcn_main_cnt') ) :
function storikaze_adcn_main_cnt ( $content ) {
  //$GLOBALS["storikaze_foolproof_id"] = get_the_ID();
  $cnta = $content;
  $cnta = storikaze_adcn_social_fun($cnta);
  $cnta = storikaze_adcn_adc_idtag($cnta);
  return $cnta;
}
endif;



add_filter( 'the_content', 'storikaze_adcn_main_cnt' );

?>