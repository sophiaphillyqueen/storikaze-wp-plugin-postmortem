<?php

return function ( $paramos )
{
  $ret = "";
  $code_item = call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["jugf"],$paramos);
  $date = $code_item[1];
  $atpresent = $GLOBALS["storikaze_time_now"];
  $ret .= human_time_diff(strtotime($date),strtotime($atpresent));
  return $ret;
}

?>