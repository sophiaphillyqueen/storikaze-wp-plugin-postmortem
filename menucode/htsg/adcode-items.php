<?php call_user_func(function ( ) {
  if ( ! current_user_can('install_plugins') ) { return; }
  
  $locoplug = get_site_option("storikaze_ad_root","");
  
?>

<h1>AdCode Options</h1>

<table border = "1">

<form action = "admin-post.php" method = "POST">
<tr><td>
<input type = "hidden" name = "action" value = "storikaze_ad_opts" /><input type = "text" size = "60" name = "adroot" value = <?php

echo "\"" . esc_attr($locoplug) . "\"";

?>/>
</td><td>
<input type="submit" value="Submit" />

</td></tr>
</form>

<?php }); ?>