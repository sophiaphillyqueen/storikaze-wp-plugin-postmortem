<?php

return function ( $paramos, $fildos )
{
  $ret = "";
  $code_item = call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["jugo"],$paramos);
  $postid = $code_item[0];
  
  $theval = get_post_field($fildos,$postid);
  
  $ret .= htmlspecialchars($theval);
  
  return $ret;
}

?>