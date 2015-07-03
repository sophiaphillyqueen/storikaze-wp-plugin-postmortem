<?php

return function ( $paramos )
{
  $paraseg = explode(":",$paramos);
  $postloc = get_permalink($paraseg[0]);
  return htmlspecialchars($postloc);
}

?>