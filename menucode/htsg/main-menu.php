<?php call_user_func(function ( ) { 
?><h1>Storikaze Options</h1>

<p>
As the number of options related to Storikaze is expected to grow
significantly in the future, it is deemed prudent that the options
menu for Storikaze from the get-go be a main WordPress menu
rather than a submenu.
</p>

<table border = "1" cellpadding = "2"><tr><td colspan = "3" align = "center"><b>Social Media Info</b></td></tr>

<?php
// Two completely different tables are used to turn the social media baster on and off

$social_stat_raw = get_option("storikaze_social","no");
$social_stat_bl = ( $social_stat_raw == "yes" );


if ( ! ($social_stat_bl) ) {
?>


<tr><td>
No social media panel.
</td><td colspan = "2">
<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "media_panel_on" />
<input type = "submit" value = "ACTIVATE That Social Media Panel" />
</form>
</td></tr>


<?php
} if ( $social_stat_bl ) {
?>


<tr><td colspan = "2">
The social media pannel is currently <b>ACTIVE</b>.
</td><td>
<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "media_panel_off" />
<input type = "submit" value = "Deactivate" />
</form>
</td></tr>

<?php
}
?>


<tr><td><b>Twitter ID</b><br/><i>(Do not include leading '@')</i></td>
<?php $social_id = get_option("storikaze_social_twitter",""); ?><td>
<form action = "admin-post.php" method = "POST">
<table border = "0"><tr><td>
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "twitter" />
<input type = "text" size = "20" name = "userid" value = <?php

echo "\"" . esc_attr($social_id) . "\"";

?>/>
</td><td>
<input type="submit" value="Submit" />
</td></tr></table>
</form>
</td><td>
<?php

if ( $social_id != "" )
{
  echo "<a href = \"https://twitter.com/" . esc_attr($social_id) . "\" target = \"_blank\">";
  echo '@' . esc_html($social_id) . "</a>";
}

?>
</td></tr>

</table>

<?php }); ?>
