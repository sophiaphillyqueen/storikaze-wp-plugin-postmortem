<?

return function ( $paramos )
{
  $argi = explode(":",$paramos,2);
  
  if ( $argi[0] == "title" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_field_a"],$argi[1],"post_title");
  }
  
  if ( $argi[0] == "link" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_permalink"],$argi[1]);
  }
  
  return "&lt;&lt;" . $paramos . "&gt;&gt;";
}

?>