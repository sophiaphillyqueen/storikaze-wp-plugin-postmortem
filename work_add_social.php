<?

// Having it already set the option now so that *eventually*
// I will have a way-out of the "default behavior is the
// old universal" rule as far as new options are concerned.
add_option('storikaze_social', 'yes');

if ( ! function_exists('storikaze_adcn_social_fun') ) :
function storikaze_adcn_social_fun ( $content ) {
  $reto = "";
  $curloc = get_permalink();
  $clrc = htmlspecialchars($curloc);
  
  if ( $GLOBALS['storikaze_adcn_social_first'] )
  {
    // Add Facebook like-pretext
    $reto .= '<div id="fb-root"></div>' . "\n";
    $reto .= '<script>(function(d, s, id) {' . "\n";
    $reto .= '  var js, fjs = d.getElementsByTagName(s)[0];' . "\n";
    $reto .= '  if (d.getElementById(id)) return;' . "\n";
    $reto .= '  js = d.createElement(s); js.id = id;' . "\n";
    $reto .= '  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";' . "\n";
    $reto .= '  fjs.parentNode.insertBefore(js, fjs);' . "\n";
    $reto .= '}(document, \'script\', \'facebook-jssdk\'));</script>' . "\n";
  }
  
  $reto .= $content;
  
  $reto .= '<div class="fb-like" data-href="';
  $reto .= $clrc;
  $reto .= '" data-layout="button_count" data-action="like"';
  $reto .= ' data-show-faces="true" data-share="true"></div>';
  $reto .= "\n";
  
  $GLOBALS['storikaze_adcn_social_first'] = false;
  return $reto;
}
endif;
$storikaze_adcn_social_first = true;
add_filter( 'the_content', 'storikaze_adcn_social_fun' );


?>