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
  $ttx_up = get_the_title();
  $ttx_pr = htmlspecialchars($ttx_up);
  $blgnm_up = get_bloginfo('name');
  $blgnm_pr = htmlspecialchars($blgnm_up);
  
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
  
  
  // Add Facebook Button
  $reto .= '<div class="fb-like" data-href="';
  $reto .= $clrc;
  $reto .= '" data-layout="button_count" data-action="like"';
  $reto .= ' data-show-faces="true" data-share="true"></div>';
  $reto .= "\n";
  
  // Add twitter button
  // Used this site as resource: https://about.twitter.com/resources/buttons#tweet
  $reto .= '<a href="https://twitter.com/share" class="twitter-share-button"';
  $reto .= ' data-url="';
  $reto .= $clrc;
  $reto .= '" data-text="';
  $reto .= $blgnm_pr;
  $reto .= ': ';
  $reto .= $ttx_pr;
  $reto .= '"';
  //$reto .= ' data-via="SophiannaGirl"';
  $reto .= '>Tweet</a> <script>!function(d,s,id)';
  $reto .= '{var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?';
  $reto .= '\'http\':\'https\';if(!d.getElementById(id))';
  $reto .= '{js=d.createElement(s);js.id=id;js.src=';
  $reto .= 'p+\'://platform.twitter.com/widgets.js\';';
  $reto .= 'fjs.parentNode.insertBefore(js,fjs);}}';
  $reto .= '(document, \'script\', \'twitter-wjs\');';
  $reto .= '</script>' . "\n";
  
  $GLOBALS['storikaze_adcn_social_first'] = false;
  return $reto;
}
endif;
$storikaze_adcn_social_first = true;
add_filter( 'the_content', 'storikaze_adcn_social_fun' );


?>