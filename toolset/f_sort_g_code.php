<?php

return function ( $arga, $argb )
{
  $crna = strtotime($arga[1]);
  $crnb = strtotime($argb[1]);
  if ( $crna == $crnb ) { return 0; }
  
  // I give the reverse of the correct comparispon indicator --
  // because I wish the calling sort function to sort the array
  // into reverse order.
  if ( $crna > $crnb ) { return ( 0 - 1 ); }
  
  return 1;
}

?>