<?php

if ( ! function_exists('storikaze_tag_history') ) :
function storikaze_tag_history ( $atts, $content = null ) {
  $timecode = strtotime($GLOBALS["storikaze_time_now"]);
  $ret = "";
  
  
  $sectona = explode("|",$content,2);
  
  $code_list = array();
  
  
  $nseca = $sectona[0];
  while ( $nseca != "" )
  {
    $prca = explode("{{",$nseca,2);
    $prcb = explode("}}",$prca[1],2);
    $nseca = $prcb[1];
    
    $prcx = explode(":",$prcb[0],3);
    if ( $prcx[0] == "post" )
    {
      if ( strtotime($prcx[2]) <= $timecode )
      {
        //$ret .= $prcb[0] . "<br/>\n";
        $code_list[] = array($prcx[1],$prcx[2]);
        //call_user_func($GLOBALS["storikaze_tllx"]["vdump"],$code_list);
      }
    }
  }
  
  
  // To get the tags here sorted properly into the reverse order ....
  usort($code_list,$GLOBALS["storikaze_tllx"]["sort_g_code"]);
  
  // Now we better plant the code list in a place where the relevant
  // functions can easily see it.
  $GLOBALS["storikaze_tllx"]["proc_code"]["vray"] = $code_list;
  
  
  
  $nseca = $sectona[1];
  while ( $nseca != "" )
  {
    $prca = explode("{{",$nseca,2);
    $ret .= $prca[0];
    $prcb = explode("}}",$prca[1],2);
    $nseca = $prcb[1];
    
    $ret .= call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["main"],$prcb[0]);
  }
  
  
  return $ret;
}
endif;
add_shortcode( 'storikaze_history', 'storikaze_tag_history' );

?>