<?php

// Having it already set the option now so that *eventually*
// I will have a way-out of the "default behavior is the
// old universal" rule as far as new options are concerned.
add_option('storikaze_social', 'yes');

add_action('admin_menu','storikaze_main_options_menu');

function storikaze_main_options_menu ( ) {
  add_menu_page('Storikaze Options', 'Storikaze', 'manage_options', 'storikaze-opts-main', 'storikaze_main_options_page');
  add_submenu_page('storikaze-opts-main','Storikaze Reference Site Options','Reference Sites','manage_options','storikaze-opts-related','storikaze_options_reference');
}

function storikaze_main_options_page ( ) {
  require_once(dirname(__FILE__) . "/htsg/main-menu.php");
}

function storikaze_options_reference ( ) {
  require_once(dirname(__FILE__) . "/htsg/reference-sites.php");
}


?>