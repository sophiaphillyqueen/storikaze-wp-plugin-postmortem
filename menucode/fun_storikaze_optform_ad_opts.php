<?php

function storikaze_optform_ad_opts ( ) {
  $returnhdr = "Location: " . $_SERVER{"HTTP_REFERER"};
  
  if ( ! current_user_can('install_plugins') )
  {
    header($returnhdr);
    return true;
  }
  
  $valus = $_REQUEST{"adroot"};
  update_site_option("storikaze_ad_root",$valus);
  
  
  header($returnhdr);
  return true;
}

?>