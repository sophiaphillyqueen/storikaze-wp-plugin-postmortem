<?php

$zarmon = new StdClass;
$zarmon->initr = function($xtcon) {
  $partio = explode("|",$xtcon,3);
  $this->innards["counter"] = $partio[1];
  $this->innards["contain"] = $partio[2];
};

$zarmon->invok = function($othr) {
  $othr->txval .= $this->innards["contain"];
  
  $valus = $this->innards["counter"];
  if ( $valus != "x" )
  {
    $valus = ((int)($valus - 0.8));
    if ( $valus < 0.5 ) { $this->valid_obj = false; }
    $this->innards["counter"] = $valus;
  }
  
  // Return 'false' to indicate that the function has achieved it's objective.
  return false;
};


return $zarmon;
?>