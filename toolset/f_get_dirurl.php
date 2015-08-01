<?php

return function ( )
{
  $returl = "http";
  $dflport = "80";
  if ( $_SERVER["HTTPS"] == "on" )
  {
    $returl = "https";
    $dflport = "443";
  }
  $returl .= "://";
  $returl .= $_SERVER["SERVER_NAME"];
  
  $curport = $_SERVER["SERVER_PORT"];
  if ( $curport != $dflport )
  {
    $returl .= ":" . $curport;
  }
  
  $scrname = dirname($_SERVER["SCRIPT_NAME"]);
  if ( $scrname != "/" ) { $returl .= $scrname; }
  
  return $returl;
}


?>