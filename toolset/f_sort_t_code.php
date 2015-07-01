<?php

return function ( $arga, $argb )
{
  $crna = strtotime($arga[1]);
  $crnb = strtotime($argb[1]);
  if ( $crna == $crnb ) { return 0; }
  
  // This version of the function sorts into the correct order.
  if ( $crna < $crnb ) { return ( 0 - 1 ); }
  
  return 1;
}

?>