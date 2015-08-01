<?php

$storikaze_tllx = array(
  "vdump" => include(dirname(__FILE__)."/f_vdump.php"),
  
  // For reverse sorting
  "sort_g_code" => include(dirname(__FILE__)."/f_sort_g_code.php"),
  
  // For non-reverse sorting
  "sort_t_code" => include(dirname(__FILE__)."/f_sort_t_code.php"),
  
  // To fetch the current Directorial URL (not including trailing /)
  "get_dirurl" => include(dirname(__FILE__)."/f_get_dirurl.php"),
  
  "proc_code" => include(dirname(__FILE__)."/proc_code/main.php"),
  "months_f" => array
  (
    "January","February","March",
    "April","May","June",
    "July","August","Septempber",
    "October","November","December",
  ),
  
  // Despensible ID-Counter:
  "dispid" => 0,
);

?>