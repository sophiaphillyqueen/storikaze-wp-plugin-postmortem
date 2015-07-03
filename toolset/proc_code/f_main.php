<?

return function ( $paramos )
{
  $argi = explode(":",$paramos,2);
  
  if ( $argi[0] == "title" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_field_a"],$argi[1],"post_title");
  }
  
  if ( $argi[0] == "body" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_field_b"],$argi[1],"post_content");
  }
  
  if ( $argi[0] == "link" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_permalink"],$argi[1]);
  }
  
  if ( $argi[0] == "plink" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_p_permalink"],$argi[1]);
  }
  
  if ( $argi[0] == "date" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_visudate"],$argi[1]);
  }
  
  if ( $argi[0] == "ndate" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_neatdate"],$argi[1],"%A, %B %e, %Y");
  }
  
  if ( $argi[0] == "ndate_f" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_f_neatdate"],$argi[1],"%A, %B %e, %Y");
  }
  
  if ( $argi[0] == "wait" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_f_fardate"],$argi[1]);
  }
  
  if ( $argi[0] == "sndate" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_neatdate"],$argi[1],"%A, %B %e");
  }
  
  if ( $argi[0] == "social" )
  {
    return call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["do_social"],$argi[1]);
  }
  
  return "&lt;&lt;" . $paramos . "&gt;&gt;";
}

?>