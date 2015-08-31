<?php
require_once(dirname(__FILE__) . "/class.php");

function storikaze_lcvar_file ( $filoc ) {
  return call_user_func(function($flc) {
    return include $flc;
  }, $filoc);
}

$storikaze_adc_typ = array();
$storikaze_adc_typ["literal"] = storikaze_lcvar_file(dirname(__FILE__) . "/typ_literal.php");


$storikaze_adc_root = storikaze_lcvar_file(dirname(__FILE__) . "/load-the-root.php");


?>