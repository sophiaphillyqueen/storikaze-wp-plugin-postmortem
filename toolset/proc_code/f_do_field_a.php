<?php

return function ( $paramos, $fildos )
{
  $ret = "";
  $arri = explode(":",$paramos,2);
  $argi = $arri[0];
  $code_list = $GLOBALS["storikaze_tllx"]["proc_code"]["vray"];
  $raysiz = count($code_list);
  $maxval = ((int)($raysiz - 0.8));
  if ( $argi > $maxval ) { $argi = $maxval; }
  $postid = $code_list[$argi][0];
  
  $theval = get_post_field($fildos,$postid);
  
  $ret .= htmlspecialchars($theval);
  
  return $ret;
}

?>