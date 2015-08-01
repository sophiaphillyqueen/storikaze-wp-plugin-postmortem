<?

// ---------------------------------------- //
// -- BEGIN SOCIAL NETWORKING FLAG SETUP -- //
// ---------------------------------------- //
// Storikaze social networking flags ....
// ... as some social networking sites are displayed only where they are under
// development, while others are A-okay.
$storikaze_social_flg = array();

$storikaze_social_flg["linkedin"] = file_exists(dirname(__FILE__) . "/dvflags/linkedin.txt");
$storikaze_social_flg["tumblr"] = file_exists(dirname(__FILE__) . "/dvflags/tumblr.txt");

// And last but not least ---- presence of the *main* development flag file
// turns on all the others.
if ( file_exists(dirname(__FILE__) . "/dvflags/main.txt") )
{
  $storikaze_social_flg["linkedin"] = true;
}

// And the following social buttons have been declared ready for live use:
if ( 2 > 1 )
{
  $storikaze_social_flg["tumblr"] = true;
}

// -------------------------------------- //
// -- END SOCIAL NETWORKING FLAG SETUP -- //
// -------------------------------------- //


if ( ! function_exists('storikaze_adcn_social_fun') ) :
function storikaze_adcn_social_fun ( $content ) {
  $reto = "";
  $curloc = get_permalink();
  $clrc = esc_attr($curloc);
  $ttx_up = get_the_title();
  $ttx_pr = esc_attr($ttx_up);
  $blgnm_up = get_bloginfo('name');
  $blgnm_pr = esc_attr($blgnm_up);
  $flogs = $GLOBALS["storikaze_social_flg"];
  
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
    
    // Add the Google pretext
    if ( 2 > 1 )
    {
      $reto .= '<script>   ' . "\n";
      $reto .= '(function() {' . "\n";
      $reto .= '  var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;' . "\n";
      $reto .= '  po.src = \'https://apis.google.com/js/plusone.js\';' . "\n";
      $reto .= '  var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);' . "\n";
      $reto .= '})();' . "\n";
      $reto .= '</script>' . "\n";
    }
  }
  
  // Add the LinkedIn pretext
  if ( $flogs["linkedin"] )
  {
    $reto .= '<script src="//platform.linkedin.com/in.js"';
    $reto .= ' type="text/javascript"> lang: en_US</script>' . "\n";
  }
  
  // Add the tumblr pretext:
  if ( $flogs["tumblr"] )
  {
    $reto .= '<script';
    $reto .= ' id="tumblr-js"';
    $reto .= ' async src="https://assets.tumblr.com/share-button.js"';
    $reto .= '></script>' . "\n";
  }
  
  $reto .= $content;
  
  
  // Add Facebook Button
  $tmreto = "";
  $tmreto .= '<div class="fb-like" data-href="';
  $tmreto .= $clrc;
  $tmreto .= '" data-layout="button_count" data-action="like"';
  $tmreto .= ' data-show-faces="true" data-share="true"></div>';
  $tmreto .= "\n";
  $reto .= "[storikaze_x_prsv]" . rawurlencode($tmreto) . "[/storikaze_x_prsv]";
  
  // Add twitter button
  // Used this site as resource: https://about.twitter.com/resources/buttons#tweet
  $tmreto = "";
  $tmreto .= '<a href="https://twitter.com/share" class="twitter-share-button"';
  $tmreto .= ' data-url="';
  $tmreto .= $clrc;
  $tmreto .= '" data-text="';
  $tmreto .= $blgnm_pr;
  $tmreto .= ': ';
  $tmreto .= $ttx_pr;
  $tmreto .= '"';
  //$tmreto .= ' data-via="SophiannaGirl"';
  $tmreto .= '>Tweet</a> <script>!function(d,s,id)';
  $tmreto .= '{var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?';
  $tmreto .= '\'http\':\'https\';if(!d.getElementById(id))';
  $tmreto .= '{js=d.createElement(s);js.id=id;js.src=';
  $tmreto .= 'p+\'://platform.twitter.com/widgets.js\';';
  $tmreto .= 'fjs.parentNode.insertBefore(js,fjs);}}';
  $tmreto .= '(document, \'script\', \'twitter-wjs\');';
  $tmreto .= '</script>' . "\n";
  $reto .= "[storikaze_x_prsv]" . rawurlencode($tmreto) . "[/storikaze_x_prsv]";
  
  // Add the Google button
  // See this: http://stackoverflow.com/questions/15479250/google-share-button-custom-href-url
  if ( 2 > 1 )
  {
    $reto .= '<div id="g-plus-footer" class="g-plus"';
    $reto .= ' data-href="' . $clrc . '"';
    $reto .= ' data-action="share"';
    $reto .= ' data-annotation="bubble"';
    $reto .= '></div>' . "\n";
  }
  
  // Add the LinkedIn button
  // I can learn more for this: https://developer.linkedin.com/docs/share-on-linkedin
  // Read about esc_attr(): https://codex.wordpress.org/Function_Reference/esc_attr
  if ( $flogs["linkedin"] )
  {
    $tmreto = "";
    $tmreto .= '<script type="IN/Share"';
    $tmreto .= ' data-url="' . $clrc . '"';
    $tmreto .= ' data-counter="right"';
    $tmreto .= ' data-description="' . esc_attr(substr($content,0,50)) . '"';
    $tmreto .= '></script>' . "\n";
    $reto .= "[storikaze_x_prsv]" . rawurlencode($tmreto) . "[/storikaze_x_prsv]";
  }
  
  // Add the tumblr button
  // Documented here: https://www.tumblr.com/docs/en/share_button
  // And I feel safer with exc_html: https://codex.wordpress.org/Function_Reference/esc_html
  if ( $flogs["tumblr"] )
  {
    $reto .= '<a';
    $reto .= ' class="tumblr-share-button"';
    $reto .= ' href="https://www.tumblr.com/share"';
    $reto .= ' data-href="' . $clrc . '"';
    
    $temp_a = $content;
    
    $temp_b = preg_replace(
      array(
        '~\[storikaze_segbreak /\]~',
        '~\[storikaze_chbreak /\]~'
      ), array (
        "\n\n* * *\n\n",
        "\n\n\n"
      ),
    $temp_a);
    
    $temp_x = $temp_b;
    $reto .= ' data-content="' . esc_attr(wp_trim_words($temp_x,70)) . '"';
    $reto .= '></a>';
    $reto .= "\n";
  }
  
  $GLOBALS['storikaze_adcn_social_first'] = false;
  return $reto;
}
endif;
$storikaze_adcn_social_first = true;
add_filter( 'the_content', 'storikaze_adcn_social_fun' );


?>