<?php

return function ( $paramos, $formeta )
{
  $ret = "";
  $code_item = call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["jugo"],$paramos);
  $date = $code_item[1];
  
  $dbara = explode(' ',$date);
  $ret .= strftime($formeta,strtotime($dbara[0]));
  return $ret;
}

?>