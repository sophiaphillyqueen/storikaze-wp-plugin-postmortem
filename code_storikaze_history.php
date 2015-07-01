<?php

if ( ! function_exists('storikaze_tag_history') ) :
function storikaze_tag_history ( $atts, $content = null ) {
  $timecode = strtotime($GLOBALS["storikaze_time_now"]);
  $ret = "";
  
  //echo "\n<h3>DEBUGORAMA</h3>\n";
  
  $sectona = explode("|",$content,2);
  
  $code_list = array();
  $fcode_list = array();
  
  
  $nseca = $sectona[0];
  while ( $nseca != "" )
  {
    $prca = explode("{{",$nseca,2);
    $prcb = explode("}}",$prca[1],2);
    $nseca = $prcb[1];
    
    $prcx = explode(":",$prcb[0],3);
    if ( $prcx[0] == "post" )
    {
      $tofuture = true;
      if ( strtotime($prcx[2]) <= $timecode )
      {
        $tofuture = false;
        //$ret .= $prcb[0] . "<br/>\n";
        $code_list[] = array($prcx[1],$prcx[2]);
        //call_user_func($GLOBALS["storikaze_tllx"]["vdump"],$code_list);
      }
      if ( $tofuture )
      {
        $fcode_list[] = array($prcx[1],$prcx[2]);
      }
    }
  }
  //call_user_func($GLOBALS["storikaze_tllx"]["vdump"],$code_list);
  //call_user_func($GLOBALS["storikaze_tllx"]["vdump"],$fcode_list);
  
  // To get the tags here sorted properly into the reverse order ....
  usort($code_list,$GLOBALS["storikaze_tllx"]["sort_g_code"]);
  usort($fcode_list,$GLOBALS["storikaze_tllx"]["sort_t_code"]);
  
  // Now we better plant the code lists in a place where the relevant
  // functions can easily see it.
  $GLOBALS["storikaze_tllx"]["proc_code"]["vray"] = $code_list;
  $GLOBALS["storikaze_tllx"]["proc_code"]["fvray"] = $fcode_list;
  
  
  
  $nseca = do_shortcode($sectona[1]);
  while ( $nseca != "" )
  {
    $prca = explode("{{",$nseca,2);
    $ret .= $prca[0];
    $zamia = ( $nseca != $prca[0] ); // Have we reached the end?
    $prcb = explode("}}",$prca[1],2);
    $nseca = $prcb[1];
    
    // Do not attempt to process the code if the end has already been reached
    // -- because at that point, there *should* be no valid code available.
    if ( $zamia )
    {
      $ret .= call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["main"],$prcb[0]);
    }
  }
  
  
  return $ret;
}
endif;
add_shortcode( 'storikaze_history', 'storikaze_tag_history' );

?>