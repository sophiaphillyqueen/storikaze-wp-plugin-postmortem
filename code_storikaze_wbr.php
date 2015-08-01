<?php

if ( ! function_exists('storikaze_tag_verse') ) :
function storikaze_tag_verse ( $atts, $content = null ) {
  //$lcwide = 194;
  $lcwide = 190;
  $lctall = 190;
  $lcurl = "http://storikaze.org/wbring/main.php";
  $lcsel = false; // Should it default to Storikaze ring? (As opposed to no default)
  $lcrule = "latest";
  $lcrate = "dfl"; // Default rating
  $ret = "";
  
  // Fetch the Dispensible Item ID:
  $dispid = ((int)($GLOBALS["storikaze_tllx"]["dispid"] + 1.2));
  $GLOBALS["storikaze_tllx"]["dispid"] = $dispid;
  
  if ( is_array($atts) )
  {
    foreach ( $atts as $thenom => $theval )
    {
      if ( $thenom == "ht" ) { $lctall= $theval; }
      if ( $thenom == "wd" ) { $lcwide= $theval; }
      if ( $thenom == "url" ) { $lcurl= $theval; $lcsel = true; }
      if ( $thenom == "rule" ) { $lcrule = $theval; }
      if ( $thenom == "rate" ) { $lcrate = $theval; }
    }
  }
  
  $ret .= "<table border = \"1\"><tr>";
  $ret .= "<td";
    //$ret .= " align = \"center\"";
    $ret .= " width = \"" . $lcwide . "\"";
    $ret .= " height = \"" . $lctall . "\"";
    $ret .= " id = \"dspid_" . $dispid . "x\"";
  $ret .= ">";
  $ret .= do_shortcode($content);
  $ret .= "</td>";
  //$ret .= "<td></td>"; // temp cell
  $ret .= "</tr></table>";
  if ( $lcsel )
  {
    $ret .= "<script>{\n";
    $ret .= "var storikaze_wbr_r = new XMLHttpRequest();\n";
    $ret .= "storikaze_wbr_r.open(\"GET\",";
      $ret .= "\"" . $lcurl . "?dim=" . $lcwide . "x" . $lctall;
        $ret .= "&rate=" . $lcrate;
        $ret .= "&rule=" . $lcrule;
      $ret .= "\"";
    $ret .= ",false);\n";
    $ret .= "storikaze_wbr_r.send();\n";
    $ret .= "document.getElementById(\"dspid_" . $dispid . "x\").innerHTML = storikaze_wbr_r.responseText;\n";
    $ret .= "}</script>";
  }
  return $ret;
}
endif;
add_shortcode( 'storikaze_wbr', 'storikaze_tag_verse' );


?>