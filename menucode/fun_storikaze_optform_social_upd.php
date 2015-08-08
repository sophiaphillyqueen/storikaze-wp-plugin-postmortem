<?php

function storikaze_optform_social_upd ( ) {
  $returnhdr = "Location: " . $_SERVER{"HTTP_REFERER"};
  
  if ( $_REQUEST{"network"} == "twitter" )
  {
    $lctrma = $_REQUEST{"userid"};
    $lctrmb = sanitize_text_field($lctrma);
    //header("Content-type: text/plain");
    //echo $lctrma . ":\n";
    //echo $lctrmb . ":\n";
    if ( $lctrma == $lctrmb )
    {
      update_option("storikaze_social_twitter",$lctrma);
    }
    header($returnhdr);
    return true;
  }
  
  header($returnhdr);
  return true;
  //header("Content-type: text/plain");
  //echo "<h1>GOCHA</h1>";
  //var_dump($_SERVER);
}

?>