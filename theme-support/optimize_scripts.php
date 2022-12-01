<?php
/**Description:
 * Defers scripts by checking the handle and deferring it if it's included in the array.
 */

function defer_scripts($tag, $handle, $src) {
  $defer_scripts = array(
  );

  if(in_array($handle, $defer_scripts)){
    return '<script type="text/javascript" src="'.$src.'" defer> '."\n".'';
  }

  return $tag;
}
add_filter('script_loader_tag', 'defer_scripts', 10, 3);