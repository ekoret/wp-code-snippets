<?php
/**Description:
 * Dequeue unused CSS stylesheets by handle.
 */

function handle_single_product_styles(){

if(!is_admin()){
  $style_handles = array(
  );
  
  foreach ($style_handles as $key => $value){
    wp_dequeue_style($value);
  }
}
}
add_action('wp_enqueue_scripts', 'handle_single_product_styles', 9999);