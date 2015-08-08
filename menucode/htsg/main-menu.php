<h1>Storikaze Options</h1>

<p>
As the number of options related to Storikaze is expected to grow
significantly in the future, it is deemed prudent that the options
menu for Storikaze from the get-go be a main WordPress menu
rather than a submenu.
</p>

<table border = "1"><tr><td colspan = "2" align = "center"><b>Social Media Info</b></td></tr>

<tr><td><b>Twitter ID</b><br/><i>(Do not include leading '@')</i></td>
<td>
<form action = "admin-post.php" method = "POST">
<table border = "0"><tr><td>
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "twitter" />
<input type = "text" size = "20" name = "userid" value = <?php

echo "\"" . esc_attr(get_option("storikaze_social_twitter","")) . "\"";

?>/>
</td><td>
<input type="submit" value="Submit" />
</td></tr></table>
</form>
</td></tr>

</table>


