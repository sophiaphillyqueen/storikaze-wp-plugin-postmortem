<?php
require_once(dirname(__FILE__) . "/class.php");

$storikaze_adc_typ = array();
$storikaze_adc_typ["literal"] = storikaze_lcvar_file(dirname(__FILE__) . "/typ_literal.php");
$storikaze_adc_typ["progress"] = storikaze_lcvar_file(dirname(__FILE__) . "/typ_progress.php");
$storikaze_adc_typ["carousel"] = storikaze_lcvar_file(dirname(__FILE__) . "/typ_carousel.php");
$storikaze_adc_typ["mobile"] = storikaze_lcvar_file(dirname(__FILE__) . "/typ_mobile.php");


$storikaze_adc_root = storikaze_lcvar_file(dirname(__FILE__) . "/load-the-root.php");


?>