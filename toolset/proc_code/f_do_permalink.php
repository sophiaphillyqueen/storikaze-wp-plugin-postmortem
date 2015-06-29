<?php

return function ( $paramos )
{
  $ret = "";
  $code_item = call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["jugo"],$paramos);
  $postid = $code_item[0];
  $postloc = get_permalink($postid);
  return htmlspecialchars($postloc);
}

?>