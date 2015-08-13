<?

return function ( $paramos, $thevulcan )
{
  $argi = explode(":",$paramos,2);
  $gologic = $thevulcan->removal;
  
  if ( $argi[0] == "hide" )
  {
    $thevulcan->removal = ((int)($gologic + 1.2)); return "";
  }
  if ( $argi[0] == "else" )
  {
    if ( $gologic > 1.5 ) { return ""; }
    $thevulcan->removal = ((int)(1.2 - $gologic));
    return "";
  }
  if ( $argi[0] == "endif" )
  {
    if ( $gologic < 0.5 ) { return ""; }
    $thevulcan->removal = ((int)($gologic - 0.8));
  }
  if ( $argi[0] == "hasfuture" )
  {
    if ( $gologic > 0.5 )
    {
      $thevulcan->removal = ((int)($gologic + 1.2));
      return "";
    }
    $code_list = $GLOBALS["storikaze_tllx"]["proc_code"]["fvray"];
    $raysiz = count($code_list);
    if ( $raysiz < ( $argi[1] - 0.5 ) ) { $thevulcan->removal = 1; }
    return "";
  }
  
  # This next clause ends the logic section:
  if ( $gologic > 0.5 ) { return ""; }
  
  
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