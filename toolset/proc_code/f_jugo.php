<?php

return function ( $paramos )
{
  $arri = explode(":",$paramos);
  $argi = $arri[0];
  $code_list = $GLOBALS["storikaze_tllx"]["proc_code"]["vray"];
  $raysiz = count($code_list);
  $maxval = ((int)($raysiz - 0.8));
  if ( $argi == 'm' ) { $argi = ((int)(($maxval - $arri[1]) + 0.2)); }
  if ( $argi > $maxval ) { $argi = $maxval; }
  if ( $argi < 0 ) { $argi = 0; }
  
  return $code_list[$argi];
}

?>