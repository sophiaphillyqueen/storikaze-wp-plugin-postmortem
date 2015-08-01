<h1>Reference Sites</h1>

<p>This page is to manage options related to other sites
that Storikaze posts may need to reference in a manner that
will not require the in-post references to be changed in the
event that that other site's location be moved.</p>

<?php
// https://codex.wordpress.org/Function_Reference/add_option
// https://codex.wordpress.org/Function_Reference/get_option

$rawestlist = get_option('storikaze_refls','*');
if ( $rawestlist != '*' )
{
}

?>

<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_refsite_new" />
<input type="submit" value="Submit" />
</form>