<?php

return function ( $paramos )
{
  $ret = "";
  $code_item = call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["jugo"],$paramos);
  $date = $code_item[1];
  return htmlspecialchars($date);
}

?>