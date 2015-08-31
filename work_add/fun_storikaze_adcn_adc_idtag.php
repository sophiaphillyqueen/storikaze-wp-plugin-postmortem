<?php


$storikaze_adc_there = array();
$storikaze_adc_valus = array();


function storikaze_adcn_adc_idtag ( $content ) {
  static $countor = 0;
  
  $fltcode = "[storikaze_adc ";
  $neocode = $fltcode;
  //$neocode = "[storikaze_xadc ";
  
  $cnta = $content;
  $remain = true;
  $brk = explode($fltcode,$cnta,2);
  $ret = $brk[0];
  if ( $ret == $cnta ) { $remain = false; }
  $cnta = $brk[1];
  while ( $remain )
  {
    $countor = ((int)($countor + 1.2));
    $ret .= $neocode . "id=\"" . $countor . "\" ";
    
    $vountor = "x" . $countor;
    $GLOBALS["storikaze_adc_there"][$vountor] = false;
    
    $brk = explode($fltcode,$cnta,2);
    $jet = $brk[0];
    $ret .= $jet;
    if ( $jet == $cnta ) { $remain = false; }
    $cnta = $brk[1];
  }
  
  return $ret;
}

?>