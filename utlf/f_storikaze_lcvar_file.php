<?php

function storikaze_lcvar_file ( $filoc ) {
  return call_user_func(function($flc) {
    return include $flc;
  }, $filoc);
}

?>