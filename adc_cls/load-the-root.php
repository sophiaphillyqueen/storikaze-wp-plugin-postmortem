<?php

$curren = get_site_option("storikaze_ad_root","");
if ( strlen($curren) < 3 ) { return null; }
$bginno = substr($curren,0,1);
if ( $beginno == "/" ) { $curren = realpath($curren); }
if ( $beginno != "/" )
{
  $basio = realpath(dirname(__FILE__) . "/../../../../..");
  $curren = realpath($basio . "/" . $curren);
  //echo "<br/><br/><br/><br/><br/><br/>---------------------------------------------- " . $curren;
}


return new storikaze_adc_obj(__FILE__,$curren);
?>