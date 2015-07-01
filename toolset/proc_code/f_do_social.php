<?php

return function ( $paramos )
{
  $ret = "";
  $code_item = call_user_func($GLOBALS["storikaze_tllx"]["proc_code"]["jugo"],$paramos);
  $postid = $code_item[0];
  $postloc = get_permalink($postid);
  $postname = get_post_field("post_title",$postid);
  $blogname = get_bloginfo('name');
  
  // May be begin..
  $ret .= "\n";
  
  // Let us start with Facebook
  $ret .= '<div class="fb-like" data-href="' . $postloc;
  $ret .= '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>';
  $ret .= "\n";
  
  // And now twitter
  $ret .= '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . $postloc;
  $ret .= '" data-text="';
  $ret .= esc_attr($blogname);
  $ret .= ': ';
  $ret .= esc_attr($postname);
  $ret .= ':">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>';
  $ret .= "\n";
  
  // And now Google
  $ret .= '<div id="g-plus-footer" class="g-plus" data-href="' . $postloc . '" data-action="share" data-annotation="bubble"></div>' . "\n";
  
  
  return $ret;
}

?>