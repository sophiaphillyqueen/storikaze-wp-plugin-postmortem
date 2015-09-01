<?php

function storikaze_css_display ( ) {
  echo "<style>\n";
  storikaze_lcvar_file(dirname(__FILE__) . "/smalltx.php");
  echo "\n<style>";
}
add_action('wp_head','storikaze_css_display');

?>